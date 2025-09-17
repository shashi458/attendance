<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
     protected $fillable = [
        'full_name',
        'date_of_birth',
        'gender',
        'marital_status',

        'aadhaar_number',
        'mobile',
        'email',
        'address',

        'designation',
        'date_of_joining',

        'profile_photo',
        'id_proof',
    ];
    
      public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
