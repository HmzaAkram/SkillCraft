@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Skill Roadmap</h2>

    @if($roadmap)
        <div class="card">
            <div class="card-body">
                {!! nl2br(e($roadmap->steps)) !!}
            </div>
        </div>
    @else
        <p>No roadmap found for this skill.</p>
    @endif
</div>
@endsection
