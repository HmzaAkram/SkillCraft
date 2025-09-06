@extends('admin.layout')

@section('content')
<div class="card shadow-sm">
  <div class="card-header bg-white"><strong>Edit Course</strong></div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.courses.update', $course->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $course->name }}" required>
        @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" rows="5" class="form-control" required>{{ $course->description }}</textarea>
        @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="video" class="form-label">Upload New Course Video (Leave blank to keep current)</label>
        <input type="file" name="video" id="video" class="form-control" accept="video/*">
        @error('video') <div class="text-danger small">{{ $message }}</div> @enderror
        @if($course->video)
          <div class="mt-2">
            <p>Current Video: <a href="{{ asset('storage/' . $course->video) }}" target="_blank">View</a></p>
          </div>
        @endif
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
      <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </form>
  </div>
</div>
@endsection