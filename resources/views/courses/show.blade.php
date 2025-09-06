@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Course Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">{{ $course->name }}</h1>
        <p class="text-muted">{{ $course->description }}</p>
        <div class="progress my-3" style="height: 20px;">
            <div class="progress-bar bg-success" role="progressbar" 
                style="width: {{ $progressPercentage }}%;" 
                aria-valuenow="{{ $progressPercentage }}" 
                aria-valuemin="0" 
                aria-valuemax="100">
                {{ $progressPercentage }}%
            </div>
        </div>
    </div>

    <!-- Enrollment -->
    @if(!$enrolled)
        <div class="text-center">
            <form method="POST" action="{{ route('courses.enroll', $course->id) }}">
                @csrf
                <button type="submit" class="btn btn-lg btn-primary shadow-sm px-5">
                    🚀 Enroll Now
                </button>
            </form>
        </div>
    @else
        <!-- Lessons Section -->
        <div class="mt-5">
            <h2 class="mb-4">📚 Lessons</h2>
            <div class="list-group">
                @foreach($course->lessons as $lesson)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">{{ $lesson->title }}</h5>
                            <small class="text-muted">Type: {{ ucfirst($lesson->type) }}</small>
                        </div>

                        @php
                            $completed = $userProgress->where('lesson_id', $lesson->id)->first()->status ?? '';
                        @endphp

                        @if($completed === 'completed')
                            <span class="badge bg-success px-3 py-2">✅ Completed</span>
                        @else
                            <form method="POST" action="{{ route('courses.lesson.complete', [$course->id, $lesson->id]) }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-success btn-sm">
                                    Mark Complete
                                </button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Course Video (Displayed after enrollment) -->
            @if($course->video)
                <div class="mt-5">
                    <h2 class="mb-3">🎥 Course Video</h2>
                    <video controls width="500" hight="500" class="shadow-sm">
                        <source src="{{ asset('storage/' . $course->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            @endif
        @endif
    </div>
</div>
@endsection