@extends('layouts.app')

@section('title', 'Doctors')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Add Doctor</h1>
        <small class="text-muted">Register a new doctor</small>
    </div>
    <div>
        <a href="{{ url('/doctors') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Back to List
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('doctors.update', $doctor->id) }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $doctor->name }}">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" min="0" value="{{ $doctor->age }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $doctor->address }}" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="" selected disabled>Select gender</option>
                    <option value="male" {{ $doctor->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $doctor->gender == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" class="form-control" id="salary" name="salary" step="0.01" min="0" value="{{ $doctor->salary }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Doctor</button>
        </form>
    </div>
</div>
@endsection
