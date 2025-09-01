@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero" style="padding: 140px 0 80px;">
    <div class="container">
        <div class="hero-content fade-in-up">
            <h1>Powerful Features for Smarter Learning</h1>
            <p>Explore how SkillCrafter transforms your learning experience through advanced AI tools and interactive design.</p>
        </div>
    </div>
</section>

<!-- Features Details Section -->
<section id="features" class="features" style="background-color: #f9fafb;">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <h2>Core Features That Set Us Apart</h2>
            <p>Our intelligent tools are built to help you stay focused, improve faster, and reach your learning goals effectively.</p>
        </div>

        <div class="features-grid">
            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">🧠</div>
                <h3>AI-Powered Personalization</h3>
                <p>Each learner is unique — our AI continuously analyzes your pace, interests, and performance to tailor content that keeps you engaged and growing.</p>
            </div>

            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">🎯</div>
                <h3>Adaptive Learning Paths</h3>
                <p>We dynamically adjust your path as you improve. Whether you're a beginner or intermediate, you’ll always be working at the right level of difficulty.</p>
            </div>

            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">⚡</div>
                <h3>Real-Time Feedback</h3>
                <p>Get instant feedback on your exercises and projects. Learn from your mistakes quickly and understand why each answer is right or wrong.</p>
            </div>

            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">📊</div>
                <h3>Progress Analytics</h3>
                <p>Track your journey with beautiful progress graphs, strengths & weakness breakdowns, and time-based performance stats.</p>
            </div>

            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">🎮</div>
                <h3>Gamified Learning Experience</h3>
                <p>Level up your skills like a game! Earn badges, unlock new content, and stay motivated through challenges and streaks.</p>
            </div>

            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">🌐</div>
                <h3>Cross-Platform Access</h3>
                <p>Access your learning dashboard from your laptop, tablet, or mobile device — your progress is always in sync.</p>
            </div>
        </div>
    </div>
</section>

<!-- Additional Features -->
<section class="features" style="padding: 60px 0;">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <h2>Bonus Tools to Boost Productivity</h2>
            <p>Beyond learning paths — use built-in tools designed to accelerate real-world skill development.</p>
        </div>

        <div class="features-grid">
            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">📝</div>
                <h3>Interactive Projects</h3>
                <p>Apply what you've learned in real-time with hands-on projects and assignments in tech, business, and design.</p>
            </div>
            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">🤖</div>
                <h3>Smart Revision Assistant</h3>
                <p>Review topics in minutes. Our revision assistant summarizes key lessons and quizzes you for memory retention.</p>
            </div>
            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">📅</div>
                <h3>Learning Scheduler</h3>
                <p>Build a routine that works. Set weekly learning goals and we’ll keep you on track with reminders and streak tracking.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section" id="get-started">
    <div class="container">
        <div class="animate-on-scroll">
            <h2>Experience Smarter Learning Today</h2>
            <p>Sign up and try all features free. Start learning with personalized paths and AI insights in minutes.</p>
            <a href="#signup" class="cta-button" style="font-size: 1.125rem; padding: 1rem 2rem;">Start Free</a>
        </div>
    </div>
</section>
@endsection
