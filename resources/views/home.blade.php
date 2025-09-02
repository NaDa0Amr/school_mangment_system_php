@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="d-flex align-items-center mb-4">
        <h1 class="h4 mb-0">Dashboard</h1>
    </div>

    <div class="row g-4 mb-4">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <span class="rounded-circle bg-primary-subtle text-primary d-inline-flex align-items-center justify-content-center" style="width:52px;height:52px;">
                                <i class="ti ti-school fs-4" title="doctor"></i>
                            </span>
                            <div>
                                <p class="text-muted text-uppercase small mb-1">Doctors</p>
                                <h3 class="fw-semibold mb-0">{{ $doctors }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <span class="rounded-circle bg-success-subtle text-success d-inline-flex align-items-center justify-content-center" style="width:52px;height:52px;">
                            <i class="ti ti-users fs-4"></i>
                        </span>
                        <div>
                            <p class="text-muted text-uppercase small mb-1">Students</p>
                            <h3 class="fw-semibold mb-0">{{ $students }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <span class="rounded-circle bg-warning-subtle text-warning d-inline-flex align-items-center justify-content-center" style="width:52px;height:52px;">
                            <i class="ti ti-book fs-4"></i>
                        </span>
                        <div>
                            <p class="text-muted text-uppercase small mb-1">Courses</p>
                            <h3 class="fw-semibold mb-0">{{ $courses }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <span class="rounded-circle bg-info-subtle text-info d-inline-flex align-items-center justify-content-center" style="width:52px;height:52px;">
                            <i class="ti ti-user-circle fs-4"></i>
                        </span>
                        <div>
                            <p class="text-muted text-uppercase small mb-1">Users</p>
                            <h3 class="fw-semibold mb-0">{{ $users }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <p class="mb-0 text-muted">Welcome to the home page.</p>
        </div>
    </div>
@endsection
