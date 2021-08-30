<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activity_log extends Model
{
    protected $fillable = [
        'user', 'activity'
    ];
}
