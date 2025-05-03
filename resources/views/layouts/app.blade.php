<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Legalify</title>
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('css')
</head>
<body class="antialiased">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white shadow-sm">
        <div class="container relative">
            <div class="flex items-center justify-between h-16">
                <a href="{{ url('/') }}" class="flex-shrink-0">
                    <img src="{{ asset('assets/icons/legalifylogoblack.png') }}" alt="Legalify" class="h-10">
                </a>
                <div class="hidden lg:flex lg:items-center lg:space-x-8">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'text-blue-600' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'text-blue-600' : '' }}">About</a>
                    <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services') ? 'text-blue-600' : '' }}">Services</a>
                    <a href="{{ route('user.blog') }}" class="nav-link {{ request()->routeIs('user.blog') ? 'text-blue-600' : '' }}">Blog</a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'text-blue-600' : '' }}">Contact</a>
                    <a href="{{ route('contact') }}" class="nav-cta">Konsultasi Gratis</a>
                </div>
                <button id="mobileMenuButton" class="lg:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none" type="button" aria-label="Toggle menu">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobileNav" class="hidden lg:hidden">
                <div class="py-2 divide-y divide-gray-100">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50' : '' }}">
                        <i class="fas fa-home w-5 mr-3"></i>
                        Home
                    </a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'text-blue-600 bg-blue-50' : '' }}">
                        <i class="fas fa-info-circle w-5 mr-3"></i>
                        About
                    </a>
                    <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services') ? 'text-blue-600 bg-blue-50' : '' }}">
                        <i class="fas fa-briefcase w-5 mr-3"></i>
                        Services
                    </a>
                    <a href="{{ route('user.blog') }}" class="nav-link {{ request()->routeIs('user.blog') ? 'text-blue-600 bg-blue-50' : '' }}">
                        <i class="fas fa-newspaper w-5 mr-3"></i>
                        Blog
                    </a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'text-blue-600 bg-blue-50' : '' }}">
                        <i class="fas fa-envelope w-5 mr-3"></i>
                        Contact
                    </a>
                    <div class="p-4">
                        <a href="{{ route('contact') }}" class="nav-cta w-full justify-center">
                            <i class="fas fa-phone-alt mr-2"></i>
                            Konsultasi Gratis
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-white border-t">
        <div class="container py-16">
            <div class="grid md:grid-cols-4 gap-8">
                <div class="space-y-6">
                    <img src="{{ asset('assets/icons/legalifylogoblack.png') }}" alt="Legalify" class="h-10">
                    <p class="text-gray-600">Kami bantu Anda mendirikan badan usaha, mengurus perizinan, hingga dokumen hukum dengan proses yang cepat, transparan, dan terpercaya. Cocok untuk UMKM, startup, hingga perseorangan yang ingin legalitas usaha beres tanpa drama.</p>
                    <div class="flex gap-4">
                        <a href="#" class="social-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h5 class="footer-title">Company</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('services') }}">Services</a></li>
                        <li><a href="{{ route('user.blog') }}">Blog</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                
                <div>
                    <h5 class="footer-title">Services</h5>
                    <ul class="footer-links">
                        <li><a href="#">Pendirian PT</a></li>
                        <li><a href="#">Pendirian CV</a></li>
                        <li><a href="#">Perizinan Usaha</a></li>
                        <li><a href="#">Merek Dagang</a></li>
                    </ul>
                </div>
                
                <div>
                    <h5 class="footer-title">Contact</h5>
                    <ul class="footer-links">
                        <li class="flex items-center gap-2">
                            <i class="fas fa-envelope text-gray-400"></i>
                            andreassina9a@gmail.com
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-phone text-gray-400"></i>
                            +62 851-7301-0820
                        </li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-8 border-gray-200">
            
            <div class="text-center text-gray-600">
                <p>&copy; {{ date('Y') }} Legalify. All rights reserved.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
