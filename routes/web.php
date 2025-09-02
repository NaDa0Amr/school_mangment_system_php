<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseStudentController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
Route::post('doctors', [DoctorController::class, 'store'])->name('doctors.store');
Route::delete('doctors/{id}', [DoctorController::class, 'destroy'])->name('doctors.destroy');
Route::get('doctors/{id}', [DoctorController::class, 'edit'])->name('doctors.edit');
Route::post('doctors/{id}', [DoctorController::class, 'update'])->name('doctors.update');



Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('courses', [CourseController::class, 'store'])->name('courses.store');
// Use implicit route-model binding for Course deletion
Route::delete('courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
Route::get('courses/{id}', [CourseController::class, 'edit'])->name('courses.edit');
Route::post('courses/{id}', [CourseController::class, 'update'])->name('courses.update');


Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::delete('employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::get('employees/{employee}', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::post('employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');

Route::group(['prefix' => 'departments'], function () {
    Route::get('/', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('/', [DepartmentController::class, 'store'])->name('departments.store');
    Route::delete('/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
    Route::get('/{department}', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::post('/{department}', [DepartmentController::class, 'update'])->name('departments.update');
});


Route::group(['prefix' => 'students'], function () {
    Route::get('/', [StudentController::class, 'index'])->name('students.index');           // list
    Route::get('/create', [StudentController::class, 'create'])->name('students.create');  // form create
    Route::post('/', [StudentController::class, 'store'])->name('students.store');         // store

    Route::get('/{student}', [StudentController::class, 'edit'])->name('students.edit'); // edit form
    Route::post('/{student}', [StudentController::class, 'update'])->name('students.update');  // update
    Route::delete('/{student}', [StudentController::class, 'destroy'])->name('students.destroy'); // delete
});

Route::get('students/{student}/courses', [CourseStudentController::class, 'index'])->name('students.courses.index');
Route::get('students/{student}/courses/create', [CourseStudentController::class, 'create'])->name('students.courses.create');
Route::post('students/{student}/courses', [CourseStudentController::class, 'store'])->name('students.courses.store');


Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/authenticate', [UserController::class, 'authenticate'])->name('authenticate');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');
