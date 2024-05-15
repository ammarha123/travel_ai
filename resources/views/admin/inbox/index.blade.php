@extends('layout.admin')

@section('title', 'Admin Inbox')

@section('content')
<div class="container">
    <h1>Inbox</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Email</th>
                <th>Message Preview</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
            <tr style="{{ $message->status === 0 ? 'font-weight:bold;' : '' }}">
                <td>{{ $message->title }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ Str::limit($message->description, 50, '...') }}</td>
                <td>{{ $message->status === 0 ? 'Unread' : 'Read' }}</td>
                <td>
                    <a href="{{ route('inbox.show', $message->id) }}" class="btn btn-primary">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
