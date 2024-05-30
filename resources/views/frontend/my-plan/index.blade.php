@extends('layout.app')

@section('title', 'My Trip Plans')

@section('content')
<div class="container mt-5">
    <h2>My Trip Plans</h2>
    <div class="row">
        @foreach ($trips as $trip)
        <div class="col-md-4 my-3">
            <div class="card h-100">
                <img src="{{ $trip->image_url }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Image of {{ $trip->destination }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $trip->end_date->diffInDays($trip->start_date) + 1 }} day(s) trip to {{ $trip->destination }}</h5>
                    {{-- <p class="card-text">Details about the trip.</p> --}}
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
