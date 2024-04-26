@extends('layout.app')

@section('title', 'Help')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">FAQ</h1>

    <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="websiteFAQ">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#websiteCollapse" aria-expanded="true" aria-controls="websiteCollapse">
                    How do I navigate the website?
                </button>
            </h2>
            <div id="websiteCollapse" class="accordion-collapse collapse show" aria-labelledby="websiteFAQ" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    <p>You can use the menu at the top to access different sections like Home, Trip Planner, About, Contact, etc.</p>
                </div>
            </div>
        </div>

        <!-- FAQ Section for Travel Planner AI -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="aiFAQ">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#aiCollapse" aria-expanded="false" aria-controls="aiCollapse">
                    What is the Travel Planner AI?
                </button>
            </h2>
            <div id="aiCollapse" class="accordion-collapse collapse" aria-labelledby="aiFAQ" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    <p>The Travel Planner AI is an intelligent tool that assists in creating personalized travel plans based on user preferences.</p>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="mt-4">
        <p class="h2">Need Help? <span class="h5">Send us a message</span></p>
       
        <form method="POST" action="{{ route('help.storeMessage') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="messageTitle" class="form-label">Message Title</label>
                <input type="text" class="form-control" id="messageTitle" name="messageTitle" required>
            </div>
            <div class="mb-3">
                <label for="messageDescription" class="form-label">Message Description</label>
                <textarea class="form-control" id="messageDescription" name="messageDescription" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>
</div>
@endsection
