<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Valgee Transport Services &amp; Home</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('frontend/img/core-img/fav/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('frontend/img/core-img/fav/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('frontend/img/core-img/fav/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('frontend/img/core-img/fav/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('frontend/img/core-img/fav/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('frontend/img/core-img/fav/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('frontend/img/core-img/fav/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('frontend/img/core-img/fav/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('frontend/img/core-img/fav/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('frontend/img/core-img/fav/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('frontend/img/core-img/fav/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('frontend/img/core-img/fav/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('frontend/img/core-img/fav/favicon-16x16.png')}}">
    
    <link rel="manifest" href="{{asset('frontend/img/core-img/fav/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('frontend/img/core-img/fav/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">

</head>

<body>
    <!-- Preloader -->
    <!-- <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="{{asset('frontend/img/core-img/leaf2.png')}}" alt="">
        </div>
    </div> -->

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- ***** Top Header Area ***** -->
        <div class="top-header-area" id="home">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Top Header Content -->
                            <div class="top-header-meta">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="valgeetransportservices@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email: valgeetransportservices@gmail.com</span></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="+234 817 016 0461"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us:  +234 703 219 5807, +234 817 016 0461</span></a>
                            </div>

                            <!-- Top Header Content -->
                            <div class="top-header-meta d-flex">
                                <!-- Language Dropdown -->
                                <!-- <div class="language-dropdown">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle mr-30" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">USA</a>
                                            <a class="dropdown-item" href="#">UK</a>
                                            <a class="dropdown-item" href="#">Bangla</a>
                                            <a class="dropdown-item" href="#">Hindi</a>
                                            <a class="dropdown-item" href="#">Spanish</a>
                                            <a class="dropdown-item" href="#">Latin</a>
                                        </div>
                                    </div>
                                </div> -->
                                

                                @guest
                                    <!-- Login -->
                                    <div class="login">
                                        <a href="{{ route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> <span>Log In</span></a>
                                    </div>
                                    <!-- Login -->

                                    @if (Route::has('register'))
                                    <!-- Login -->
                                    <div class="login">
                                        <a href="{{ route('register')}}"><i class="fa fa-user" aria-hidden="true"></i> <span>Sign Up</span></a>
                                    </div>
                                    <!-- Login -->
                                    @endif
                                @else
                                    <!-- logout -->
                                    <div class="login">
                                        <a class="" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                    <!-- Logout -->

                                    <!-- Login -->
                                    <div class="login">
                                        <a href="{{ route('landing')}}"><i class="fa fa-user" aria-hidden="true"></i> <span>{{ Auth::user()->name }}</span></a>
                                    </div>
                                    <!-- Login -->

                                    <!-- Account -->
                                    <div class="login">
                                        <a class="" href="{{ route('account.history') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('account-form').submit();">
                                            {{ __('Account') }}
                                        </a>

                                        <form id="account-form" action="{{ route('account.history') }}" method="POST" style="display: none;">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        </form>
                                    </div>
                                    <!-- Account -->
                                @endguest

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ***** Navbar Area ***** -->
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="alazeaNav">

                        <!-- Nav Brand -->
                        <a href="{{ route('landing')}}" class="nav-brand"><img src="{{asset('frontend/img/core-img/logo2.png')}}" style="margin-top:-5px;" width="200px" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Navbar Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{ route('landing')}}#home">Book A Trip</a></li>
                                    <li><a href="{{ route('about')}}#about">About</a></li>
                                    <li><a href="{{ route('about')}}#services">Services</a></li>
                                    <!-- <li><a href="{{ route('book')}}#book">Book Now</a></li> -->
                                    <li><a href="{{ route('about')}}#contact">Contact</a></li>
                                </ul>

                                <!-- Search Icon -->
                                <div id="searchIcon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>

                            </div>
                            <!-- Navbar End -->
                        </div>
                    </nav>

                    <!-- Search Form -->
                    <div class="search-form">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type keywords &amp; press enter...">
                            <button type="submit" class="d-none"></button>
                        </form>
                        <!-- Close Icon -->
                        <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <section class="contact-area section-padding-100-0 position-relative" id="book" style="margin:150px 0 100px 0px;">
    <div class="container">
        <div class="row align-items-center justify-content-between">

            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading">
                    
                    <h2>Oops!!</h2>
                    <br><br>
                    <h4>That page is expired, click <a href="/">HERE</a> to go home</h4>
                    
                    @role('SuperUser')
                    <p>if you need an error code, its 419</p>
                    @endrole
                </div>
            </div>

        </div>
    </div>
</section>

   
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area bg-img" style="background-image: url();" id="footer">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="footer-logo mb-30">
                                <a href="#"><img src="{{asset('frontend/img/core-img/logo.png')}}" alt=""></a>
                            </div>
                            <p>We offer a unique service of transportation for those visiting Jos where safety, comfort, affordability and excellent customer service are our core values</p>
                            <div class="social-info">
                                <a href="https://web.facebook.com/valgeetransportservice/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="https://twitter.com/valgeets"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="https://www.instagram.com/valgeets/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>HEAD OFFICE</h5>
                            </div>

                            <div class="contact-information">
                                <p><span>Email:</span> valgeetransportservices@gmail.com</p>
                                <p><span>Phone:</span> +234 703 219 5807, +234 817 016 0461</p>
                                <p><span>Open hours:</span> Mon - Sun: 8 AM to 9 PM</p>                                
                                <!-- <p><span>Happy hours:</span> Sat: 2 PM to 4 PM</p> -->
                                <p><span>Jos:</span><br> No. 4 Fidelis Tapgun road, near CBN, Jos, Plateau state.</p>
                                
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>BRANCH OFFICE</h5>
                            </div>

                            <div class="contact-information">
                                <p><span>Abuja:</span><br> No. 22 Kumasi Crescent,  Wuse 2, Abuja FCT</p>
                                

                                <p><span>Makurdi Office:</span><br> Suit 5, devine rotal plaza. No. 12 Old Otukpo road adjacent oracle printing press Makurdi, Benue  state</p>
                                <p><span>Phone:</span> +234 703 219 5807, +234 817 016 0461</p>
                                
                                
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>BRANCH OFFICE</h5>
                            </div>

                            <div class="contact-information">
                                <p><span>Yobe:</span><br> Shop 1 Sani Ahmed Daura Housing Estate By-Pass Extension Damaturu, Yobe State.</p>
                                
                                <p><span>Gusau:</span><br> Opposite fire service damba, Gusau Zamfara State.</p>      
                                <p><span>Sokoto Office:</span><br> Tsafe road plot 3, of Sama road Sokoto</p>
                                <!-- <p><span>Phone:</span> 0703 2295 807, 0816 7398 567</p> -->
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Footer Bottom Area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="border-line"></div>
                    </div>
                    <!-- Copywrite Text -->
                    <div class="col-12 col-md-6">
                        <div class="copywrite-text">
                            <p> All rights reserved | Powered with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="www.gnorizon.com" target="_blank">Gnorizon</a> | <a href="https://www.freepik.com/free-photos-vectors/poster" target="_blank">Freepik</a>
                            </p>
                        </div>
                    </div>
                    <!-- Footer Nav -->
                    <div class="col-12 col-md-6">
                        <div class="footer-nav">
                            <nav>
                                <ul>
                                    <!-- <li><a href="#home">Home</a></li>
                                    <li><a href="#about">About</a></li>
                                    <li><a href="#service">Service</a></li>
                                    <li><a href="#book">Book Now</a></li>
                                    <li><a href="#contact">Contact</a></li> -->

                                    <li><a href="{{ route('landing')}}#home">Book A Trip</a></li>
                                    <li><a href="{{ route('about')}}#about">About</a></li>
                                    <li><a href="{{ route('about')}}#services">Services</a></li>
                                    <!-- <li><a href="{{ route('book')}}#book">Book Now</a></li> -->
                                    <li><a href="{{ route('about')}}#contact">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->
    
    <script type="text/javascript" src="{{asset('frontend/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('frontend/js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('frontend/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{asset('frontend/js/plugins/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('frontend/js/active.js')}}"></script>
</body>

</html>
