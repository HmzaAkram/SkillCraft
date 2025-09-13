@extends('layouts.app')

@section('content')
<section class="hero" style="padding: 140px 0 80px;">
  <div class="container">
    <div class="hero-content fade-in-up text-center">
      <h1>{{ $blog->title }}</h1>
      <p>Posted by {{ $user->name ?? 'Unknown Author' }} on {{ $blog->created_at->format('M d, Y') }}</p>
    </div>
  </div>
</section>

<section style="background-color:#f9fafb;">
  <div class="container py-5">
    <div class="card shadow-sm p-4" style="max-width:700px; margin:auto;">
      @if($blog->image)
        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid mb-3" style="max-width: 100%;">
      @else
        <img src="https://via.placeholder.com/700x400" alt="No Image" class="img-fluid mb-3">
      @endif

      <h4>{{ $blog->title }}</h4>
      <p>{{ $blog->content }}</p>

      <div class="mt-4">
        <a href="{{ route('blogs.index') }}" class="btn btn-outline-secondary">Back to Blogs</a>
        @if(auth()->check() && auth()->id() === $blog->user_id)
          <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-primary">Edit Blog</a>
          <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this blog?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Blog</button>
          </form>
        @endif
      </div>
    </div>
  </div>
</section>
@endsection