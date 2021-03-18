@extends(('layouts/frontend'))

@section('content')

<!-- ##### Hero Area Start ##### -->
<section class="hero-area section-padding-100-0 position-relative" style="margin-top:0px"  style="margin:150px 0 100px 0px;">
    <div class="hero-post-slides owl-carousel">

        <!-- Single Hero Post -->
        <div class="single-hero-post bg-overlay">
            <!-- Post Image -->
            <div class="slide-img bg-img" style="background-image: url({{asset('frontend/img/app-img/1.jpg')}});"></div>
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Content -->
                        <div class="hero-slides-content text-center">
                            <h2>NEED A CAR HIRE SERVICE?</h2>
                            <p>We consider it vital that you want the perfect vehicle so we always make sure you have a wide range of vehicles tailored to meet your needs.</p>
                            <p>Intra & Inter State Car Hire Services.</p>
                            <div class="welcome-btn-group">
                                <a href="#contact" class="btn alazea-btn mr-30">GET STARTED</a>
                                <a href="#contact" class="btn alazea-btn active">CONTACT US</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Hero Post -->
        <div class="single-hero-post bg-overlay">
            <!-- Post Image -->
            <div class="slide-img bg-img" style="background-image: url({{asset('frontend/img/app-img/5.jpg')}});"></div>
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Content -->
                        <div class="hero-slides-content text-center">
                            <h2>BOOK YOUR TRIPS ONLINE</h2>
                            <p>Our Online platform allows you select, shedule and pay for trips with ease.</p>
                            <p>Intra & Inter State Car Hire Services.</p>
                            <div class="welcome-btn-group">
                                <a href="{{ route('landing')}}" class="btn alazea-btn mr-30">GET STARTED</a>
                                <a href="#contact" class="btn alazea-btn active">CONTACT US</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Hero Post --> 
        <!-- <div class="single-hero-post bg-overlay">
            
            <div class="slide-img bg-img" style="background-image: url({{asset('frontend/img/app-img/2.')}});"></div>
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        
                        <div class="hero-slides-content text-center">
                            <h2>NEED A CAR HIRE SERVICE?</h2>
                            <p>We consider it vital that you want the perfect vehicle so we always make sure you have a wide range of vehicles tailored to meet your needs.</p>
                            <p>Intra & Inter State Car Hire Services.</p>
                            <div class="welcome-btn-group">
                                <a href="#" class="btn alazea-btn mr-30">GET STARTED</a>
                                <a href="#contact" class="btn alazea-btn active">CONTACT US</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    </div>
</section>
<!-- ##### Hero Area End ##### -->

<section class="about-us-area section-padding-100-0" id="about">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-lg-5">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h2 class="mb-3">ABOUT US</h2>
                    <p>Valgee Transport Services (VTS) commenced car hire service on the 4th of June 2017. We are Strategically located in the urban area of Plateau State called Jos to meet the increasing the demand for charter services within the city and for trips to and from Jos.</p>
                </div>
                <p>We offer a unique service of transportation for those visiting Jos where safety, comfort, affordability and excellent customer service are our core values.
                    We understand the need to travel in style, comfort and safety at all times.  We are committed to maintaining the highest standards when it comes to car hire service with our professionally trained drivers. Whatever your plans are, our reliable vehicles are ready to give you a smooth road experience.</p>

            </div>

            <div class="col-12 col-lg-6">
                <div class="alazea-benefits-area">
                    <div class="row">
                        <!-- Single Benefits Area -->
                        <div class="col-12">
                            <div class="single-benefits-area">
                                <h5>Vision</h5>
                                <p>To be the most innovative and preferred transport service organisation in Nigeria and beyond</p>
                            </div>
                        </div>

                        <!-- Single Benefits Area -->
                        <div class="col-12">
                            <div class="single-benefits-area">
                                <h5>Mission</h5> 
                                <p>To deliver matchless transport service in Nigeria and beyond; through sustained innovation and continuous improvement of internal operations, leveraging on the state-of- the- art equipment and technology globally available thereby guaranteeing delight for all our stake holders
                                </p>
                            </div>
                        </div>

                        <!-- Single Benefits Area -->
                        <div class="col-12">
                            <div class="single-benefits-area">
                                <h5>Our Values</h5>
                                <p>Innovation, Mutuality, Excellence, Integrity</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="border-line"></div>
            </div>
        </div>
    </div>
</section>

