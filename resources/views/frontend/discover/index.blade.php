@extends('layout.app')

@section('title', 'Discover')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Discover Recommended Cities</h1>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach($cities as $city)
        <div class="col">
            <div class="card h-100">
                <a href="{{ route('city.details', $city->slang) }}">
                    <img src="{{ asset('uploads/city/'.$city->image) }}" class="card-img-top" alt="{{ $city->name }}">
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{ $city->name }}</h5>
                    <p class="card-text">{{ $city->description }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
