{{-- resources/views/notes/index.blade.php --}}
@extends('layouts.app')

@section('content')
<section class="hero" style="padding: 140px 0 80px;">
  <div class="container">
    <div class="hero-content fade-in-up">
      <h1>Student Notes</h1>
      <p>Read or download notes uploaded by admin.</p>
    </div>
  </div>
</section>

<section class="features" style="background-color:#f9fafb;">
  <div class="container">
    <div class="features-grid">
      @forelse($notes as $note)
      <div class="feature-card">
        <div class="feature-icon">📘</div>
        <h3>{{ $note->title }}</h3>
        <p class="mb-2" style="white-space:pre-line">{{ Str::limit($note->content, 180) }}</p>
        <div class="d-flex gap-2 justify-content-center">
          <a href="{{ route('notes.show', $note) }}" class="btn-secondary">Read</a>
          @if($note->file_path)
            <a href="{{ asset('storage/'.$note->file_path) }}" class="cta-button" download>Download</a>
          @endif
        </div>
      </div>
      @empty
      <p class="text-muted">No notes yet.</p>
      @endforelse
    </div>
  </div>
</section>
@endsection
