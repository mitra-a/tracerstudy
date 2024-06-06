<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'login_history';

    protected $casts = [
        'last_login_at' => 'datetime',
    ];
}
