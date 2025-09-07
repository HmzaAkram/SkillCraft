@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="mb-0">Courses</h4>
  <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-lg me-1"></i> New Course
  </a>
</div>

<div class="card shadow-sm">
  <div class="card-body p-0">
    <table class="table align-middle mb-0">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Description</th>
          <th>Created</th>
          <th style="width:180px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($courses as $course)
        <tr>
          <td>{{ $course->id }}</td>
          <td>{{ $course->name }}</td>
          <td>{{ Str::limit($course->description, 50) }}</td>
          <td>{{ $course->created_at->format('d M Y') }}</td>
          <td>
            <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
            <form class="d-inline" method="POST" action="{{ route('admin.courses.destroy', $course->id) }}" onsubmit="return confirm('Delete this course?')">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
            <a href="{{ route('admin.mcqs.index', $course->id) }}" class="btn btn-sm btn-outline-info">Manage MCQs</a>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="text-center text-muted">No courses found.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="card-footer bg-white">
    {{ $courses->links() }}
  </div>
</div>
@endsection