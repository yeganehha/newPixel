<?php

namespace App\Console;

use App\Jobs\GetRoleInDiscordJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\User;
use App\Models\Tire;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $allRoles = Tire::get()->pluck('discord_roll_id')->toArray();
            if ( count($allRoles) > 0  ) {
                foreach (User::where('expire_at', '<=', now())->whereNotNull('tire_id') as $user) {
                    $user->tire_id = null;
                    $user->save();
                    dispatch(new GetRoleInDiscordJob($user->id , $allRoles));
                }
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
