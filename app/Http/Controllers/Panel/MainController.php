<?php


namespace App\Http\Controllers\Panel;


use App\Http\Controllers\Controller;
use App\Jobs\GetRoleInDiscordJob;
use App\Jobs\GiveRoleInDiscordJob;
use App\Models\Tire;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use EasyPanel\Models\PanelAdmin;
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
        $packages = Tire::orderBy('price')->get();
        return view('panel.page.dashboard' , compact('packages'));
    }
    public function history(){
        $transactions = Auth()->user()->transactions()->orderByDesc('id')->with('tire')->paginate();
        return view('panel.page.history' , compact('transactions'));
    }
    public function backHistory(){
        return view('panel.page.back-history' );
    }


    public function backHistory(){
        return view('panel.page.back-history' );
    }

    public function setAsAdmin(User $user){
        PanelAdmin::create(['user_id' => $user->id, 'is_superuser' => false]);
        return redirect()->route(getRouteName().'.admins.lists')->with('success' , 'کاربر با موفقیت ادیمن شد.');
    }

    public function buy(Request $request, Tire $tire, Transaction $transaction){
        try {
            DB::beginTransaction();
            $discount =Auth()->user()->discountUpgrade() ;
            $discount = ( $discount > $tire->price ) ? $tire->price : $discount;
            if ($tire->price > 0 and  $discount < $tire->price) {
                $transaction->user_id = Auth()->id();
                $transaction->tire_id = $tire->id;
                $transaction->uuid = \Illuminate\Support\Str::uuid();
                $transaction->discount = $discount;
                $transaction->last_tire_id = Auth()->user()->getActiveTire(false)->id;
                $transaction->amount = $tire->price - $discount;
                $transaction->visitor = $request->ip();
                $transaction->save();
                $invoice = new Invoice;
                $invoice->amount( $tire->price - $discount );
                $invoice->detail('Title', $tire->name)
                    ->detail('Time', $tire->expire . ' Day')
                    ->detail('uuid', $tire->expire . ' Day')
                    ->detail('discount', $transaction->discount)
                    ->detail('User', Auth()->id());
                return Payment::callbackUrl(route('callback', $transaction->uuid))->purchase($invoice, function ($driver, $transactionId) use ($transaction) {
                    $transaction->trans_id = $transactionId;
                    $transaction->save();
                    DB::commit();
                })->pay()->render();
            } else {
                $transaction->user_id = Auth()->id();
                $transaction->tire_id = $tire->id;
                $transaction->discount = $discount;
                $transaction->last_tire_id = Auth()->user()->getActiveTire(false)->id;
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
            if ( $transaction->is_pay == false ) {
                DB::beginTransaction();
                $receipt = Payment::amount($transaction->amount)->transactionId($request->trans_id)->verify();
                $transaction->trans_id = $receipt->getReferenceId();
                $transaction->result = "پرداخت تکمیل و با موفقیت انجام شده است";
                $transaction->is_pay = true;
                $transaction->save();
                $this->subscribeAdd($transaction->tire()->first());
                DB::commit();
                return redirect()->route('history')->with('success', 'دریافت اشتراک شما با موفقیت انجام شد.');
            }
            return redirect()->route('history')->withErrors( 'فاکتور مد نظر قبلا پرداخت شده است!');
        } catch (InvalidPaymentException | \Exception $exception) {
            DB::rollBack();
            $transaction->result = $exception->getMessage();
            $transaction->save();
            return redirect()->route('history')->withErrors($exception->getMessage());
        }
    }

    private function subscribeAdd($tire){
        $user = Auth()->user();
        $user->tire_id = $tire->id;
        $user->active_from = Carbon::now();
        $user->expire_at = Carbon::now()->addDays($tire->expire);
        $user->save();
        $allRoles = Tire::where('id' , '!=', $tire->id)->get()->pluck('discord_roll_id')->toArray();
        if ( count($allRoles) > 0  )
            dispatch(new GetRoleInDiscordJob($user->id , $allRoles  ));
        if ( $tire->discord_roll_id != null )
            dispatch(new GiveRoleInDiscordJob($user->id , $tire->discord_roll_id));
    }
}
