@extends('layouts.app')

@section('title', 'Students')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 p-4 bg-secondary rounded-3 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="text-white">
        <h1 class="h3 mb-0 fw-bold">Students</h1>
        <small class="text-white-50">Manage and view all registered students</small>
    </div>
    <div>
        <a href="{{ url('/students/create') }}" class="btn btn-light btn-sm shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> Add New Student
        </a>
    </div>
</div>

<div class="card shadow-lg border-0" style="border-radius: 15px; overflow: hidden;">
    <div class="card-header bg-white border-0 p-4">
        <div class="row align-items-center">
            <div class="col">
                <h5 class="card-title mb-0 text-dark fw-semibold">
                    <i class="bi bi-people-fill text-primary me-2"></i>Student Records
                </h5>
            </div>
            <div class="col-auto">
                <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
                    {{ $students->count() }} Total
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
                        <th scope="col" class=" py-3 fw-semibold text-dark">
                            Student Name
                        </th>
                        <th scope="col" class=" py-3 fw-semibold text-dark">
                            Age
                        </th>
                        <th scope="col" class="py-3 fw-semibold text-dark">
                            Address
                        </th>
                        <th scope="col" class="py-3 fw-semibold text-dark">
                            Gender
                        </th>
                        <th scope="col" class=" py-3  fw-semibold text-dark">
                            Doctor Name
                        </th>
                        <th scope="col" class=" py-3  fw-semibold text-dark">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr class="border-0" style="border-bottom: 1px solid #f8f9fa;">
                            <td class=" py-3">
                                <span class="badge bg-secondary-subtle text-secondary rounded-circle px-2 py-1">{{ $loop->iteration }}</span>
                            </td>
                            <td class=" py-3">
                                <div class="d-flex align-items-center">

                                    <span class="fw-medium text-dark">{{ $student->name }}</span>
                                </div>
                            </td>
                            <td class=" py-3 ">{{ $student->age }} years</td>
                            <td class=" py-3 ">{{ $student->address }}</td>
                            <td class=" py-3 ">{{ $student->gender }}</td>
                            <td class="py-3 ">
                               {{ $student->doctor->name }}
                            </td>

                            <td class="py-3 ">
                                <div class="btn btn-outline-primary">
                                    <a href="{{ route('students.courses.index', $student) }}" class="text-decoration-none">Courses</a>
                                </div>
                                <form action="{{ route('students.edit', $student) }}" method="GET" class="d-inline">
                                    <button type="submit" class="btn btn-sm btn-success">Edit</button>
                                </form>
                                <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this doctor?')">
                                    Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-inbox display-1 text-secondary mb-3"></i>
                                    <h5 class="text-muted">No students found</h5>
                                    <p class="mb-3">Get started by adding your first student to the system.</p>
                                    <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-plus-lg me-1"></i>Add First Student
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
    /* Custom color theme enhancements */
    .table-hover tbody tr:hover {
        background-color: #f8f9ff !important;
        transition: background-color 0.3s ease;
    }

    .card {
        box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
    }

    .badge {
        font-weight: 500;
        font-size: 0.75rem;
    }

    .bg-primary-subtle {
        background-color: #cfe2ff !important;
    }

    .bg-secondary-subtle {
        background-color: #e2e3e5 !important;
    }

    .text-primary {
        color: #0d6efd !important;
    }

    .text-secondary {
        color: #6c757d !important;
    }





    /* Enhanced button styling */
    .btn-light {
        background-color: rgba(255,255,255,0.9);
        border: none;
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    .btn-light:hover {
        background-color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

</style>
@endpush
@endsection
