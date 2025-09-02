@extends('layouts.app')
@section('title','Users')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 p-4 bg-secondary rounded-3 shadow-sm" style="background: linear-gradient(135deg,#667eea 0%, #764ba2 100%);">
  <div class="text-white">
    <h1 class="h3 mb-0 fw-bold">Users</h1>
    <small class="text-white-50">Manage and view all users</small>
  </div>
  @admin
  <div>
    <a href="{{ route('users.create') }}" class="btn btn-light btn-sm shadow-sm">
      Add New User
    </a>
  </div>
  @endadmin
</div>


@error('general')<div class="alert alert-danger">{{ $message }}</div>@enderror

<div class="card shadow-lg border-0" style="border-radius:15px; overflow:hidden;">
  <div class="card-header bg-white border-0 p-4">
    <div class="row align-items-center">
      <div class="col">
        <h5 class="card-title mb-0 text-dark fw-semibold">User Records</h5>
      </div>
      <div class="col-auto">
        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
          {{ method_exists($users,'total') ? $users->total() : $users->count() }} Total
        </span>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover mb-0 align-middle">
        <thead style="background: linear-gradient(135deg,#f8f9ff 0%, #e9ecef 100%); border-bottom:2px solid #dee2e6;">
          <tr>
            <th scope="col" class="py-3 fw-semibold text-dark">#</th>
            <th scope="col" class="py-3 fw-semibold text-dark">Name</th>
            <th scope="col" class="py-3 fw-semibold text-dark">Email</th>
            <th scope="col" class="py-3 fw-semibold text-dark">Role</th>
            <th scope="col" class="py-3 fw-semibold text-dark">Created</th>
            @admin
            <th scope="col" class="py-3 fw-semibold text-dark">Actions</th>
            @endadmin
          </tr>
        </thead>
        <tbody>
          @forelse($users as $u)
            <tr class="border-0" style="border-bottom:1px solid #f8f9fa;">
              <td class="py-3"><span class="badge bg-secondary-subtle text-secondary rounded-circle px-2 py-1">{{ $loop->iteration + (method_exists($users,'firstItem') && $users->firstItem() ? ($users->firstItem()-1) : 0) }}</span></td>
              <td class="py-3">{{ $u->name }}</td>
              <td class="py-3">{{ $u->email }}</td>
              <td class="py-3"><span class="badge bg-{{ $u->role==='admin' ? 'danger' : 'secondary' }}">{{ ucfirst($u->role) }}</span></td>
              <td class="py-3 text-nowrap">{{ $u->created_at?->diffForHumans() }}</td>
              @admin
              <td class="py-3 text-nowrap">
                <form action="{{ route('users.edit',$u) }}" method="GET" class="d-inline">
                  <button type="submit" class="btn btn-sm btn-success">Edit</button>
                </form>
                <form action="{{ route('users.destroy',$u) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this user?')">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
              </td>
              @endadmin
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center py-5">
                <div class="text-muted">
                  <h5 class="text-muted">No users found</h5>
                  <p class="mb-3">Get started by adding your first user.</p>
                  <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Add First User</a>
                </div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="pt-3">{{ method_exists($users,'links') ? $users->links() : '' }}</div>
  </div>
</div>

@push('styles')
<style>
  .table-hover tbody tr:hover { background-color:#f8f9ff !important; transition: background-color .3s ease; }
  .card { box-shadow:0 10px 30px rgba(0,0,0,.1) !important; }
  .badge { font-weight:500; font-size:.75rem; }
  .bg-primary-subtle { background-color:#cfe2ff !important; }
  .bg-secondary-subtle { background-color:#e2e3e5 !important; }
  .btn-light { background-color:rgba(255,255,255,.9); border:none; backdrop-filter:blur(10px); transition:all .3s ease; }
  .btn-light:hover { background-color:#ffffff; transform:translateY(-2px); box-shadow:0 5px 15px rgba(0,0,0,.2); }
</style>
@endpush
@endsection
