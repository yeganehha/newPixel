<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use RestCord\DiscordClient;

class GiveRoleInDiscordJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $discordId;
    protected $roleId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($discordId , $roleId)
    {
        $this->discordId = $discordId;
        $this->roleId = $roleId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $discord = new DiscordClient(['token' => env('DISCORD_TOKEN') , 'logger' => app()->make(\Psr\Log\NullLogger::class)]);
        $discord->guild->addGuildMemberRole([
            'guild.id' =>  (int) env('DIsCORD_SERVER'),
            'user.id' =>  (int) $this->discordId,
            'role.id' =>  (int) $this->roleId,
        ]);
    }
}
