@extends('layouts.app')

@section('title', 'Courses')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Add Course</h1>
        <small class="text-muted">Register a new course</small>
    </div>
    <div>
        <a href="{{ url('/courses') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Back to List
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('courses.update', $course->id) }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $course->name }}">
            </div>
            <div class="mb-3">
                <label for="hours" class="form-label">Duration (hours)</label>
                <input type="number" class="form-control" id="hours" name="hours" value="{{ $course->hours }}" required>
            </div>
            <div class="mb-3">
                <label for="cost" class="form-label">Cost</label>
                <input type="number" class="form-control" id="cost" name="cost" value="{{ $course->cost }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Course</button>
        </form>
    </div>
</div>
@endsection


