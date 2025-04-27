@extends('layouts.app')

@section('title', $blog->title)

@section('content')
<!-- Blog Header -->
<section class="cover" style="padding: 6rem 0;">
    <div class="background-image-holder" style="background-image: url({{ asset('assets/template/img/legal2.jpg') }});"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
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
<section class="space--sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <article class="masonry__item">
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid mb-4 rounded" alt="{{ $blog->title }}">
                    @endif
                    
                    <div class="article__body">
                        {!! nl2br(e($blog->content)) !!}
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

.article__body {
    font-size: 1.1rem;
    line-height: 1.8;
}

.article__body p {
    margin-bottom: 1.5rem;
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
    padding: 2rem;
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
