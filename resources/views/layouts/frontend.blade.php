<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Valgee Transport Services</title>

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
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="+234 806 088 5322"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us:  +234 806 088 5322</span></a>
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
                                    <!-- <div class="login">
                                        <a href="{{ route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> <span>Log In</span></a>
                                    </div> -->
                                    <!-- Login -->
                                @else

                                    <!-- Account -->
                                    @if(Auth::user()->is_admin == 'true')
                                        <div class="login">
                                            <a class="" href="{{ route('home') }}">
                                                Admin Home
                                            </a> 
                                        </div>
                                    @endif
                                    <!-- Account -->

                                    <!-- Account -->
                                    @if(Auth::user()->is_admin == 'false')
                                        <div class="login">
                                            <a class="" href="{{ route('home') }}">
                                              Wallet Balance : &#8358;{{ number_format(floatval($wallet_balance), 2) }}
                                            </a>
                                        </div>
                                    @endif
                                    <!-- Account -->

                                    <!-- Login -->
                                    <div class="login">
                                        <a href="{{ route('landing')}}"><i class="fa fa-user" aria-hidden="true"></i> <span>{{ Auth::user()->email }}</span></a>
                                    </div>
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
                                    <li><a href="{{ route('about')}}#contact">Contact</a></li>
                                    @guest
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    @else

                                        @if(Auth::user()->is_admin == 'false')
                                        <li><a href="{{ route('account.history') }}">My Profile</a></li>
                                        @endif

                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                        </li>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @endguest
                                </ul>

                                <!-- Search Icon -->
                                <!-- <div id="searchIcon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div> -->

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

    <!-- ##### Booking Area Start ##### -->
    @if(request()->is('bookings/*') || request()->is('payment/*') || request()->is('/') || request()->is('customer/history'))
        @yield('booking')
    @else 
        @yield('content')
    @endif
    <!-- ##### Booking Area End ##### -->

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
                                <p><span>Email :</span><br> valgeetransportservices@gmail.com</p>
                                <p><span>Phone (Jos) :</span><br> +234 816 498 2545, +234 816 739 8567</p> 
                                <p><span>Customer Care :</span><br> +234 806 088 5322</p>
                                <p><span>Open hours :</span><br> Mon - Sun: 8 AM to 9 PM</p>                                
                                <!-- <p><span>Happy hours:</span> Sat: 2 PM to 4 PM</p> -->
                                <p><span>Jos (Administrative Office) :</span><br> No. 4 Fidelis Tapgun road, near CBN, Jos, Plateau state.</p>
				<p><span>Jos (Terminal/Pickup) :</span><br> Valgee Hotspot, Old Nitel Building, Close to old airport Roundabout Jos.</p>

                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>BRANCH OFFICES</h5>
                            </div>

                            <div class="contact-information">                     
                                <p><span>Abuja (Terminal/Pick Up) :</span><br> Movic Restaurant (River Plate Garden) Opp. Abia House, Ahmadu Bellow Way, Abuja</p>
                                <p><span>Abuja (Administrative Office) :</span><br> No. 22 Kumasi Crescent,  Wuse 2, Abuja FCT</p>
                                <p><span>Phone (Abuja) :</span><br> +234 913 565 2615</p>
                                <p><span>Customer Care :</span><br> +234 806 088 5322</p>
                                <p><span>Makurdi Office :</span><br> Suit 5, devine rotal plaza. No. 12 Old Otukpo road adjacent oracle printing press Makurdi, Benue  state</p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>BRANCH OFFICES</h5>
                            </div>

                            <div class="contact-information">
                                <p><span>Customer Care :</span><br> +234 806 088 5322</p>
                                <p><span>Yobe :</span><br> Shop 1 Sani Ahmed Daura Housing Estate By-Pass Extension Damaturu, Yobe State.</p>
                                <p><span>Gusau :</span><br> Opposite fire service damba, Gusau Zamfara State.</p>      
                                <p><span>Sokoto Office :</span><br> Bafarawa Estate, Opposite Liberty CLinic, Sokoto State</p>     
                                <p><span>Kebbi Office :</span><br> Along Nagari College Express way, Kebbi State</p>
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
                            <p> All rights reserved | Powered with &nbsp;<i class="fa fa-heart-o" aria-hidden="true"></i>&nbsp; by <a href="http://www.gnorizon.com" target="_blank">Gnorizon</a> <a href="https://www.freepik.com/free-photos-vectors/poster" style="color:#ffffff10" target="_blank">| Freepik</a>
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

                                    <li><a href="{{ route('landing') }}#home">Book A Trip</a></li>
                                    <li><a href="{{ route('about') }}#about">About</a></li>
                                    <li><a href="{{ route('about') }}#services">Services</a></li>
                                    <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                                    <li><a href="{{ route('about') }}#contact">Contact</a></li>
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

    @if(request()->is('/'))
    <script type="text/javascript">
        $(window).on('load',function(){
            $('#myModal').modal('show');
        });
    </script>
    @endif

    <div class="modal" id="myModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <p>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    </p>
                    <div class="course-head overlay pt-0">
                        <img src="{{ asset('frontend/img/app-img/luggage.jpg') }}" alt="#">
                    </div>
                </div>
                <div class="modal-footer">
                    <h4 class="pt-0 pr-2 text-right"><a href="{{ route('terms') }}">Read more Terms & Conditions</h4>
                    <button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Close & Continue</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
