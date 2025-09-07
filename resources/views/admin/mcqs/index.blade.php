@extends('admin.layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <strong>MCQs for {{ $course->name }}</strong>
        <a href="{{ route('admin.mcqs.create', $course->id) }}" class="btn btn-primary">Add MCQ</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Correct Option</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mcqs as $mcq)
                    <tr>
                        <td>{{ $mcq->question }}</td>
                        <td>{{ $mcq->correct_option }}</td>
                        <td>
                            <a href="{{ route('admin.mcqs.edit', [$course->id, $mcq->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.mcqs.destroy', [$course->id, $mcq->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $mcqs->links() }}
    </div>
</div>
@endsection