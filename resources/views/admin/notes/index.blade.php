@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="mb-0">Notes</h4>
  <a href="{{ route('admin.notes.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> New Note</a>
</div>

<div class="card shadow-sm">
  <div class="card-body p-0">
    <table class="table align-middle mb-0">
      <thead>
        <tr>
          <th>#</th><th>Title</th><th>File</th><th>Created</th><th style="width:180px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($notes as $note)
        <tr>
          <td>{{ $note->id }}</td>
          <td>{{ $note->title }}</td>
          <td>
            @if($note->file_path)
              <a href="{{ asset('storage/'.$note->file_path) }}" target="_blank" class="btn btn-sm btn-outline-secondary">Download</a>
            @else
              <span class="text-muted">—</span>
            @endif
          </td>
          <td>{{ $note->created_at->format('d M Y') }}</td>
          <td>
            <a href="{{ route('admin.notes.edit', $note) }}" class="btn btn-sm btn-outline-primary">Edit</a>
            <form class="d-inline" method="POST" action="{{ route('admin.notes.destroy', $note) }}" onsubmit="return confirm('Delete this note?')">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center text-muted">No notes found.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="card-footer bg-white">
    {{ $notes->links() }}
  </div>
</div>
@endsection
