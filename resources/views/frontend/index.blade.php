@extends('layout.app')

@section('title', 'AI Travel')

@section('content')

<div class="bg-image">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center content-text">
                <h1>Explore Your Next Adventure</h1>
                <div class="underline mx-auto"></div>
                <p>
                    Your Smarter Travel Partner: Navigate with Precision, Discover with Ease.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="section-starter">
    <div class="container">
        <div class="section-title text-center">
            Unlock New Adventures, Tailored for You.
        </div>
        <div class="section-description text-center">
            AI Travel offers intuitive trip planning powered by artificial intelligence, optimizing routes, accommodations, and activities for seamless travel experiences.
        </div>
        <div class="section-button text-center">
            <a href="{{ url('/trip-planner') }}" class="btn btn-dark">Get Started</a>
        </div>
    </div>
</div>

<div class="section-image">
    <img src="{{ asset('assets/img/travel2.jpg') }}" alt="Travel Image">
</div>

<div class="section-popular-cities">
    <div class="container">
        <div class="section-title text-center">
            Explore Popular Travel Cities
        </div>
        <div class="section-description text-center">
            Discover vibrant destinations that captivate travelers worldwide. From bustling metropolises to serene coastal towns, embark on unforgettable journeys in these iconic cities.
        </div>
        <div class="city-list">
            @foreach($cities as $city)
            <div class="city-card">
                <a href="{{ route('city.details', $city->slang) }}">
                    <img src="{{ asset('uploads/city/'.$city->image) }}" class="card-img-top" alt="{{ $city->name }}">
                </a>
                <h3>{{ $city->name }}</h3>
                <p>{{ $city->description }}</p>
            </div>
            @endforeach
        </div>
        <a class="btn btn-primary mt-3 text-center" href="{{ url('/discover') }}">Discover More</a>
    </div>
</div>

<section class="section-sign-up">
    <div class="container">
        <div class="section-title text-center">
            Start Planning Your Vacation
        </div>
        <div class="section-description text-center">
            Get ready to embark on your dream vacation. Begin your journey by signing up and unlocking personalized trip plans tailored just for you.
        </div>
        <div class="sign-up-form text-center">
            <!-- Add your sign-up form or button here -->
            <a href="{{ url('/register') }}" class="btn btn-primary">Sign Up Now</a>
        </div>
    </div>
</section>

<section class="section-user-evaluation">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="section-title text-center">
                    User Evaluation
                </div>
                <div class="section-description text-center">
                    Share your experience and help us improve our services.
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="user-feedback-form">
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('feedback.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Your Name:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="feedback">Your Feedback:</label>
                            <textarea id="feedback" name="feedback" class="form-control" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Feedback</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Display User Feedback -->
        <div class="user-feedback-list mt-5">
            @foreach($feedbacks as $feedback)
            <div class="user-feedback">
                <h4>{{ $feedback->name }}</h4>
                <p>{{ $feedback->feedback }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>



@endsection
