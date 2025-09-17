<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';
     protected $fillable = ['employee_id','date','check_in','check_out','working_hours'];

      protected $casts = [
        'date' => 'date', 
        'check_in' => 'datetime',
        'check_out' => 'datetime',
    ];
      public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
