@extends('admin.layout')

@section('content')
<div class="card shadow-sm">
  <div class="card-header bg-white"><strong>New Note</strong></div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.notes.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label class="form-label">Title</label>
        <input name="title" class="form-control" value="{{ old('title') }}" required>
        @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea name="content" rows="6" class="form-control" required>{{ old('content') }}</textarea>
        @error('content') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Attachment (PDF/Doc/Images) — optional</label>
        <input type="file" name="file" class="form-control">
        @error('file') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
      <a href="{{ route('admin.notes.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </form>
  </div>
</div>
@endsection