<!-- ##### Service Area Start ##### -->
<section class="our-services-area bg-gray section-padding-100-0" id="services">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2>OUR SERVICES</h2>
                    <p>We provide the perfect service for you.</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-between">
            <div class="col-12 col-lg-6">
                <div class="alazea-service-area mb-100">

                    <!-- Single Service Area -->
                    <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                        <!-- Icon -->
                        <div class="service-icon mr-30">
                            <img src="{{asset('frontend/img/app-img/user.png')}}" alt="">
                        </div>
                        <!-- Content -->
                        <div class="service-content">
                            <h5>Hired Service</h5>
                            <p>With VALGEE TRANSPORT SERVICES, hiring a car is not just about taking you from one place to another; it’s a travel experience. we aim to help you create the most comfortable journey and unforgettable memories. Car hire service should never be a challenge, and with our affordable price and track record of great service and quality, we aim to make you a satisfied and happy customer. With years of experience in the car hire industry, we know exactly what is needed if you want to a car that makes your trip swift and effortless.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="alazea-service-area mb-100">
                    <!-- Single Service Area -->
                    <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="300ms">
                        <!-- Icon -->
                        <div class="service-icon mr-30">
                            <img src="{{asset('frontend/img/app-img/users.png')}}" alt="">
                        </div>
                        <!-- Content -->
                        <div class="service-content">
                            <h5>Shared Service</h5>
                            <p>With regular, reliable, scheduled and comfortable travel experience, there's never been a better time to travel with VTS. We have perfected the mini- bus travel experience to allow for relaxation and fun among friends and family. Our team of chauffeurs has the experience to get you where you need to be, while you enjoy your ride. We know the hassle of booking for a trip with scheduled time let us do the work! We are happy to work with you to find the perfect vehicle for you and your group on the dates that you need.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Service Area End ##### -->

<!-- ##### Portfolio Area Start ##### -->
<section class="alazea-portfolio-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2>VALGEE TRANSPORT SERVICES</h2>
                    <p>We devote all our experience and effort to customer satisfaction</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- <div class="row">
            <div class="col-12">
                <div class="alazea-portfolio-filter">
                    <div class="portfolio-filter">
                        <button class="btn active" data-filter="*">All</button>
                        <button class="btn" data-filter=".design">Coffee Design</button>
                        <button class="btn" data-filter=".garden">Garden</button>
                        <button class="btn" data-filter=".home-design">Home Design</button>
                        <button class="btn" data-filter=".office-design">Office Design</button>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="row alazea-portfolio">

            <!-- Single Portfolio Area -->
            <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item wow fadeInUp" data-wow-delay="200ms">
            <!-- <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item design office-design wow fadeInUp" data-wow-delay="100ms"> -->
                <!-- Portfolio Thumbnail -->
                <div class="portfolio-thumbnail bg-img" style="background-image: url({{asset('frontend/img/app-img/8.jpg')}});"></div>
                <!-- Portfolio Hover Text -->
                <div class="portfolio-hover-overlay">
                    <a href="{{asset('frontend/img/app-img/8.jpg')}}" class="portfolio-img d-flex align-items-center justify-content-center" title="Comfort">
                        <div class="port-hover-text">
                            <h3>We offer Comfort</h3>
                            <h5>- Valgee</h5>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Single Portfolio Area -->
            <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item wow fadeInUp" data-wow-delay="200ms">
            <!-- <div class="col-12 col-lg-6 single_portfolio_item home-design wow fadeInUp" data-wow-delay="300ms"> -->
                <!-- Portfolio Thumbnail -->
                <div class="portfolio-thumbnail bg-img" style="background-image: url({{asset('frontend/img/app-img/1.jpg')}});"></div>
                <!-- Portfolio Hover Text -->
                <div class="portfolio-hover-overlay">
                    <a href="{{asset('frontend/img/app-img/1.jpg')}}" class="portfolio-img d-flex align-items-center justify-content-center" title="Safety">
                        <div class="port-hover-text">
                            <h3>We are Safe</h3>
                            <h5>- Valgee</h5>
                        </div>
                    </a>
                </div>
            </div>
            
            <!-- Single Portfolio Area -->
            <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item wow fadeInUp" data-wow-delay="200ms">
                <!-- <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item design office-design wow fadeInUp" data-wow-delay="100ms"> -->
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url({{asset('frontend/img/app-img/8.jpg')}});"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="{{asset('frontend/img/app-img/8.jpg')}}" class="portfolio-img d-flex align-items-center justify-content-center" title="Trained & Certified Drivers">
                            <div class="port-hover-text">
                                <h3>Well Trained Drivers</h3>
                                <h5>- Valgee</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Single Portfolio Area -->
            <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item wow fadeInUp" data-wow-delay="200ms">
            <!-- <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item design home-design wow fadeInUp" data-wow-delay="100ms"> -->
                <!-- Portfolio Thumbnail -->
                <div class="portfolio-thumbnail bg-img" style="background-image: url({{asset('frontend/img/app-img/6.jpg')}});"></div>
                <!-- Portfolio Hover Text -->
                <div class="portfolio-hover-overlay">
                    <a href="{{asset('frontend/img/app-img/6.jpg')}}" class="portfolio-img d-flex align-items-center justify-content-center" title="Excellent Customer service">
                        <div class="port-hover-text">
                            <h3>Excellent customer service</h3>
                            <h5>- Valgee</h5>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Single Portfolio Area -->
            <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item wow fadeInUp" data-wow-delay="200ms">
            <!-- <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item garden wow fadeInUp" data-wow-delay="200ms"> -->

                <!-- Portfolio Thumbnail -->
                <div class="portfolio-thumbnail bg-img" style="background-image: url({{asset('frontend/img/app-img/5.jpg')}});"></div>
                <!-- Portfolio Hover Text -->
                <div class="portfolio-hover-overlay">
                    <a href="{{asset('frontend/img/app-img/5.jpg')}}" class="portfolio-img d-flex align-items-center justify-content-center" title="Affordability">
                        <div class="port-hover-text">
                            <h3>We are affordable</h3>
                            <h5>- Valgee</h5>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Single Portfolio Area -->
            <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item wow fadeInUp" data-wow-delay="200ms">
            <!-- <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item garden design wow fadeInUp" data-wow-delay="300ms"> -->
                <!-- Portfolio Thumbnail -->
                <div class="portfolio-thumbnail bg-img" style="background-image: url({{asset('frontend/img/app-img/4.jpg')}});"></div>
                <!-- Portfolio Hover Text -->
                <div class="portfolio-hover-overlay">
                    <a href="{{asset('frontend/img/app-img/valgee7.jpeg')}}" class="portfolio-img d-flex align-items-center justify-content-center" title="Style & Class">
                        <div class="port-hover-text">
                            <h3>Travel in Style</h3>
                            <h5>- Valgee</h5>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Single Portfolio Area -->
            <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item wow fadeInUp" data-wow-delay="200ms">
            <!-- <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item garden office-design wow fadeInUp" data-wow-delay="400ms"> -->
                <!-- Portfolio Thumbnail -->
                <div class="portfolio-thumbnail bg-img" style="background-image: url({{asset('frontend/img/app-img/3.jpg')}});"></div>
                <!-- Portfolio Hover Text -->
                <div class="portfolio-hover-overlay">
                    <a href="{{asset('frontend/img/app-img/valgee6.jpeg')}}" class="portfolio-img d-flex align-items-center justify-content-center" title="Professionalism">
                        <div class="port-hover-text">
                            <h3>We are Professional</h3>
                            <h5>- Valgee</h5>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Single Portfolio Area -->
            <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item wow fadeInUp" data-wow-delay="200ms">
            <!-- <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item garden wow fadeInUp" data-wow-delay="200ms"> -->
                <!-- Portfolio Thumbnail -->
                <div class="portfolio-thumbnail bg-img" style="background-image: url({{asset('frontend/img/app-img/2.jpg')}});"></div>
                <!-- Portfolio Hover Text -->
                <div class="portfolio-hover-overlay">
                    <a href="{{asset('frontend/img/app-img/valgee5.jpeg')}}" class="portfolio-img d-flex align-items-center justify-content-center" title="Committment">
                        <div class="port-hover-text">
                            <h3>Committment</h3>
                            <h5>- Valgee</h5>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ##### Portfolio Area End ##### -->

