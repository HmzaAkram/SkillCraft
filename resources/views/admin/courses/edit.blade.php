@extends('admin.layout')

@section('content')
<div class="container mt-5 pt-5">
    <h1 class="text-center mb-4">Edit Course</h1>
    <form method="POST" action="{{ route('admin.courses.update', $course->id) }}">
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
        <button type="submit" class="btn btn-custom">Update Course</button>
    </form>
</div>
@endsection