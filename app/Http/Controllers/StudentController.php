<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Doctor;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index', ['students' => Student::all()]);
    }

    public function create()
    {
        $doctors = Doctor::all();
        return view('students.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $student = Student::create($request->all());
        return redirect()->route('students.index', $student);
    }



    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        return redirect()->route('students.index', $student);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
    public function coursesIndex(Student $student)
    {
        $courses = $student->courses;
        return view('students.courses.index', compact('student', 'courses'));
    }
}
