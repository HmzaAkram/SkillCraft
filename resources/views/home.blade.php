@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->


    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content fade-in-up">
                <h1>Master Any Skill with AI‑Powered Learning</h1>
                <p>Personalized learning paths, adaptive exercises, and real-time feedback to accelerate your skill development journey.</p>
                <div class="hero-buttons">
                    <a href="#get-started" class="cta-button">Start Learning Free</a>
                    <a href="#demo" class="btn-secondary">Watch Demo</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <div class="section-header animate-on-scroll">
                <h2>Intelligent Learning Features</h2>
                <p>Our AI adapts to your learning style and pace, creating a personalized experience that maximizes your potential.</p>
            </div>
            <div class="features-grid">
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">🧠</div>
                    <h3>AI-Powered Personalization</h3>
                    <p>Advanced algorithms analyze your learning patterns and adapt content to match your unique style and pace.</p>
                </div>
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">🎯</div>
                    <h3>Adaptive Learning Paths</h3>
                    <p>Dynamic curricula that evolve based on your progress, ensuring optimal challenge levels at every step.</p>
                </div>
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">⚡</div>
                    <h3>Real-Time Feedback</h3>
                    <p>Instant insights and corrections help you learn from mistakes and reinforce correct understanding immediately.</p>
                </div>
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">📊</div>
                    <h3>Progress Analytics</h3>
                    <p>Detailed insights into your learning journey with visual progress tracking and performance metrics.</p>
                </div>
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">🎮</div>
                    <h3>Gamified Experience</h3>
                    <p>Engaging challenges, achievements, and rewards that make learning addictive and fun.</p>
                </div>
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">🌐</div>
                    <h3>Multi-Platform Access</h3>
                    <p>Learn anywhere, anytime with seamless synchronization across all your devices.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="how-it-works">
        <div class="container">
            <div class="section-header animate-on-scroll">
                <h2>How SkillCrafter Works</h2>
                <p>Get started in minutes and begin your personalized learning journey with our AI-powered platform.</p>
            </div>
            <div class="steps">
                <div class="step animate-on-scroll">
                    <div class="step-number">1</div>
                    <h3>Choose Your Skill</h3>
                    <p>Select from hundreds of skills across technology, business, creative arts, and personal development.</p>
                </div>
                <div class="step animate-on-scroll">
                    <div class="step-number">2</div>
                    <h3>AI Assessment</h3>
                    <p>Our AI evaluates your current knowledge level and learning preferences to create your personalized path.</p>
                </div>
                <div class="step animate-on-scroll">
                    <div class="step-number">3</div>
                    <h3>Learn & Practice</h3>
                    <p>Engage with interactive lessons, hands-on exercises, and real-world projects tailored to your goals.</p>
                </div>
                <div class="step animate-on-scroll">
                    <div class="step-number">4</div>
                    <h3>Master & Advance</h3>
                    <p>Track your progress, earn certifications, and unlock advanced topics as you build expertise.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="get-started">
        <div class="container">
            <div class="animate-on-scroll">
                <h2>Ready to Transform Your Learning?</h2>
                <p>Join thousands of learners who are already mastering new skills with SkillCrafter's AI-powered platform.</p>
                <a href="#signup" class="cta-button" style="font-size: 1.125rem; padding: 1rem 2rem;">Start Your Free Trial</a>
            </div>
        </div>
    </section>

@endsection
