@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content fade-in-up text-center">
            <h1>MCQ Test - {{ $course->name }}</h1>
            <p class="text-muted">Please answer all questions to complete the course.</p>
        </div>
    </div>
</section>

<!-- Questions Section -->
<section class="features py-5">
    <div class="container">
        <form method="POST" action="{{ route('courses.mcq.submit', $course->id) }}" id="mcqForm">
            @csrf
            <div class="features-grid">
                @foreach($questions as $index => $question)
                    <div class="feature-card animate-on-scroll shadow-sm p-4 question-card {{ $index === 0 ? '' : 'd-none' }}" 
                         data-index="{{ $index }}">
                        <h5 class="fw-bold mb-2">Question {{ $index + 1 }}</h5>
                        <p class="mb-3">{{ $question['question'] }}</p>
                   @foreach($question['options'] as $optIndex => $option)
    <div class="form-check mb-2">
        <input type="radio" 
               name="question_{{ $question['id'] }}" 
               value="{{ $optIndex }}" 
               class="form-check-input" required>
        <label class="form-check-label">{{ chr(65 + $optIndex) }}) {{ $option }}</label>
    </div>
@endforeach

                    </div>
                @endforeach
            </div>

            <!-- Buttons (common at bottom) -->
            <div class="text-center mt-5">
                <button type="button" id="nextBtn" class="cta-button" style="font-size: 1.125rem; padding: 1rem 2rem;">
                    ➡️ Next
                </button>

                <button type="submit" id="submitBtn" class="cta-button d-none" style="font-size: 1.125rem; padding: 1rem 2rem;">
                    🚀 Submit Test
                </button>
            </div>
        </form>
    </div>
</section>

<!-- JS for navigation -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".question-card");
    const nextBtn = document.getElementById("nextBtn");
    const submitBtn = document.getElementById("submitBtn");
    let currentIndex = 0;

    nextBtn.addEventListener("click", function () {
        // hide current question
        cards[currentIndex].classList.add("d-none");

        // move to next
        currentIndex++;

        if (currentIndex < cards.length) {
            cards[currentIndex].classList.remove("d-none");
        }

        // if last question reached
        if (currentIndex === cards.length - 1) {
            nextBtn.classList.add("d-none");
            submitBtn.classList.remove("d-none");
        }
    });
});
</script>
@endsection
