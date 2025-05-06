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
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'text-blue-600' : '' }}">Beranda</a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'text-blue-600' : '' }}">Tentang Kami</a>
                    <div class="dropdown">
                        <button class="nav-link inline-flex items-center {{ request()->routeIs('services*') ? 'text-blue-600' : '' }}" 
                            type="button" 
                            id="servicesDropdown" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false">
                            Layanan
                            <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-start p-0 rounded-lg shadow-xl bg-white" style="min-width: 320px;" aria-labelledby="servicesDropdown">
                            <div class="p-4">
                                <div class="mb-4">
                                    <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">Pendirian Badan Usaha</h3>
                                    <a href="{{ route('services') }}#pt" class="dropdown-item flex items-center px-3 py-2 text-sm text-gray-700 rounded-md">
                                        <i class="fas fa-building w-5 mr-3 text-gray-400"></i>
                                        <span>PT</span>
                                    </a>
                                    <a href="{{ route('services') }}#cv" class="dropdown-item flex items-center px-3 py-2 text-sm text-gray-700 rounded-md">
                                        <i class="fas fa-store w-5 mr-3 text-gray-400"></i>
                                        <span>CV</span>
                                    </a>
                                    <a href="{{ route('services') }}#pt-perorangan" class="dropdown-item flex items-center px-3 py-2 text-sm text-gray-700 rounded-md">
                                        <i class="fas fa-user-tie w-5 mr-3 text-gray-400"></i>
                                        <span>PT Perorangan</span>
                                    </a>
                                    <a href="{{ route('services') }}#pt-pma" class="dropdown-item flex items-center px-3 py-2 text-sm text-gray-700 rounded-md">
                                        <i class="fas fa-globe w-5 mr-3 text-gray-400"></i>
                                        <span>PT PMA</span>
                                    </a>
                                    <a href="{{ route('services') }}#badan-lain" class="dropdown-item flex items-center px-3 py-2 text-sm text-gray-700 rounded-md">
                                        <i class="fas fa-users w-5 mr-3 text-gray-400"></i>
                                        <span>Badan Lain</span>
                                    </a>
                                </div>
                                
                                <div class="mb-4">
                                    <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">Perizinan & Sertifikasi</h3>
                                    <a href="{{ route('services') }}#izin-usaha" class="dropdown-item flex items-center px-3 py-2 text-sm text-gray-700 rounded-md">
                                        <i class="fas fa-certificate w-5 mr-3 text-gray-400"></i>
                                        <span>Izin Usaha dan Sertifikasi</span>
                                    </a>
                                    <a href="{{ route('services') }}#merek" class="dropdown-item flex items-center px-3 py-2 text-sm text-gray-700 rounded-md">
                                        <i class="fas fa-trademark w-5 mr-3 text-gray-400"></i>
                                        <span>Merek</span>
                                    </a>
                                </div>

                                <div class="mb-4">
                                    <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">Layanan Lainnya</h3>
                                    <a href="{{ route('services') }}#perubahan" class="dropdown-item flex items-center px-3 py-2 text-sm text-gray-700 rounded-md">
                                        <i class="fas fa-exchange-alt w-5 mr-3 text-gray-400"></i>
                                        <span>Perubahan dan Penutupan</span>
                                    </a>
                                    <a href="{{ route('services') }}#legal-drafting" class="dropdown-item flex items-center px-3 py-2 text-sm text-gray-700 rounded-md">
                                        <i class="fas fa-file-contract w-5 mr-3 text-gray-400"></i>
                                        <span>Legal Drafting</span>
                                    </a>
                                    <a href="{{ route('services') }}#virtual-office" class="dropdown-item flex items-center px-3 py-2 text-sm text-gray-700 rounded-md">
                                        <i class="fas fa-building-user w-5 mr-3 text-gray-400"></i>
                                        <span>Virtual Office</span>
                                    </a>
                                    <a href="{{ route('services') }}#retainer-legal" class="dropdown-item flex items-center px-3 py-2 text-sm text-gray-700 rounded-md">
                                        <i class="fas fa-gavel w-5 mr-3 text-gray-400"></i>
                                        <span>Retainer Legal</span>
                                    </a>
                                    <a href="{{ route('services') }}#perpajakan" class="dropdown-item flex items-center px-3 py-2 text-sm text-gray-700 rounded-md">
                                        <i class="fas fa-file-invoice-dollar w-5 mr-3 text-gray-400"></i>
                                        <span>Perpajakan</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('user.blog') }}" class="nav-link {{ request()->routeIs('user.blog') ? 'text-blue-600' : '' }}">Blog</a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'text-blue-600' : '' }}">Kontak</a>
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
                        Beranda
                    </a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'text-blue-600 bg-blue-50' : '' }}">
                        <i class="fas fa-info-circle w-5 mr-3"></i>
                        Tentang Kami
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
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mobile menu toggle
        function toggleServiceMenu() {
            const submenu = document.getElementById('serviceSubmenu');
            const arrow = document.getElementById('serviceArrow');
            submenu.classList.toggle('hidden');
            arrow.style.transform = submenu.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
        }

        // Initialize dropdowns and handle animations
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Bootstrap dropdowns
            var dropdownElementList = [].slice.call(document.querySelectorAll('[data-bs-toggle="dropdown"]'))
            var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl, {
                    offset: [0, 10],
                    boundary: 'viewport'
                })
            });

            // Handle mobile menu
            const mobileMenuBtn = document.getElementById('mobileMenuButton');
            const mobileNav = document.getElementById('mobileNav');
            if (mobileMenuBtn && mobileNav) {
                mobileMenuBtn.addEventListener('click', function() {
                    mobileNav.classList.toggle('hidden');
                });
            }

            // Add animation class when dropdown is shown
            document.querySelectorAll('.dropdown').forEach(function(dropdown) {
                dropdown.addEventListener('show.bs.dropdown', function() {
                    const menu = dropdown.querySelector('.dropdown-menu');
                    menu.classList.add('animate-fade-in');
                });
            });
        });
    </script>
    <style>
        /* Navigation and Mobile Menu */
        .nav-link .fa-chevron-down {
            transition: transform 0.2s;
        }
        #serviceSubmenu {
            transition: all 0.3s ease-in-out;
        }

        /* Bootstrap Dropdown Customization */
        .dropdown-menu {
            display: none;
            margin-top: 0.5rem;
            border: 1px solid rgba(0,0,0,0.1);
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
            min-width: 20rem;
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.2s ease, transform 0.2s ease;
        }
        
        .dropdown-menu.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        /* Animation Classes */
        .animate-fade-in {
            animation: fadeIn 0.2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Dropdown Items Styling */
        .dropdown-item {
            transition: all 0.2s ease;
            white-space: normal;
            padding: 0.5rem 1rem;
        }
        
        .dropdown-item:hover, 
        .dropdown-item:focus {
            background-color: #eef2ff !important;
            color: #2563eb !important;
        }

        .dropdown-item:active {
            background-color: #dbeafe !important;
            color: #2563eb !important;
        }

        /* Remove default Bootstrap padding for our custom items */
        .dropdown-menu .p-4 .dropdown-item {
            padding: 0.5rem 0.75rem;
        }

        /* Bootstrap Overrides */
        .dropdown-toggle::after {
            display: none;
        }
        
        .nav-link {
            display: inline-flex;
            align-items: center;
        }

        /* Positioning Fixes */
        .dropdown {
            position: relative;
        }
        
        .dropdown-menu-start {
            left: 0;
            right: auto;
        }
    </style>
</body>
</html>
