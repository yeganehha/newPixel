<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class backHistory extends Model
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
        'user_id' => 'int',
        'accepted_by' => 'int',
        'history' => 'string',
        'reason' => 'string',
        'status' => 'int',
        'accepted_time' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class , 'id' , 'accepted_by');
    }
}
