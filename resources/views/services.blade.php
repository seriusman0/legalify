@extends('layouts.app')

@section('title', 'Layanan Kami')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-600 to-blue-700 py-20">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="container relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl font-bold text-white mb-6">Berbagai Paket Pilih paket terbaik untuk bisnis anda</h1>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-20">
    <div class="container max-w-6xl mx-auto px-4">
        @if(session('error'))
        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-8">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-circle text-red-500"></i>
                </div>
                <div class="ml-3">
                    <p class="text-red-700">{{ session('error') }}</p>
                </div>
            </div>
        </div>
        @endif

        <!-- Service Categories Tabs -->
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            @foreach($services as $service)
                @if(!isset($service['is_process']) || $service['is_process'])
                    @continue
                @endif
                <button 
                    onclick="showCategory('{{ str_replace(' ', '', $service['title']) }}')"
                    class="tab-button px-6 py-2 rounded-full text-sm font-medium {{ $loop->first ? 'bg-blue-500 text-white' : 'bg-white text-blue-500 border border-blue-100' }} hover:bg-blue-500 hover:text-white transition-all duration-200">
                    {{ $service['title'] }}
                </button>
            @endforeach
        </div>

        <!-- Service Categories Content -->
        <div>
            @foreach($services as $service)
                @if(!isset($service['is_process']) || $service['is_process'])
                    @continue
                @endif
                <div id="{{ str_replace(' ', '', $service['title']) }}" class="service-category {{ !$loop->first ? 'hidden' : '' }}">
                    <div class="grid md:grid-cols-3 gap-6">
                        @foreach($service['packages'] as $package)
                            <div class="bg-white rounded-2xl border border-gray-100 hover:border-blue-500 transition-all duration-200 overflow-hidden">
                                <!-- Package Label -->
                                <div class="text-center py-2 {{ $package['type'] === 'Premium' ? 'bg-blue-500 text-white' : 'bg-gray-50' }}">
                                    {{ $package['type'] }}
                                </div>
                                
                                <!-- Package Content -->
                                <div class="p-6">
                                    <!-- Price -->
                                    <div class="mb-6">
                                        <div class="flex items-baseline justify-center">
                                            <span class="text-lg mr-1">Rp</span>
                                            @if(preg_match('/(\d+)(?:\s*jt|\s*juta)/', $package['final_price'], $matches))
                                                <span class="text-6xl font-bold">{{ $matches[1] }}</span>
                                                <span class="text-2xl ml-1">jt</span>
                                            @else
                                                <span class="text-6xl font-bold">{{ $package['final_price'] }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Features -->
                                    <ul class="space-y-4 mb-8 min-h-[280px]">
                                        @foreach($package['main_features'] as $feature)
                                            <li class="flex items-start gap-3">
                                                <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                                <span class="text-gray-600 text-sm">{{ $feature }}</span>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <!-- Action Button -->
                                    <a href="https://wa.me/6285173010820?text=Halo%20Legalify%2C%20saya%20tertarik%20dengan%20paket%20{{ urlencode($package['type']) }}%20untuk%20{{ urlencode($service['title']) }}" 
                                       class="block w-full py-3 text-center rounded-lg {{ $package['type'] === 'Premium' ? 'bg-blue-500 text-white hover:bg-blue-600' : 'border border-blue-500 text-blue-500 hover:bg-blue-50' }} transition-all duration-200"
                                       target="_blank">
                                        Pilih Paket
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@push('scripts')
<script>
function showCategory(categoryId) {
    // Hide all categories
    document.querySelectorAll('.service-category').forEach(category => {
        category.classList.add('hidden');
    });
    
    // Show selected category
    document.getElementById(categoryId).classList.remove('hidden');
    
    // Update active tab
    document.querySelectorAll('.tab-button').forEach(tab => {
        if (tab.getAttribute('onclick').includes(categoryId)) {
            tab.classList.remove('bg-white', 'text-blue-500', 'border');
            tab.classList.add('bg-blue-500', 'text-white');
        } else {
            tab.classList.remove('bg-blue-500', 'text-white');
            tab.classList.add('bg-white', 'text-blue-500', 'border', 'border-blue-100');
        }
    });
}
</script>
@endpush
@endsection
