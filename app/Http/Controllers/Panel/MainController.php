<?php


namespace App\Http\Controllers\Panel;


use App\Http\Controllers\Controller;
use App\Models\Tire;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class MainController extends Controller
{
    public function dashboard(){
        $packages = Cache::remember('tires' , 5* 60  , function (){
            return Tire::orderByDesc('price')->get();
        });
        return view('panel.page.dashboard' , compact('packages'));
    }
    public function history(){
        $transactions = Auth()->user()->transactions()->orderByDesc('id')->with('tire')->paginate();
        return view('panel.page.history' , compact('transactions'));
    }
    public function buy(Request $request, Tire $tire, Transaction $transaction){
        try {
            DB::beginTransaction();
            if ($tire->price > 0) {
                $transaction->user_id = Auth()->id();
                $transaction->tire_id = $tire->id;
                $transaction->uuid = \Illuminate\Support\Str::uuid();
                $transaction->amount = $tire->price;
                $transaction->visitor = $request->ip();
                $transaction->save();
                $invoice = new Invoice;
                $invoice->amount($tire->price);
                $invoice->detail('Title', $tire->name)
                    ->detail('Time', $tire->expire . ' Day')
                    ->detail('uuid', $tire->expire . ' Day')
                    ->detail('User', Auth()->id());
                return Payment::callbackUrl(route('callback', $transaction->uuid))->purchase($invoice, function ($driver, $transactionId) use ($transaction) {
                    $transaction->trans_id = $transactionId;
                    $transaction->save();
                    DB::commit();
                })->pay()->render();
            } else {
                $transaction->user_id = Auth()->id();
                $transaction->tire_id = $tire->id;
                $transaction->amount = 0;
                $transaction->is_pay = true;
                $transaction->visitor = $request->ip();
                $transaction->save();
                $this->subscribeAdd($tire);
                DB::commit();
                return redirect()->route('history')->with('success' , 'دریافت اشتراک شما با موفقیت انجام شد.');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function callback(Request $request , Transaction  $transaction){
        try {
            DB::beginTransaction();
            $receipt = Payment::amount($transaction->amount)->transactionId($request->trans_id)->verify();
            $transaction->trans_id =  $receipt->getReferenceId();
            $transaction->result =  "پرداخت تکمیل و با موفقیت انجام شده است";
            $transaction->is_pay = true;
            $transaction->save();
            $this->subscribeAdd($transaction->tire()->first());
            DB::commit();
            return redirect()->route('history')->with('success' , 'دریافت اشتراک شما با موفقیت انجام شد.');
        } catch (InvalidPaymentException | \Exception $exception) {
            DB::rollBack();
            $transaction->result = $exception->getMessage();
            $transaction->save();
            return redirect()->route('history')->withErrors($exception->getMessage());
        }
    }

    private function subscribeAdd($tire){
        $user = Auth()->user();
        $user->active_from = Carbon::now();
        $user->expire_at = Carbon::now()->addDays($tire->expire);
        $user->save();
    }
}
