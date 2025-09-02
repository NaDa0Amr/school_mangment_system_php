<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class CourseStudentController extends Controller
{
    public function index($studentId)
    {
        $student = Student::findOrFail($studentId);
        $courses = $student->courses;
        return view('students.courses.index', compact('student', 'courses'));
    }

    public function create($studentId)
    {
        $student = Student::findOrFail($studentId);
        // Get courses the student is not already enrolled in
        $courses = Course::whereDoesntHave('students', function ($q) use ($studentId) {
            $q->where('student_id', $studentId);
        })->get();
        return view('students.courses.create', compact('student', 'courses'));
    }

    public function store(Request $request, $studentId)
    {
        $student = Student::findOrFail($studentId);

        $data = $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        // Avoid duplicate attach
        if (!$student->courses()->where('courses.id', $data['course_id'])->exists()) {
            $student->courses()->attach($data['course_id']);
        }

        return redirect()
            ->route('students.courses.index', $student)
            ->with('success', 'Course added to student successfully.');
    }
}
