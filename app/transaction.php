<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $fillable = [
        'trx_type', 
        'user_name', 
        'bank_name', 
        'acc_no', 
        'website_name', 
        'amount', 
        'old_web_coin', 
        'new_web_coin', 
        'old_bank_balance', 
        'new_bank_balance'
    ];
}
