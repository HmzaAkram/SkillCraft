@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero" style="padding: 140px 0 80px;">
    <div class="container">
        <div class="hero-content fade-in-up">
            <h1>How SkillCrafter Works</h1>
            <p>Your journey to mastering skills starts here. Learn how our AI-powered platform helps you every step of the way.</p>
        </div>
    </div>
</section>

<!-- Step-by-Step Process -->
<section class="how-it-works">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <h2>The Learning Journey</h2>
            <p>From onboarding to certification, SkillCrafter uses intelligent automation to guide your personalized learning experience.</p>
        </div>

        <div class="steps">
            <div class="step animate-on-scroll">
                <div class="step-number">1</div>
                <h3>Create Your Profile</h3>
                <p>Start by signing up and creating your learner profile. Choose your skill interests and set your learning goals.</p>
            </div>
            <div class="step animate-on-scroll">
                <div class="step-number">2</div>
                <h3>AI-Powered Assessment</h3>
                <p>Our AI analyzes your existing knowledge and learning preferences to craft a personalized curriculum just for you.</p>
            </div>
            <div class="step animate-on-scroll">
                <div class="step-number">3</div>
                <h3>Start Learning</h3>
                <p>Engage with interactive lessons, videos, projects, and quizzes—all tailored to your progress and goals.</p>
            </div>
            <div class="step animate-on-scroll">
                <div class="step-number">4</div>
                <h3>Practice & Get Feedback</h3>
                <p>Receive instant feedback from AI tutors. Reinforce concepts through real-time corrections and recommendations.</p>
            </div>
            <div class="step animate-on-scroll">
                <div class="step-number">5</div>
                <h3>Track Your Progress</h3>
                <p>Monitor your growth with visual analytics. See your strengths, improvement areas, and milestones clearly.</p>
            </div>
            <div class="step animate-on-scroll">
                <div class="step-number">6</div>
                <h3>Earn Certifications</h3>
                <p>Complete modules to earn verifiable certificates that showcase your skill mastery to employers and clients.</p>
            </div>
        </div>
    </div>
</section>

<!-- Key Benefits Section -->
<section class="features" style="background: #f9fafb;">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <h2>Why It Works</h2>
            <p>SkillCrafter combines science-backed learning strategies with modern technology for maximum efficiency and impact.</p>
        </div>

        <div class="features-grid">
            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">🔍</div>
                <h3>Personalized Learning</h3>
                <p>No one-size-fits-all approach. Every learning path is crafted to match your pace, style, and goals.</p>
            </div>
            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">📈</div>
                <h3>Data-Driven Insights</h3>
                <p>Our platform learns from your performance and adjusts in real time to optimize your outcomes.</p>
            </div>
            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">⏱️</div>
                <h3>Efficient Skill Building</h3>
                <p>Skip redundant lessons and focus on what matters. We make learning efficient and effective.</p>
            </div>
            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">🤝</div>
                <h3>Community Support</h3>
                <p>Join a community of learners, share projects, ask questions, and grow together.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section" id="get-started">
    <div class="container">
        <div class="animate-on-scroll">
            <h2>Start Your Journey Today</h2>
            <p>Take the first step towards mastering any skill. Get your personalized learning path now with SkillCrafter.</p>
            <a href="#signup" class="cta-button" style="font-size: 1.125rem; padding: 1rem 2rem;">Get Started Free</a>
        </div>
    </div>
</section>
@endsection
