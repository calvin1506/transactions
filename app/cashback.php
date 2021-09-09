<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cashback extends Model
{
    protected $fillable = [
        'user_id', 'amount', 'bank_id', 'bank_name', 'acc_no', 'trx_number'
    ];
}
