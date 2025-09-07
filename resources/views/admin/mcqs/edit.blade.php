@extends('admin.layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white"><strong>Edit MCQ for {{ $course->name }}</strong></div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.mcqs.update', [$course->id, $mcq->id]) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Question</label>
                <input type="text" name="question" class="form-control" value="{{ $mcq->question }}" required>
                @error('question') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Options (comma-separated, e.g., A) Option1, B) Option2)</label>
                <textarea name="options" class="form-control" required>{{ implode(',', $mcq->options) }}</textarea>
                @error('options') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Correct Option (e.g., B)</label>
                <input type="text" name="correct_option" class="form-control" value="{{ $mcq->correct_option }}" required>
                @error('correct_option') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.mcqs.index', $course->id) }}" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection