<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'user_id', 
        'referral', 
        'bank', 
        'balance', 
        'tanggal_gabung', 
        'telepon', 
        'email', 
        'website'
    ];
}
