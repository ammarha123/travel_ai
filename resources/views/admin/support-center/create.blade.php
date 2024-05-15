@extends('layout.admin')

@section('title', 'Add FAQ')

@section('content')
<div class="container">
    <h1>Add a New FAQ</h1>
    <form action="{{ route('support-center.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="question">Question:</label>
            <input type="text" class="form-control" id="question" name="question" required>
        </div>
        <div class="form-group">
            <label for="answer">Answer:</label>
            <textarea class="form-control" id="answer" name="answer" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
