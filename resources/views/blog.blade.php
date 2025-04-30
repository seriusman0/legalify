@extends('layouts.app')
@php
use Illuminate\Support\Str;
@endphp

@section('title', 'Blog')

@section('content')
<!-- Header -->
<section class="cover">
<div class="background-image-holder" style="background-image: url({{ asset('assets/template/img/legal1.jpg') }});"></div>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-4 text-white mb-4">Wawasan & Pembaruan Hukum</h1>
                <p class="lead text-white">Tetap terinformasi dengan berita hukum terbaru, wawasan, dan pembaruan industri dari tim ahli kami.</p>
            </div>
        </div>
    </div>
</section>

<!-- Blog Posts -->
<section class="space--sm">
    <div class="container">
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-md-4 mb-4">
                <article class="masonry__item d-flex flex-column">
                    @if($blog->image)
                        <img src="{{ asset('.storage/' . $blog->image) }}" class="img-fluid mb-3" alt="{{ $blog->title }}">
                    @endif
                    <div class="article__title">
                        <h2 class="h4">{{ $blog->title }}</h2>
                        <div class="text-muted mb-3">
                            <small>
                                <i class="fas fa-calendar-alt me-2"></i>
                                {{ $blog->created_at->format('M d, Y') }}
                            </small>
                        </div>
                    </div>
                    <div class="article__body flex-grow-1">
                        {{ Str::limit(strip_tags($blog->content), 150) }}
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

        <!-- Pagination -->
        @if($blogs->hasPages())
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center">
                {{ $blogs->links() }}
            </div>
        </div>
        @endif
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

.masonry__item {
    height: 100%;
    transition: transform 0.3s ease;
    background: #fff;
    padding: 1.5rem;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
}

.masonry__item .article__body {
    flex: 1 0 auto;
    white-space: pre-line;
}

.masonry__item:hover {
    transform: translateY(-10px);
}

.article__body {
    margin-bottom: 1rem;
}

.btn-primary {
    background-color: #4a90e2;
    border-color: #4a90e2;
    padding: 0.5rem 1rem;
    border-radius: 4px;
    color: white;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #357abd;
    border-color: #357abd;
    color: white;
}

.article__title h2 {
    margin-bottom: 0.5rem;
}

/* Pagination Styling */
.pagination {
    gap: 0.5rem;
}

.page-link {
    border-radius: 4px;
    padding: 0.75rem 1rem;
    color: #4a90e2;
    border: 1px solid #4a90e2;
}

.page-item.active .page-link {
    background-color: #4a90e2;
    border-color: #4a90e2;
}

.page-link:hover {
    background-color: #4a90e2;
    color: white;
}
</style>
@endpush
@endsection
