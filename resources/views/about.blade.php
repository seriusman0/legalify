@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-600 to-blue-700 py-20">
    <div class="absolute inset-0 bg-blue-600/90"></div>
    <div class="container relative z-10">
        <div class="max-w-3xl mx-auto text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Tentang Kami</h1>
            <p class="text-xl text-blue-100">Partner terpercaya untuk kebutuhan legal bisnis Anda</p>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-20">
    <div class="container">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <img src="{{ asset('assets/template/img/legal2.jpg') }}" alt="About Us" class="rounded-2xl shadow-lg">
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Mengapa Memilih Legalify?</h2>
                <p class="text-lg text-gray-600 mb-8">
                    Legalify hadir sebagai solusi terpercaya untuk membantu Anda dalam mengurus berbagai kebutuhan legal bisnis. 
                    Dengan pengalaman dan tim profesional, kami berkomitmen memberikan layanan terbaik dengan proses yang cepat, 
                    transparan, dan terpercaya.
                </p>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-check-circle text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-2">Berpengalaman</h3>
                            <p class="text-gray-600">Tim ahli dengan pengalaman bertahun-tahun</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-clock text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-2">Proses Cepat</h3>
                            <p class="text-gray-600">Pengurusan dokumen yang efisien</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-shield-alt text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-2">Terpercaya</h3>
                            <p class="text-gray-600">Jaminan keamanan dan legalitas</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-headset text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-2">Support 24/7</h3>
                            <p class="text-gray-600">Dukungan penuh untuk klien</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-gray-50">
    <div class="container">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Tim Kami</h2>
            <p class="text-lg text-gray-600">Dipimpin oleh profesional yang berpengalaman dalam bidang legal bisnis</p>
        </div>
        
        <div class="max-w-lg mx-auto">
            <div class="bg-white p-8 rounded-2xl shadow-sm text-center">
                <img src="{{ asset('assets/images/author.png') }}" alt="Andreas" class="w-40 h-40 rounded-full mx-auto mb-6 object-cover">
                <h3 class="text-2xl font-semibold text-gray-900 mb-2">Andreas</h3>
                <p class="text-blue-600 mb-4">Founder & Legal Consultant</p>
                <p class="text-gray-600 mb-6">Berpengalaman lebih dari 5 tahun dalam bidang konsultasi legal dan pendirian badan usaha. Berkomitmen untuk memberikan solusi terbaik bagi setiap klien.</p>
                <div class="flex justify-center gap-4">
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20">
    <div class="container">
        <div class="grid md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2">500+</div>
                <p class="text-gray-600">Klien Puas</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2">1000+</div>
                <p class="text-gray-600">Proyek Selesai</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2">10+</div>
                <p class="text-gray-600">Tahun Pengalaman</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2">24/7</div>
                <p class="text-gray-600">Dukungan Klien</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-blue-700 relative overflow-hidden">
    <div class="absolute inset-0 bg-blue-600/90"></div>
    <div class="container relative z-10">
        <div class="text-center max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-white mb-4">Mulai Perjalanan Bisnis Anda</h2>
            <p class="text-xl text-blue-100 mb-8">Konsultasikan kebutuhan legal bisnis Anda dengan tim ahli kami</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 bg-white text-blue-600 rounded-lg font-semibold hover:bg-blue-50 transition-all duration-200">
                Konsultasi Gratis
            </a>
        </div>
    </div>
</section>
@endsection
