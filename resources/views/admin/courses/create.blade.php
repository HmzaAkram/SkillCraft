@extends('admin.layout')

@section('content')
<div class="card shadow-sm">
  <div class="card-header bg-white"><strong>New Course</strong></div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" rows="5" class="form-control" required>{{ old('description') }}</textarea>
        @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>

     <div class="mb-3">
    <label for="video" class="form-label">Upload Course Video</label>
    <input type="file" name="video" id="video" class="form-control" accept="video/*">
    @error('video') <div class="text-danger small">{{ $message }}</div> @enderror
</div>


      <button type="submit" class="btn btn-primary">Create</button>
      <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </form>
  </div>
</div>
@endsection
