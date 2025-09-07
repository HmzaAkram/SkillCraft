@extends('admin.layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white"><strong>Add MCQ for {{ $course->name }}</strong></div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.mcqs.store', $course->id) }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Question</label>
                <input type="text" name="question" class="form-control" value="{{ old('question') }}" required>
                @error('question') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Options (comma-separated, e.g., A) Option1, B) Option2)</label>
                <textarea name="options" class="form-control" required>{{ old('options') }}</textarea>
                @error('options') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
    <label class="form-label">Correct Option (index, e.g., 0 for first option)</label>
    <input type="number" name="correct_option" class="form-control" 
           min="0" 
           value="{{ old('correct_option', $mcq->correct_option ?? '') }}" required>
    <small class="form-text text-muted">
        Example: If you want the 1st option as correct → enter <b>0</b>, 
        2nd option → enter <b>1</b>, and so on.
    </small>
    @error('correct_option') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('admin.mcqs.index', $course->id) }}" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection