@extends('layouts.app')

@section('content')
<!-- About Hero Section -->
<section class="hero" style="padding: 140px 0 80px;">
    <div class="container">
        <div class="hero-content fade-in-up">
            <h1>About SkillCrafter</h1>
            <p>Empowering learners worldwide with AI-powered personalized education, one skill at a time.</p>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="features" style="background: #ffffff;">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <h2>Our Mission</h2>
            <p>To unlock the power of personalized, AI-driven learning for every individual seeking to master new skills, from anywhere in the world.</p>
        </div>
    </div>
</section>

<!-- Team Section (Optional Enhancement) -->
<section class="how-it-works">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <h2>Meet the Team</h2>
            <p>We’re a passionate group of developers, educators, and innovators shaping the future of learning.</p>
        </div>
        <div class="steps">
            <div class="step animate-on-scroll">
                <div class="step-number">1</div>
                <h3>Hamza Akram</h3>
                <p>Founder & Full-Stack Engineer</p>
            </div>
            <div class="step animate-on-scroll">
                <div class="step-number">2</div>
                <h3>Sana Malik</h3>
                <p>AI Curriculum Lead</p>
            </div>
            <div class="step animate-on-scroll">
                <div class="step-number">3</div>
                <h3>Ahmed Raza</h3>
                <p>UX/UI Designer</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section" id="get-started">
    <div class="container">
        <div class="animate-on-scroll">
            <h2>Join Our Mission</h2>
            <p>Be a part of the learning revolution with SkillCrafter. Start your personalized journey today.</p>
            <a href="#signup" class="cta-button" style="font-size: 1.125rem; padding: 1rem 2rem;">Start Learning Free</a>
        </div>
    </div>
</section>
@endsection
