@extends('admin.layout')

@section('content')
<div class="row g-3">
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h6 class="text-muted mb-1">Total Users</h6>
            <h3 class="mb-0">{{ $totalUsers }}</h3>
          </div>
          <i class="bi bi-people fs-1 text-secondary"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h6 class="text-muted mb-1">Admins</h6>
            <h3 class="mb-0">{{ $totalAdmins }}</h3>
          </div>
          <i class="bi bi-shield-lock fs-1 text-secondary"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h6 class="text-muted mb-1">Total Notes</h6>
            <h3 class="mb-0">{{ $totalNotes }}</h3>
          </div>
          <i class="bi bi-journal-text fs-1 text-secondary"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h6 class="text-muted mb-1">Total Courses</h6>
            <h3 class="mb-0">{{ $totalCourses }}</h3>
          </div>
          <i class="bi bi-book fs-1 text-secondary"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row g-3 mt-2">
  <div class="col-lg-6">
    <div class="card shadow-sm">
      <div class="card-header bg-white"><strong>Latest Users</strong></div>
      <div class="card-body p-0">
        <table class="table table-sm mb-0">
          <thead>
            <tr><th>#</th><th>Name</th><th>Email</th><th>Role</th></tr>
          </thead>
          <tbody>
            @foreach($latestUsers as $u)
            <tr>
              <td>{{ $u->id }}</td>
              <td>{{ $u->name }}</td>
              <td>{{ $u->email }}</td>
              <td><span class="badge bg-dark">{{ $u->role }}</span></td>
            </tr>
            @endforeach
            @unless(count($latestUsers)) <tr><td colspan="4" class="text-center text-muted">No users</td></tr> @endunless
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card shadow-sm">
      <div class="card-header bg-white"><strong>Latest Notes</strong></div>
      <div class="card-body p-0">
        <table class="table table-sm mb-0">
          <thead>
            <tr><th>#</th><th>Title</th><th>Created</th></tr>
          </thead>
          <tbody>
            @foreach($latestNotes as $n)
            <tr>
              <td>{{ $n->id }}</td>
              <td>{{ $n->title }}</td>
              <td>{{ $n->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
            @unless(count($latestNotes)) <tr><td colspan="3" class="text-center text-muted">No notes</td></tr> @endunless
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card shadow-sm">
      <div class="card-header bg-white"><strong>Latest Courses</strong></div>
      <div class="card-body p-0">
        <table class="table table-sm mb-0">
          <thead>
            <tr><th>#</th><th>Name</th><th>Created</th></tr>
          </thead>
          <tbody>
            @foreach($latestCourses as $c)
            <tr>
              <td>{{ $c->id }}</td>
              <td>{{ $c->name }}</td>
              <td>{{ $c->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
            @unless(count($latestCourses)) <tr><td colspan="3" class="text-center text-muted">No courses</td></tr> @endunless
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection