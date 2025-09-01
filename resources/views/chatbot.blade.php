@extends('layouts.app')

@section('content')
<style>
    .chat-container {
        height: 85vh;
        display: flex;
        border-radius: 10px;
        overflow: hidden;
        background: linear-gradient(135deg, #fff, #fdf5f5);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .chat-left {
        flex: 3;
        padding: 30px;
        overflow-y: auto;
        background: #fff;
    }

    .chat-right {
        flex: 1;
        background: #f8f9fa;
        border-left: 1px solid #eee;
        padding: 20px;
    }

    .chat-bubble {
        background: #e1f0ff;
        color: #333;
        padding: 12px 16px;
        border-radius: 12px;
        margin-bottom: 10px;
        max-width: 70%;
    }

    .chat-input-container {
        padding: 15px 20px;
        border-top: 1px solid #eee;
        display: flex;
        align-items: center;
        background: #fff;
    }

    .chat-input {
        flex: 1;
        border: 1px solid #ccc;
        border-radius: 30px;
        padding: 10px 20px;
        outline: none;
    }

    .send-btn {
        background: linear-gradient(45deg, #ff416c, #ff4b2b);
        color: #fff;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-left: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .quick-prompt-btn {
        width: 100%;
        background: #fff;
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 10px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .quick-prompt-btn:hover {
        background: #ffe8e3;
        border-color: #ff4b2b;
        color: #ff4b2b;
    }
</style>

<div class="container my-4">
    <div class="chat-container">
        {{-- Left: Chat --}}
        <div class="chat-left" id="chatbox">
            <div class="chat-bubble">
                Hello! I'm SkillCrafter AI. How can I assist you with your skill development today?
            </div>

            @if ($reply)
                <div class="chat-bubble">
                    <strong>AI:</strong> {{ $reply }}
                </div>
            @endif
        </div>

        {{-- Right: Prompts --}}
        <div class="chat-right">
            <h5 class="mb-3 fw-bold">Quick Prompts</h5>
            @foreach(['Roadmap Advice', 'Resume Tips', 'Skill Gap Help', 'Motivation Strategies'] as $prompt)
                <div class="quick-prompt-btn" onclick="fillPrompt('{{ $prompt }}')">
                    {{ $prompt }}
                </div>
            @endforeach
        </div>
    </div>

    {{-- Input Bar --}}
    <form method="POST" action="{{ route('chatbot.message') }}">
        @csrf
        <div class="chat-input-container">
            <input id="chat-input" type="text" name="message" class="chat-input" placeholder="Type your message..." required />
            <button type="submit" class="send-btn">
                <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </form>
</div>

{{-- Script --}}
<script>
    function fillPrompt(text) {
        document.getElementById('chat-input').value = text;
    }
</script>
@endsection

