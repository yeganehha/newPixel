<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use RestCord\DiscordClient;

class DashboardController extends Controller
{
    public static function getUsers()
    {

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
