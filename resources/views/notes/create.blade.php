@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Upload New Note</h1>

    <form action="{{ route('notes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Upload PDF</label>
            <input type="file" name="file" class="form-control" accept="application/pdf" required>
        </div>

        <button type="submit" class="btn btn-success">Upload</button>
    </form>
</div>
@endsection
