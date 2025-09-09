@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="mb-0">Blogs</h4>
  <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-lg me-1"></i> New Blog
  </a>
</div>

<div class="card shadow-sm">
  <div class="card-body p-0">
    <table class="table align-middle mb-0">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Image</th>
          <th>Created</th>
          <th style="width:180px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($blogs as $blog)
        <tr>
          <td>{{ $blog->id }}</td>
          <td>{{ $blog->title }}</td>
          <td>
            @if($blog->image)
              <img src="{{ asset('storage/'.$blog->image) }}" width="80" class="rounded">
            @else
              <span class="text-muted">—</span>
            @endif
          </td>
          <td>{{ $blog->created_at->format('d M Y') }}</td>
          <td>
            <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-outline-primary">Edit</a>
            <form class="d-inline" method="POST" action="{{ route('admin.blogs.destroy', $blog) }}" onsubmit="return confirm('Delete this blog?')">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center text-muted">No blogs found.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="card-footer bg-white">
    {{ $blogs->links() }}
  </div>
</div>
@endsection
