@extends(('layouts/frontend'))

@section('booking')
<div class="col-12 col-lg-5">
    <!-- Section Heading -->
    <div class="section-heading">
        <h2>Sign Up</h2>
        <p></p>
    </div>
    <!-- Contact Form Area -->
    <div class="contact-form-area mb-100">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{ route('register') }}">
        @csrf
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="form-group">
                        Full Name:
                        <input type="text" class="form-control" id="name" name="name">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        Phone Number:
                        <input type="text" class="form-control" id="phone" name="phone">
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        Email:
                        <input type="text" class="form-control" id="email" name="email">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        Password:
                        <input type="password" class="form-control" id="password" name="password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        Repeat Password:
                        <input type="password" class="form-control" id="password" name="password_confirmation">
                        @if ($errors->has('password_confirmation'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-12 pb-3">
                    <a><input type="checkbox" class=""> Accept the <tag class="text-danger">Terms and Conditions<tag></a>
                    <br>
                    <button type="submit" class="btn alazea2-btn mt-15 mb-3">Sign Up</button>
                    <br>
                    <a>Already have an account?  <tag class="text-success">Login<tag></a>
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