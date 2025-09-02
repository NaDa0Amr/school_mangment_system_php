@extends('layouts.app')
@section('title', 'Departments')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
	<div>
		<h1 class="h3 mb-0">Add Department</h1>
		<small class="text-muted">Create a new department</small>
	</div>
	<div>
		<a href="{{ url('/departments') }}" class="btn btn-secondary btn-sm">
			<i class="bi bi-arrow-left"></i> Back to List
		</a>
	</div>
</div>
<div class="card shadow-sm">
	<div class="card-body">
		<form method="POST" action="{{ url('/departments') }}">
			@csrf
			<div class="mb-3">
				<label for="name" class="form-label">Name</label>
				<input type="text" class="form-control" id="name" name="name" required>
			</div>
			<button type="submit" class="btn btn-primary">Add Department</button>
		</form>
	</div>
</div>
@endsection
