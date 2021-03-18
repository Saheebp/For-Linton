@extends(('layouts/frontend'))

@section('booking')
<section class="contact-area section-padding-100-0 position-relative" id="book" style="margin:150px 0 100px 0px;">
    <div class="container">
        <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>BOOK NOW</h2>
                        <p></p>
                    </div>
                    <!-- Contact Form Area -->
                    <div class="contact-form-area mb-100">
                        @if(!empty($success))
                        <div class="alert alert-success"> {{ $success }}</div>
                        @endif

                        @if(!empty($error))
                        <div class="alert alert-success"> {{ $error }}</div>
                        @endif     
                            
                    <form action="{{ route('client.booking.create.hired') }}" method="post">
                        @csrf
                            <b>Trip Type :</b> Hired Service
                            <input type="text" name="type" value="{{ $type }}" hidden>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        Name:
                                        <input type="text" class="form-control" name="name" value="{{ Auth::check() ? Auth::user()->name : '' }}" placeholder="e.g Sandra Paul" required>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        Pick up:
                                        <input type="text" class="form-control" name="takeoff" placeholder="From">
                                        @if ($errors->has('takeoff'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('takeoff') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        Destination:
                                        <input type="text" class="form-control" name="destination" placeholder="To">
                                        @if ($errors->has('destination'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('destination') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        Date:
                                        <input type="date" class="form-control" name="date" placeholder="Departure date To">
                                        @if ($errors->has('date'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12 pb-3">
                                    <button type="submit" class="btn alazea-btn mt-15">Get Started</button>
                                </div>
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
            </div>
        </div>
    </section>
@stop