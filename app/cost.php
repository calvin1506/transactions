<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cost extends Model
{
    protected $fillable = [
        'from_trx_Name', 
        'trx_Name', 
        'bank_id', 
        'bank_name', 
        'acc_no', 
        'user_id', 
        'user_name', 
        'amount', 
        'status', 
        'status_detail',
        'note'
    ];
}
