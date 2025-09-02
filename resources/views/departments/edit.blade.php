@extends('layouts.app')
@section('title', 'Departments')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
	<div>
		<h1 class="h3 mb-0">Edit Department</h1>
		<small class="text-muted">Update department details</small>
	</div>
	<div>
		<a href="{{ route('departments.index') }}" class="btn btn-secondary btn-sm">
			<i class="bi bi-arrow-left"></i> Back to List
		</a>
	</div>
</div>
<div class="card shadow-sm">
	<div class="card-body">
		<form method="POST" action="{{ route('departments.update', $department) }}">
			@csrf
			<div class="mb-3">
				<label for="name" class="form-label">Name</label>
				<input type="text" class="form-control" id="name" name="name" value="{{ $department->name }}" required>
			</div>
			<button type="submit" class="btn btn-primary">Update Department</button>
		</form>
	</div>
</div>
@endsection
