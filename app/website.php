<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class website extends Model
{
    protected $fillable = [
        'web_name', 'init_coin', 'leader', 'operator', 'bank'
    ];
}
