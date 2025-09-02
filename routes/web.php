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
Route::get('doctors/create', [DoctorController::class, 'create'])->name('doctors.create')->middleware(['auth', 'admin']);
Route::post('doctors', [DoctorController::class, 'store'])->name('doctors.store')->middleware(['auth', 'admin']);
Route::delete('doctors/{id}', [DoctorController::class, 'destroy'])->name('doctors.destroy')->middleware(['auth', 'admin']);
Route::get('doctors/{id}', [DoctorController::class, 'edit'])->name('doctors.edit')->middleware(['auth', 'admin']);
Route::post('doctors/{id}', [DoctorController::class, 'update'])->name('doctors.update')->middleware(['auth', 'admin']);



Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create')->middleware(['auth', 'admin']);
Route::post('courses', [CourseController::class, 'store'])->name('courses.store')->middleware(['auth', 'admin']);
// Use implicit route-model binding for Course deletion
Route::delete('courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy')->middleware(['auth', 'admin']);
Route::get('courses/{id}', [CourseController::class, 'edit'])->name('courses.edit')->middleware(['auth', 'admin']);
Route::post('courses/{id}', [CourseController::class, 'update'])->name('courses.update')->middleware(['auth', 'admin']);


Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('employees/create', [EmployeeController::class, 'create'])->name('employees.create')->middleware(['auth', 'admin']);
Route::post('employees', [EmployeeController::class, 'store'])->name('employees.store')->middleware(['auth', 'admin']);
Route::delete('employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy')->middleware(['auth', 'admin']);
Route::get('employees/{employee}', [EmployeeController::class, 'edit'])->name('employees.edit')->middleware(['auth', 'admin']);
Route::post('employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update')->middleware(['auth', 'admin']);

Route::group(['prefix' => 'departments'], function () {
    Route::get('/', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/create', [DepartmentController::class, 'create'])->name('departments.create')->middleware(['auth', 'admin']);
    Route::post('/', [DepartmentController::class, 'store'])->name('departments.store')->middleware(['auth', 'admin']);
    Route::delete('/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy')->middleware(['auth', 'admin']);
    Route::get('/{department}', [DepartmentController::class, 'edit'])->name('departments.edit')->middleware(['auth', 'admin']);
    Route::post('/{department}', [DepartmentController::class, 'update'])->name('departments.update')->middleware(['auth', 'admin']);
});


Route::group(['prefix' => 'students'], function () {
    Route::get('/', [StudentController::class, 'index'])->name('students.index');           // list
    Route::get('/create', [StudentController::class, 'create'])->name('students.create')->middleware(['auth', 'admin']);  // form create
    Route::post('/', [StudentController::class, 'store'])->name('students.store')->middleware(['auth', 'admin']);         // store

    Route::get('/{student}', [StudentController::class, 'edit'])->name('students.edit')->middleware(['auth', 'admin']); // edit form
    Route::post('/{student}', [StudentController::class, 'update'])->name('students.update')->middleware(['auth', 'admin']);  // update
    Route::delete('/{student}', [StudentController::class, 'destroy'])->name('students.destroy')->middleware(['auth', 'admin']); // delete
});

Route::get('students/{student}/courses', [CourseStudentController::class, 'index'])->name('students.courses.index');
Route::get('students/{student}/courses/create', [CourseStudentController::class, 'create'])->name('students.courses.create')->middleware(['auth', 'admin']);
Route::post('students/{student}/courses', [CourseStudentController::class, 'store'])->name('students.courses.store')->middleware(['auth', 'admin']);


// User management (admin only)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/authenticate', [UserController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
