@extends('layout.admin')

@section('title', 'Manage FAQs')

@section('content')
<div class="container">
    <h1>FAQs</h1>
    <a href="{{ route('support-center.create') }}" class="btn btn-primary">Add New FAQ</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faqs as $faq)
            <tr>
                <td>{{ $faq->id }}</td>
                <td>{{ Str::limit($faq->question, 50) }}</td>
                <td>{{ Str::limit($faq->answer, 50) }}</td>
                <td>
                    <a href="{{ route('support-center.show', $faq->id) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('support-center.edit', $faq->id) }}" class="btn btn-info">Edit</a>
                    <form action="{{ route('support-center.destroy', $faq->id) }}" method="POST" style="display: inline-block" onsubmit="return confirm('Are you sure you want to delete this FAQ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>                                   
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
