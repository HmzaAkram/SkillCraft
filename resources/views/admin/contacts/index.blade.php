@extends('admin.layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white"><strong>Contact Messages</strong></div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>{{ $contact->created_at->format('M d, Y h:i A') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-muted">No messages yet.</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $contacts->links() }}
    </div>
</div>
@endsection
