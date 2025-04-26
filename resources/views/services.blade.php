@extends('layouts.app')

@section('title', 'Our Services')

@section('content')
<!-- Header -->
<section class="cover">
    <div class="background-image-holder" style="background-image: url({{ asset('assets/template/img/legal1.jpg') }});"></div>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-4 text-white mb-4">Our Legal Services</h1>
                <p class="lead text-white">Comprehensive legal solutions tailored to meet your specific needs</p>
            </div>
        </div>
    </div>
</section>

<!-- Services -->
<section class="space--sm">
    <div class="container">
        <div class="row">
            <!-- Corporate Law -->
            <div class="col-md-6 mb-4">
                <div class="feature">
                    <div class="d-flex align-items-center mb-4">
                        <div class="me-4">
                            <i class="fas fa-balance-scale fa-2x text-primary"></i>
                        </div>
                        <h3 class="mb-0">Corporate Law</h3>
                    </div>
                    <p>Our corporate law services include:</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Business Formation & Structure</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Contract Drafting & Review</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Corporate Governance</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Mergers & Acquisitions</li>
                    </ul>
                </div>
            </div>

            <!-- Litigation -->
            <div class="col-md-6 mb-4">
                <div class="feature">
                    <div class="d-flex align-items-center mb-4">
                        <div class="me-4">
                            <i class="fas fa-gavel fa-2x text-primary"></i>
                        </div>
                        <h3 class="mb-0">Litigation</h3>
                    </div>
                    <p>Our litigation services include:</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Civil Litigation</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Commercial Disputes</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Alternative Dispute Resolution</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Appeals</li>
                    </ul>
                </div>
            </div>

            <!-- Intellectual Property -->
            <div class="col-md-6 mb-4">
                <div class="feature">
                    <div class="d-flex align-items-center mb-4">
                        <div class="me-4">
                            <i class="fas fa-shield-alt fa-2x text-primary"></i>
                        </div>
                        <h3 class="mb-0">Intellectual Property</h3>
                    </div>
                    <p>Our IP services include:</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Patent Applications</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Trademark Registration</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Copyright Protection</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>IP Litigation</li>
                    </ul>
                </div>
            </div>

            <!-- Employment Law -->
            <div class="col-md-6 mb-4">
                <div class="feature">
                    <div class="d-flex align-items-center mb-4">
                        <div class="me-4">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                        <h3 class="mb-0">Employment Law</h3>
                    </div>
                    <p>Our employment law services include:</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Employment Contracts</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Workplace Policies</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Discrimination Claims</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Employment Disputes</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cover">
    <div class="background-image-holder" style="background-image: url({{ asset('assets/template/img/legal2.jpg') }});"></div>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="display-4 text-white mb-4">Need Legal Assistance?</h2>
                <p class="lead text-white mb-4">Contact us today for a consultation with our experienced legal team.</p>
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
    background: rgba(0, 0, 0, 0.6);
    z-index: 1;
}

.cover .container {
    position: relative;
    z-index: 2;
}

.feature {
    height: 100%;
    transition: transform 0.3s ease;
}

.feature:hover {
    transform: translateY(-10px);
}

.text-primary {
    color: #4a90e2 !important;
}

.feature ul li {
    position: relative;
    padding-left: 1.5rem;
}

.feature ul li i {
    position: absolute;
    left: 0;
    top: 0.25rem;
}
</style>
@endpush
@endsection
