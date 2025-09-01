@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero" style="padding: 140px 0 80px;">
    <div class="container">
        <div class="hero-content fade-in-up">
            <h1>Study Notes for Students</h1>
            <p>Read, learn, and download notes to boost your knowledge anytime, anywhere.</p>
        </div>
    </div>
</section>

<!-- Notes Section -->
<section class="features" style="background-color: #f9fafb; padding: 60px 0;">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <h2>Available Notes</h2>
            <p>Here you can read and download notes prepared for different subjects.</p>
        </div>

        <div class="features-grid">
            <!-- Example Note Card -->
            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">📘</div>
                <h3>Web Development Basics</h3>
                <p>Learn the fundamentals of HTML, CSS, and JavaScript to kickstart your web development journey.</p>
                <a href="{{ asset('notes/web-development.pdf') }}" target="_blank" class="cta-button" style="margin-top:10px;">📖 Read</a>
                <a href="{{ asset('notes/web-development.pdf') }}" download class="cta-button" style="margin-top:10px; background:#4CAF50;">⬇ Download</a>
            </div>

            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">📗</div>
                <h3>PHP & Laravel Notes</h3>
                <p>Step into backend development with easy-to-follow PHP and Laravel concepts.</p>
                <a href="{{ asset('notes/php-laravel.pdf') }}" target="_blank" class="cta-button" style="margin-top:10px;">📖 Read</a>
                <a href="{{ asset('notes/php-laravel.pdf') }}" download class="cta-button" style="margin-top:10px; background:#4CAF50;">⬇ Download</a>
            </div>

            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">📙</div>
                <h3>Database Notes</h3>
                <p>Understand MySQL, relationships, and queries with practical examples.</p>
                <a href="{{ asset('notes/database.pdf') }}" target="_blank" class="cta-button" style="margin-top:10px;">📖 Read</a>
                <a href="{{ asset('notes/database.pdf') }}" download class="cta-button" style="margin-top:10px; background:#4CAF50;">⬇ Download</a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section" id="get-started">
    <div class="container">
        <div class="animate-on-scroll">
            <h2>Keep Learning, Keep Growing</h2>
            <p>Download notes and practice daily to strengthen your concepts.</p>
            <a href="#signup" class="cta-button" style="font-size: 1.125rem; padding: 1rem 2rem;">Join Now</a>
        </div>
    </div>
</section>
@endsection
