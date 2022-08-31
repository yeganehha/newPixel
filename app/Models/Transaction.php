<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class Transaction extends Model
{
    protected $fillable = [
        'id',
        'uuid',
        'user_id',
        'tire_id',
        'last_tire_id',
        'amount',
        'discount',
        'is_pay',
        'visitor',
        'result',
        'trans_id',
    ];
    protected $casts = [
        'user_id' => 'integer',
        'uuid' => 'string',
        'tire_id' => 'integer',
        'amount' => 'integer',
        'is_pay' => 'boolean',
        'visitor' => 'string',
        'result' => 'string',
        'trans_id' => 'string',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tire(){
        return $this->belongsTo(Tire::class)->withTrashed();
    }

    public function lastTire(){
        return $this->belongsTo(Tire::class ,'last_tire_id')->withTrashed();
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('uuid', $value)->firstOrFail();
    }
}
