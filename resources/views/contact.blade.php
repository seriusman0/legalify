@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
<!-- Header -->
<section class="cover">
<div class="background-image-holder" style="background-image: url({{ asset('assets/template/img/legal1.jpg') }});"></div>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-4 text-white mb-4">Hubungi Kami</h1>
                <p class="lead text-white">Hubungi tim ahli hukum kami hari ini</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Content -->
<section class="space--sm">
    <div class="container">
        <div class="row">
            <!-- Contact Information -->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="feature">
                    <h3 class="mb-4">Informasi Kontak</h3>
                    <ul class="list-unstyled">
                        <li class="mb-4">
                            <div class="d-flex">
                                <div class="me-3">
                                    <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h5>Alamat Kami</h5>
                                    <p class="mb-0">123 Legal Street, Business District<br>Jakarta, Indonesia</p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-4">
                            <div class="d-flex">
                                <div class="me-3">
                                    <i class="fas fa-phone fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h5>Telepon</h5>
                                    <p class="mb-0">+62 851-7301-0820</p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-4">
                            <div class="d-flex">
                                <div class="me-3">
                                    <i class="fas fa-envelope fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h5>Email</h5>
                                    <p class="mb-0">andreassina9a@gmail.com</p>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <h3 class="mb-4 mt-5">Ikuti Kami</h3>
                    <ul class="social-list">
                        <li><a href="#"><i class="fab fa-facebook fa-2x"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter fa-2x"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram fa-2x"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin fa-2x"></i></a></li>
                    </ul>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="feature">
                    <h3 class="mb-4">Kirim Pesan</h3>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('contact.send') }}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                    id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                    id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="subject" class="form-label">Subjek</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                                    id="subject" name="subject" value="{{ old('subject') }}" required>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="message" class="form-label">Pesan</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" 
                                    id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="space--sm">
    <div class="container">
        <div class="feature p-0">
            <div class="ratio ratio-21x9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126915.06713328245!2d106.7421135!3d-6.2295712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1234567890" 
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
    padding: 2rem;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.text-primary {
    color: #4a90e2 !important;
}

.form-control {
    padding: 0.75rem 1rem;
    border-radius: 4px;
    border: 1px solid #e0e0e0;
}

.form-control:focus {
    border-color: #4a90e2;
    box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
}

.social-list {
    display: flex;
    gap: 1.5rem;
    padding: 0;
    list-style: none;
}

.social-list a {
    color: #4a90e2;
    transition: color 0.3s ease;
}

.social-list a:hover {
    color: #2d5a8e;
}

.btn-primary {
    background-color: #4a90e2;
    border-color: #4a90e2;
    padding: 0.75rem 1.5rem;
    font-weight: 500;
}

.btn-primary:hover {
    background-color: #2d5a8e;
    border-color: #2d5a8e;
}

.alert {
    border-radius: 4px;
    margin-bottom: 2rem;
}
</style>
@endpush
@endsection
