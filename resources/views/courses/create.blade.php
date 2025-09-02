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
        <form method="POST" action="{{ url('/courses') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="cost" class="form-label">Cost</label>
                <input type="number" class="form-control" id="cost" name="cost" min="0" required>
            </div>
            <div class="mb-3">
                <label for="hours" class="form-label">Hours</label>
                <input type="number" class="form-control" id="hours" name="hours" min="1" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Course</button>
        </form>
    </div>
</div>
@endsection

