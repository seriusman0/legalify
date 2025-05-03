@extends('layouts.app')
@php
use Illuminate\Support\Str;
@endphp

@section('title', 'Blog')

@section('content')
<!-- Header -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 py-16">
    <div class="container">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Wawasan & Pembaruan Hukum</h1>
            <p class="text-xl text-blue-100">Tetap terinformasi dengan berita hukum terbaru, wawasan, dan pembaruan industri dari tim ahli kami.</p>
        </div>
    </div>
</section>

<!-- Category Filter -->
<div class="sticky top-16 bg-white border-b z-30">
    <div class="container py-4">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
            <div class="flex flex-wrap items-center gap-4">
                <span class="text-gray-600 whitespace-nowrap">Filter:</span>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('user.blog') }}" class="category-tag {{ !request('category') ? 'active' : '' }}">Semua</a>
                    <a href="{{ route('user.blog', ['category' => 'hukum-bisnis']) }}" class="category-tag {{ request('category') == 'hukum-bisnis' ? 'active' : '' }}">Hukum Bisnis</a>
                    <a href="{{ route('user.blog', ['category' => 'perizinan']) }}" class="category-tag {{ request('category') == 'perizinan' ? 'active' : '' }}">Perizinan</a>
                    <a href="{{ route('user.blog', ['category' => 'haki']) }}" class="category-tag {{ request('category') == 'haki' ? 'active' : '' }}">HAKI</a>
                    <a href="{{ route('user.blog', ['category' => 'startup']) }}" class="category-tag {{ request('category') == 'startup' ? 'active' : '' }}">Startup</a>
                </div>
            </div>
            <form action="{{ route('user.blog') }}" method="GET" class="w-full md:w-auto relative">
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}"
                       placeholder="Cari artikel..." 
                       class="w-full md:w-64 pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>
</div>

@if($blogs->count() > 0)
    <!-- Featured Article -->
    <section class="py-12 bg-gray-50">
        <div class="container">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="relative aspect-[16/9] rounded-2xl overflow-hidden shadow-lg">
                    @if($blogs->first()->image)
                        <img src="{{ asset('storage/' . $blogs->first()->image) }}" 
                             class="absolute inset-0 w-full h-full object-cover" 
                             alt="{{ $blogs->first()->title }}">
                    @else
                        <div class="absolute inset-0 bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-newspaper text-6xl text-blue-300"></i>
                        </div>
                    @endif
                </div>
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm font-medium">
                            {{ $blogs->first()->category ?? 'Artikel' }}
                        </span>
                        <span class="text-gray-500 text-sm">
                            <i class="far fa-clock mr-1"></i>
                            {{ $blogs->first()->created_at->format('d M Y') }}
                        </span>
                    </div>
                    <h2 class="text-3xl font-bold hover:text-blue-600 transition">
                        <a href="{{ route('blog.show', $blogs->first()->id) }}">
                            {{ $blogs->first()->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600 text-lg">
                        {{ Str::limit(strip_tags($blogs->first()->content), 200) }}
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2">
                            @if($blogs->first()->user && $blogs->first()->user->profile_picture)
                                <img src="{{ asset('storage/' . $blogs->first()->user->profile_picture) }}" 
                                     class="w-10 h-10 rounded-full object-cover" 
                                     alt="{{ $blogs->first()->user->name }}">
                            @else
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                    <i class="fas fa-user text-blue-300"></i>
                                </div>
                            @endif
                            <div>
                                <p class="font-medium">{{ $blogs->first()->user->name ?? 'Admin' }}</p>
                                <p class="text-sm text-gray-500">Author</p>
                            </div>
                        </div>
                        <span class="text-gray-500 text-sm">
                            <i class="far fa-eye mr-1"></i>
                            {{ ceil(str_word_count(strip_tags($blogs->first()->content)) / 200) }} min read
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Posts Grid -->
    <section class="py-12">
        <div class="container">
            <div class="grid md:grid-cols-2 gap-8">
                @foreach($blogs->skip(1) as $blog)
                    @include('partials.blog-posts', ['blog' => $blog])
                @endforeach
            </div>

            <!-- Pagination -->
            @if($blogs->hasPages())
            <div class="mt-12">
                {{ $blogs->appends(request()->query())->links() }}
            </div>
            @endif
        </div>
    </section>
@else
    <div class="py-12">
        <div class="container">
            <div class="text-center">
                <div class="text-6xl text-gray-300 mb-4">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-600 mb-2">Belum ada artikel</h3>
                <p class="text-gray-500">Artikel sedang dalam proses penulisan. Silakan kembali lagi nanti.</p>
            </div>
        </div>
    </div>
@endif

@push('css')
<style>
.category-tag {
    @apply px-4 py-2 rounded-full text-sm font-medium transition;
    @apply text-gray-600 hover:text-blue-600 hover:bg-blue-50;
}

.category-tag.active {
    @apply bg-blue-600 text-white hover:text-white hover:bg-blue-700;
}

.blog-card {
    @apply bg-white rounded-xl overflow-hidden transition duration-300;
    @apply border border-gray-100 hover:shadow-xl;
}

/* Pagination Styling */
.pagination {
    @apply flex justify-center items-center gap-2;
}

.page-link {
    @apply px-4 py-2 rounded-lg transition;
    @apply text-gray-600 hover:text-blue-600 hover:bg-blue-50;
}

.page-item.active .page-link {
    @apply bg-blue-600 text-white hover:text-white hover:bg-blue-700;
}

.page-item.disabled .page-link {
    @apply text-gray-400 cursor-not-allowed hover:bg-transparent hover:text-gray-400;
}
</style>
@endpush
@endsection
