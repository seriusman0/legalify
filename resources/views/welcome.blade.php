@extends('layouts.app')

@section('title', 'Selamat Datang')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-600 to-blue-700 py-24">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="container relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center min-h-[70vh]">
            <div class="text-white">
                <h1 class="text-5xl font-bold leading-tight mb-6">
                    Urus Legalitas Usaha Tanpa Ribet
                </h1>
                <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                    Kami bantu Anda mendirikan badan usaha, mengurus perizinan, hingga dokumen hukum dengan proses yang cepat, transparan, dan terpercaya.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('services') }}" class="btn btn-primary">
                        Mulai Sekarang
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline text-white border-white hover:bg-white/10">
                        Konsultasi Gratis
                    </a>
                </div>
            </div>
            <div class="relative hidden lg:block">
                <div class="absolute -top-12 -right-12 w-64 h-64 bg-blue-400/20 rounded-full blur-2xl"></div>
                <div class="absolute -bottom-8 -left-8 w-48 h-48 bg-blue-500/20 rounded-full blur-xl"></div>
                <img src="{{ asset('assets/template/img/legal1.jpg') }}" alt="Legal Services" class="relative z-10 rounded-2xl shadow-xl w-full">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gray-50">
    <div class="container">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Mengapa Memilih Legalify ID?</h2>
        </div>
        
        <div class="grid md:grid-cols-2 gap-8">
            <div class="feature-card">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-building-shield text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Layanan Legalitas Usaha Terpadu</h3>
                <p class="text-gray-600">Legalify ID menghadirkan solusi menyeluruh untuk kebutuhan legalitas usaha Anda—mulai dari pendirian PT, CV, PMA, hingga pengurusan izin usaha, virtual office, HKI, perpajakan, dan perjanjian hukum. Semua dapat diakses dalam satu platform praktis dan terpercaya.</p>
            </div>

            <div class="feature-card">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-user-tie text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Didukung Tim Legal Profesional</h3>
                <p class="text-gray-600">Seluruh layanan Legalify ID dikerjakan oleh tim legal yang kompeten, berpengalaman, dan memahami regulasi bisnis di Indonesia. Kami memastikan setiap dokumen dan proses sesuai dengan ketentuan hukum yang berlaku.</p>
            </div>

            <div class="feature-card">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-bolt text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Cepat, Transparan, dan Efisien</h3>
                <p class="text-gray-600">Kami mengutamakan kecepatan tanpa mengorbankan akurasi. Dengan sistem kerja yang terstruktur dan transparan, Anda dapat memantau setiap progres layanan tanpa khawatir biaya tambahan tersembunyi.</p>
            </div>

            <div class="feature-card">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-handshake text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Pendamping Legal Jangka Panjang</h3>
                <p class="text-gray-600">Legalify ID tidak hanya membantu di awal pendirian usaha. Kami hadir sebagai mitra legal Anda dalam pengelolaan dan pengembangan bisnis jangka panjang, melalui layanan retainer hukum dan pembaruan legalitas secara berkala.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-20">
    <div class="container">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Layanan Kami</h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="service-card">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-building text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Pendirian PT</h3>
                <p class="text-gray-600 mb-6">Layanan pendirian PT dengan proses cepat dan terpercaya</p>
                <a href="{{ route('services') }}" class="text-blue-600 font-medium hover:text-blue-700 inline-flex items-center gap-2">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="service-card">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-file-signature text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Pendirian CV</h3>
                <p class="text-gray-600 mb-6">Layanan pendirian CV dengan proses mudah dan terpercaya</p>
                <a href="{{ route('services') }}" class="text-blue-600 font-medium hover:text-blue-700 inline-flex items-center gap-2">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="service-card">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-trademark text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Merek Dagang</h3>
                <p class="text-gray-600 mb-6">Layanan pendaftaran merek dagang untuk bisnis Anda</p>
                <a href="{{ route('services') }}" class="text-blue-600 font-medium hover:text-blue-700 inline-flex items-center gap-2">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-blue-700 relative overflow-hidden">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="container relative z-10">
        <div class="text-center max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-white mb-4">Siap Memulai?</h2>
            <p class="text-xl text-blue-100 mb-8">Konsultasikan kebutuhan legal bisnis Anda dengan tim kami</p>
            <a href="{{ route('contact') }}" class="btn btn-primary bg-white text-blue-600 hover:bg-blue-50">
                Konsultasi Gratis
            </a>
        </div>
    </div>
</section>
@endsection
