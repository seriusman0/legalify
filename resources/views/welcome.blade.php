@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<!-- Hero Section -->
<section class="cover cover-features">
<div class="background-image-holder" style="background-image: url({{ asset('assets/template/img/legal1.jpg') }});"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-white mb-4">Legal Solutions for Your Success</h1>
                <p class="lead text-white mb-5">Professional legal services tailored to your needs. Our experienced team is here to help you navigate complex legal matters with confidence.</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('services') }}" class="btn--primary">
                        <i class="fas fa-briefcase me-2"></i>Explore Our Services
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-phone me-2"></i>Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Services -->
<section class="space--sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-5">
                <h2 class="h1 mb-4">Our Services</h2>
                <p class="lead">Comprehensive legal solutions for individuals and businesses</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="feature text-center">
                    <div class="mb-4">
                        <i class="fas fa-balance-scale fa-3x text-primary"></i>
                    </div>
                    <h3>Corporate Law</h3>
                    <p>Expert guidance for businesses in formation, contracts, and compliance matters.</p>
                    <a href="{{ route('services') }}" class="btn--primary">Learn More</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature text-center">
                    <div class="mb-4">
                        <i class="fas fa-gavel fa-3x text-primary"></i>
                    </div>
                    <h3>Litigation</h3>
                    <p>Strong representation in court proceedings and dispute resolution.</p>
                    <a href="{{ route('services') }}" class="btn--primary">Learn More</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature text-center">
                    <div class="mb-4">
                        <i class="fas fa-shield-alt fa-3x text-primary"></i>
                    </div>
                    <h3>Intellectual Property</h3>
                    <p>Protection for your innovations through patents, trademarks, and copyrights.</p>
                    <a href="{{ route('services') }}" class="btn--primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Blog Posts -->
<section class="space--sm bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-5">
                <h2 class="h1 mb-4">Latest Insights</h2>
                <p class="lead">Stay informed with our legal expertise and industry updates</p>
            </div>
        </div>
        
        <div class="row">
            @foreach($latestBlogs as $blog)
            <div class="col-md-4">
                <div class="masonry__item">
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid mb-3" alt="{{ $blog->title }}">
                    @endif
                    <div class="article__title">
                        <h3>{{ $blog->title }}</h3>
                    </div>
                    <div class="article__body">
                        <p>{{ mb_substr($blog->content, 0, 150) }}{{ strlen($blog->content) > 150 ? '...' : '' }}</p>
                    </div>
                    <a href="{{ route('blog.show', $blog->id) }}" class="btn--primary">Read More</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cover">
<div class="background-image-holder" style="background-image: url({{ asset('assets/template/img/legal2.jpg') }});"></div>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="display-4 text-white mb-4">Ready to Get Started?</h2>
                <p class="lead text-white mb-4">Contact us today for a consultation with our legal experts.</p>
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-paper-plane me-2"></i>Get in Touch
                </a>
            </div>
        </div>
    </div>
</section>

@push('css')
<style>
.background-image-holder::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1;
}

.cover .container {
    position: relative;
    z-index: 2;
}

.feature {
    transition: transform 0.3s ease;
}

.feature:hover {
    transform: translateY(-10px);
}

.masonry__item {
    transition: transform 0.3s ease;
}

.masonry__item:hover {
    transform: translateY(-10px);
}
</style>
@endpush
@endsection
