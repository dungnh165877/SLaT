<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
	protected $fillable = [
        'email', 'token'
    ];

    protected $table = 'password_resets';
    public $timestamps = false;
}
