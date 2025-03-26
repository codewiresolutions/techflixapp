<!-- resources/views/admin/questions/edit.blade.php -->
@extends('admin.layouts.master')

@push('title')
    Edit Question - {{ $quiz->title }}
@endpush

@section('content')
    <h5 class="text-heading">Edit Question for {{ $quiz->title }}</h5>
    <form method="POST" action="{{ route('admin.questions.update', [$quiz->id, $question->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="text">Question Text</label>
            <textarea name="text" id="text" class="form-control" required>{{ old('text', $question->text) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.questions.index', $quiz->id) }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
