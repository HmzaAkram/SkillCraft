@extends('layouts.app')

@section('content')
{{-- Hero Section --}}
<section class="hero" style="padding: 140px 0 80px;">
  <div class="container">
    <div class="hero-content fade-in-up text-center">
      <h1>Available Courses</h1>
      <p>Browse and enroll in courses to enhance your learning journey.</p>
    </div>
  </div>
</section>

{{-- Courses Grid --}}
<section class="features" style="background-color:#f9fafb;">
  <div class="container">
    <div class="features-grid">
      @forelse($courses as $course)
      <div class="feature-card">
        <div class="feature-icon">🎓</div>
        <h3>{{ $course->name }}</h3>
        <p class="mb-2" style="white-space:pre-line">{{ Str::limit($course->description, 180) }}</p>

        <div class="d-flex gap-2 justify-content-center">
          {{-- Enroll Button --}}
          <form method="POST" action="{{ route('courses.enroll', $course->id) }}">
            @csrf
            <button type="submit" class="cta-button">Enroll</button>
          </form>

          {{-- View Details (optional) --}}
          <a href="{{ route('courses.show', $course->id) }}" class="btn-secondary">View Details</a>
        </div>
      </div>
      @empty
      <p class="text-muted text-center">No courses available yet.</p>
      @endforelse
    </div>
  </div>
</section>
@endsection
