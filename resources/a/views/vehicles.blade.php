@extends(('layouts/frontend'))

@section('booking')
<section class="contact-area section-padding-100-0 position-relative" id="book" style="margin:150px 0 100px 0px;">
    <div class="container">
        <div class="row align-items-center justify-content-between">

            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h6>AVAILABLE TRIPS</h6>
                    <h2>{{ $route->origin }} - {{ $route->destination }}</h2>
                    <h5 class="text-success text-uppercase mt-1">{{ $details['description'] }} TRIP</h5>
                    
                    <p> <b>Date, </b> {{ date('d M Y', strtotime($details['date'])) }}</p>
                </div>
                <!-- Contact Form Area -->
                <div class="contact-form-area mb-100">
                    <div class="row">
                        <div class="col-12">

                            <div class="table-responsive"> 
                                <table class="table table-striped">
                                    @foreach($trips as $trip)
                                    <tr>
                                        <td style="padding-right:5px; padding-left:5px;"><b>Time: </b><br> {{ date('h:i A', strtotime($trip->time)) }}</td>
                                        <td style="padding-right:5px; padding-left:5px;"><b>Availability: </b><br><tag class="text-danger">{{ $trip->remaining_seats }} seats available </tag></td>
                                        <td style="padding-right:5px; padding-left:5px;"><b>Amount: </b><br> &#8358;{{ number_format(floatval($trip->amount), 0) }}/seat</td>
                                        <td style="padding:5px; padding-left:5px; width:10px;">
                                        <b>&nbsp; </b><br>
                                            @if( $trip->remaining_seats != '0' || $trip->status_id != 2 )
                                                <form class="form-horizontal" action="{{ route('client.booking.details')}}" method="POST" id="{{ $trip->id }}">
                                                    @csrf
                                                    <input hidden name="trip_id" value="{{ $trip->id }}">
                                                    <input hidden name="noofseats" value="{{ $details['noofseats'] }}">
                                                    <input hidden name="referral_code" value="{{ $details['referral_code'] }}">
                                                    <button class="btn btn-sm btn-responsive layout_btn_prevent btn-success">Select & Continue</button>
                                                </form>
                                            @else
                                                <span class="text-danger pr-2 pl-2"> Unavailable </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                        <div class="col-12">
                            <b>Travel Notes:</b> <br>it’s a travel experience. we aim to help you create the most comfortable journey. 
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="col-12 col-lg-6">
                <div class="map-area mb-100">  
                    <a href="#"><img src="{{asset('frontend/img/app-img/book.jpg')}}" alt=""></a>
                </div>
            </div> -->

        </div>
    </div>
</section>
@stop