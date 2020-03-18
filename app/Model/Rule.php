<?php

namespace App\Mode;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'event', 'action', 'citiation_flow', 'active'
    ];
}
