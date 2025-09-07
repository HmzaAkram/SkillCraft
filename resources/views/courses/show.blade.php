@extends('layouts.app')

@section('content')
<!-- Hero Section for Course -->
<section class="hero">
    <div class="container">
        <div class="hero-content fade-in-up text-center">
            <h1 class="fw-bold">{{ $course->name }}</h1>
            <p class="text-muted">{{ $course->description }}</p>

            <!-- Progress Bar -->
            <div class="progress my-4" style="height: 22px; max-width: 500px; margin: auto;">
                <div class="progress-bar bg-success fw-bold" role="progressbar"
                    style="width: {{ $progressPercentage }}%;" 
                    aria-valuenow="{{ $progressPercentage }}" 
                    aria-valuemin="0" 
                    aria-valuemax="100">
                    {{ $progressPercentage }}%
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Course Content Section -->
<section class="features py-5">
    <div class="container">
        <div class="features-grid">
            @if(!$enrolled)
                <!-- Enrollment Card -->
                <div class="feature-card animate-on-scroll text-center p-5">
                    <div class="feature-icon">🚀</div>
                    <h3>Enroll in this Course</h3>
                    <p>Unlock access to all course materials, video lessons, and the MCQ test by enrolling now.</p>
                    <form method="POST" action="{{ route('courses.enroll', $course->id) }}">
                        @csrf
                        <button type="submit" class="cta-button mt-3">
                            Enroll Now
                        </button>
                    </form>
                </div>
            @else
                <!-- Course Video -->
                @if($course->video)
                <div class="feature-card animate-on-scroll text-center p-5">
                    <div class="feature-icon">🎥</div>
                    <h3>Course Video</h3>
                    <video controls width="100%" class="shadow-sm rounded mt-3" style="max-width: 600px;">
                        <source src="{{ asset('storage/' . $course->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="text-center mt-4">
                        <a href="{{ route('courses.mcq.test', $course->id) }}" class="cta-button">
                            Take MCQ Test
                        </a>
                    </div>
                </div>
                @endif
            @endif
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section" id="get-started">
    <div class="container text-center">
        <div class="animate-on-scroll">
            <h2>Keep Learning, Keep Growing 🚀</h2>
            <p>Track your progress, complete tests, and unlock certificates as you move forward.</p>
            <a href="{{ route('courses.index') }}" class="btn-secondary">
                ← Back to Courses
            </a>
        </div>
    </div>
</section>
@endsection
