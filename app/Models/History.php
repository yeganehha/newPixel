<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'back_histories' ;

    protected $fillable = [
        'id',
        'user_id',
        'accepted_by',
        'history',
        'status',
        'reason',
        'accepted_time',
    ];
    protected $casts = [
        'user_id' => 'string',
        'accepted_by' => 'string',
        'history' => 'string',
        'reason' => 'string',
        'status' => 'int',
        'accepted_time' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class , 'accepted_by');
    }
}
