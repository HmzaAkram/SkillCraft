@extends('admin.layout')

@section('content')
<div class="card shadow-sm">
  <div class="card-header bg-white d-flex justify-content-between align-items-center">
    <strong>Users</strong>
    <form class="d-flex" method="GET">
      <input type="text" name="q" value="{{ $q }}" class="form-control form-control-sm me-2" placeholder="Search name/email">
      <button class="btn btn-sm btn-outline-secondary">Search</button>
    </form>
  </div>
  <div class="card-body p-0">
    <table class="table align-middle mb-0">
      <thead>
        <tr>
          <th>#</th><th>Name</th><th>Email</th><th>Role</th><th style="width:220px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            <span class="badge bg-{{ $user->role === 'admin' ? 'danger' : 'secondary' }}">{{ $user->role }}</span>
          </td>
          <td>
            <form class="d-inline" method="POST" action="{{ route('admin.users.updateRole', $user) }}">
              @csrf @method('PATCH')
              <select name="role" class="form-select form-select-sm d-inline w-auto">
                <option value="user"  {{ $user->role==='user' ? 'selected':'' }}>user</option>
                <option value="admin" {{ $user->role==='admin' ? 'selected':'' }}>admin</option>
              </select>
              <button class="btn btn-sm btn-primary">Update</button>
            </form>
            <form class="d-inline" method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Delete this user?')">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center text-muted">No users found.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="card-footer bg-white">
    {{ $users->withQueryString()->links() }}
  </div>
</div>
@endsection
