<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Jos Strawberries and Grains - Buy Friuts and Vegetables </title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="{{ asset('frontend/img/favicon.png') }}" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/font-icons.css') }}">
    <!-- plugins css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
</head>

<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->

<!-- Body main wrapper start -->
<div class="body-wrapper">

    <!-- HEADER AREA START (header-4) -->
    <header class="ltn__header-area ltn__header-8 section-bg-6">
        <!-- ltn__header-top-area start -->
        <div class="ltn__header-top-area top-area-color-white d-none">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li><a href="mailto:info@webmail.com?Subject=Flower%20greetings%20to%20you"><i class="icon-mail"></i> info@webmail.com</a></li>
                                <li><a href="locations.html"><i class="icon-placeholder"></i> 15/A, Nest Tower, NYC</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="top-bar-right text-right">
                            <div class="ltn__top-bar-menu">
                                <ul>
                                    <li>
                                        <!-- ltn__language-menu -->
                                        <div class="ltn__drop-menu ltn__currency-menu ltn__language-menu">
                                            <ul>
                                                <li><a href="#" class="dropdown-toggle"><span class="active-currency">English</span></a>
                                                    <ul>
                                                        <li><a href="#">Arabic</a></li>
                                                        <li><a href="#">Bengali</a></li>
                                                        <li><a href="#">Chinese</a></li>
                                                        <li><a href="#">English</a></li>
                                                        <li><a href="#">French</a></li>
                                                        <li><a href="#">Hindi</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <!-- ltn__social-media -->
                                        <div class="ltn__social-media">
                                            <ul>
                                                <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                
                                                <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="#" title="Dribbble"><i class="fab fa-dribbble"></i></a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__header-top-area end -->
        
        <!-- ltn__header-middle-area start -->
        <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white plr--5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col logo-column">
                        <div class="site-logo">
                            <a href="{{ route('home') }}"><img src="{{ asset('frontend/img/logo.png') }}" alt="Logo"></a>
                        </div>
                    </div>
                    <div class="col header-menu-column">
                        <div class="header-menu d-none d-xl-block">
                            <nav>
                                <div class="ltn__main-menu">
                                    <ul>
                                        <li class="menu-icon"><a href="{{ route('home') }}">Home</a></li>
                                        <li><a href="{{ route('shop') }}">Buy a Product</a></li>
                                        <li><a href="{{ route('contact') }}">Talk to Us</a></li>
                                        <li><a href="{{ route('about') }}">About Us</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col">
                        <div class="ltn__header-options">
                            <ul>
                                <li class="d-none">
                                    <!-- ltn__currency-menu -->
                                    <!-- <div class="ltn__drop-menu ltn__currency-menu">
                                        <ul>
                                            <li><a href="#" class="dropdown-toggle"><span class="active-currency">USD</span></a>
                                                <ul>
                                                    <li><a href="login.html">USD - US Dollar</a></li>
                                                    <li><a href="wishlist.html">CAD - Canada Dollar</a></li>
                                                    <li><a href="register.html">EUR - Euro</a></li>
                                                    <li><a href="account.html">GBP - British Pound</a></li>
                                                    <li><a href="wishlist.html">INR - Indian Rupee</a></li>
                                                    <li><a href="wishlist.html">BDT - Bangladesh Taka</a></li>
                                                    <li><a href="wishlist.html">JPY - Japan Yen</a></li>
                                                    <li><a href="wishlist.html">AUD - Australian Dollar</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div> -->
                                </li>
                                <li>
                                    <!-- header-search-1 -->
                                    <div class="header-search-wrap">
                                        <div class="header-search-1">
                                            <div class="search-icon">
                                                <i class="icon-magnifier  for-search-show"></i>
                                                <i class="icon-magnifier-remove  for-search-close"></i>
                                            </div>
                                        </div>
                                        <div class="header-search-1-form">
                                            <form id="#234" method="get"  action="#">
                                                <input type="text" name="search" value="" placeholder="Search here..."/>
                                                <button type="submit">
                                                    <span><i class="icon-magnifier"></i></span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li> 
                                    <!-- user-menu -->
                                    <div class="ltn__drop-menu user-menu">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="icon-user"></i></a>
                                                <ul>
                                                    @guest
                                                        <li><a href="{{ route('login') }}">Sign in</a></li>
                                                        <li><a href="{{ route('register') }}">Register</a></li>
                                                    @else

                                                        @if(Auth::user()->is_admin == 'false')
                                                            <li><a href="{{ route('account') }}">My Account</a></li>
                                                            <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
                                                        @endif

                                                        @if(Auth::user()->is_admin == 'true')
                                                            <li><a href="{{ route('admin.home') }}">Admin Home</a></li>
                                                        @endif

                                                        <li>
                                                            <a href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                                Logout
                                                            </a>

                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </li>
                                                    @endguest
                                                    
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- <li> -->
                                    <!-- header-wishlist -->
                                    <!-- <div class="header-wishlist">
                                        <a href="wishlist.html"><i class="icon-heart"></i></a>
                                    </div>
                                </li> -->
                                @guest
                                @else
                                <li>
                                    <!-- mini-cart 2 -->
                                    <div class="mini-cart-icon mini-cart-icon-2">
                                        <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle">
                                            <span class="mini-cart-icon">
                                                <i class="icon-handbag"></i>
                                                <sup>2</sup>
                                            </span>
                                            <h6><span>Your Cart</span> <span class="ltn__secondary-color">&#8358;89.25</span></h6>
                                        </a>
                                    </div>
                                </li>
                                @endguest


                                <li>      
                                    <!-- Mobile Menu Button -->
                                    <div class="mobile-menu-toggle d-xl-none">
                                        <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                            <svg viewBox="0 0 800 600">
                                                <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                                <path d="M300,320 L540,320" id="middle"></path>
                                                <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                            </svg>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__header-middle-area end -->
    </header>
    <!-- HEADER AREA END -->

    <!-- Utilize Cart Menu Start -->
    <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <span class="ltn__utilize-menu-title">Cart</span>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="mini-cart-product-area ltn__scrollbar">
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="{{ asset('frontend/img/product/1.png') }}" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-trash"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">Premium Joyful</a></h6>
                        <span class="mini-cart-quantity">1 x &#8358;65.00</span>
                    </div>
                </div>
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="{{ asset('frontend/img/product/2.png') }}" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-trash"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">The White Rose</a></h6>
                        <span class="mini-cart-quantity">1 x &#8358;85.00</span>
                    </div>
                </div>
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="img/product/3.png{{ asset('frontend/img/logo.png') }}" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-trash"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">Red Rose Bouquet</a></h6>
                        <span class="mini-cart-quantity">1 x &#8358;92.00</span>
                    </div>
                </div>
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="{{ asset('frontend/img/product/4.png') }}" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-trash"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">Pink Flower Tree</a></h6>
                        <span class="mini-cart-quantity">1 x &#8358;68.00</span>
                    </div>
                </div>
            </div>
            <div class="mini-cart-footer">
                <div class="mini-cart-sub-total">
                    <h5>Subtotal: <span>&#8358;310.00</span></h5>
                </div>
                <div class="btn-wrapper">
                    <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                    <a href="cart.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                </div>
                <p>Free Shipping on All Orders Over &#8358;100!</p>
            </div>

        </div>
    </div>
    <!-- Utilize Cart Menu End -->

    <!-- Utilize Mobile Menu Start -->
    <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <div class="site-logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('frontend/img/logo.png') }}" alt="Logo"></a>
                </div>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="ltn__utilize-menu-search-form">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <button><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="ltn__utilize-menu">
                <ul>
                    <li class="menu-icon"><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('shop') }}">Buy a Product</a></li>
                    <li><a href="{{ route('contact') }}">Talk to Us</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                </ul>
            </div>
            <!-- <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
                <ul>
                    <li>
                        <a href="account.html" title="My Account">
                            <span class="utilize-btn-icon">
                                <i class="far fa-user"></i>
                            </span>
                            My Account
                        </a>
                    </li>
                    <li>
                        <a href="wishlist.html" title="Wishlist">
                            <span class="utilize-btn-icon">
                                <i class="far fa-heart"></i>
                                <sup>3</sup>
                            </span>
                            Wishlist
                        </a>
                    </li>
                    <li>
                        <a href="cart.html" title="Shoping Cart">
                            <span class="utilize-btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                <sup>5</sup>
                            </span>
                            Shoping Cart
                        </a>
                    </li>
                </ul>
            </div> -->
            <div class="ltn__social-media-2">
                <ul>
                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Utilize Mobile Menu End -->

    <!-- Utilize Mobile Menu Start -->
    <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <div class="site-logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('frontend/img/logo.png') }}" alt="Logo"></a>
                </div>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="ltn__utilize-menu-search-form">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <button><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="ltn__utilize-menu">
                <ul>
                    <li class="menu-icon"><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('shop') }}">Buy a Product</a></li>
                    <li><a href="{{ route('contact') }}">Talk to Us</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                </ul>
            </div>
            <!-- <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
                <ul>
                    <li>
                        <a href="account.html" title="My Account">
                            <span class="utilize-btn-icon">
                                <i class="far fa-user"></i>
                            </span>
                            My Account
                        </a>
                    </li>
                    <li>
                        <a href="wishlist.html" title="Wishlist">
                            <span class="utilize-btn-icon">
                                <i class="far fa-heart"></i>
                                <sup>3</sup>
                            </span>
                            Wishlist
                        </a>
                    </li>
                    <li>
                        <a href="cart.html" title="Shoping Cart">
                            <span class="utilize-btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                <sup>5</sup>
                            </span>
                            Shoping Cart
                        </a>
                    </li>
                </ul>
            </div> -->
            <div class="ltn__social-media-2">
                <ul>
                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Utilize Mobile Menu End -->

    <div class="ltn__utilize-overlay"></div>

    @yield('content')

    <!-- BRAND LOGO AREA START -->
    <!-- <div class="ltn__brand-logo-area ltn__brand-logo-1 plr--5">
        <div class="container-fluid  section-bg-1  pt-35 pb-35 ">
            <div class="row ltn__brand-logo-active">
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="{{ asset('frontend/img/brand-logo/1.png') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="{{ asset('frontend/img/brand-logo/2.png') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="{{ asset('frontend/img/brand-logo/3.png') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="{{ asset('frontend/img/brand-logo/4.png') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="{{ asset('frontend/img/brand-logo/5.png') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="{{ asset('frontend/img/brand-logo/1.png') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="{{ asset('frontend/img/brand-logo/2.png') }}" alt="Brand Logo">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- BRAND LOGO AREA END -->

    <!-- FOOTER AREA START -->
    <footer class="ltn__footer-area  plr--5">
        <div class="footer-top-area section-bg-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title">My Accoout</h4>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="{{ route('account') }}">My account</a></li>
                                    <li><a href="{{ route('checkout') }}">Checkout</a></li>
                                    <li><a href="{{ route('contact') }}">Contact us</a></li>
                                    <li><a href="{{ route('cart') }}">Shopping Cart</a></li>
                                    <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title">Quick Links</h4>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="{{ route('locations') }}">Store Location</a></li>
                                    <li><a href="{{ route('track') }}">Orders Tracking</a></li>
                                    <li><a href="{{ route('home') }}">Size Guide</a></li>
                                    <li><a href="{{ route('home') }}">My account</a></li>
                                    <li><a href="{{ route('faqs') }}">FAQs</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title">Information</h4>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="{{ route('terms') }}">Privacy Page</a></li>
                                    <li><a href="{{ route('about') }}">About us</a></li>
                                    <li><a href="{{ route('home') }}">Careers</a></li>
                                    <li><a href="{{ route('faqs') }}">Delivery Inforamtion</a></li>
                                    <li><a href="{{ route('terms') }}">Term & Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title">Customer Service</h4>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="{{ route('home') }}">Shipping Policy</a></li>
                                    <li><a href="{{ route('contact') }}">Help & Contact Us</a></li>
                                    <li><a href="{{ route('home') }}">Returns & Refunds</a></li>
                                    <li><a href="{{ route('shop') }}">Online Stores</a></li>
                                    <li><a href="{{ route('terms') }}">Terms and Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-about-widget">
                            <h4 class="footer-title">About Our Shop</h4>
                            <div class="footer-logo d-none">
                                <div class="site-logo">
                                    <img src="{{ asset('frontend/img/logo.png') }}" alt="Logo">
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo incididunt ut labore et dolore</p>
                            <div class="footer-address">
                                <ul>
                                    <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-location-pin"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <p>Brooklyn, New York, United States</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-phone"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <p><a href="tel:+234 817 368 8091">+234 817 368 8091</a></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-envelope"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <p><a href="mailto:contact.jsag@gmail.com">contact.jsag@gmail.com</a></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="ltn__social-media mt-20 d-none">
                                <ul>
                                    <li><a href="https://web.facebook.com/Jos-Strawberries-and-Grains-2033097826807546" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://www.instagram.com/jos_strawberriesandgrains/" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://www.youtube.com/channel/UCUJUPdEGow5m1f-oDtRfrnw" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                            <div class="footer-payment-img">
                                <img src="{{ asset('frontend/img/icons/payment-6.png') }}" alt="Payment Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ltn__copyright-area ltn__copyright-2 section-bg-5">
            <div class="container ltn__border-top-2">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="footer-copyright-left">
                            <div class="ltn__copyright-design clearfix">
                                <p>&copy; <span class="current-year"></span> - POWERED BY GNORIZON</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 align-self-center">
                        <div class="footer-copyright-right text-right">
                            <div class="ltn__copyright-menu d-none">
                                <ul>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Claim</a></li>
                                    <li><a href="#">Privacy & Policy</a></li>
                                </ul>
                            </div>
                            <div class="ltn__social-media ">
                                <ul>
                                    <li><a href="https://web.facebook.com/Jos-Strawberries-and-Grains-2033097826807546" title="Facebook"><i class="icon-social-facebook"></i></a></li>
                                    <li><a href="#" title="Twitter"><i class="icon-social-twitter"></i></a></li>
                                    <li><a href="#" title="Pinterest"><i class="icon-social-pinterest"></i></a></li>
                                    <li><a href="https://www.instagram.com/jos_strawberriesandgrains/" title="Instagram"><i class="icon-social-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-extra-area pt-30 pb-30 section-bg-6"></div>
    </footer>
    <!-- FOOTER AREA END -->

    <!-- MODAL AREA START (Quick View Modal) -->
    <div class="ltn__modal-area ltn__quick-view-modal-area">
        <div class="modal fade" id="quick_view_modal" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <!-- <i class="fas fa-times"></i> -->
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-img">
                                            <img src="{{ asset('frontend/img/product/4.png') }}" alt="#">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-info shop-details-info pl-0">
                                            <h3>Pink Flower Tree Red</h3>
                                            <div class="product-price-ratting mb-20">
                                                <ul>
                                                    <li>
                                                        <div class="product-price">
                                                            <span>&#8358;49.00</span>
                                                            <del>&#8358;65.00</del>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="product-ratting">
                                                            <ul>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="modal-product-brief">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos repellendus repudiandae incidunt quidem pariatur expedita, quo quis modi tempore non.</p>
                                            </div>
                                            <div class="modal-product-meta ltn__product-details-menu-1 mb-20">
                                                <ul>
                                                    <li>
                                                        <div class="ltn__color-widget clearfix">
                                                            <strong class="d-meta-title">Color</strong>
                                                            <ul>
                                                                <li class="theme"><a href="#"></a></li>
                                                                <li class="green-2"><a href="#"></a></li>
                                                                <li class="blue-2"><a href="#"></a></li>
                                                                <li class="white"><a href="#"></a></li>
                                                                <li class="red"><a href="#"></a></li>
                                                                <li class="yellow"><a href="#"></a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="ltn__size-widget clearfix mt-25">
                                                            <strong class="d-meta-title">Size</strong>
                                                            <ul>
                                                                <li><a href="#">S</a></li>
                                                                <li><a href="#">M</a></li>
                                                                <li><a href="#">L</a></li>
                                                                <li><a href="#">XL</a></li>
                                                                <li><a href="#">XXL</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ltn__product-details-menu-2 product-cart-wishlist-btn mb-30">
                                                <ul>
                                                    <li>
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="theme-btn-1 btn btn-effect-1 d-add-to-cart" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                            <span>ADD TO CART</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="btn btn-effect-1 d-add-to-wishlist" title="Add to Cart" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                            <i class="icon-heart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ltn__social-media mb-30">
                                                <ul>
                                                    <li class="d-meta-title">Share:</li>
                                                    <li><a href="#" title="Facebook"><i class="icon-social-facebook"></i></a></li>
                                                    <li><a href="#" title="Twitter"><i class="icon-social-twitter"></i></a></li>
                                                    <li><a href="#" title="Pinterest"><i class="icon-social-pinterest"></i></a></li>
                                                    <li><a href="https://www.instagram.com/jos_strawberriesandgrains/" title="Instagram"><i class="icon-social-instagram"></i></a></li>
                                                    
                                                </ul>
                                            </div>
                                            <div class="modal-product-meta ltn__product-details-menu-1 mb-30 d-none">
                                                <ul>
                                                    <li><strong>SKU:</strong> <span>12345</span></li>
                                                    <li>
                                                        <strong>Categories:</strong> 
                                                        <span>
                                                            <a href="#">Flower</a>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <strong>Tags:</strong> 
                                                        <span>
                                                            <a href="#">Love</a>
                                                            <a href="#">Flower</a>
                                                            <a href="#">Heart</a>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ltn__safe-checkout d-none">
                                                <h5>Guaranteed Safe Checkout</h5>
                                                <img src="{{ asset('frontend/img/icons/payment-2.png') }}" alt="Payment Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Add To Cart Modal) -->
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="add_to_cart_modal" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-add-to-cart-content clearfix">
                                            <div class="modal-product-img">
                                                <img src="{{ asset('frontend/img/product/1.png') }}" alt="#">
                                            </div>
                                             <div class="modal-product-info">
                                                <h5><a href="product-details.html">Heart's Desire</a></h5>
                                                <p class="added-cart"><i class="fa fa-check-circle"></i>  Successfully added to your Cart</p>
                                                <div class="btn-wrapper">
                                                    <a href="{{ route('cart') }}" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                                                    <a href="{{ route('checkout') }}" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                                                </div>
                                             </div>
                                        </div>
                                         <!-- additional-info -->
                                         <div class="additional-info d-none--">
                                            <p>We want to give you <b>10% discount</b> for your first order, <br>  Use (fiama10) discount code at checkout</p>
                                            <div class="payment-method">
                                                <img src="{{ asset('frontend/img/icons/payment.png') }}" alt="#">
                                            </div>
                                         </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Wishlist Modal) -->
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="liton_wishlist_modal" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-product-img">
                                            <img src="{{ asset('frontend/img/product/7.png') }}" alt="#">
                                        </div>
                                         <div class="modal-product-info">
                                            <h5><a href="{{ route('product.detail', 1) }}">Brake Conversion Kit</a></h5>
                                            <p class="added-cart"><i class="fa fa-check-circle"></i>  Successfully added to your Wishlist</p>
                                            <div class="btn-wrapper">
                                                <a href="{{ route('wishlist') }}" class="theme-btn-1 btn btn-effect-1">View Wishlist</a>
                                            </div>
                                         </div>
                                         <!-- additional-info -->
                                         <div class="additional-info d-none">
                                            <p>We want to give you <b>10% discount</b> for your first order, <br>  Use discount code at checkout</p>
                                            <div class="payment-method">
                                                <img src="{{ asset('frontend/img/icons/payment.png') }}" alt="#">
                                            </div>
                                         </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->

</div>
<!-- Body main wrapper end -->

    <!-- preloader area start -->
    <div class="preloader d-none" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- All JS Plugins -->
    <script src="{{ asset('frontend/js/plugins.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
  
</body>
</html>