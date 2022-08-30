<?php


namespace App\Http\Controllers\Panel;


use App\Http\Controllers\Controller;
use App\Models\Tire;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
    public function dashboard(){
        $packages = Cache::remember('tires' , 5* 60  , function (){
            return Tire::orderByDesc('price')->get();
        });
        return view('panel.page.dashboard' , compact('packages'));
    }
}
