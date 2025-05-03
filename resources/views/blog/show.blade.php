@extends('layouts.app')

@section('title', $blog->title)

@section('content')
<!-- Blog Header -->
<section class="cover position-relative" style="padding: 6rem 0; background-color: #1a1a1a;">
    <div class="background-image-holder" style="background-image: url({{ asset('assets/images/author.png') }}); opacity: 0.4;"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-4 text-white mb-4">{{ $blog->title }}</h1>
                <div class="text-white mb-4">
                    <span class="me-3">
                        <i class="fas fa-calendar-alt me-2"></i>
                        {{ $blog->created_at->format('d M Y') }}
                    </span>
                    <span>
                        <i class="fas fa-user me-2"></i>
                        Penulis: {{ $blog->user->name }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Content -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <article class="masonry__item">
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid mb-4 rounded" alt="{{ $blog->title }}">
                    @endif
                    
                    <div class="article__body blog-content">
                        {!! $blog->content !!}
                    </div>

                    <!-- Tags or Categories if available -->
                    <div class="mt-5">
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <a href="{{ route('user.blog') }}" class="btn--primary">
                                    <i class="fas fa-arrow-left me-2"></i>
                                    Kembali ke Blog
                                </a>
                            </div>
                            <div class="social-list">
                                <a href="#" onclick="share('facebook')" class="me-2">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a href="#" onclick="share('twitter')" class="me-2">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" onclick="share('linkedin')">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

@push('css')
<style>
.background-image-holder {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    z-index: 0;
}

.cover .container {
    position: relative;
    z-index: 1;
}

.masonry__item {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    margin-top: -4rem;
    padding: 2.5rem;
}

@media (max-width: 768px) {
    .masonry__item {
        padding: 1.5rem;
        margin-top: -2rem;
    }
}

.article__body {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #2c3e50;
    max-width: 100%;
}

.article__body > * {
    margin-bottom: 1.5rem;
}

.article__body > *:last-child {
    margin-bottom: 0;
}

.blog-content {
    word-wrap: break-word;
    overflow-wrap: break-word;
}

.blog-content img {
    max-width: 100%;
    height: auto;
    margin: 1rem 0;
}

.blog-content h1, 
.blog-content h2, 
.blog-content h3, 
.blog-content h4, 
.blog-content h5, 
.blog-content h6 {
    margin: 1.5rem 0 1rem;
    font-weight: 600;
}

.blog-content ul,
.blog-content ol {
    margin-bottom: 1.5rem;
    padding-left: 2rem;
}

.blog-content blockquote {
    margin: 1.5rem 0;
    padding: 1rem 1.5rem;
    border-left: 4px solid #4a90e2;
    background-color: #f8f9fa;
    font-style: italic;
}

.blog-content pre {
    background-color: #f8f9fa;
    padding: 1rem;
    border-radius: 4px;
    overflow-x: auto;
}

.social-list a {
    color: #4a90e2;
    font-size: 1.2rem;
    transition: color 0.3s ease;
}

.social-list a:hover {
    color: #2d5a8e;
}

.masonry__item {
    padding: 2rem 3rem;
    
    @media (max-width: 768px) {
        padding: 1.5rem;
    }
}
</style>
@endpush

@push('scripts')
<script>
function share(platform) {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent('{{ $blog->title }}');
    
    let shareUrl = '';
    switch(platform) {
        case 'facebook':
            shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
            break;
        case 'twitter':
            shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${title}`;
            break;
        case 'linkedin':
            shareUrl = `https://www.linkedin.com/shareArticle?mini=true&url=${url}&title=${title}`;
            break;
    }
    
    window.open(shareUrl, '_blank', 'width=600,height=400');
    return false;
}
</script>
@endpush
@endsection
