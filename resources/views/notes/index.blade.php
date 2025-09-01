@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Student Notes</h1>
    <div class="row">
        @foreach($notes as $note)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5>{{ $note->title }}</h5>
                    <p>{{ $note->description }}</p>
                    <a href="{{ asset('storage/' . $note->file_path) }}" target="_blank" class="btn btn-primary btn-sm">📖 Read</a>
                    <a href="{{ asset('storage/' . $note->file_path) }}" download class="btn btn-success btn-sm">⬇ Download</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
