<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    
      protected $table = 'doctors';

    protected $fillable = [
        'firstName',
        'lastName',
        'birthdate',
        'cardNumber',
        'speciality',
        'gender',
        'phoneNumber',
        'address',
        'email',
        'experience',
        'university',
        'about',
        'pictureUrl',
        
    
    ];
    
}