<!-- ##### Subscribe Area Start ##### -->
<section class="subscribe-newsletter-area bg-gray" style="background-image: url();">
        
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="border-line"></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-12 col-lg-5">
                <!-- Section Heading -->
                <div class="section-heading mb-0">
                    <h2>Join the Newsletter</h2>
                    <p>Subscribe to our newsletter and get notified about news and benefits</p>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="subscribe-form">
                    <form action="#" method="get">
                        <input type="email" name="subscribe-email" id="subscribeEmail" placeholder="Enter your email">
                        <button type="submit" class="btn alazea-btn">SUBSCRIBE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Subscribe Side Thumbnail -->
    <div class="subscribe-side-thumb wow fadeInUp" data-wow-delay="500ms">
        <img class="first-img" src="#" alt="">
    </div>
</section>
<!-- ##### Subscribe Area End ##### -->

<!-- ##### Contact Area Start ##### -->
<section class="contact-area section-padding-100-0" id="contact">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-12 col-lg-5">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h2>GET IN TOUCH</h2>
                    <p>Send us a message, we will call back later</p>
                </div>
                <!-- Contact Form Area -->
                <div class="contact-form-area mb-100">
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
                    <form action="{{ route('messages.store')}}" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact-name" name="firstname" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact-name" name="lastname" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-7">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="contact-email" name="email" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="col-12 col-sm-5">
                                <div class="form-group">
                                    <input type="tel" class="form-control" id="contact-phone" name="phone" placeholder="Your Phone">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn alazea-btn mt-15">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <!-- Google Maps -->
                <div class="map-area mb-100">  
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d17709.214090124267!2d8.86637344267927!3d9.901062292504605!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x105373a9380c969b%3A0x47ad0f1e4d2366bc!2sGarden%20Chinese%20and%20Continental%20Restaurant!5e0!3m2!1sen!2sng!4v1589461070809!5m2!1sen!2sng" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Contact Area End ##### -->

@stop