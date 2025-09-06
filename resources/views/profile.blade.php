@extends('layouts.app')

@section('content')
{{-- Hero Section --}}
<section class="hero" style="padding: 140px 0 80px;">
  <div class="container">
    <div class="hero-content fade-in-up text-center">
      <h1>My Profile</h1>
      <p>Update your personal details, skills and learning goals.</p>
    </div>
  </div>
</section>

{{-- Profile Form --}}
<section style="background-color:#f9fafb;">
  <div class="container py-5">
    <div class="card shadow-sm p-4" style="max-width:700px; margin:auto;">
      <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf

        {{-- Name --}}
        <div class="mb-3">
          <label class="form-label">Full Name</label>
          <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
        </div>

        {{-- Email --}}
        <div class="mb-3">
          <label class="form-label">Email Address</label>
          <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
        </div>

        {{-- Password --}}
        <div class="mb-3">
          <label class="form-label">New Password</label>
          <input type="password" name="password" class="form-control" placeholder="Enter new password">
        </div>
        <div class="mb-3">
          <label class="form-label">Confirm Password</label>
          <input type="password" name="password_confirmation" class="form-control" placeholder="Re-enter new password">
        </div>

        {{-- Profile Picture --}}
        <div class="mb-3">
          <label class="form-label">Profile Picture</label>
          <input type="file" name="profile_picture" class="form-control">
          @if($user->profile_picture)
            <div class="mt-2">
              <img src="{{ asset('storage/'.$user->profile_picture) }}" alt="Profile" class="img-thumbnail" style="max-width: 120px;">
            </div>
          @endif
        </div>

        {{-- Skills / Interests --}}
        <div class="mb-3">
          <label class="form-label">Skill & Interests</label>
          <textarea name="skill_interests" rows="3" class="form-control">{{ $user->skill_interests }}</textarea>
        </div>

        {{-- Learning Goals --}}
        <div class="mb-3">
          <label class="form-label">Learning Goals</label>
          <textarea name="learning_goals" rows="3" class="form-control">{{ $user->learning_goals }}</textarea>
        </div>

        {{-- Submit --}}
        <div class="text-center">
          <button type="submit" class="cta-button">Update Profile</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
