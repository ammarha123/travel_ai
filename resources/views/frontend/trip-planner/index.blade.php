@extends('layout.app')

@section('title', 'Trip Planner')

@section('content')
    <div class="container mt-5">
        <h2>Trip Planner</h2>
        <form method="POST" action="{{ route('trip-planner.store') }}">
            @csrf
            <div class="form-group">
                <label for="destination">Destination:</label>
                <input type="text" id="destination" name="destination" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="start_date">Trip Start Date:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="end_date">Trip End Date:</label>
                <input type="date" id="end_date" name="end_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="catering_budget">Catering Budget:</label>
                <input type="number" id="catering_budget" name="catering_budget" class="form-control">
            </div>
            <div class="form-group">
                <label for="accommodation_budget">Accommodation Budget:</label>
                <input type="number" id="accommodation_budget" name="accommodation_budget" class="form-control">
            </div>
            <div class="form-group">
                <label for="travel_style">Travel Style:</label>
                <select id="travel_style" name="travel_style" class="form-control" required>
                    <option value="family">Family Trip</option>
                    <option value="single">Single Trip</option>
                    <option value="best">Best Trip</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Plan Trip</button>
        </form>
    </div>
@endsection
