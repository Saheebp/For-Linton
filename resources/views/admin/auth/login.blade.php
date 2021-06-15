@extends(('layouts/frontend'))

@section('booking')
<div class="col-12 col-lg-5">
    <!-- Section Heading -->
    <div class="section-heading">
        <h2>PROJECTMGR LOGIN</h2>
        <p></p>
    </div>
    <!-- Contact Form Area -->
    <div class="contact-form-area mb-100">
        <form method="POST" action="{{ route('login') }}">
        @csrf
            <div class="row">
                <div class="col-12 col-sm-8">
                    <div class="form-group">
                        Email
                        <input class="form-control border-right-0  @error('phonemail') is-invalid @enderror" id="phonemail" type="text" name="phonemail" placeholder="" autocomplete="off" required>
                    </div>

                    <!-- <div class="form-group">
                        Email:
                        <input class="form-control border-right-0  @error('email') is-invalid @enderror" id="email" type="text" name="email" placeholder="" autocomplete="off" required>
                    </div> -->
                </div>

                <div class="col-12 col-sm-8">
                    <div class="form-group">
                        Password:
                        <input class="form-control border-right-0 @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="" required>
                    </div>
                </div>

                <div class="col-12 pb-3">
                    <button type="submit" class="btn alazea2-btn mt-15 mb-3">Login</button>
                    <br>
                    <!-- <a><tag class="text-danger">Sign Up<tag></a> |  -->
                    <a><tag class="text-success">Forgot Password<tag></a>
                </div>

                <!-- <div class="col-12">
                    With VALGEE TRANSPORT SERVICES, hiring a car is not just about taking you from one place to another; it’s a travel experience. we aim to help you create the most comfortable journey and unforgettable memories. 
                </div> -->
            </div>
        </form>
    </div>
</div>

<div class="col-12 col-lg-6">
    <!-- Google Maps -->
    <div class="map-area mb-100">  
        <a href="#"><img src="{{asset('frontend/img/app-img/book.jpg')}}" alt=""></a>
    </div>
</div>
@stop