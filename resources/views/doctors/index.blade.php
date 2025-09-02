@extends('layouts.app')

@section('title', 'Doctors')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 p-4 bg-secondary rounded-3 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="text-white">
        <h1 class="h3 mb-0 fw-bold">Doctors</h1>
        <small class="text-white-50">Manage and view all registered doctors</small>
    </div>
    @admin
    <div>
        <a href="{{ url('/doctors/create') }}" class="btn btn-light btn-sm shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> Add New Doctor
        </a>
    </div>
    @endadmin
</div>

<div class="card shadow-lg border-0" style="border-radius: 15px; overflow: hidden;">
    <div class="card-header bg-white border-0 p-4">
        <div class="row align-items-center">
            <div class="col">
                <h5 class="card-title mb-0 text-dark fw-semibold">
                    <i class="ti ti-id-badge-2 text-primary me-2"></i>Doctor Records
                </h5>
            </div>
            <div class="col-auto">
                <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
                    {{ $doctors->count() }} Total
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
                            Doctor Name
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
                            Salary
                        </th>
                        @admin
                        <th scope="col" class=" py-3  fw-semibold text-dark">Actions</th>
                        @endadmin
                    </tr>
                </thead>
                <tbody>
                    @forelse ($doctors as $doctor)
                        <tr class="border-0" style="border-bottom: 1px solid #f8f9fa;">
                            <td class=" py-3">
                                <span class="badge bg-secondary-subtle text-secondary rounded-circle px-2 py-1">{{ $loop->iteration }}</span>
                            </td>
                            <td class=" py-3">
                                <div class="d-flex align-items-center gap-2">

                                    <span class="fw-medium text-dark">{{ $doctor->name }}</span>
                                </div>
                            </td>
                            <td class=" py-3 ">{{ $doctor->age }} years</td>
                            <td class=" py-3 ">{{ $doctor->address }}</td>
                            <td class=" py-3 ">{{ $doctor->gender }}</td>
                            <td class="py-3 ">
                               {{ number_format($doctor->salary, 2) }}
                            </td>

                            @admin
                            <td class="py-3 ">
                                <form action="{{ route('doctors.edit', $doctor->id) }}" method="GET" class="d-inline">
                                    <button type="submit" class="btn btn-sm btn-success">Edit</button>
                                </form>
                                <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this doctor?')">
                                    Delete
                                    </button>
                                </form>
                            </td>
                            @endadmin

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-inbox display-1 text-secondary mb-3"></i>
                                    <h5 class="text-muted">No doctors found</h5>
                                    <p class="mb-3">Get started by adding your first doctor to the system.</p>
                                    <a href="{{ url('/doctors/create') }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-plus-lg me-1"></i>Add First Doctor
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
