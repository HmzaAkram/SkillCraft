@extends('layouts.app')

@section('content')
<section class="hero" style="padding: 140px 0 80px;">
    <div class="container">
        <div class="hero-content fade-in-up">
            <h1>{{ $note->title }}</h1>

            {{-- Agar content hai to text dikhao --}}
            @if($note->content)
                <p style="white-space: pre-line;">{{ $note->content }}</p>
            @endif

            {{-- Agar file hai to PDF/Image show karo --}}
            @if($note->file_path)
                @if(Str::endsWith($note->file_path, '.pdf'))
                    <iframe src="{{ asset('storage/'.$note->file_path) }}" width="100%" height="600px"></iframe>
                @else
                    <a href="{{ asset('storage/'.$note->file_path) }}" class="cta-button" target="_blank">Open File</a>
                @endif
            @endif

            <a href="{{ route('notes.index') }}" class="btn-secondary">Back to Notes</a>
        </div>
    </div>
</section>
@endsection
