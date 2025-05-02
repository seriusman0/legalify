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
        @if(session('error'))
        <div class="alert alert-danger mb-4">
            {{ session('error') }}
        </div>
        @endif
        <div class="row">
            <!-- Service Packages -->
            @php
                $currentTitle = '';
                $isProcessSection = false;
            @endphp
            
            @foreach($services as $service)
                @if(strpos($service['title'], 'Alur Proses') !== false)
                    @php $isProcessSection = true; @endphp
                    <!-- Process Section -->
                    <div class="col-12 mt-5 mb-5">
                        <h2 class="text-center mb-5">Alur Proses Pendirian Badan Usaha</h2>
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="process-timeline">
                                    @continue
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($isProcessSection && $service['title'])
                    <!-- Process Step -->
                    <div class="col-md-4 mb-4">
                        <div class="process-step text-center">
                            <div class="process-number mb-3">
                                {{ substr($service['title'], 0, 1) }}
                            </div>
                            <h5>{{ substr($service['title'], 3) }}</h5>
                            @php
                                $icon = match(substr($service['title'], 0, 1)) {
                                    '1' => 'fa-comments',
                                    '2' => 'fa-search',
                                    '3' => 'fa-file-signature',
                                    '4' => 'fa-pen-fancy',
                                    '5' => 'fa-stamp',
                                    '6' => 'fa-id-card',
                                    default => 'fa-circle'
                                };
                            @endphp
                            <i class="fas {{ $icon }} fa-2x text-primary mt-3"></i>
                        </div>
                    </div>
                @else
                    @if($service['title'])
                        @if($currentTitle)
                            </div> <!-- Close previous row -->
                            <div class="col-12"><hr class="my-5"></div>
                        @endif
                        
                        @php
                            $currentTitle = $service['title'];
                        @endphp
                        
                        <!-- Service Category Header -->
                        <div class="col-12 mb-4">
                            <h2 class="text-primary border-bottom pb-2">
                                @php
                                    $categoryIcon = match($currentTitle) {
                                        'PT' => 'fa-building',
                                        'PT Perorangan' => 'fa-user-tie',
                                        'PT PMA' => 'fa-globe',
                                        'CV / Firma' => 'fa-handshake',
                                        'Yayasan / Perkumpulan / Koperasi' => 'fa-users',
                                        default => 'fa-briefcase'
                                    };
                                @endphp
                                <i class="fas {{ $categoryIcon }} me-2"></i>
                                {{ $currentTitle }}
                            </h2>
                        </div>
                        <div class="row"> <!-- Start new row for this category -->
                    @endif
                    
                    @if($service['description'])
                        <!-- Service Package -->
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body">
                                    <h4 class="card-title text-primary mb-3">
                                        {{ $service['description'] }}
                                    </h4>
                                    
                                    @if(!empty($service['features']))
                                        @php
                                            $mainFeatures = array_slice($service['features'], 0, -3);
                                            $description = $service['features'][1] ?? '';
                                            $additionalInfo = $service['features'][2] ?? '';
                                            $priceRange = $service['features'][3] ?? '';
                                            $finalPrice = $service['features'][4] ?? '';
                                        @endphp
                                        
                                        <!-- Main Features -->
                                        <p class="text-muted mb-3">{{ $description }}</p>
                                        <div class="features mb-4">
                                            @foreach($mainFeatures as $index => $feature)
                                                @if($index === 0)
                                                    <h6 class="fw-bold mb-2">Includes:</h6>
                                                    <p class="mb-2"><i class="fas fa-check text-success me-2"></i>{{ $feature }}</p>
                                                @endif
                                            @endforeach
                                        </div>
                                        
                                        <!-- Additional Info -->
                                        @if($additionalInfo && $additionalInfo !== '-')
                                            <p class="text-muted small mb-3">{{ $additionalInfo }}</p>
                                        @endif
                                        
                                        <!-- Pricing -->
                                        @if($priceRange)
                                            <div class="pricing mt-auto">
                                                <p class="text-muted mb-1"><s>{{ $priceRange }}</s></p>
                                                <h5 class="text-primary mb-0">{{ $finalPrice }}</h5>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
            
            @if(!$isProcessSection)
                </div> <!-- Close last row if not in process section -->
            @endif
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

/* Base styles */
.text-primary { color: #4a90e2 !important; }
.text-success { color: #28a745 !important; }

/* Card styles */
.card {
    border: none;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
}

.card-body {
    display: flex;
    flex-direction: column;
    height: 100%;
    padding: 1.5rem;
}

.card-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #4a90e2;
}

/* Features and pricing styles */
.features {
    flex-grow: 1;
}

.pricing {
    margin-top: auto;
    padding-top: 1rem;
    border-top: 1px solid rgba(0,0,0,.1);
}

s {
    color: #6c757d;
    font-size: 0.9rem;
}

/* Section headers */
h2.text-primary {
    font-size: 1.75rem;
    margin-top: 1rem;
    position: relative;
}

/* Process section styles */
.process-step {
    position: relative;
    padding: 2rem;
    height: 100%;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.process-step:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
}

.process-number {
    width: 40px;
    height: 40px;
    background: #4a90e2;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    font-weight: bold;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

.process-step h5 {
    color: #2c3e50;
    font-size: 1.1rem;
    margin: 1rem 0;
    font-weight: 600;
}

.process-timeline {
    position: relative;
    padding: 2rem 0;
}

.process-timeline::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 2px;
    background: rgba(74, 144, 226, 0.2);
    z-index: 1;
}

.process-step i {
    color: #4a90e2;
    opacity: 0.9;
}

/* Service category icons */
h2.text-primary i {
    font-size: 1.5rem;
    vertical-align: middle;
    margin-top: -3px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .card-body {
        padding: 1rem;
    }
    
    .process-step {
        padding: 1rem;
    }
    
    .process-timeline::before {
        left: 20px;
    }
}
</style>
@endpush
@endsection
