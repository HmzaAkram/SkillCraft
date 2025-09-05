@extends('admin.layout')

@section('content')
<div class="container mt-5 pt-5">
    <h1 class="text-center mb-4">Create New Course</h1>
    <form method="POST" action="{{ route('admin.courses.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-custom">Create Course</button>
    </form>
</div>
@endsection