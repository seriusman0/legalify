@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section class="cover cover-features">
<div class="background-image-holder" style="background-image: url({{ asset('assets/template/img/legal2.jpg') }});"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-white mb-4">Welcome to Legalify</h1>
                <p class="lead text-white mb-5">Your trusted partner in navigating the complexities of law. We provide comprehensive legal solutions tailored to your needs.</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('services') }}" class="btn--primary">
                        <i class="fas fa-gavel me-2"></i>Our Services
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-phone me-2"></i>Get in Touch
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="space--sm">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="feature text-center">
                    <div class="mb-4">
                        <i class="fas fa-balance-scale fa-3x text-primary"></i>
                    </div>
                    <h3>Expert Legal Team</h3>
                    <p>Our experienced attorneys are dedicated to providing the highest quality legal representation.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature text-center">
                    <div class="mb-4">
                        <i class="fas fa-handshake fa-3x text-primary"></i>
                    </div>
                    <h3>Client-Focused</h3>
                    <p>We prioritize understanding your unique needs to deliver personalized legal solutions.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature text-center">
                    <div class="mb-4">
                        <i class="fas fa-chart-line fa-3x text-primary"></i>
                    </div>
                    <h3>Proven Results</h3>
                    <p>Our track record speaks for itself with numerous successful cases and satisfied clients.</p>
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
                <h2 class="h1">Latest Legal Insights</h2>
                <p class="lead">Stay informed with our latest legal updates and industry news</p>
            </div>
        </div>
        
        <div class="row">
            @foreach($latestBlogs as $blog)
            <div class="col-md-4 mb-4">
                <article class="masonry__item d-flex flex-column h-100">
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid mb-3" alt="{{ e($blog->title) }}">
                    @endif
                    <div class="article__title">
                        <h3 class="h5">{{ e($blog->title) }}</h3>
                        <div class="text-muted mb-3">
                            <small>
                                <i class="fas fa-calendar-alt me-2"></i>
                                {{ $blog->created_at->format('M d, Y') }}
                            </small>
                        </div>
                    </div>
                    <div class="article__body flex-grow-1">
                        <p>{!! nl2br(e(mb_substr(strip_tags($blog->content), 0, 150))) !!}{{ strlen(strip_tags($blog->content)) > 150 ? '...' : '' }}</p>
                    </div>
                    <div class="article__footer mt-3">
                        <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-primary w-100">
                            Read More <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="space--sm">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="{{ asset('assets/icons/logo2.jpeg') }}" alt="Why Choose Us" class="img-fluid rounded shadow-lg">
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4">Why Choose Legalify?</h2>
                <div class="feature mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-check-circle text-primary me-3 fa-2x"></i>
                        <h3 class="h5 mb-0">Experienced Team</h3>
                    </div>
                    <p>Our attorneys bring years of expertise across various legal domains.</p>
                </div>
                <div class="feature mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-clock text-primary me-3 fa-2x"></i>
                        <h3 class="h5 mb-0">Timely Service</h3>
                    </div>
                    <p>We understand the importance of time and deliver prompt solutions.</p>
                </div>
                <div class="feature">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-star text-primary me-3 fa-2x"></i>
                        <h3 class="h5 mb-0">Client Satisfaction</h3>
                    </div>
                    <p>Your success is our priority, and we work tirelessly to achieve it.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cover">
<div class="background-image-holder" style="background-image: url({{ asset('assets/template/img/legal1.jpg') }});"></div>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="display-4 text-white mb-4">Ready to Get Started?</h2>
                <p class="lead text-white mb-4">Contact us today for a consultation with our legal experts.</p>
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-paper-plane me-2"></i>Contact Us Now
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
    background: rgba(0, 0, 0, 0.6);
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
    height: 100%;
    transition: transform 0.3s ease;
    background: #fff;
    padding: 1.5rem;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.masonry__item:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

.article__body {
    color: #6c757d;
    line-height: 1.6;
}

.btn-primary {
    background-color: #4a90e2;
    border-color: #4a90e2;
    padding: 0.75rem 1.25rem;
    border-radius: 6px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #357abd;
    border-color: #357abd;
    transform: translateY(-2px);
}

.text-primary {
    color: #4a90e2 !important;
}

.bg-light {
    background-color: #f8f9fa !important;
}

.article__title h3 {
    color: #2d3748;
    font-weight: 600;
    margin-bottom: 0.5rem;
}
</style>
@endpush
@endsection
