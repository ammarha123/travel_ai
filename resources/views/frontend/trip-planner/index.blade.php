@extends('layout.app')

@section('title', 'Trip Planner')

@section('content')
    <div class="container mt-5">
        <h2>Trip Planner</h2>
        @auth
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
                    <label for="catering_budget">Catering Budget (RM):</label>
                    <input type="number" id="catering_budget" name="catering_budget" class="form-control" placeholder="RM">
                </div>
                <div class="form-group">
                    <label for="accommodation_budget">Accommodation Budget (RM):</label>
                    <input type="number" id="accommodation_budget" name="accommodation_budget" class="form-control"
                        placeholder="RM">
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
        @else
            <div class="alert alert-warning" role="alert">
                You need to log in to access the trip planner.
            </div>
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        @endauth
    </div>
@endsection

@push('script')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBARuBB969frhWxwEYAk17aIXxR2C7gZ7s&libraries=places&callback=initAutocomplete"
        async defer></script>

    <script>
        function initAutocomplete() {
            var input = document.getElementById('destination');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.setFields(['address_components', 'geometry', 'name']);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    // User entered the name of a Place that was not suggested and pressed the Enter key, or the Place Details request failed.
                    window.alert("No details available for input: '" + place.name + "'");
                } else {
                    // If the place has a geometry, then present it on a map.
                    console.log(place.name + ', ' + place.address_components.map(ac => ac.long_name).join(', '));
                }
            });
        }
    </script>
@endpush
