@extends(('layouts/frontend'))

@section('booking')
<section class="contact-area section-padding-100-0 position-relative" id="book" style="margin:150px 0 100px 0px;">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-12 col-lg-6">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h2>PASSENGER DETAILS</h2>
                    <!-- <p><b>Available, </b>Bus Arrangement</p> -->
                </div>

                <div class="map-area mb-100 p-3">  
                    <div class="row">
                        <div class="col-12">
                            @if(isset($error))
                            <div class="alert alert-danger mb-3"> {{ $error }}</div>
                            @endif

                            <table width="100%" class="table table-striped">
                                <tr>
                                    <td width="40%"><div><b>Route</b></div></td>
                                    <td><div>: {{ $trip->route->origin }} - {{ $trip->route->destination }}  (<tag class="text-capitalize">{{ $trip->tripType->name }}</tag>)</div></td>
                                </tr>
                                <tr>
                                    <td width="40%"><div><b>Date & Time </b></div></td>
                                    <td><div>: {{ date('d F Y', strtotime($trip->date)) }} / <span class="text-danger">{{ date('h:i A', strtotime($trip->time)) }}<span></div></td>
                                </tr>
                                <tr>
                                    <td width="40%"><div><b>No of Seats </b></div></td>
                                    <td><div>: {{ $noofseats }}</div></td>
                                </tr>
                                <tr>
                                    <td width="40%"><div><b>Amount Per Seat</b></div></td>
                                    <td><div>: &#8358;{{ number_format(floatval($trip->amount), 2) }}</div></td>
                                </tr>
                                @if($referralstatus == 'true')
                                <tr>
                                    <td width="40%"><div><b>Referral Code: </b></div></td>
                                    <td><div>: {{ $referral_code ?? 'N/A' }}</div></td>
                                </tr>
                                @endif

                            </table>
                            
                                <form action="{{ route('client.booking.seats') }}" method="POST"  style="padding-top:20px;">
                                @csrf

                                <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                                <input type="hidden" name="noofseats" value="{{ $noofseats }}">
                                <input type="hidden" name="referral_code" value="{{ $referral_code }}">
                                
                                <table width="100%">
                                @for ($i = 1; $i <= $noofseats; $i++)
                                <tr>
                                    <td>
                                        <hr width="100%">
                                        <h5 class="mb-3">Passenger {{ $i }}</h5>

                                        <div class="form-group row">
                                            <div class="form-group col-lg-8 col-sm-12">
                                                Full Name <tag style="font-size:12px; color:red;">(As it appears on ID Card)</tag>
                                                <input class="form-control" type="text" name="passenger[{{$i}}][]" required/>
                                            </div>

                                            <div class="form-group col-lg-4 col-sm-12">
                                                Gender
                                                <select name="passenger[{{$i}}][]" class="form-control p-0 pb-0" required>
                                                    <option value="">-Select Gender-</option>
                                                    <option value="M">Male</option>
                                                    <option value="F">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endfor
                                <tr>
                                    <td>
                                        <hr width="100%">
                                        <div class="form-group row">
                                            <div class="form-group col-12 col-lg-6">
                                                Email
                                                <input class="form-control" type="email" name="email" value="@auth {{{ isset(Auth::user()->email) ? Auth::user()->email : '' }}} @endauth" required />
                                            </div>

                                            <div class="form-group col-12 col-lg-6">
                                                Phone
                                                <input class="form-control" type="tel" name="phone" value="" required />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="form-group col-12 col-lg-6">
                                                Next of Kin Name
                                                <input class="form-control" type="text" name="nok_name" value="" required/>
                                            </div>

                                            <div class="form-group col-12 col-lg-6">
                                                Next of Kin Phone
                                                <input class="form-control" type="tel" name="nok_phone" value="" required/>
                                            </div>
                                        </div>

                                        <div class="form-submit">
                                            <button type="submit" class="btn alazea-btn mt-15"> Select Seats </button>
                                        </div>
                                    </td>
                                </tr>

                                </form>
                            </table>
                        </div>
                        <!-- <div class="col-12">
                            <b>Travel Notes:</b> <br>it’s a travel experience. we aim to help you create the most comfortable journey. 
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <!-- Section Heading -->
                <!-- <div class="section-heading">
                    <h2>SUMMARY</h2>
                    <p><b>trip, </b> details</p>
                </div> -->

                <!-- Contact Form Area -->
                <div class="contact-form-area mb-100">
                    <a href="#"><img src="{{asset('frontend/img/app-img/payment.png')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>
@stop