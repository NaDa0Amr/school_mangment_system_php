@extends('layouts.app')

@section('title', 'Departments')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 p-4 bg-secondary rounded-3 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
	<div class="text-white">
		<h1 class="h3 mb-0 fw-bold">Departments</h1>
		<small class="text-white-50">Manage and view all departments</small>
	</div>
	<div>
		<a href="{{ route('departments.create') }}" class="btn btn-light btn-sm shadow-sm">
			<i class="bi bi-plus-lg me-1"></i> Add New Department
		</a>
	</div>
</div>

<div class="card shadow-lg border-0" style="border-radius: 15px; overflow: hidden;">
	<div class="card-header bg-white border-0 p-4">
		<div class="row align-items-center">
			<div class="col">
				<h5 class="card-title mb-0 text-dark fw-semibold">
					<i class="bi bi-building text-primary me-2"></i>Department Records
				</h5>
			</div>
			<div class="col-auto">
				<span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
					{{ $departments->count() }} Total
				</span>
			</div>
		</div>
	</div>
	<div class="card-body ">
		<div class="table-responsive">
			<table class="table table-hover mb-0 align-middle">
				<thead style="background: linear-gradient(135deg, #f8f9ff 0%, #e9ecef 100%); border-bottom: 2px solid #dee2e6;">
					<tr>
						<th scope="col" class=" py-3 fw-semibold text-dark">#</th>
						<th scope="col" class=" py-3 fw-semibold text-dark">Name</th>
						<th scope="col" class=" py-3 fw-semibold text-dark">Actions</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($departments as $department)
						<tr class="border-0" style="border-bottom: 1px solid #f8f9fa;">
							<td class=" py-3">
								<span class="badge bg-secondary-subtle text-secondary rounded-circle px-2 py-1">{{ $loop->iteration }}</span>
							</td>
							<td class=" py-3">{{ $department->name }}</td>
							<td class="py-3 ">
								<form action="{{ route('departments.edit', $department) }}" method="GET" class="d-inline">
									<button type="submit" class="btn btn-sm btn-success">Edit</button>
								</form>
								<form action="{{ route('departments.destroy', $department) }}" method="POST" class="d-inline">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this department?')">Delete</button>
								</form>
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="6" class="text-center py-5">
								<div class="text-muted">
									<i class="bi bi-inbox display-1 text-secondary mb-3"></i>
									<h5 class="text-muted">No departments found</h5>
									<p class="mb-3">Get started by adding your first department.</p>
									<a href="{{ url('/departments/create') }}" class="btn btn-primary btn-sm">
										<i class="bi bi-plus-lg me-1"></i>Add First Department
									</a>
								</div>
							</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>

@push('styles')
<style>
	.table-hover tbody tr:hover { background-color: #f8f9ff !important; transition: background-color 0.3s ease; }
	.card { box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important; }
	.badge { font-weight: 500; font-size: 0.75rem; }
	.bg-primary-subtle { background-color: #cfe2ff !important; }
	.bg-secondary-subtle { background-color: #e2e3e5 !important; }
	.btn-light { background-color: rgba(255,255,255,0.9); border: none; backdrop-filter: blur(10px); transition: all 0.3s ease; }
	.btn-light:hover { background-color:#ffffff; transform: translateY(-2px); box-shadow:0 5px 15px rgba(0,0,0,0.2); }
</style>
@endpush
@endsection
