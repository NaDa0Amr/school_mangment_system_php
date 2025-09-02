@extends('layouts.app')

@section('title', 'Employees')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
	<div>
		<h1 class="h3 mb-0">Edit Employee</h1>
		<small class="text-muted">Update employee info</small>
	</div>
	<div>
		<a href="{{ url('/employees') }}" class="btn btn-secondary btn-sm">
			<i class="bi bi-arrow-left"></i> Back to List
		</a>
	</div>
</div>

<div class="card shadow-sm">
	<div class="card-body">
		<form method="POST" action="{{ route('employees.update', $employee->id) }}">
			@csrf
			<div class="mb-3">
				<label for="name" class="form-label">Name</label>
				<input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" required>
			</div>
			<div class="mb-3">
				<label for="manager_id" class="form-label">Manager ID</label>
				<input type="number" class="form-control" id="manager_id" name="manager_id" value="{{ $employee->manager_id }}">
			</div>
			<div class="mb-3">
				<label for="department_id" class="form-label">Department</label>
                <select class="form-select" id="department_id" name="department_id" required>
                    <option value="" disabled {{ $employee->department_id ? '' : 'selected' }}>Select department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                    @endforeach
                </select>
			</div>
			<button type="submit" class="btn btn-primary">Update Employee</button>
		</form>
	</div>
</div>
@endsection
