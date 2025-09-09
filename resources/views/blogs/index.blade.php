{{-- resources/views/blogs/index.blade.php --}}
@extends('layouts.app')

@section('content')
<section class="hero" style="padding: 140px 0 80px;">
  <div class="container">
    <div class="hero-content fade-in-up">
      <h1>Latest Blogs</h1>
      <p>Read insights, tips, and updates shared by our writers.</p>
    </div>
  </div>
</section>

<section class="features" style="background-color:#f9fafb;">
  <div class="container">
    <div class="features-grid">
      @forelse($blogs as $blog)
      <div class="feature-card">
        <div class="feature-icon">📝</div>
        <h3>{{ $blog->title }}</h3>
        <p class="mb-2" style="white-space:pre-line">{{ Str::limit($blog->content, 180) }}</p>
        <div class="d-flex gap-2 justify-content-center">
            <a href="{{ route('blogs.show', $blog) }}" class="btn-secondary">Read More</a>
        </div>
      </div>
      @empty
      <p class="text-muted">No blogs yet.</p>
      @endforelse
    </div>
    <div class="mt-4">
        {{ $blogs->links() }}
    </div>
  </div>
</section>
@endsection
