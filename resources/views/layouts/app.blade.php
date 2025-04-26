<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Legalify</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Template CSS -->
    <link href="{{ asset('assets/template/css/theme.css') }}" rel="stylesheet">
    
    @stack('css')
</head>
<body>
    <!-- Navigation -->
    <div class="nav-container">
        <div class="container">
            <nav class="d-flex justify-content-between align-items-center py-3">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('assets/icons/legalifylogoblack.png') }}" alt="Legalify" class="logo">
                </a>
                <div class="d-none d-lg-block">
                    <ul class="menu-horizontal">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('services') }}">Services</a></li>
                        <li><a href="{{ route('user.blog') }}">Blog</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>
        <!-- Mobile Navigation -->
        <div class="collapse" id="mobileNav">
            <div class="container py-3">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('services') }}">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.blog') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>

    <main>
        @yield('content')
    </main>

    <footer class="space--sm">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="mb-4">About Legalify</h5>
                    <p>Professional legal services tailored to your needs. Our experienced team is here to help you navigate complex legal matters with confidence.</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="mb-4">Contact Info</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> andreassina9a@gmail.com</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i> +62 851-7301-0820</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="mb-4">Follow Us</h5>
                    <ul class="social-list">
                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4 mb-3">
            <div class="text-center">
                <p class="mb-0">&copy; {{ date('Y') }} Legalify. All rights reserved.</p>
                <div class="mt-2 small text-muted">
                    <p class="mb-1">Image Credits:</p>
                    <p class="mb-1"><a href="https://www.freepik.com/free-photo/closeup-shot-person-writing-book-with-gavel-table_25928542.htm">Legal writing image by wirestock on Freepik</a></p>
                    <p class="mb-1"><a href="https://www.freepik.com/free-photo/visa-application-form-composition_18895521.htm">Legal documents image by freepik</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/template/js/scripts.js') }}"></script>
    @stack('scripts')
</body>
</html>
