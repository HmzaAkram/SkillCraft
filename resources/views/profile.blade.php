@extends('layouts.app')

@section('content')
    <h1>Profile</h1>
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" value="{{ $user->name }}" required>
        <input type="email" name="email" value="{{ $user->email }}" required>
        <input type="password" name="password" placeholder="New Password">
        <input type="password" name="password_confirmation" placeholder="Confirm Password">
        <input type="file" name="profile_picture">
        <textarea name="skill_interests">{{ $user->skill_interests }}</textarea>
        <textarea name="learning_goals">{{ $user->learning_goals }}</textarea>
        <button type="submit">Update</button>
    </form>
@endsection