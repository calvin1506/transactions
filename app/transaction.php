<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $fillable = [
        'submitter_id', 
        'submitter_name', 
        'trx_type', 
        'trx_detail', 
        'trx_number', 
        'trx_source', 
        'user_name', 
        'bank_name', 
        'acc_no', 
        'website_name', 
        'amount', 
        'old_web_coin', 
        'new_web_coin', 
        'old_bank_balance', 
        'new_bank_balance',
        'note'
    ];
}
