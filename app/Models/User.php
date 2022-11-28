<?php

namespace App\Models;

use EasyPanel\Models\PanelAdmin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'username',
        'discriminator',
        'email',
        'avatar',
        'tire_id',
        'verified',
        'locale',
        'mfa_enabled',
        'refresh_token',
        'expire_at',
        'active_from',
    ];
    public function  adminHidden() {
        return [
            'username',
            'discriminator',
            'avatar',
        ];
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'refresh_token',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'username' => 'string',
        'discriminator' => 'string',
        'email' => 'string',
        'avatar' => 'string',
        'verified' => 'boolean',
        'locale' => 'string',
        'mfa_enabled' => 'boolean',
        'refresh_token' => 'encrypted',
        'expire_at' => 'datetime',
        'active_from' => 'datetime',
    ];
    public function expireAtHumanFormat(){
        $expire_at = $this->getAttribute('expire_at');
        if ( $expire_at == null or Carbon::now()->gt($expire_at) )
            return __('Expired!');
        else
            return  $expire_at->diffForHumans();
    }

    public function getAvatar()  {
        $avatar = parent::getAttribute('avatar');
        $user = parent::getAttribute('id');
        return 'https://cdn.discordapp.com/avatars/'.$user.'/'.$avatar.'.webp?size=64' ;
    }

    public function getPercent(){
        $finishTime = $this->expire_at ;
        $startTime = $this->active_from ;
        if ( $this->expire_at == null or $this->active_from == null )
            return false;
        $totalDuration = $finishTime->diffInSeconds($startTime);
        $duration = Carbon::now()->diffInSeconds($startTime);
        $percent = round($duration * 100 / $totalDuration ) ;
        return $percent > 100 ? 100 : ( $percent < 0 ? 0 : $percent) ;
    }

    public function discountUpgrade(){
        $usePercent = $this->getPercent();
        if ( $usePercent === false)
            return 0 ;
        $percent = 100 - $usePercent;
        $percent = $percent < 0 ? 0 : ( $percent > 100 ? 100 : $percent);
        $lastTire = $this->tire()->first();
        if ( $lastTire == null )
            return 0 ;
        return  round($percent * $lastTire->price / 100 );
    }

    public function getActiveTire($boolean = true){
        if (
            $this->expire_at == null or
            $this->active_from == null or
            Carbon::now()->gt($this->expire_at)
        )
            return $boolean ? false : new Tire();

        return  $boolean ? true : $this->tire()->first() ;
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }


    public function tire(){
        return $this->belongsTo(Tire::class)->withTrashed();
    }

    public function isAdmin(){
        return PanelAdmin::where('user_id' , $this->id)->exists() ;
    }

    public function isAccept(){
        return backHistory::where('user_id' , $this->id)->where('status' , 2)->exists() ;
    }

    public function histories()
    {
        return $this->hasMany(backHistory::class )->orderByDesc('status')->latest();
    }
}
