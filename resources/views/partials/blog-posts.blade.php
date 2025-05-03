@php
use Illuminate\Support\Str;
@endphp

<!-- Single Blog Post Card -->
<article class="blog-card group">
    <div class="relative aspect-[16/9] rounded-xl overflow-hidden mb-4">
        @if($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}" 
                 class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition duration-500" 
                 alt="{{ $blog->title }}">
        @else
            <div class="absolute inset-0 bg-blue-100 flex items-center justify-center">
                <i class="fas fa-newspaper text-4xl text-blue-300"></i>
            </div>
        @endif
    </div>
    <div class="p-6 space-y-4">
        <div class="flex items-center gap-4">
            <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm font-medium">
                {{ $blog->category ?? 'Artikel' }}
            </span>
            <span class="text-gray-500 text-sm">
                <i class="far fa-clock mr-1"></i>
                {{ $blog->created_at->format('d M Y') }}
            </span>
        </div>
        <h2 class="text-2xl font-bold group-hover:text-blue-600 transition">
            <a href="{{ route('blog.show', $blog->id) }}">
                {{ $blog->title }}
            </a>
        </h2>
        <p class="text-gray-600">
            {{ Str::limit(strip_tags($blog->content), 150) }}
        </p>
        <div class="flex items-center justify-between pt-4 border-t">
            <div class="flex items-center gap-2">
                @if($blog->user && $blog->user->profile_picture)
                    <img src="{{ asset('storage/' . $blog->user->profile_picture) }}" 
                         class="w-8 h-8 rounded-full object-cover" 
                         alt="{{ $blog->user->name }}">
                @else
                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-user text-blue-300"></i>
                    </div>
                @endif
                <div>
                    <p class="font-medium text-sm">{{ $blog->user->name ?? 'Admin' }}</p>
                    <p class="text-xs text-gray-500">Author</p>
                </div>
            </div>
            <span class="text-gray-500 text-sm">
                <i class="far fa-eye mr-1"></i>
                {{ ceil(str_word_count(strip_tags($blog->content)) / 200) }} min read
            </span>
        </div>
    </div>
</article>
