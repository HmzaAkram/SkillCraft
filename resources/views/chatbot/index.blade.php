@extends('layouts.app') {{-- Make sure layouts/app.blade.php exists --}}

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="card-body">
            <h2 class="mb-4">🤖 SkillCrafter AI Chatbot</h2>

            {{-- Chat Form --}}
            <form method="POST" action="{{ route('chatbot.message') }}">
                @csrf
                <div class="form-group">
                    <label for="message">Ask your question:</label>
                    <input type="text" id="message" name="message" class="form-control" placeholder="e.g. How can I become a web developer?" required>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Send</button>
            </form>

            {{-- Reply Display --}}
            @if(session('reply'))
                <div class="alert alert-success mt-4">
                    <strong>AI Reply:</strong><br>
                    {{ session('reply') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
