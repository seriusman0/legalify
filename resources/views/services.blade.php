@extends('layouts.app')

@section('title', 'Layanan Kami')

@section('content')
<!-- Header -->
<section class="cover">
    <div class="background-image-holder" style="background-image: url({{ asset('assets/template/img/legal1.jpg') }});"></div>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-4 text-white mb-4">Layanan Hukum Kami</h1>
                <p class="lead text-white">Solusi hukum komprehensif yang disesuaikan dengan kebutuhan spesifik Anda</p>
            </div>
        </div>
    </div>
</section>

<!-- Services -->
<section class="space--sm">
    <div class="container">
        <div class="row">
            <!-- Corporate Law -->
            <div class="col-md-6 mb-4">
                <div class="feature">
                    <div class="d-flex align-items-center mb-4">
                        <div class="me-4">
                            <i class="fas fa-balance-scale fa-2x text-primary"></i>
                        </div>
                        <h3 class="mb-0">Hukum Perusahaan</h3>
                    </div>
                    <p>Layanan hukum perusahaan kami meliputi:</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Pembentukan & Struktur Bisnis</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Pembuatan & Review Kontrak</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Tata Kelola Perusahaan</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Merger & Akuisisi</li>
                    </ul>
                </div>
            </div>

            <!-- Litigation -->
            <div class="col-md-6 mb-4">
                <div class="feature">
                    <div class="d-flex align-items-center mb-4">
                        <div class="me-4">
                            <i class="fas fa-gavel fa-2x text-primary"></i>
                        </div>
                        <h3 class="mb-0">Litigasi</h3>
                    </div>
                    <p>Layanan litigasi kami meliputi:</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Litigasi Perdata</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Sengketa Komersial</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Alternatif Penyelesaian Sengketa</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Banding</li>
                    </ul>
                </div>
            </div>

            <!-- Intellectual Property -->
            <div class="col-md-6 mb-4">
                <div class="feature">
                    <div class="d-flex align-items-center mb-4">
                        <div class="me-4">
                            <i class="fas fa-shield-alt fa-2x text-primary"></i>
                        </div>
                        <h3 class="mb-0">Kekayaan Intelektual</h3>
                    </div>
                    <p>Layanan KI kami meliputi:</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Pendaftaran Paten</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Pendaftaran Merek Dagang</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Perlindungan Hak Cipta</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Litigasi KI</li>
                    </ul>
                </div>
            </div>

            <!-- Employment Law -->
            <div class="col-md-6 mb-4">
                <div class="feature">
                    <div class="d-flex align-items-center mb-4">
                        <div class="me-4">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                        <h3 class="mb-0">Hukum Ketenagakerjaan</h3>
                    </div>
                    <p>Layanan hukum ketenagakerjaan kami meliputi:</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Kontrak Kerja</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Kebijakan Tempat Kerja</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Klaim Diskriminasi</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Perselisihan Ketenagakerjaan</li>
                    </ul>
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
                <h2 class="display-4 text-white mb-4">Butuh Bantuan Hukum?</h2>
                <p class="lead text-white mb-4">Hubungi kami hari ini untuk konsultasi dengan tim hukum berpengalaman kami.</p>
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

.feature ul li {
    position: relative;
    padding-left: 1.5rem;
}

.feature ul li i {
    position: absolute;
    left: 0;
    top: 0.25rem;
}
</style>
@endpush
@endsection
