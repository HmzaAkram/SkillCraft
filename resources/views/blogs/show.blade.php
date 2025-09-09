@extends('layouts.app')

@section('content')
<section class="hero" style="padding: 140px 0 80px;">
  <div class="container">
    <div class="hero-content fade-in-up text-center">
      <h1>My Profile</h1>
      <p>Here is your personal information.</p>
    </div>
  </div>
</section>

<section style="background-color:#f9fafb;">
  <div class="container py-5">
    <div class="card shadow-sm p-4" style="max-width:700px; margin:auto;">
      <div class="text-center">
        @if($user->profile_picture)
          <img src="{{ asset('storage/'.$user->profile_picture) }}" alt="Profile" class="img-thumbnail mb-3" style="max-width: 120px;">
        @else
          <img src="https://via.placeholder.com/120" alt="Profile" class="img-thumbnail mb-3">
        @endif
      </div>

      <h4>{{ $user->name }}</h4>
      <p><strong>Email:</strong> {{ $user->email }}</p>
      <p><strong>Skills & Interests:</strong> {{ $user->skill_interests ?? 'N/A' }}</p>
      <p><strong>Learning Goals:</strong> {{ $user->learning_goals ?? 'N/A' }}</p>

      <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>

        <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete Profile</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
