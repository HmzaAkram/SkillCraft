@extends('layouts.app')

@section('content')

    <!-- Verification Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content fade-in-up">
                <h1>Email Verification Required</h1>

                @if (session('resent'))
                    <div class="alert alert-success animate-on-scroll" role="alert">
                        ✅ A fresh verification link has been sent to your email address.
                    </div>
                @endif

                <p class="animate-on-scroll">
                    Before proceeding, please check your email for a verification link.<br>
                    If you did not receive the email, request another one below.
                </p>

                <form class="d-inline animate-on-scroll" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="cta-button">
                        Request Another Verification Link
                    </button>
                </form>
            </div>
        </div>
    </section>

    

@endsection
