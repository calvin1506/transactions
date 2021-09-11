<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bank extends Model
{
    protected $fillable = [
        'bank_name', 'acc_no', 'holder_name', 'saldo', 'website', 'leader', 'operator', 'login_name', 'login_password'
    ];
}
