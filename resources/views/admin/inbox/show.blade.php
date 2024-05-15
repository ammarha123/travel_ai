@extends('layout.admin')

@section('title', 'View Message')

@section('content')
<div class="container">
    <h1>Message Details</h1>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <p><strong>Title:</strong> {{ $message->title }}</p>
                </div>
                <div class="col-6">
                    Message from: <strong>{{ $message->email }}</strong>
                </div>
            </div>
            
        </div>
        <div class="card-body">
            <p><strong>Message:</strong> {{ $message->description }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('inbox.index') }}" class="btn btn-secondary">Back to Inbox</a>
        </div>
    </div>
</div>
@endsection
