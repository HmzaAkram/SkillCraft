@extends('layouts.app')

@section('content')
    <h1>{{ $course->name }}</h1>
    <p>{{ $course->description }}</p>
    <p>Progress: {{ $progressPercentage }}%</p>
    @if(!$enrolled)
        <form method="POST" action="{{ route('courses.enroll', $course->id) }}">
            @csrf
            <button type="submit">Enroll</button>
        </form>
    @else
        <h2>Lessons</h2>
        <ul>
            @foreach($course->lessons as $lesson)
                <li>
                    {{ $lesson->title }} ({{ $lesson->type }})
                    @if($userProgress->where('lesson_id', $lesson->id)->first()->status ?? '' === 'completed')
                        Completed
                    @else
                        <form method="POST" action="{{ route('courses.lesson.complete', [$course->id, $lesson->id]) }}">
                            @csrf
                            <button type="submit">Mark Complete</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
@endsection