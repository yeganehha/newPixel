<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use RestCord\DiscordClient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public static function getUsers()
    {
        $dateFrom = Carbon::now()->subDays(30);
        $dateTo = Carbon::now();

        $result = User::select('users.*', DB::raw('count(id) as `count`'),  DB::raw('MONTH(created_at) month, DAY(created_at) day'))
            ->whereBetween('users.created_at', [$dateFrom, $dateTo])
            ->groupby('month', 'day')
            ->orderBy('month')
            ->orderBy('day')
            ->get();
        dd($result);

        
        // $return = array_fill();

        // return User::selectRaw('year(created_at) year, monthname(created_at) month, count(*) data')
        //     ->groupBy('year', 'month')
        //     ->get();
    }

    public static function getRoles(){
        $discord = new DiscordClient(['token' => env('DISCORD_TOKEN')]);
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
