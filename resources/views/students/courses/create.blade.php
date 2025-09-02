@extends('layouts.app')

@section('title', 'Add Course to Student')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Add Course for: {{ $student->name }}</h1>
    <div>
        <a href="{{ route('students.courses.index', $student) }}" class="btn btn-secondary btn-sm">Back to Courses</a>
        <a href="{{ route('students.index') }}" class="btn btn-outline-secondary btn-sm">Students</a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0 small">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if($courses->isEmpty())
    <div class="alert alert-info">All existing courses are already assigned to this student. Create a new course first.</div>
@else
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table mb-0 table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Hours</th>
                            <th>Cost</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->hours }}</td>
                                <td>{{ $course->cost }}</td>
                                <td>
                                    <form method="POST" action="{{ route('students.courses.store', $student) }}" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <button type="submit" class="btn btn-primary btn-sm">Add</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif
@endsection
