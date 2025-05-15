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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Pre-built CSS and JS assets for production without npm -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-v5-yyCMD.css') }}">
    <script src="{{ asset('build/assets/app-BaeQSOhO.js') }}" defer></script>
    
    <!-- WhatsApp Button Styles -->
    <style>
        @keyframes ping {
            75%, 100% {
                transform: scale(2);
                opacity: 0;
            }
        }
        
        .whatsapp-btn {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 50;
            display: block;
            width: 64px;
            height: 64px;
            background-color: #25D366;
            color: white;
            border-radius: 9999px;
            padding: 16px;
            cursor: pointer;
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }
        
        .whatsapp-btn:hover {
            background-color: #128C7E;
            transform: scale(1.1);
            color: white;
        }
        
        .whatsapp-btn i {
            font-size: 1.875rem;
        }
        
        .whatsapp-pulse {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 9999px;
            background-color: #25D366;
            opacity: 0.75;
            animation: ping 2s cubic-bezier(0, 0, 0.2, 1) infinite;
        }
    </style>
    
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
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'text-blue-600' : '' }}">Beranda</a>
                    <div class="group relative">
                        <button class="nav-link inline-flex items-center {{ request()->routeIs('services*') ? 'text-blue-600' : '' }}">
                            Layanan
                            <svg class="ml-2 h-4 w-4 transform group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="hidden group-hover:block absolute left-1/2 transform -translate-x-1/2 mt-2 w-screen max-w-7xl bg-white shadow-xl rounded-lg py-8 z-50">
                            <div class="container mx-auto px-8">
                                <div class="grid grid-cols-3 gap-12">
                                    <div>
                                        <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-4">Pendirian Badan Usaha</h3>
                                        <div class="space-y-2">
                                            <a href="{{ route('services') }}#pt" class="dropdown-item flex items-center text-sm text-gray-700 hover:text-blue-600">
                                                <i class="fas fa-building w-5 mr-3 text-gray-400"></i>
                                                <span>PT</span>
                                            </a>
                                            <a href="{{ route('services') }}#cv" class="dropdown-item flex items-center text-sm text-gray-700 hover:text-blue-600">
                                                <i class="fas fa-store w-5 mr-3 text-gray-400"></i>
                                                <span>CV</span>
                                            </a>
                                            <a href="{{ route('services') }}#pt-perorangan" class="dropdown-item flex items-center text-sm text-gray-700 hover:text-blue-600">
                                                <i class="fas fa-user-tie w-5 mr-3 text-gray-400"></i>
                                                <span>PT Perorangan</span>
                                            </a>
                                            <a href="{{ route('services') }}#pt-pma" class="dropdown-item flex items-center text-sm text-gray-700 hover:text-blue-600">
                                                <i class="fas fa-globe w-5 mr-3 text-gray-400"></i>
                                                <span>PT PMA</span>
                                            </a>
                                            <a href="{{ route('services') }}#badan-lain" class="dropdown-item flex items-center text-sm text-gray-700 hover:text-blue-600">
                                                <i class="fas fa-users w-5 mr-3 text-gray-400"></i>
                                                <span>Badan Lain</span>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-4">Perizinan & Sertifikasi</h3>
                                        <div class="space-y-2">
                                            <a href="{{ route('services') }}#izin-usaha" class="dropdown-item flex items-center text-sm text-gray-700 hover:text-blue-600">
                                                <i class="fas fa-certificate w-5 mr-3 text-gray-400"></i>
                                                <span>Izin Usaha dan Sertifikasi</span>
                                            </a>
                                            <a href="{{ route('services') }}#merek" class="dropdown-item flex items-center text-sm text-gray-700 hover:text-blue-600">
                                                <i class="fas fa-trademark w-5 mr-3 text-gray-400"></i>
                                                <span>Merek</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div>
                                        <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-4">Layanan Lainnya</h3>
                                        <div class="space-y-2">
                                            <a href="{{ route('services') }}#perubahan" class="dropdown-item flex items-center text-sm text-gray-700 hover:text-blue-600">
                                                <i class="fas fa-exchange-alt w-5 mr-3 text-gray-400"></i>
                                                <span>Perubahan dan Penutupan</span>
                                            </a>
                                            <a href="{{ route('services') }}#legal-drafting" class="dropdown-item flex items-center text-sm text-gray-700 hover:text-blue-600">
                                                <i class="fas fa-file-contract w-5 mr-3 text-gray-400"></i>
                                                <span>Legal Drafting</span>
                                            </a>
                                            <a href="{{ route('services') }}#virtual-office" class="dropdown-item flex items-center text-sm text-gray-700 hover:text-blue-600">
                                                <i class="fas fa-building-user w-5 mr-3 text-gray-400"></i>
                                                <span>Virtual Office</span>
                                            </a>
                                            <a href="{{ route('services') }}#retainer-legal" class="dropdown-item flex items-center text-sm text-gray-700 hover:text-blue-600">
                                                <i class="fas fa-gavel w-5 mr-3 text-gray-400"></i>
                                                <span>Retainer Legal</span>
                                            </a>
                                            <a href="{{ route('services') }}#perpajakan" class="dropdown-item flex items-center text-sm text-gray-700 hover:text-blue-600">
                                                <i class="fas fa-file-invoice-dollar w-5 mr-3 text-gray-400"></i>
                                                <span>Perpajakan</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('user.blog') }}" class="nav-link {{ request()->routeIs('user.blog') ? 'text-blue-600' : '' }}">Blog</a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'text-blue-600' : '' }}">Kontak</a>
                    <a href="{{ route('contact') }}" class="nav-cta">Konsultasi Gratis</a>
                </div>
                <button 
                    id="mobileMenuButton" 
                    class="lg:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" 
                    type="button" 
                    aria-label="Toggle menu"
                    aria-expanded="false"
                    aria-controls="mobileNav"
                    data-menu-open="false">
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
                        Beranda
                    </a>
                    <div>
                        <button class="flex items-center w-full text-left nav-link {{ request()->routeIs('services') ? 'text-blue-600 bg-blue-50' : '' }}" onclick="toggleServiceMenu()">
                            <i class="fas fa-briefcase w-5 mr-3"></i>
                            Layanan
                            <i class="fas fa-chevron-down ml-auto transition-transform" id="serviceArrow"></i>
                        </button>
                        <div id="serviceSubmenu" class="hidden bg-gray-50">
                            <div class="py-2">
                                <div class="px-4 py-2">
                                    <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Pendirian Badan Usaha</h3>
                                    <a href="{{ route('services') }}#pt" class="flex items-center px-3 py-2 text-sm text-gray-700 hover:text-blue-600">
                                        <i class="fas fa-building w-5 mr-3 text-gray-400"></i>
                                        <span>PT</span>
                                    </a>
                                    <a href="{{ route('services') }}#cv" class="flex items-center px-3 py-2 text-sm text-gray-700 hover:text-blue-600">
                                        <i class="fas fa-store w-5 mr-3 text-gray-400"></i>
                                        <span>CV</span>
                                    </a>
                                    <a href="{{ route('services') }}#pt-perorangan" class="flex items-center px-3 py-2 text-sm text-gray-700 hover:text-blue-600">
                                        <i class="fas fa-user-tie w-5 mr-3 text-gray-400"></i>
                                        <span>PT Perorangan</span>
                                    </a>
                                    <a href="{{ route('services') }}#pt-pma" class="flex items-center px-3 py-2 text-sm text-gray-700 hover:text-blue-600">
                                        <i class="fas fa-globe w-5 mr-3 text-gray-400"></i>
                                        <span>PT PMA</span>
                                    </a>
                                    <a href="{{ route('services') }}#badan-lain" class="flex items-center px-3 py-2 text-sm text-gray-700 hover:text-blue-600">
                                        <i class="fas fa-users w-5 mr-3 text-gray-400"></i>
                                        <span>Badan Lain</span>
                                    </a>
                                </div>

                                <div class="px-4 py-2 border-t border-gray-100">
                                    <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Perizinan & Sertifikasi</h3>
                                    <a href="{{ route('services') }}#izin-usaha" class="flex items-center px-3 py-2 text-sm text-gray-700 hover:text-blue-600">
                                        <i class="fas fa-certificate w-5 mr-3 text-gray-400"></i>
                                        <span>Izin Usaha dan Sertifikasi</span>
                                    </a>
                                    <a href="{{ route('services') }}#merek" class="flex items-center px-3 py-2 text-sm text-gray-700 hover:text-blue-600">
                                        <i class="fas fa-trademark w-5 mr-3 text-gray-400"></i>
                                        <span>Merek</span>
                                    </a>
                                </div>

                                <div class="px-4 py-2 border-t border-gray-100">
                                    <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Layanan Lainnya</h3>
                                    <a href="{{ route('services') }}#perubahan" class="flex items-center px-3 py-2 text-sm text-gray-700 hover:text-blue-600">
                                        <i class="fas fa-exchange-alt w-5 mr-3 text-gray-400"></i>
                                        <span>Perubahan dan Penutupan</span>
                                    </a>
                                    <a href="{{ route('services') }}#legal-drafting" class="flex items-center px-3 py-2 text-sm text-gray-700 hover:text-blue-600">
                                        <i class="fas fa-file-contract w-5 mr-3 text-gray-400"></i>
                                        <span>Legal Drafting</span>
                                    </a>
                                    <a href="{{ route('services') }}#virtual-office" class="flex items-center px-3 py-2 text-sm text-gray-700 hover:text-blue-600">
                                        <i class="fas fa-building-user w-5 mr-3 text-gray-400"></i>
                                        <span>Virtual Office</span>
                                    </a>
                                    <a href="{{ route('services') }}#retainer-legal" class="flex items-center px-3 py-2 text-sm text-gray-700 hover:text-blue-600">
                                        <i class="fas fa-gavel w-5 mr-3 text-gray-400"></i>
                                        <span>Retainer Legal</span>
                                    </a>
                                    <a href="{{ route('services') }}#perpajakan" class="flex items-center px-3 py-2 text-sm text-gray-700 hover:text-blue-600">
                                        <i class="fas fa-file-invoice-dollar w-5 mr-3 text-gray-400"></i>
                                        <span>Perpajakan</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('user.blog') }}" class="nav-link {{ request()->routeIs('user.blog') ? 'text-blue-600 bg-blue-50' : '' }}">
                        <i class="fas fa-newspaper w-5 mr-3"></i>
                        Blog
                    </a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'text-blue-600 bg-blue-50' : '' }}">
                        <i class="fas fa-envelope w-5 mr-3"></i>
                        Kontak
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

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/6285173010820?text=Halo%20Legalify%2C%20saya%20tertarik%20untuk%20bekerjasama%20dengan%20Anda." 
       class="whatsapp-btn"
       target="_blank"
       rel="noopener noreferrer">
        <span class="whatsapp-pulse"></span>
        <i class="fab fa-whatsapp"></i>
    </a>

    @stack('scripts')
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mobile menu toggle
        function toggleServiceMenu() {
            const submenu = document.getElementById('serviceSubmenu');
            const arrow = document.getElementById('serviceArrow');
            const isHidden = submenu.classList.contains('hidden');
            
            // Toggle submenu visibility
            submenu.classList.toggle('hidden');
            
            // Rotate arrow
            arrow.style.transform = isHidden ? 'rotate(180deg)' : 'rotate(0deg)';
        }

        // Initialize mobile menu
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobileMenuButton');
            const mobileNav = document.getElementById('mobileNav');
            
            if (mobileMenuBtn && mobileNav) {
                // Initialize mobile menu state
                mobileNav.classList.add('hidden');
                mobileMenuBtn.setAttribute('aria-expanded', 'false');
                
                // Toggle mobile menu
                mobileMenuBtn.addEventListener('click', function() {
                    const isOpen = this.getAttribute('data-menu-open') === 'true';
                    
                    // Toggle menu visibility
                    mobileNav.classList.toggle('hidden');
                    
                    // Update button states
                    this.setAttribute('data-menu-open', !isOpen);
                    this.setAttribute('aria-expanded', !isOpen);
                    
                    // Update button icon
                    this.classList.toggle('is-active');
                    
                    // Prevent body scroll when menu is open
                    document.body.style.overflow = !isOpen ? 'hidden' : '';
                });

                // Close mobile menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!mobileNav.classList.contains('hidden') && 
                        !mobileNav.contains(event.target) && 
                        !mobileMenuBtn.contains(event.target)) {
                        mobileNav.classList.add('hidden');
                        mobileMenuBtn.setAttribute('aria-expanded', 'false');
                        document.body.style.overflow = '';
                    }
                });

                // Close mobile menu on window resize (desktop view)
                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 1024) { // lg breakpoint
                        mobileNav.classList.add('hidden');
                        mobileMenuBtn.setAttribute('aria-expanded', 'false');
                        document.body.style.overflow = '';
                    }
                });
            }
        });
    </script>
</body>
</html>
