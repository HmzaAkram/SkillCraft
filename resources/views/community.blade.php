@extends('layouts.app')

@section('content')
    <!-- Community Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content fade-in-up">
                <h1>Community Form</h1>
                <p>Discuss, collaborate, and grow with fellow learners.</p>
                <!-- <div class="hero-buttons">
                    <a href="#get-started" class="cta-button">Start Learning Free</a>
                    <a href="#demo" class="btn-secondary">Watch Demo</a>
                </div> -->
            </div>
        </div>
    </section>               

    <!-- Community Posts Section -->
    <section style="padding: 3rem 0; background-color: #F9FAFB;">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
            @auth
                <div id="post-form" style="background-color: white; padding: 1.5rem; border-radius: 0.75rem; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-bottom: 3rem; border: 1px solid #E5E7EB;">
                    <h3 style="font-size: 1.5rem; font-weight: semibold; color: #1F2937; margin-bottom: 1rem; display: flex; align-items: center;">
                        <span style="font-size: 1.25rem; margin-right: 0.5rem;">✍️</span> Create a New Post
                    </h3>
                    <form action="{{ route('community.post.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 1rem;">
                        @csrf
                        <input type="text" name="title" placeholder="Write an engaging title..." required 
                               style="width: 100%; padding: 1rem; border: 1px solid #D1D5DB; border-radius: 0.5rem; outline: none; transition: border-color 0.3s; font-size: 1rem;">
                        <textarea name="body" placeholder="Share your project, question, or idea..." required 
                                  style="width: 100%; padding: 1rem; border: 1px solid #D1D5DB; border-radius: 0.5rem; outline: none; transition: border-color 0.3s; height: 6rem; resize: none; font-size: 1rem;"></textarea>
                        <div style="position: relative; width: 100%;">
                            <select name="type" 
                                    style="width: 100%; padding: 1rem; border: 1px solid #D1D5DB; border-radius: 0.5rem; outline: none; transition: border-color 0.3s; appearance: none; font-size: 1rem; padding-right: 2.5rem;">
                                <option value="question">❓ Question</option>
                                <option value="project">🚀 Project</option>
                                <option value="discussion">💬 Discussion</option>
                            </select>
                            <span style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); color: #9CA3AF; font-size: 1.25rem; pointer-events: none;">▼</span>
                        </div>
                        <button type="submit" 
                                style="background: linear-gradient(to right, #EF4444, #F97316); color: white; padding: 0.75rem 1.5rem; border-radius: 0.5rem; font-weight: semibold; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: all 0.3s; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                            📢 Post to Community
                        </button>
                    </form>
                </div>
            @endauth

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                @forelse($posts as $post)
                    <div style="background-color: white; padding: 1.5rem; border-radius: 0.75rem; box-shadow: 0 2px 4px rgba(0,0,0,0.05); border: 1px solid #E5E7EB; transition: box-shadow 0.3s;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem;">
                            <h3 style="font-size: 1.25rem; font-weight: semibold; color: #1F2937;">{{ $post->title }}</h3>
                            <span style="font-size: 0.75rem; font-weight: medium; padding: 0.25rem 0.75rem; border-radius: 9999px; 
                                {{ $post->type == 'question' ? 'background-color: #DBEAFE; color: #1D4ED8;' : ($post->type == 'project' ? 'background-color: #D1FAE5; color: #047857;' : 'background-color: #EDE9FE; color: #6D28D9;') }}">
                                {{ ucfirst($post->type) }}
                            </span>
                        </div>
                        <p style="font-size: 0.875rem; color: #6B7280; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.25rem;">
                            <span style="font-size: 1rem;">👤</span> by <span style="font-weight: medium;">{{ $post->user->name }}</span>
                        </p>
                        <p style="color: #374151; margin-bottom: 1rem; line-height: 1.5;">{{ Str::limit($post->body, 150) }}</p>
                        <h4 style="font-size: 1rem; font-weight: semibold; color: #1F2937; margin-bottom: 0.75rem;">💬 Comments:</h4>
                        <div style="display: flex; flex-direction: column; gap: 0.5rem; max-height: 8rem; overflow-y: auto;">
                            @forelse($post->comments as $comment)
                                <div style="background-color: #F3F4F6; padding: 0.75rem; border-radius: 0.5rem; border: 1px solid #E5E7EB;">
                                    <p style="color: #374151;">{{ $comment->body }}</p>
                                    <p style="font-size: 0.75rem; color: #6B7280; margin-top: 0.25rem;">— {{ $comment->user->name }}</p>
                                </div>
                            @empty
                                <p style="color: #9CA3AF; font-style: italic;">No comments yet.</p>
                            @endforelse
                        </div>
                        @auth
                            <form action="{{ route('community.comment.store', $post->id) }}" method="POST" style="margin-top: 1rem; display: flex; flex-direction: column; gap: 0.5rem;">
                                @csrf
                                <textarea name="body" placeholder="Write a comment..." required 
                                          style="width: 100%; padding: 0.75rem; border: 1px solid #D1D5DB; border-radius: 0.5rem; outline: none; transition: border-color 0.3s; height: 4rem; resize: none; font-size: 0.875rem;"></textarea>
                                <button type="submit" 
                                        style="background-color: #2563EB; color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; font-size: 0.875rem; font-weight: medium; transition: background-color 0.3s;">
                                    ➡️ Comment
                                </button>
                            </form>
                        @endauth
                    </div>
                @empty
                    <p style="text-align: center; color: #4B5563; grid-column: span 3;">🚀 No posts yet. Be the first to start the discussion!</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection