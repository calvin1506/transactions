<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class correction extends Model
{
    protected $fillable = [
        'corr_trx_num', 
        'trx_type', 
        'trx_detail', 
        'trx_source', 
        'old_amount', 
        'old_bonus', 
        'new_amount', 
        'new_bonus', 
        'submitter_id', 
        'submitter_name', 
        'corrector_id', 
        'corrector_name'
    ];
}
