<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Doctor;
use App\Models\Student;
use App\Models\User;



use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(Request $request)
    {
        $doctors = Doctor::count();
        $students = Student::count();
        $courses = Course::count();
        $users = User::count();

        return view('home', compact('doctors', 'students', 'courses', 'users'));
    }
}
