<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    //

    protected $table = 'treatments';

    protected $fillable = [
        'diagnosis_id',
        'medicines',
        'remark',
    ];
}
