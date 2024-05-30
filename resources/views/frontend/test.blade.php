@extends('layout.app')

@section('title', 'AI Travel')

@section('content')
<div class="container mt-4">
    <h1>Generated Travel Plan</h1>
    <p><strong>Prompt:</strong> {{ $prompt }}</p>
    <div class="generated-text">
        <p>{!! nl2br(e($result)) !!}</p>
    </div>
</div>
@endsection
