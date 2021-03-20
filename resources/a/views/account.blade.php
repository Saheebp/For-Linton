@extends(('layouts/frontend'))

@section('booking')
<section class="contact-area section-padding-100-0 position-relative" id="book" style="margin:150px 0 100px 0px;">
    <div class="container">
        <div class="row align-items-center justify-content-between">

            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h3 class="mb-3">Your Account</h3>
                    <h5>{{ Auth::user()->name }}</h5>
                    <h5>{{ Auth::user()->email }}</h5>
                    <h6>{{ Auth::user()->phone }}</h6>
                    <h6>{{ Auth::user()->nok_name }}</h6>
                    <h6>{{ Auth::user()->nok_phone }}</h6>
                </div>
            
                <!-- Contact Form Area -->
                <div class="contact-form-area mb-100">
                    @if($referralstatus == 'true')
                        <tag class="border border-dark p-2"> REFVTS{{ Auth::user()->id }}</tag>
                        
                        <br><br>
                        Share Referral code to:
                        <br>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A//valgee.com/bookings/shared/referral/REFVTS{{ Auth::user()->id }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook"><img width="30px;" src="{{asset('frontend/img/app-img/ifacebook.png')}}" alt=""></a>
                        <a href="https://api.whatsapp.com/send?text=Hi%0A%0ABook%20for%20your%20next%20trip%20from%20ABUJA%20TO%20JOS%20on%20valgee.com%20using%20the%20code%20below%0A%0AREFVTS{{ Auth::user()->id }}%0A%0Ait%20qualifies%20me%20for%20a%20free%20ride%20on%20Valgee%20Transport%20Services%0A%0AYou%20get%20your%20referral%20code%20after%20your%20first%20successful%20booking%20www.valgee.com" data-action="share/whatsapp/share" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on whatsapp"><img width="30px;" src="{{asset('frontend/img/app-img/iwhatsapp.png')}}" alt=""></a>
                        <a href="https://twitter.com/intent/tweet?text=Hi%0A%0ABook%20for%20your%20next%20trip%20from%20ABUJA%20TO%20JOS%20on%20valgee.com%20using%20the%20code%20below%0A%0AREFVTS{{ Auth::user()->id }}%0A%0Ait%20qualifies%20me%20for%20a%20free%20ride%20on%20Valgee%20Transport%20Services%0A%0AYou%20get%20your%20referral%20code%20after%20your%20first%20successful%20booking%20www.valgee.com%0A%0A" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><img width="30px;" src="{{asset('frontend/img/app-img/itwitter.png')}}" alt=""></a>
                        <a href="https://pinterest.com/pin/create/button/?url=https%3A//valgee.com/frontend/img/app-img/valgee8.jpeg&media=Valgee%20Transport%20Services&description=Use%20this%20code%3A%20REFVTS{{ Auth::user()->id }}%20to%20book%20for%20your%20trip%20from%20ABUJA%20TO%20JOS%20and%20get%20me%20a%20free%20ride,%20you%20can%20do%20the%20same%20for%20yourself%20by%20visiting%20valgee.com,%20you%20get%20you%20referral%20code%20after%20your%20first%20successful%20booking" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Pintrest"><img width="30px;" src="{{asset('frontend/img/app-img/ipinterest.png')}}" alt=""></a>
                        <br><br>
                        <a style="font-size:16px;" data-toggle="modal" data-target="#HowItWorks"><tag class="text-success text-underline">Click here</tag> and Read on how this works</a>
                    @endif
                    <p class="text-danger" style="margin-bottom:0px;">You have {{ Auth::user()->referral_count ?? '0' }} referrals and a wallet balance of &#8358;{{ Auth::user()->wallet->sum('amount') ?? '0' }}</p>
                    
                    <h5 class="mt-5">Booking History</h5>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive"> 
                                <table class="table table-bordered">
                                    
                                    <tr>
                                        <td style="width:12%; padding:10px;"><b>Route </b></td>
                                        <td style="width:13%; padding:10px;"><b>Boking Date </b></td>
                                        <td style="width:20%; padding:10px;"><b>Name </b></td>
                                        <td style="width:5%; padding:10px;"><b>Reference </b></td>
                                        <td style="width:5%; padding:10px;"><b>Amount </b></td>
                                        <td style="width:5%; padding:10px;"><b>Status </b></td>
                                        <td style="width:5%; padding:10px;" class="text-center"><b>Action </b></td>
                                    </tr>
                                    @foreach(Auth::user()->booking as $booking)
                                    <tr>
                                        <td style="padding:5px;">{{ $booking->trip->route->origin }} - {{ $booking->trip->route->destination }} : {{ date('h:i A', strtotime($booking->time)) }}</td>
                                        <td style="padding:5px;">{{ date('d/m/Y', strtotime($booking->created_at)) }}, {{ date('h:i A', strtotime($booking->created_at)) }}</td>
                                        <td style="padding:5px;">{{ $booking->name }}</td>
                                        <td style="padding:5px;">{{ $booking->ref_no }}</td>
                                        <td style="padding:5px;">&#8358;{{ number_format(floatval($booking->trip->amount), 2) }}</td>
                                        <td style="padding:5px;" class="text-{{ $booking->status->style }}">{{ $booking->status->name }}</td>
                                        <td style="padding:5px;" class="text-center"> 
                                            @if( $booking->status_id == '0')
                                            <form action="{{ route('client.booking.pay') }}" method="post">
                                                @csrf
                                                    <input type="hidden" name="booking_id" value="{{ $booking->id }}" >
                                                    <button type="submit" class="btn btn-sm btn-success mt-1 ">Pay for Trip</button>
                                                </form>
                                            @else
                                            <button type="submit" class="btn btn-sm btn-warning mt-1 ">Rate</button>
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

        </div>
    </div>
</section>


<!-- Modal -->
<div id="HowItWorks" class="modal fade" role="dialog">
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