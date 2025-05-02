@extends('layouts.app')

@php
use Illuminate\Support\Str;
@endphp

@section('title', 'Selamat Datang')

@section('content')
<!-- Hero Section -->
<section class="cover cover-features">
<div class="background-image-holder" style="background-image: url({{ asset('assets/template/img/legal1.jpg') }});"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-white mb-4">Urus Legalitas Usaha Tanpa Ribet – Mulai dari PT, CV, hingga Merek Dagang</h1>
                <p class="lead text-white mb-5">Kami bantu Anda mendirikan badan usaha, mengurus perizinan, hingga dokumen hukum dengan proses yang cepat, transparan, dan terpercaya. Cocok untuk UMKM, startup, hingga perseorangan yang ingin legalitas usaha beres tanpa drama.</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('services') }}" class="btn--primary">
                        <i class="fas fa-briefcase me-2"></i>Jelajahi Layanan Kami
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-phone me-2"></i>Hubungi Kami
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
                <h2 class="h1 mb-4">Layanan Kami</h2>
                <p class="lead">Solusi hukum komprehensif untuk individu dan bisnis</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="feature text-center">
                    <div class="mb-4">
                        <i class="fas fa-balance-scale fa-3x text-primary"></i>
                    </div>
                    <h3>Hukum Perusahaan</h3>
                    <p>Panduan ahli untuk bisnis dalam pembentukan, kontrak, dan masalah kepatuhan.</p>
                    <a href="{{ route('services') }}" class="btn--primary">Selengkapnya</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature text-center">
                    <div class="mb-4">
                        <i class="fas fa-gavel fa-3x text-primary"></i>
                    </div>
                    <h3>Litigasi</h3>
                    <p>Representasi kuat dalam proses pengadilan dan penyelesaian sengketa.</p>
                    <a href="{{ route('services') }}" class="btn--primary">Selengkapnya</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature text-center">
                    <div class="mb-4">
                        <i class="fas fa-shield-alt fa-3x text-primary"></i>
                    </div>
                    <h3>Kekayaan Intelektual</h3>
                    <p>Perlindungan untuk inovasi Anda melalui paten, merek dagang, dan hak cipta.</p>
                    <a href="{{ route('services') }}" class="btn--primary">Selengkapnya</a>
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
                <h2 class="h1 mb-4">Wawasan Terbaru</h2>
                <p class="lead">Tetap terinformasi dengan keahlian hukum dan pembaruan industri kami</p>
            </div>
        </div>
        
        <div class="row">
            
            @foreach($latestBlogs as $blog)
            <div class="col-md-4 mb-4">
                <article class="masonry__item d-flex flex-column">
                    @if($blog->image)
                        <img src="{{ asset('.storage/' . $blog->image) }}" class="img-fluid mb-3" alt="{{ e($blog->title) }}">
                    @endif
                    <div class="article__title">
                        <h2 class="h4">{{ e($blog->title) }}</h2>
                        <div class="text-muted mb-3">
                            <small>
                                <i class="fas fa-calendar-alt me-2"></i>
                                {{ $blog->created_at->format('M d, Y') }}
                            </small>
                        </div>
                    </div>
                    <div class="article__body flex-grow-1">
                        {!! nl2br(e(Str::limit(strip_tags($blog->content), 150))) !!}
                    </div>
                    <div class="article__footer mt-3">
                        <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-primary">
                            Baca Selengkapnya <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </article>
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
                <h2 class="display-4 text-white mb-4">Siap Untuk Memulai?</h2>
                <p class="lead text-white mb-4">Hubungi kami hari ini untuk konsultasi dengan ahli hukum kami.</p>
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-paper-plane me-2"></i>Hubungi Kami
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

.article__title h2 {
    color: #2d3748;
    font-weight: 600;
    margin-bottom: 0.5rem;
}
</style>
@endpush
@endsection
