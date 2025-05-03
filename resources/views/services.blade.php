@extends('layouts.app')

@section('title', 'Layanan Kami')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-600 to-blue-700 py-20">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="container relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl font-bold text-white mb-6">Solusi Legalitas Bisnis Terpercaya</h1>
            <p class="text-xl text-blue-100 mb-8">Layanan pendirian dan perizinan usaha yang disesuaikan dengan kebutuhan Anda</p>
            <div class="bg-white rounded-xl p-4 shadow-lg max-w-2xl mx-auto">
                <form class="flex gap-4">
                    <input type="text" class="flex-1 px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-blue-500" placeholder="Cari layanan atau perizinan...">
                    <button class="btn btn-primary">
                        <i class="fas fa-search mr-2"></i>
                        Cari
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-20">
    <div class="container">
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

        <!-- Service Categories -->
        <div class="space-y-16">
            @foreach($services as $service)
                @if(isset($service['is_process']) && $service['is_process'])
                    <!-- Process Section -->
                    <div class="bg-gray-50 rounded-3xl p-12">
                        <div class="text-center max-w-3xl mx-auto mb-12">
                            <h2 class="text-3xl font-bold text-gray-900 mb-4">Alur Proses Pendirian Badan Usaha</h2>
                            <p class="text-lg text-gray-600">Proses mudah dan transparan dalam 6 langkah sederhana</p>
                        </div>
                        <div class="grid md:grid-cols-3 lg:grid-cols-6 gap-8">
                            @foreach($service['steps'] as $step)
                                @php
                                    $stepNumber = substr($step['title'], 0, 1);
                                    $stepTitle = substr($step['title'], strpos($step['title'], '.') + 2);
                                    $icon = match($stepNumber) {
                                        '1' => 'fa-comments',
                                        '2' => 'fa-search',
                                        '3' => 'fa-file-signature',
                                        '4' => 'fa-pen-fancy',
                                        '5' => 'fa-stamp',
                                        '6' => 'fa-id-card',
                                        default => 'fa-circle'
                                    };
                                @endphp
                                <div class="relative">
                                    @if(!$loop->last)
                                        <div class="hidden lg:block absolute top-8 left-full w-full border-t-2 border-dashed border-blue-200"></div>
                                    @endif
                                    <div class="bg-white rounded-xl p-6 text-center relative z-10">
                                        <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <i class="fas {{ $icon }} text-xl"></i>
                                        </div>
                                        <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4">
                                            {{ $stepNumber }}
                                        </div>
                                        <h3 class="font-semibold text-gray-900">{{ $stepTitle }}</h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @elseif(!isset($service['is_process']))
                    @continue
                @else
                    <!-- Service Category -->
                    <div>
                        <div class="flex items-center gap-4 mb-8">
                            @php
                                $categoryIcon = match($service['title']) {
                                    'PT' => 'fa-building',
                                    'PT Perorangan' => 'fa-user-tie',
                                    'PT PMA' => 'fa-globe',
                                    'CV / Firma' => 'fa-handshake',
                                    'Yayasan / Perkumpulan / Koperasi' => 'fa-users',
                                    default => 'fa-briefcase'
                                };
                            @endphp
                            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center">
                                <i class="fas {{ $categoryIcon }} text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">{{ $service['title'] }}</h2>
                                <p class="text-gray-600">Pilih paket yang sesuai dengan kebutuhan Anda</p>
                            </div>
                        </div>
                        
                        <div class="grid md:grid-cols-3 gap-8">
                            @foreach($service['packages'] as $package)
                                <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-200 overflow-hidden">
                                    @if($package['type'] === 'Premium')
                                        <div class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white text-center py-1 text-sm font-medium">
                                            Terpopuler
                                        </div>
                                    @endif
                                    <div class="p-8">
                                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $package['type'] }}</h3>
                                        <p class="text-gray-600 mb-6">{{ $package['description'] }}</p>
                                        <div class="mb-8">
                                            <div class="text-gray-500 line-through">{{ $package['price_range'] }}</div>
                                            <div class="text-3xl font-bold text-blue-600">{{ $package['final_price'] }}</div>
                                        </div>
                                        <ul class="space-y-4 mb-8">
                                            @foreach($package['main_features'] as $feature)
                                                <li class="flex items-start gap-3">
                                                    <i class="fas fa-check-circle text-blue-600 mt-1"></i>
                                                    <span class="text-gray-600">{{ $feature }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <a href="#" class="btn btn-primary w-full justify-center">Pilih Paket</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gray-50">
    <div class="container">
        <div class="text-center max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Butuh Bantuan?</h2>
            <p class="text-lg text-gray-600 mb-8">Tim kami siap membantu Anda memilih solusi yang tepat untuk bisnis Anda</p>
            <a href="{{ route('contact') }}" class="btn btn-primary">
                <i class="fas fa-paper-plane mr-2"></i>
                Hubungi Kami
            </a>
        </div>
    </div>
</section>
@endsection
