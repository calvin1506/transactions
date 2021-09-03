<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pending extends Model
{
    protected $fillable = [
        'trx_Name', 
        'bank_id', 
        'bank_name', 
        'user_id', 
        'user_name', 
        'amount', 
        'status', 
        'status_detail'
    ];
}
