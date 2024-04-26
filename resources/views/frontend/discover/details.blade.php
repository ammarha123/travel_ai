@extends('layout.app')

@section('title', 'City Details')

@section('content')
<div class="container mt-5">
    <div class="mt-4">
        <a href="{{ route('discover.index') }}" class="btn btn-primary">← Back</a>
    </div>
    
    <h1 class="mb-4 text-center">{{ $city->name }}</h1>

    <div class="card">
        <img src="{{ asset('uploads/city/'.$city->image) }}" class="card-img-top" alt="{{ $city->name }}">
        <div class="card-body">
            <p>{{ $city->description }}</p>
            <p><strong>Slang:</strong> {{ $city->slang }}</p>
        </div>
    </div>
</div>
@endsection
