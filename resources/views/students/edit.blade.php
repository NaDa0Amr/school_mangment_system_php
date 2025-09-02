@extends('layouts.app')
@section('title', 'Students')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Edit Student</h1>
        <small class="text-muted">Update student info</small>
    </div>
    <div>
        <a href="{{ route('students.index') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Back to List
        </a>
    </div>
</div>
<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('students.update', $student) }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" value="{{ $student->age }}" min="0" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $student->address }}" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="doctor_id" class="form-label">Doctor ID</label>
                <input type="number" class="form-control" id="doctor_id" name="doctor_id" value="{{ $student->doctor_id }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Student</button>
        </form>
    </div>
</div>
@endsection
