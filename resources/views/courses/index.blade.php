@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <h1 class="text-center mb-4">Available Courses</h1>
    @if(session('new_courses'))
        <div class="alert alert-info text-center">New courses added!</div>
    @endif
    <div class="row g-4">
        @foreach($courses as $course)
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->name }}</h5>
                        <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-custom">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection