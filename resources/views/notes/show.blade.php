@extends('layouts.app')

@section('content')
    <section class="hero" style="padding: 140px 0 80px;">
        <div class="container">
            <div class="hero-content fade-in-up">
                <h1>{{ $note->title }}</h1>
                <p style="white-space: pre-line;">{{ $note->content }}</p>
                @if ($note->file_path)
                    <a href="{{ asset('storage/' . $note->file_path) }}" class="cta-button" download>Download File</a>
                @endif
                <a href="{{ route('notes.index') }}" class="btn-secondary">Back to Notes</a>
            </div>
        </div>
    </section>
@endsection