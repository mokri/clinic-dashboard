<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    
    
    protected $table = 'patients';

    protected $fillable = [
        'firstName',
        'lastName',
        'birthdate',
        'cardNumber',
        'type',
        'gender',
        'phoneNumber',
        'address',
        'email',
        'pictureUrl',
    
    ];
    
      public function diagnosis(){

        return $this->hasMany(Diagnosis::class);
    }
    
    
}
