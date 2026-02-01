<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiToken extends Model
{
    protected $fillable = [
        'user_id',
        'token',
        'name',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];
}
