@extends('layouts.app')

@section('content')
{{-- Hero Section --}}
<section class="hero" style="padding: 140px 0 80px;">
  <div class="container text-center">
    <div class="hero-content fade-in-up">
      <h1>Welcome, {{ Auth::user()->name }}</h1>
      <p>Your personalized learning dashboard</p>
    </div>
  </div>
</section>

{{-- Dashboard Stats --}}
<section style="background-color:#f9fafb;">
  <div class="container py-5">
    <div class="row g-4">

      {{-- Enrolled Courses --}}
      <div class="col-md-3">
        <div class="card shadow-sm text-center p-4">
          <h5>Enrolled Courses</h5>
          <h2 class="text-primary">{{ $enrolledCourses ?? 0 }}</h2>
        </div>
      </div>

      {{-- Progress --}}
      <div class="col-md-3">
        <div class="card shadow-sm text-center p-4">
          <h5>Total Progress</h5>
          <h2 class="text-success">{{ number_format($totalProgress ?? 0, 1) }}%</h2>
        </div>
      </div>

      {{-- Certifications --}}
      <div class="col-md-3">
        <div class="card shadow-sm text-center p-4">
          <h5>Certifications</h5>
          <h2 class="text-warning">{{ $certifications ?? 0 }}</h2>
        </div>
      </div>

      {{-- Notes --}}
      <div class="col-md-3">
        <div class="card shadow-sm text-center p-4">
          <h5>Notes</h5>
          <h2 class="text-info">{{ $notes ?? 0 }}</h2>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- AI Recommendations --}}
@if(isset($recommendations) && count($recommendations))
<section class="py-5">
  <div class="container">
    <div class="card shadow-sm">
      <div class="card-header bg-white">
        <h5 class="mb-0">AI Recommendations</h5>
      </div>
      <div class="card-body">
        <ul class="mb-0">
          @foreach($recommendations as $skill)
            <li>{{ $skill->name }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>
@endif

{{-- Progress Section --}}
@if(isset($progress) && count($progress))
<section class="pb-5">
  <div class="container">
    <div class="card shadow-sm">
      <div class="card-header bg-white">
        <h5 class="mb-0">Your Learning Progress</h5>
      </div>
      <div class="card-body">
        @foreach($progress as $p)
          <div class="mb-3">
            <strong>{{ $p->skill->name }}</strong>
            <div class="d-flex justify-content-between small text-muted">
              <span>XP: {{ $p->xp }}</span>
              <span>Level: {{ $p->level }}</span>
            </div>
            <div class="progress" style="height: 8px;">
              <div class="progress-bar bg-success" role="progressbar" 
                   style="width: {{ min(100, ($p->xp / 100) * 100) }}%"></div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endif
@endsection
