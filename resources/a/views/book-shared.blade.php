@extends(('layouts/frontend'))

@section('booking')
<section class="contact-area section-padding-100-0 position-relative" id="book" style="margin:150px 0 100px 0px;">
    <div class="container">
        <div class="row align-items-center justify-content-between">

            <div class="col-12 col-lg-5">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h2>BOOK YOUR TRIP NOW</h2>
                    <p><h6>Shuttle Bus Service</h6></p>
                </div>
                <!-- Contact Form Area -->
                <div class="contact-form-area mb-100">
                
                    @if(!empty($success))
                    <div class="alert alert-success mb-3"> {{ $success }}</div>
                    @endif

                    @if(!empty($error))
                    <div class="alert alert-danger mb-3"> {{ $error }}</div>
                    @endif
                    
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
                        
                    <form action="{{ route('client.booking.vehicles') }}" method="post">
                    @csrf
                        <div class="row mt-3">
                            
                            <div class="col-12 col-sm-10">
                                <div class="form-group">
                                    <tag style="margin-bottom:10px;">Travelling From : </tag>
                                    <select name="route" class="form-control pt-0 pb-0" required>
                                        <option value="">Select Route</option>
                                        @foreach($trips as $trip)
                                        <option value="{{ $trip->route->id }}">{{ $trip->route->origin }} to {{ $trip->route->destination }}</option>
                                        @endforeach
                                    </select>
                                    @error('route')
                                        <span class="text-danger">{{ $errors->first('route') }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-sm-10">
                                <div class="form-group">
                                    <tag style="margin-bottom:10px;">Type of Vehicle </tag>
                                    <select name="type" class="form-control pt-0 pb-0" required>
                                        <option value="">Select Type</option>
                                        <option value="regular">Regular - 14 Seater</option>
                                        <option value="prestige">Prestige - 5 Seater</option>
                                    </select>
                                    @error('type')
                                        <span class="text-danger">{{ $errors->first('type') }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-sm-10">
                                <div class="form-group">
                                    <tag style="margin-bottom:10px;"> Departure Date</tag>
                                    <input type="date" class="form-control" name="date" placeholder="Trip Date"  required>
                                    @error('date')
                                        <span class="text-danger">{{ $errors->first('date') }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-sm-10">
                                <div class="form-group">
                                    <tag style="margin-bottom:10px;"> Number of Seats</tag>
                                    <input type="number" class="form-control" name="noofseats" min="1" max="13" value="1" required>
                                    @error('noofseats')
                                        <span class="text-danger">{{ $errors->first('noofseats') }}</span>
                                    @enderror
                                </div>
                            </div>

                            @if($referralstatus == 'true')
                            <div class="col-12 col-sm-10">
                                <div class="form-group">
                                    <tag style="margin-bottom:10px;"> Referral Code (Optional) <span class="text-danger" style="font-size:12px;" data-toggle="modal" data-target="#referralnote">What is this?</span></tag>
                                    <input type="text" class="form-control" name="referral_code" value="{{ isset($referral_code) ? $referral_code : '' }}">
                                    @error('referralcode')
                                        <span class="text-danger">{{ $errors->first('referralcode') }}</span>
                                    @enderror
                                    
                                </div>
                            </div>
                            @endif

                            <div class="col-12 pb-3">
                                <button type="submit" class="btn alazea-btn mt-15">Continue</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <!-- Google Maps -->
                <div class="map-area mb-100">  
                    <!-- ##### Hero Area Start ##### -->
                    <section class="hero-area section-padding-0 position-relative" style="margin:0px 0px 100px 0px;">
                        
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{asset('frontend/img/app-img/promo/RE.jpeg')}}" alt="First slide">
                                    <!-- <div class="carousel-caption d-none d-md-block">
                                        <h5>...</h5>
                                        <p>...</p>
                                    </div> -->
                                </div>

                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('frontend/img/app-img/promo/RE1.jpg')}}" alt="Second slide">
                                    <!-- <div class="carousel-caption d-none d-md-block">
                                        <h5>...</h5>
                                        <p>...</p>
                                    </div> -->
                                </div>

                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('frontend/img/app-img/promo/RE2.jpg')}}" alt="Third slide">
                                    <!-- <div class="carousel-caption d-none d-md-block">
                                        <h5>...</h5>
                                        <p>...</p>
                                    </div> -->
                                </div>

                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('frontend/img/app-img/promo/RE3.jpg')}}" alt="Third slide">
                                    <!-- <div class="carousel-caption d-none d-md-block">
                                        <h5>...</h5>
                                        <p>...</p>
                                    </div> -->
                                </div>

                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('frontend/img/app-img/promo/RE4.jpg')}}" alt="Third slide">
                                    <!-- <div class="carousel-caption d-none d-md-block">
                                        <h5>...</h5>
                                        <p>...</p>
                                    </div> -->
                                </div>

                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('frontend/img/app-img/promo/RE5.jpg')}}" alt="Third slide">
                                    <!-- <div class="carousel-caption d-none d-md-block">
                                        <h5>...</h5>
                                        <p>...</p>
                                    </div> -->
                                </div>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>
                        
                    </section>
                    <!-- ##### Hero Area End ##### -->
                </div>
            </div>
    
        </div>
    </div>
</section>

<!-- Modal -->
<div id="referralnote" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <p>
            <h5>How the referral Code works!</h5>
            <p>
            Thank you for helping to grow the VALGEE family. The referral program encourages people to use the App and earn by referring your friends and family.
            </p>
            <p>
            Everyone with a VALGEE account has a personal referral code that you can share with friends interested in traveling with VALGEE. 
            An account and wallet are automatically created for you once you successfully make your first payment on www.valgee.com. You'll receive rewards into your wallet when a new customer uses your referral code and successfully pays for their first trip.
            </p>
            <p>
            You are only eligible for one referral reward per individual. If your referral has already paid for a trip before, you may not be eligible for a reward.
            </p>

            <h6>Ways to find and share your invite code:</h6>
            <p>
            1. Login to your valgee account<br>
            2. Copy or share the referral code available on your profile to your family and friends
            </p>
            <h6 class="text-danger">Please note that only first time users can use a referral code for booking</h6>
            <p>For more terms and conditions <a href="{{ route('terms') }}" class="text-success text-underline">Click here</a>
                    
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@stop

