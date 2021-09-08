<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'user_id', 
        'name', 
        'address', 
        'email', 
        'phone', 
        'note', 
        'bank_name', 
        'acc_no', 
        'acc_holder',
        'website'
    ];
}
