@extends('admin.layout')

@section('content')
<div class="card shadow-sm">
  <div class="card-header bg-white"><strong>Edit Note</strong></div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.notes.update', $note) }}" enctype="multipart/form-data">
      @csrf @method('PUT')
      <div class="mb-3">
        <label class="form-label">Title</label>
        <input name="title" class="form-control" value="{{ old('title', $note->title) }}" required>
        @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea name="content" rows="6" class="form-control" required>{{ old('content', $note->content) }}</textarea>
        @error('content') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Attachment (replace)</label>
        <input type="file" name="file" class="form-control">
        @if($note->file_path)
          <div class="form-text">
            Current: <a href="{{ asset('storage/'.$note->file_path) }}" target="_blank">Download</a>
          </div>
        @endif
        @error('file') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>
      <button class="btn btn-primary">Update</button>
      <a href="{{ route('admin.notes.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </form>
  </div>
</div>
@endsection
