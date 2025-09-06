@extends('admin.layout')

@section('content')
<div class="card shadow-sm">
    <h1 class="card-header bg-white"><strong>Edit Course</strong></h1>
    <div class="card-body">
    <form method="POST" action="{{ route('admin.courses.update', $course->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $course->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5" required>{{ $course->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="video" class="form-label">Course Video (optional)</label>
            <input type="file" class="form-control" id="video" name="video">
            @if ($course->video)
                <p>Current video: <a href="{{ asset('storage/' . $course->video) }}" target="_blank">View Video</a></p>
            @endif
        </div>
        <button type="submit" class="btn btn-custom">Update Course</button>
    </form>
</div>
</div>
@endsection