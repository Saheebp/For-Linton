@extends(('layouts/frontend'))

@section('booking')
<section class="contact-area section-padding-100-0 position-relative" id="book" style="margin:150px 0 100px 0px;">
    <div class="container">
        <div class="row align-items-center justify-content-between">

            <div class="col-12 col-lg-5">
                <!-- Section Heading -->
                <div class="section-heading">
                    @if(!empty($success))
                    <div class="alert alert-success mb-3"> {{ $success }}</div>
                    @endif
                    
                    <h2>BOOK NOW</h2>
                    <p>Select your preffered trip type</p>
                </div>
                <!-- Contact Form Area -->
                <div class="contact-form-area mb-100">
                
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <!-- <h5 class="text-center">Hired Service </h5> -->
                            <div class="form-group text-center">
                                <input type="text" class="form-control" name="type" value="Hired" hidden>
                                
                                <a class="btn btn-dark btn-lg p-2" href="#"> 
                                Car Hire Service
                                <br>
                                <i class="fa fa-car" aria-hidden="true"></i>
                                    <!-- <img class="img-responsive" src="{{asset('frontend/img/app-img/hire.png')}}" width="50%" alt=""> -->
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <!-- <h5 class="text-center">Shuttle Bus Service</h5> -->
                            <div class="form-group text-center">
                                <input type="text" class="form-control" name="type" value="Shared" hidden>
                                
                                <a class="btn btn-dark btn-lg p-2" href="{{ route('client.booking.select', 'Shared')}}">
                                Shuttle Bus Service
                                <br>
                                <i class="fa fa-bus" aria-hidden="true"></i>
                                    <!-- <img class="img-responsive" src="{{asset('frontend/img/app-img/share.png')}}" width="50%" alt=""> -->
                                </a>
                            </div>
                        </div>

                        <!-- <div class="col-12">
                            With our CAR HIRE SERVICES, hiring a car is not just about taking you from one place to another; 
                            it’s a travel experience. we aim to help you create the most comfortable journey and unforgettable memories. 
                            
                            <br><br>
                            Using our SHARED SERVICE option, We have perfected the mini- bus travel experience to allow for relaxation and fun among friends and family. 
                            Our team of chauffeurs has the experience to get you where you need to be, while you enjoy your ride.
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <!-- Google Maps -->
                <div class="map-area mb-100">  
                    <a href="#"><img src="{{asset('frontend/img/app-img/book.jpg')}}" alt=""></a>
                </div>
            </div>

        </div>
    </div>
</section>
@stop