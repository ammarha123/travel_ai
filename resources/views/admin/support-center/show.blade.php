@extends('layout.admin')

@section('title', 'View FAQ')

@section('content')
<div class="container">
    <h1>FAQ Details</h1>
    <div class="card">
        <div class="card-header">
            FAQ Question
        </div>
        <div class="card-body">
            <h5 class="card-title">Q: {{ $faq->question }}</h5>
            <p class="card-text">A: {{ $faq->answer }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('support-center.index') }}" class="btn btn-primary">Back to FAQs</a>
            <a href="{{ route('support-center.edit', $faq->id) }}" class="btn btn-info">Edit</a>
            <form action="{{ route('support-center.destroy', $faq->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</tion>
            </form>
        </div>
    </div>
</div>
@endsection
