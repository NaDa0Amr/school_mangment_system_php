<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//file as class name
class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'address',
        'gender',
        'salary',
    ];
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
