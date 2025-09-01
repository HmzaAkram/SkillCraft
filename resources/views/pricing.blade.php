@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero" style="padding: 140px 0 80px;">
    <div class="container">
        <div class="hero-content fade-in-up">
            <h1>Simple, Transparent Pricing</h1>
            <p>Choose the plan that fits your learning goals. Start free, upgrade anytime.</p>
        </div>
    </div>
</section>

<!-- Pricing Plans -->
<section id="pricing" class="features" style="background: #f9fafb;">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <h2>Pricing Plans</h2>
            <p>No hidden fees, no contracts. Switch plans anytime.</p>
        </div>

        <div class="features-grid">
            <!-- Free Plan -->
            <div class="feature-card animate-on-scroll" style="border: 2px solid #d1d5db;">
                <h3 style="font-size: 1.75rem; color: #1f2937;">Free</h3>
                <p style="font-size: 1.25rem; font-weight: 700; color: #4b5563;">$0 / month</p>
                <ul style="list-style: none; margin-top: 1rem; color: #6b7280; padding: 0;">
                    <li>✅ Access to 10+ skill categories</li>
                    <li>✅ Personalized learning paths</li>
                    <li>✅ Progress tracking</li>
                    <li>❌ No certificates</li>
                    <li>❌ Limited feedback & support</li>
                </ul>
                <a href="#signup" class="cta-button" style="margin-top: 1.5rem; display: inline-block;">Get Started Free</a>
            </div>

            <!-- Pro Plan -->
            <div class="feature-card animate-on-scroll" style="border: 2px solid #e11d48;">
                <h3 style="font-size: 1.75rem; color: #e11d48;">Pro</h3>
                <p style="font-size: 1.25rem; font-weight: 700; color: #e11d48;">$19 / month</p>
                <ul style="list-style: none; margin-top: 1rem; color: #6b7280; padding: 0;">
                    <li>✅ All Free features</li>
                    <li>✅ Unlimited skills & lessons</li>
                    <li>✅ AI feedback & progress analytics</li>
                    <li>✅ Certificate on completion</li>
                    <li>✅ Priority support</li>
                </ul>
                <a href="#signup" class="cta-button" style="margin-top: 1.5rem; display: inline-block;">Upgrade to Pro</a>
            </div>

            <!-- Team Plan -->
            <div class="feature-card animate-on-scroll" style="border: 2px solid #f59e0b;">
                <h3 style="font-size: 1.75rem; color: #f59e0b;">Team</h3>
                <p style="font-size: 1.25rem; font-weight: 700; color: #f59e0b;">$99 / month</p>
                <ul style="list-style: none; margin-top: 1rem; color: #6b7280; padding: 0;">
                    <li>✅ Everything in Pro</li>
                    <li>✅ Up to 10 team members</li>
                    <li>✅ Team progress dashboard</li>
                    <li>✅ Group certifications</li>
                    <li>✅ Dedicated onboarding</li>
                </ul>
                <a href="#contact" class="cta-button" style="margin-top: 1.5rem; display: inline-block;">Contact Sales</a>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section" id="get-started">
    <div class="container">
        <div class="animate-on-scroll">
            <h2>Start Learning Today</h2>
            <p>Sign up for free and upgrade whenever you're ready to go pro.</p>
            <a href="#signup" class="cta-button" style="font-size: 1.125rem; padding: 1rem 2rem;">Create Your Account</a>
        </div>
    </div>
</section>
@endsection
