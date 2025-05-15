<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Legalify</title>
    
    <!-- Pre-built CSS and JS assets for production without npm -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-v5-yyCMD.css') }}">
    <script src="{{ asset('build/assets/app-BaeQSOhO.js') }}" defer></script>
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    @livewireStyles
    
    <!-- Mobile Menu Styles -->
    <style>
        /* Mobile Menu */
        #mobileNav {
            position: fixed;
            top: 0;
            left: -100%;
            width: 280px;
            height: 100vh;
            background: white;
            z-index: 100;
            transition: 0.3s;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        #mobileNav.show {
            left: 0;
        }

        .mobile-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 99;
            opacity: 0;
            visibility: hidden;
            transition: 0.3s;
        }

        .mobile-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        /* Menu Items */
        .mobile-menu-item {
            display: flex;
            align-items: center;
            padding: 12px 24px;
            color: #374151;
            text-decoration: none;
            transition: 0.2s;
        }

        .mobile-menu-item:hover {
            background: #F3F4F6;
            color: #2563EB;
        }

        .mobile-menu-item i {
            width: 24px;
            margin-right: 12px;
        }

        /* WhatsApp Button */
        .whatsapp-btn {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 50;
            width: 60px;
            height: 60px;
            background: #25D366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .whatsapp-btn:hover {
            transform: scale(1.1);
            color: white;
        }

        .whatsapp-btn i {
            font-size: 24px;
        }

        /* Menu Button */
        .menu-button {
            width: 24px;
            height: 24px;
            position: relative;
            cursor: pointer;
            z-index: 101;
        }

        .menu-button span {
            display: block;
            width: 100%;
            height: 2px;
            background: #374151;
            position: absolute;
            transition: 0.3s;
        }

        .menu-button span:nth-child(1) { top: 2px; }
        .menu-button span:nth-child(2) { top: 11px; }
        .menu-button span:nth-child(3) { top: 20px; }

        .menu-button.active span:nth-child(1) {
            transform: rotate(45deg);
            top: 11px;
        }

        .menu-button.active span:nth-child(2) {
            opacity: 0;
        }

        .menu-button.active span:nth-child(3) {
            transform: rotate(-45deg);
            top: 11px;
        }
    </style>
</head>
<body class="antialiased">
    <!-- Navigation -->
    <nav class="sticky top-0 z-40 bg-white shadow-sm">
        <div class="container">
            <div class="flex items-center justify-between h-16">
                <a href="{{ url('/') }}" class="flex-shrink-0">
                    <img src="{{ asset('assets/icons/legalifylogoblack.png') }}" alt="Legalify" class="h-10">
                </a>
                
                <!-- Desktop Menu -->
                <div class="hidden lg:flex lg:items-center lg:space-x-8">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'text-blue-600' : '' }}">Beranda</a>
                    <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services') ? 'text-blue-600' : '' }}">Layanan</a>
                    <a href="{{ route('user.blog') }}" class="nav-link {{ request()->routeIs('user.blog') ? 'text-blue-600' : '' }}">Blog</a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'text-blue-600' : '' }}">Kontak</a>
                    <a href="{{ route('contact') }}" class="nav-cta">Konsultasi</a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="menuButton" class="lg:hidden menu-button">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Navigation -->
    <div id="mobileOverlay" class="mobile-overlay"></div>
    <div id="mobileNav" class="pt-20">
        <a href="{{ route('home') }}" class="mobile-menu-item">
            <i class="fas fa-home"></i>
            <span>Beranda</span>
        </a>
        <a href="{{ route('services') }}" class="mobile-menu-item">
            <i class="fas fa-briefcase"></i>
            <span>Layanan</span>
        </a>
        <a href="{{ route('services') }}#pt" class="mobile-menu-item pl-16">
            <i class="fas fa-building"></i>
            <span>PT</span>
        </a>
        <a href="{{ route('services') }}#cv" class="mobile-menu-item pl-16">
            <i class="fas fa-store"></i>
            <span>CV</span>
        </a>
        <a href="{{ route('services') }}#pt-perorangan" class="mobile-menu-item pl-16">
            <i class="fas fa-user-tie"></i>
            <span>PT Perorangan</span>
        </a>
        <a href="{{ route('user.blog') }}" class="mobile-menu-item">
            <i class="fas fa-newspaper"></i>
            <span>Blog</span>
        </a>
        <a href="{{ route('contact') }}" class="mobile-menu-item">
            <i class="fas fa-envelope"></i>
            <span>Kontak</span>
        </a>
        <div class="px-6 mt-6">
            <a href="{{ route('contact') }}" class="block w-full py-3 text-center bg-blue-600 text-white rounded-lg">
                Konsultasi
            </a>
        </div>
    </div>

    <main>
        @yield('content')
    </main>

    <footer class="bg-white border-t">
        <div class="container py-16">
            <div class="grid md:grid-cols-4 gap-8">
                <div class="space-y-6">
                    <img src="{{ asset('assets/icons/legalifylogoblack.png') }}" alt="Legalify" class="h-10">
                    <p class="text-gray-600">Legalify ID adalah partner legal terpercaya untuk UMKM, startup, dan pengusaha perorangan. Kami hadir untuk memastikan pendirian usaha, perizinan, dan dokumen hukum Anda terselesaikan secara profesional, efisien, dan tanpa hambatan.</p>
                    <div class="flex gap-4">
                        <a href="https://www.instagram.com/legalify.id" class="social-link" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.tiktok.com/@legalify.id" class="social-link" target="_blank">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h5 class="footer-title">Company</h5>
                    <ul class="footer-links">
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
                            support@legalify.id
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-phone text-gray-400"></i>
                            +62 881-6814-751
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

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/628816814751?text=Halo%20Legalify%2C%20saya%20tertarik%20untuk%20bekerjasama%20dengan%20Anda." 
       class="whatsapp-btn"
       target="_blank"
       rel="noopener noreferrer">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.getElementById('menuButton');
            const mobileNav = document.getElementById('mobileNav');
            const mobileOverlay = document.getElementById('mobileOverlay');
            let isMenuOpen = false;

            function toggleMenu() {
                isMenuOpen = !isMenuOpen;
                menuButton.classList.toggle('active');
                mobileNav.classList.toggle('show');
                mobileOverlay.classList.toggle('show');
                document.body.style.overflow = isMenuOpen ? 'hidden' : '';
            }

            menuButton.addEventListener('click', toggleMenu);
            mobileOverlay.addEventListener('click', toggleMenu);

            // Close menu on window resize (desktop view)
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024 && isMenuOpen) {
                    toggleMenu();
                }
            });
        });
    </script>

    @livewireScripts
</body>
</html>
