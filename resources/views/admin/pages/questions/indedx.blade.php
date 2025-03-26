<!-- resources/views/admin/questions/index.blade.php -->
@extends('admin.layouts.master')

@push('title')
    Questions - {{ $quiz->title }}
@endpush

@section('content')
    <h5 class="text-heading">Questions for {{ $quiz->title }}</h5>
    <a href="{{ route('admin.questions.create', $quiz->id) }}" class="btn btn-primary my-3">Add New Question</a>
    @include('admin.layouts.partials.message')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Text</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($questions as $question)
            <tr>
                <td>{{ $question->id }}</td>
                <td>{{ $question->text }}</td>
                <td>
                    <a href="{{ route('admin.questions.edit', [$quiz->id, $question->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.questions.destroy', [$quiz->id, $question->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
