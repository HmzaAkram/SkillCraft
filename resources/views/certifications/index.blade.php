@extends('layouts.app')

@section('content')
    <h1>Certifications</h1>
    <div class="cards">
        @foreach($certifications as $cert)
            <div class="card">
                <h2>{{ $cert->course->name }}</h2>
                <a href="{{ route('certifications.download', $cert->id) }}">Download Certificate</a>
            </div>
        @endforeach
    </div>
@endsection