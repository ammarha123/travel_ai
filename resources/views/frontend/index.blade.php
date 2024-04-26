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
            <button class="btn btn-dark">Get Started</button>
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
            <div class="city-card">
                <img src="{{ asset('assets/img/city1.jpg') }}" alt="City 1">
                <h3>New York City</h3>
                <p>The city that never sleeps, offering iconic landmarks, Broadway shows, and diverse culinary experiences.</p>
            </div>
            <div class="city-card">
                <img src="{{ asset('assets/img/city2.jpg') }}" alt="City 2">
                <h3>Paris</h3>
                <p>The romantic capital of the world, known for its art, fashion, and exquisite cuisine.</p>
            </div>
            <div class="city-card">
                <img src="{{ asset('assets/img/bali.jpg') }}" alt="Bali">
                <h3>Bali</h3>
                <p>A tropical paradise with stunning beaches, lush rice terraces, and vibrant cultural experiences.</p>
            </div>
            <div class="city-card">
                <img src="{{ asset('assets/img/kuala-lumpur.jpg') }}" alt="Kuala Lumpur">
                <h3>Kuala Lumpur</h3>
                <p>The dynamic capital of Malaysia, blending modern skyscrapers with historic landmarks and bustling markets.</p>
            </div>
        </div>
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
            <button class="btn btn-primary">Sign Up Now</button>
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
                    <form action="" method="POST">
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
        </div        

        <!-- Display User Feedback -->
        <div class="user-feedback-list mt-5">
            <div class="user-feedback">
                <h4>John Doe</h4>
                <p>Great trip planner! Loved the personalized recommendations.</p>
            </div>
            <div class="user-feedback">
                <h4>Jane Smith</h4>
                <p>AI Travel made our vacation seamless and enjoyable.</p>
            </div>
            <div class="user-feedback">
                <h4>Michael Johnson</h4>
                <p>Highly recommend AI Travel for hassle-free trip planning.</p>
            </div>
        </div>
    </div>
</section>



@endsection
