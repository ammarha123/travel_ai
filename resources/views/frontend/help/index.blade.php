@extends('layout.app')

@section('title', 'Help')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">FAQ</h1>

    <div class="accordion" id="faqAccordion">
        @foreach($faqs as $faq)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $faq->id }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                        {{ $faq->question }}
                    </button>
                </h2>
                <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        {{ $faq->answer }}
                    </div>
                </div>
            </div>
        @endforeach
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
