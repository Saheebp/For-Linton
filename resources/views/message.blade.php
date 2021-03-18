@extends(('layouts/frontend'))

@section('booking')
    <div class="col-12 col-lg-5">
        <!-- Section Heading -->
        <div class="section-heading">
            <h2>BOOKING DETAILS</h2>
            <p></p>
        </div>
        <!-- Contact Form Area -->
        <div class="contact-form-area mb-100">
            <div class="row">
                <div class="col-12">
                    Your trip has been successfully booked, thank you for choosing Valgee Transport Services
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6">
        <!-- Google Maps -->
        <div class="map-area mb-100">  
            <a href="#"><img src="{{asset('frontend/img/app-img/book.jpg')}}" alt=""></a>
        </div>
    </div>
@stop

     