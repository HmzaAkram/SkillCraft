@extends('admin.layout')

@section('content')
<div class="card shadow-sm">
  <div class="card-header bg-white"><strong>Edit Blog</strong></div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.blogs.update', $blog) }}" enctype="multipart/form-data">
      @csrf @method('PUT')
      <div class="mb-3">
        <label class="form-label">Title</label>
        <input name="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
        @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea name="content" rows="6" class="form-control" required>{{ old('content', $blog->content) }}</textarea>
        @error('content') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Image (replace)</label>
        <input type="file" name="image" class="form-control">
        @if($blog->image)
          <div class="form-text">
            Current: <img src="{{ asset('storage/'.$blog->image) }}" width="120" class="rounded mt-1">
          </div>
        @endif
        @error('image') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>
      <button class="btn btn-primary">Update</button>
      <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </form>
  </div>
</div>
@endsection
