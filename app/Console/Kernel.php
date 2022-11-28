<?php

namespace App\Console;

use App\Jobs\GetRoleInDiscordJob;
use App\Jobs\GiveRoleInDiscordJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\User;
use Illuminate\Support\Facades\Log;
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
            //Log::info('all roles.', $allRoles );
            //dispatch(new GetRoleInDiscordJob(770212629461336085 , $allRoles));
            if ( count($allRoles) > 0  ) {
                foreach (User::where('expire_at', '<=', now())->whereNotNull('tire_id')->get() as $user) {
                    $user->tire_id = null;
                    $user->save();
                    dispatch(new GetRoleInDiscordJob($user->id , $allRoles));
                }
            }
            if ( true ) {
                $startData = Carbon::createFromDate(2022, 12, 10);
                $endData = Carbon::createFromDate(2022, 12, 10);
                $users = User::query()
                    ->whereDate('expire_at', '>=', $startData)
                    ->whereDate('expire_at', '<=', $endData)
                    ->limit(5)
                    ->get();
                $tire = Tire::find(5);
                $allRoles = Tire::where('id' , '!=', $tire->id)->get()->pluck('discord_roll_id')->toArray();
                foreach ($users as $user) {
                    $user->tire_id = 5;
                    $finishTime = $user->expire_at;
                    $totalDuration = $finishTime->diffInSeconds($startData);
                    $user->expire_at->addSeconds($totalDuration);
                    $user->save();
                    if ( count($allRoles) > 0  )
                        dispatch(new GetRoleInDiscordJob($user->id , $allRoles  ));
                    if ( $tire->discord_roll_id != null )
                        dispatch(new GiveRoleInDiscordJob($user->id , $tire->discord_roll_id));
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
