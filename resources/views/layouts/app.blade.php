<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Legalify</title>
    <link rel="stylesheet" href="{{ asset('assets/template/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/stack-interface.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/socicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/flickity.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/iconsmind.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/font-roboto.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <a id="start"></a>
    <div class="nav-container">
        <div class="bar bar--sm visible-xs">
            <div class="container">
                <div class="row">
                    <div class="col-3 col-md-2">
                        <a href="{{ url('/') }}">
                            <img class="logo logo-dark" alt="logo" src="{{ asset('assets/icons/legalifylogo.png') }}" />
                            <img class="logo logo-light" alt="logo" src="{{ asset('assets/icons/legalifylogo.png') }}" />
                        </a>
                    </div>
                    <div class="col-9 col-md-10 text-right">
                        <a href="#" class="hamburger-toggle" data-toggle-class="#menu1;hidden-xs">
                            <i class="icon icon--sm stack-interface stack-menu"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <nav id="menu1" class="bar bar--sm bar-1 hidden-xs bar--absolute bar--transparent">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-md-2 hidden-xs">
                        <div class="bar__module">
                            <a href="{{ url('/') }}">
                                <img class="logo logo-dark" alt="logo" src="{{ asset('assets/icons/legalifylogo.png') }}" />
                                <img class="logo logo-light" alt="logo" src="{{ asset('assets/icons/legalifylogo.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-11 col-md-12 text-right text-left-xs text-left-sm">
                        <div class="bar__module">
                            <ul class="menu-horizontal text-left">
                                <li><a href="{{ route('home') }}">Home</a></li>        
                                <li><a href="{{ route('user.blog') }}">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="main-container">
        @yield('content')
    </div>
    <footer class="space--sm footer-1 text-center-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-inline list--hover">
                        <li><a href="#">Our Company</a></li>
                        <li><a href="#">Locations</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Work With Us</a></li>
                    </ul>
                </div>
                <div class="col-md-6 text-right text-center-xs">
                    <ul class="social-list list-inline list--hover">
                        <li><a href="#"><i class="socicon socicon-google icon icon--xs"></i></a></li>
                        <li><a href="#"><i class="socicon socicon-twitter icon icon--xs"></i></a></li>
                        <li><a href="#"><i class="socicon socicon-facebook icon icon--xs"></i></a></li>
                        <li><a href="#"><i class="socicon socicon-instagram icon icon--xs"></i></a></li>
                    </ul>
                    <a href="#" class="btn type--uppercase">
                        <span class="btn__text">
                            Contact Us
                        </span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img alt="Image" class="logo" src="{{ asset('assets/icons/legalifylogoblack.png') }}" />
                    <span class="type--fine-print">&copy;
                        <span class="update-year"></span> Legalify Inc.</span>
                    <a class="type--fine-print" href="#">Privacy Policy</a>
                    <a class="type--fine-print" href="#">Legal</a>
                </div>
            </div>
        </div>
    </footer>
    <a class="back-to-top inner-link" href="#start" data-scroll-class="100vh:active">
        <i class="stack-interface stack-up-open-big"></i>
    </a>
    <script src="{{ asset('assets/template/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/template/js/flickity.min.js') }}"></script>
    <script src="{{ asset('assets/template/js/easypiechart.min.js') }}"></script>
    <script src="{{ asset('assets/template/js/parallax.js') }}"></script>
    <script src="{{ asset('assets/template/js/typed.min.js') }}"></script>
    <script src="{{ asset('assets/template/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/template/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/template/js/ytplayer.min.js') }}"></script>
    <script src="{{ asset('assets/template/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/template/js/granim.min.js') }}"></script>
    <script src="{{ asset('assets/template/js/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/template/js/countdown.min.js') }}"></script>
    <script src="{{ asset('assets/template/js/twitterfetcher.min.js') }}"></script>
    <script src="{{ asset('assets/template/js/spectragram.min.js') }}"></script>
    <script src="{{ asset('assets/template/js/smooth-scroll.min.js') }}"></script>
    <script src="{{ asset('assets/template/js/scripts.js') }}"></script>
</body>
</html>