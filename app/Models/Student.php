<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [

        'id',
        'name',
        'doctor_id',
        'age',
        'address',
        'gender',
    ];
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
