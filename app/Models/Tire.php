<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tire extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'expire',
        'discord_roll_id',
        'price'
    ];
    protected $casts = [
        'name' => 'string',
        'expire' => 'integer',
        'discord_roll_id' => 'string',
        'price' => 'integer',
    ];
}
