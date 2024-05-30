@extends('layout.app')

@section('title', 'Trip Planner Result')

@section('content')
    <div class="container">
        <h1 class="mt-5">Trip Planner Results</h1>
        <div id="map" style="height: 400px; width: 100%;"></div>

        <p><strong>Prompt:</strong> {!! $prompt !!}</p>
        <p><strong>Generated Text:</strong> {!! $result !!}</p>

        <div class="trip-details mt-4">
            <h2>Trip Details</h2>
            <p><strong>Destination:</strong> {!! $destination !!}</p>
            <p><strong>Travel Style:</strong> {!! $travelStyle !!}</p>
            <p><strong>Trip Duration:</strong> {!! $tripDuration !!} days</p>
        </div>

        <div class="activity-suggestions mt-4">
            <h2>Activity Suggestions</h2>
            <div class="row">
                @if (!empty($structuredActivities))
                    @foreach ($structuredActivities as $day => $activities)
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h3>{!! $day !!}</h3>
                                </div>
                                <div class="card-body">
                                    <ul>
                                        @foreach ($activities as $activity)
                                            <p>{!! $activity !!}</p>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No activities planned for this trip.</p>
                @endif
            </div>
        </div>

        <div class="hotel-suggestions mt-4">
            <h2>Hotel Suggestions</h2>
            <div class="row">
                @foreach ($hotels as $hotel)
                    <div class="col-3">
                        <div class="card mb-3">
                            <img src="{{ $hotel['photo_url'] }}" class="card-img-top" alt="Hotel Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $hotel['name'] }}</h5>
                                <p class="card-text">{{ $hotel['address'] }}</p>
                                <p class="card-text"><small class="text-muted">Rating: {{ $hotel['rating'] }}</small></p>
                                <a href="{{ $hotel['booking_url'] }}" target="_blank" class="btn btn-primary">Book on
                                    Booking.com</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="restaurant-suggestions mt-4">
            <h2>Restaurant Suggestions</h2>
            <div class="row">
                @foreach ($restaurants as $restaurant)
                    <div class="col-3">
                        <div class="card mb-3">
                            <img src="{{ $restaurant['photo_url'] }}" class="card-img-top" alt="Restaurant Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $restaurant['name'] }}</h5>
                                <p class="card-text">{{ $restaurant['address'] }}</p>
                                <p class="card-text"><small class="text-muted">Rating: {{ $restaurant['rating'] }}</small>
                                </p>
                                <a href="{{ $restaurant['detail_url'] }}" target="_blank" class="btn btn-primary">More
                                    details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBARuBB969frhWxwEYAk17aIXxR2C7gZ7s&callback=initMap&libraries=places&v=weekly"
        defer></script>
    <script>
        console.log("Scripts block is loaded");

        function initMap() {
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: {
                    lat: -34.397,
                    lng: 150.644
                }
            });

            const activities = @json($structuredActivities);
            activities.forEach(activity => {
                if (activity.lat && activity.lng) {
                    const marker = new google.maps.Marker({
                        position: {
                            lat: activity.lat,
                            lng: activity.lng
                        },
                        map: map,
                        title: activity.name
                    });

                    const infowindow = new google.maps.InfoWindow({
                        content: `<p>${activity.name}</p><p>${activity.address}</p>`
                    });

                    marker.addListener('click', function() {
                        infowindow.open(map, marker);
                    });
                }
            });
        }
        window.initMap = initMap;
    </script>
@endpush
