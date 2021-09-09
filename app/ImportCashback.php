<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportCashback extends Model
{
    protected $fillable = ['user_id','amount'];
}
