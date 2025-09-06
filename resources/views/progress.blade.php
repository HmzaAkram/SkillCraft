@extends('layouts.app')

@section('content')

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content fade-in-up text-center">
                <h1>📊 My Learning Progress</h1>
                <p>Track your skills, XP, and levels as you grow with AI-powered learning.</p>
            </div>
        </div>
    </section>

    <!-- Progress Section -->
    <section class="features" style="background-color:#f9fafb;">
        <div class="container">
            <div class="section-header animate-on-scroll">
                <h2>Your Progress Overview</h2>
                <p>See how far you’ve come in your learning journey.</p>
            </div>

            @if($progress->count())
                <div class="features-grid">
                    @foreach($progress as $p)
                        <div class="feature-card animate-on-scroll">
                            <div class="feature-icon">🎯</div>
                            <h3>{{ $p->skill->name ?? 'Unknown Skill' }}</h3>
                            <p>Status: <strong>{{ ucfirst($p->status) }}</strong></p>

                            <div class="progress mt-3" style="height: 10px;">
                                <div class="progress-bar bg-success" role="progressbar" 
                                    style="width: {{ min($p->xp, 100) }}%;" 
                                    aria-valuenow="{{ $p->xp }}" 
                                    aria-valuemin="0" 
                                    aria-valuemax="100">
                                </div>
                            </div>

                            <div class="mt-2">
                                <span class="badge bg-primary">XP: {{ $p->xp }}</span>
                                <span class="badge bg-info">Level: {{ $p->level }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center mt-5">
                    <p class="text-muted fs-5">
                        No progress tracked yet 🚀 <br>
                        <small>Start a course to see your learning journey here.</small>
                    </p>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="animate-on-scroll text-center">
                <h2>Keep Pushing Forward 💡</h2>
                <p>Your journey has just begun — continue learning and unlock your full potential.</p>
                <a href="{{ route('courses.index') }}" class="cta-button">Explore Courses</a>
            </div>
        </div>
    </section>

@endsection
