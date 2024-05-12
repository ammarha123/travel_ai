@extends('layout.app')

@section('title', 'Trip Planner Result')

@section('content')

    <h1>Gemini AI Test</h1>
    <p>Prompt: {{ $prompt }}</p>
    <p>Generated Text:</p>
    <p>{{ $result }}</p>

@endsection
