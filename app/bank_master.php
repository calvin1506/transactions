<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bank_master extends Model
{
    protected $fillable = [
        'bank_master_name', 'bank_master_alias'
    ];
}
