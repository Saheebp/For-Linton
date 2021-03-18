@extends(('layouts/frontend'))

@section('booking')
<section class="contact-area section-padding-100-0 position-relative" id="book" style="margin:150px 0 100px 0px;">
    <div class="container">
        <div class="row align-items-center justify-content-between">

            <div class="col-12 col-lg-6 offset-lg-3" style="padding-top:1px;">

                <div class="section-heading text-center" style="margin-top:0px;">
                    <h2>Make Payment</h2>
                </div>

                <div class="table-responsive text-center"> 
                    <table class="table table-striped">
                        <tr>
                            <td colspan="2" style="padding-right:5px; padding-left:5px;">
                                <h3 style="margin-bottom:1px;">{{ $trip->route->origin }} - {{ $trip->route->destination }}</h3>
                                <tag class="text-capitalize text-success">{{ $trip->tripType->name }}</tag>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-right:5px; padding-left:5px;">
                                <h5>{{ date('D d M Y', strtotime($trip->date)) }}, at {{ date('h:i:a', strtotime($trip->time)) }}</h5>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td colspan="2" style="padding-right:5px; padding-left:5px;">
                                <h6 class="text-success">{{ $ref_no }}</h6>
                            </td>
                        </tr> -->
                        <tr>
                            <td colspan="2" style="padding-right:5px; padding-left:5px;"><b>Passenger(s): </b><br>{{ $passenger_names }} </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-right:5px; padding-left:5px;"><b>Amount to Pay: </b><br> &#8358;{{ number_format(floatval($amount), 0) }} for {{ $noofseats }} seats</td>
                        </tr>

                        @if($referralstatus == 'true')
                        <tr>
                            <td colspan="2" style="padding-right:5px; padding-left:5px;"><b>Referral Code: </b><br> {{ isset($referral_code) ? $referral_code : 'N/A'  }}</td>
                        </tr>
                        @endif
                        <tr>
                            @if($wallet_balance >= $amount && $walletpay == 'true')
                                <td width="50%" class="text-right" style="padding-right:5px; padding-left:5px;">
                            @else
                                <td class="text-center" style="padding-right:5px; padding-left:5px;">
                            @endif
                                <form action="{{ route('pay') }}" method="POST">
                                @csrf

                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="currency" value="NGN">
                                    <input type="hidden" name="email" value="{{ old('email', $email) }}">
                                    <input type="hidden" name="phone" value="{{ old('phone', $phone) }}">
                                    <input type="hidden" name="amount" value="{{ old('amount', $amount) }}00">
                                    <input type="hidden" name="reference" value="{{ old('ref_no', $ref_no) }}">
                                    <input type="hidden" name="metadata" value="{{ old('metadata', $metadata) }}">

                                    <input type="hidden" name="trip_id" value="{{ old('trip_id', $trip->id) }}">
                                    <input type="hidden" name="seats" value="{{ old('seats', $seats) }}">
                                    <input type="hidden" name="source" value="{{ old('source', 'client') }}">
                                    <input type="hidden" name="bookingIds" value="{{ old('bookingIds', $bookingIds) }}">
                                    <input type="hidden" name="userdetails" value="{{ old('userdetails', $userdetails) }}">

                                    <button type="submit" class="btn btn-success btn-md mt-1 mb-3">Pay with Card</button>  
                                </form>
                            @if($wallet_balance >= $amount && $walletpay == 'true')
                            </td>
                            <td width="50%" class="text-left" style="left padding-right:5px; padding-left:5px;">
                                <form action="{{ route('wallet.pay') }}" method="POST">
                                @csrf
                                    <input type="hidden" name="ref_no" value="{{ $ref_no }}">
                                    <input type="hidden" name="type" value="wallet">
                                    <input type="hidden" name="purpose" value="bookings">
                                    <input type="hidden" name="referral_code" value="{{ $referral_code }}">
                                    <input type="hidden" name="bookingIds" value="{{ $bookingIds }}">
                                    <button type="submit" class="btn btn-md btn-primary mt-1 mb-3">Pay from &#8358;{{ number_format(floatval(Auth::user()->wallet->sum('amount')), 0) }} Wallet Balance </button>
                                </form>
                            </td>
                            @else
                            </td>
                            @endif
                        </tr>
                    </table>
                    <h2>&nbsp;</h2>
                </div>
                
            </div>

        </div>
    </div>
</section>
@stop