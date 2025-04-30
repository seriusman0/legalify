@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<!-- Header -->
<section class="cover">
<div class="background-image-holder" style="background-image: url({{ asset('assets/template/img/legal1.jpg') }});"></div>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-4 text-white mb-4">Tentang Legalify</h1>
                <p class="lead text-white">Partner Hukum Terpercaya untuk Kesuksesan Anda</p>
            </div>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="space--sm">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="{{ asset('assets/icons/logo2.jpeg') }}" alt="About Legalify" class="img-fluid rounded shadow-lg">
            </div>
            <div class="col-lg-6">
                <div class="feature">
                    <h2 class="mb-4">Cerita Kami</h2>
                    <p class="lead mb-4">Didirikan dengan visi untuk membuat layanan hukum lebih mudah diakses dan transparan, Legalify telah berkembang menjadi nama yang dipercaya di industri hukum.</p>
                    <p>Kami menggabungkan pengalaman bertahun-tahun dalam bidang hukum dengan teknologi modern untuk memberikan solusi hukum yang efisien dan efektif bagi klien kami. Komitmen kami terhadap keunggulan dan kepuasan klien telah menjadikan kami pilihan utama bagi bisnis dan individu.</p>
                </div>
            </div>
        </div>

        <!-- Values -->
        <div class="row mt-5">
            <div class="col-12 text-center mb-5">
                <h2>Nilai-Nilai Utama Kami</h2>
                <p class="lead">Prinsip-prinsip yang memandu praktik kami</p>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="feature text-center">
                    <div class="mb-4">
                        <i class="fas fa-balance-scale fa-3x text-primary"></i>
                    </div>
                    <h3>Integritas</h3>
                    <p>Kami menjunjung tinggi standar etika dalam setiap urusan, memastikan transparansi dan kejujuran dalam setiap interaksi.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="feature text-center">
                    <div class="mb-4">
                        <i class="fas fa-handshake fa-3x text-primary"></i>
                    </div>
                    <h3>Keunggulan</h3>
                    <p>Kami berusaha untuk mencapai keunggulan dalam setiap aspek pekerjaan kami, memberikan layanan hukum berkualitas tinggi secara konsisten.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="feature text-center">
                    <div class="mb-4">
                        <i class="fas fa-users fa-3x text-primary"></i>
                    </div>
                    <h3>Fokus pada Klien</h3>
                    <p>Kesuksesan klien adalah prioritas kami. Kami bekerja tanpa lelah untuk mencapai hasil terbaik bagi mereka.</p>
                </div>
            </div>
        </div>

        <!-- Team -->
        <div class="row mt-5">
            <div class="col-12 text-center mb-5">
                <h2>Tim Kepemimpinan Kami</h2>
                <p class="lead">Kenali para ahli di balik kesuksesan kami</p>
            </div>
            
            <div class="col-md-4 mb-4 mx-auto">
                <div class="feature text-center">
                    <img src="{{ asset('assets/images/author.png') }}" alt="Team Member" class="img-fluid rounded-circle mb-4" style="width: 200px; height: 200px; object-fit: cover;">
                    <h3>Andreas</h3>
                    <p class="text-primary mb-2">Founder</p>
                    <p>Spesialis Hukum Perusahaan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cover">
<div class="background-image-holder" style="background-image: url({{ asset('assets/template/img/legal2.jpg') }});"></div>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="display-4 text-white mb-4">Siap Bekerja Sama?</h2>
                <p class="lead text-white mb-4">Mari diskusikan bagaimana kami dapat membantu Anda mencapai tujuan hukum Anda.</p>
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
    background: rgba(0, 0, 0, 0.6);
    z-index: 1;
}

.cover .container {
    position: relative;
    z-index: 2;
}

.feature {
    height: 100%;
    transition: transform 0.3s ease;
}

.feature:hover {
    transform: translateY(-10px);
}

.text-primary {
    color: #4a90e2 !important;
}

.rounded-circle {
    border: 5px solid #fff;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
}
</style>
@endpush
@endsection
