@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Dashboard</h2>

    @if(Session('error'))
        <div class="alert alert-danger">{{ Session('error') }}</div>
    @endif

    @if(isset($recommendations) && count($recommendations))
        <h4>AI Recommendations:</h4>
        <ul>
            @foreach($recommendations as $skill)
                <li>{{ $skill->name }}</li>
            @endforeach
        </ul>
    @endif

    @if(isset($progress) && count($progress))
        <h4>Your Progress:</h4>
        @foreach($progress as $p)
            <p>{{ $p->skill->name }} – XP: {{ $p->xp }}, Level: {{ $p->level }}</p>
        @endforeach
    @endif
</div>
@endsection
