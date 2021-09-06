<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $table = 'appointments';

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'date',
        'time',
        'aapointment_details',
    ];
}
