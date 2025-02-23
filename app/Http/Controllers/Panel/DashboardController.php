<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\Cache;
use RestCord\DiscordClient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public static function thisMonthUsers()
    {
        return Cache::remember('thisMonthUsers' , 5*60  , function (){
            $from = verta()->startMonth();
            $to = verta()->endMonth();
            $users = User::select('created_at' , DB::raw("COUNT(*) as numUser,date(created_at) as OfDay"))
                ->whereBetween('created_at', [$from->toCarbon() , $to->toCarbon()])
                ->groupby('OfDay')
                ->get();

            $days = array_fill(1,$to->day , 0);
            foreach ( $users as $user ){
                $days[$user->created_at->toJalali()->day] = (int) $user->numUser;
            }
            return $days;
        });
    }

    public static function thisMonthIncome()
    {
        return Cache::remember('thisMonthIncome' , 5*60  , function (){
            $from = verta()->startMonth();
            $to = verta()->endMonth();
            $users = Transaction::select('created_at' , DB::raw("SUM(amount) as paid,date(created_at) as OfDay"))
                ->whereBetween('created_at', [$from->toCarbon() , $to->toCarbon()])
                ->where('is_pay', 1)
                ->groupby('OfDay')
                ->get();

            $days = array_fill(1,$to->day , 0);
            foreach ( $users as $user ){
                $days[$user->created_at->toJalali()->day] = (int) $user->paid;
            }
            return $days;
        });
    }

    public static function thisYearIncome()
    {
        return Cache::remember('thisYearIncome' , 5*60  , function (){
            $from = verta()->subYear()->addMonth()->startMonth();
            $to = verta();
            $users = Transaction::select('created_at' , DB::raw("SUM(amount) as paid,date(created_at) as OfDay"))
                ->whereBetween('created_at', [$from->toCarbon() , $to->toCarbon()])
                ->where('is_pay', 1)
                ->groupby('OfDay')
                ->get();

            for ( $i = 0 ; $i < 12 ; $i++ ){
                $days[ $from->addMonths($i)->format('F Y') ] = 0;
            }
            foreach ( $users as $user ){
                $days[$user->created_at->toJalali()->format('F Y')] += (int) $user->paid;
            }
            $result = [] ;
            foreach ( $days as $mounth => $paid ){
                $result[] = ['time' => $mounth , 'price' => $paid ];
            }
            return $result;
        });
    }

    public static function getRoles(){
        $discord = new DiscordClient(['token' => env('DISCORD_TOKEN') , 'logger' => app()->make(\Psr\Log\NullLogger::class)]);
        $roles = $discord->guild->getGuildRoles(['guild.id' =>  (int) env('DIsCORD_SERVER')]);

        $result = [];
        if ( count($roles) > 0 ){
            foreach ($roles as $role){
                $result[] = $role;
            }
        }
        usort($result, function($a, $b) {
            return $b['position'] - $a['position'];
        });
        return $result;
    }
}
