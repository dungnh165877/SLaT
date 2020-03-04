<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
	protected $fillable = [
        'email', 'token','time_expire'
    ];

    protected $table = 'password_resets';
    public $timestamps = false;
}
