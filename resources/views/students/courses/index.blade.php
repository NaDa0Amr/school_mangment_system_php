@extends('layouts.app')

@section('title', 'Student Courses')

@section('content')
<style>
    /* Local styles for header (could be moved to app.css if reused) */
    .courses-header{position:relative;overflow:hidden;}
    .courses-header:before{content:"";position:absolute;inset:0;background:linear-gradient(90deg,#0d6efd 0%,#6610f2 100%);opacity:.07;pointer-events:none;}
    .courses-header .accent-bar{position:absolute;left:0;top:0;bottom:0;width:6px;background:linear-gradient(180deg,#0d6efd,#6610f2);border-top-left-radius:.75rem;border-bottom-left-radius:.75rem;}
    @media (max-width: 575.98px){.courses-header h1{font-size:1.15rem;}}
    .btn-soft-primary{--bs-btn-color:#0d6efd;--bs-btn-bg:#e7f1ff;--bs-btn-border-color:#cfe3ff;--bs-btn-hover-bg:#d6e9ff;--bs-btn-hover-border-color:#b6d6ff;}
    .btn-soft-secondary{--bs-btn-color:#495057;--bs-btn-bg:#f1f3f5;--bs-btn-border-color:#e9ecef;--bs-btn-hover-bg:#e2e6ea;--bs-btn-hover-border-color:#d3d9df;}
    .shadow-glow{box-shadow:0 0 0 .15rem rgba(13,110,253,.15),0 .25rem .75rem -.15rem rgba(0,0,0,.08);}
</style>
<div class="mb-4">
    <div class="courses-header d-flex flex-column flex-md-row gap-3 gap-md-4 justify-content-between align-items-start align-items-md-center p-4 rounded-4 bg-white border border-2 border-light shadow-sm shadow-glow">
        <span class="accent-bar"></span>
        <div class="pe-md-4">
            <h1 class="h3 mb-1 fw-semibold text-primary">Courses for: <span class="text-dark">{{ $student->name }}</span></h1>
            <p class="text-muted small mb-0">Enroll, review & manage this student's course list.</p>
        </div>
        <div class="d-flex flex-wrap gap-2 ms-md-auto">
            <a href="{{ route('students.index') }}" class="btn btn-soft-secondary btn-sm fw-medium px-3">Back</a>
            <a href="{{ route('students.courses.create', $student) }}" class="btn btn-soft-primary btn-sm fw-medium px-3">Add Course</a>
        </div>
    </div>
</div>

@if($courses->isEmpty())
    <div class="alert alert-info">This student is not enrolled in any courses yet.</div>
@else
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table mb-0 table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Hours</th>
                            <th>Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->hours }}</td>
                                <td>{{ $course->cost }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif

@endsection
