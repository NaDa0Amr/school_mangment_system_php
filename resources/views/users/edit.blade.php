@extends('layouts.app')
@section('title','Users')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h1 class="h3 mb-0">Edit User</h1>
    <small class="text-muted">Update user info</small>
  </div>
  <div>
    <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i> Back to List</a>
  </div>
</div>

<div class="card shadow-sm">
  <div class="card-body">
    <form action="{{ route('users.update',$user) }}" method="POST">
      @csrf @method('PUT')
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" value="{{ old('name',$user->name) }}" class="form-control @error('name') is-invalid @enderror" required>
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ old('email',$user->email) }}" class="form-control @error('email') is-invalid @enderror" required>
        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">New Password (leave blank to keep)</label>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
          @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label">Confirm Password</label>
          <input type="password" name="password_confirmation" class="form-control">
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Role</label>
        <select name="role" class="form-select @error('role') is-invalid @enderror" required>
          <option value="user" @selected(old('role',$user->role)==='user')>User</option>
          <option value="admin" @selected(old('role',$user->role)==='admin')>Admin</option>
        </select>
        @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <button class="btn btn-primary">Update User</button>
    </form>
  </div>
</div>
@endsection
