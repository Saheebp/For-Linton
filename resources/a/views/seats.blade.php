@extends(('layouts/frontend'))

@section('booking')
<section class="contact-area section-padding-100-0 position-relative" id="book" style="margin:150px 0 100px 0px;">
    <div class="container">
        <div class="row align-items-center justify-content-between">

            
            <div class="col-12 col-lg-6 offset-lg-3">

                <div class="section-heading text-center" style="margin-top:0px;">
                    <h3>Select Your {{ $noofseats ?? ''}} Seat(s)</h3>
                </div>

                <div class="map-area mb-100">  
                    
                    <div class="row">
                        <div class="col-12 p-2">
                            <form action="{{ route('client.booking.preview') }}" method="POST">
                            @csrf

                                <input type="hidden" name="source" value="{{old('source', 'client')}}">
                                <input type="hidden" name="trip_id" value="{{old('trip_id', $trip->id) }}">
                                <input type="hidden" name="metadata" value="{{old('metadata', $metadata) }}">
                                <input type="hidden" name="bookingIds" value="{{old('bookingIds', $bookingIds) }}">
                                <input type="hidden" name="userdetails" value="{{old('userdetails', $userdetails) }}">
                                
                                <div class="p-2 text-center">

                                    @if(isset($error))
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

                                    <table class="table table-striped">

                                    <tr>
                                        <td colspan="2" style="padding-right:5px; padding-left:5px;">
                                            <h3>{{ $trip->route->origin }} - {{ $trip->route->destination }}</h3>
                                            <tag class="text-capitalize text-success">{{ $trip->tripType->name }}</tag>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="padding-right:5px; padding-left:5px;">
                                            <h5>{{ date('D d M Y', strtotime($trip->date)) }}, at {{ date('h:i:a', strtotime($trip->time)) }}</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-right:5px; padding-left:5px;"><b>Passenger(s): </b><br>{{ $passenger_names }} </td>
                                    </tr>
                                    <!-- <tr>
                                        <td style="padding-right:5px; padding-left:5px;"><b>Total Amount: </b><br> &#8358;{{ number_format(floatval($amount), 0) }} for {{ $noofseats }} seats</td>
                                    </tr> -->
                                    @if($referralstatus == 'true')
                                    <tr>
                                        <td style="padding-right:5px; padding-left:5px;"><b>Referral Code: </b><br> {{ isset($referral_code) ? $referral_code : 'N/A'  }}</td>
                                    </tr>
                                    @endif
                                </table>

                                    <table border="0" width="30%" height="10px;" class="mt-3 mb-3 text-center" style="margin:auto;">
                                        <tr>
                                            <td style="width:10%;" class="bg-danger">
                                                <tag class="text-center text-white" style="font-size:12px; padding:5px;">Booked</tag>
                                            </td>
                                            
                                            <td style="width:10%;"  class="bg-dark">
                                                <tag class="text-center text-white" style="font-size:12px; padding:5px;">Available</tag>
                                            </td>

                                            <td style="width:10%;" class="bg-success">
                                                <tag class="text-center text-white" style="font-size:12px; padding:5px;">Selected</tag>
                                            </td>

                                            <!-- <td style="width:70%;">
                                                <tag class="text-right text-danger" style="font-size:16px; padding:5px;">
                                                Select Maximum of {{ $noofseats }} Seats
                                                </tag>
                                            </td> -->
                                        </tr>
                                    </table>
                                <div>

                                <div class="text-center m-2 p-sm-5">
                                    @if($trip->tripType->name == 'regular')
                                        <table align="center" width="75%" height="" style="
                                            border-top-left-radius:20px;  
                                            border-top-right-radius:20px; 
                                            border-collapse:separate; 
                                            border:solid black 1px;
                                            margin:auto; 
                                            ">
                                            <tr>
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/driver.png')}}"/>
                                                </td>

                                                <td style="width:20%;">&nbsp;</td>

                                                @if($seats[1] == '1')
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/red.png')}}"/>
                                                </td>
                                                @else
                                                <td style="width:20%;">
                                                    <input type="checkbox" id="myCheckbox1" name="seats[]"  value="1" style="display:none" />
                                                    <label for="myCheckbox1"><img src="{{asset('frontend/img/app-img/seat1.png')}}"/></label>
                                                </td>
                                                @endif
                                            
                                            </tr>
                                            <tr>
                                                @if($seats[2] == '2')
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/red.png')}}" width="70%" />
                                                </td>
                                                @else
                                                <td style="width:20%;">
                                                    <input type="checkbox" id="myCheckbox2" name="seats[]"  value="2" />
                                                    <label for="myCheckbox2"><img src="{{asset('frontend/img/app-img/seat2.png')}}"/></label>
                                                </td>
                                                @endif
                                    
                                                @if($seats[3] == '3')
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/red.png')}}" width="70%" />
                                                </td>
                                                @else
                                                <td style="width:20%;">
                                                    <input type="checkbox" id="myCheckbox3" name="seats[]" value="3" />
                                                    <label for="myCheckbox3"><img src="{{asset('frontend/img/app-img/seat3.png')}}"/></label>
                                                </td>
                                                @endif

                                                @if($seats[4] == '4')
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/red.png')}}" width="70%" />
                                                </td>
                                                @else
                                                <td style="width:20%;">
                                                    <input type="checkbox" id="myCheckbox4" name="seats[]" value="4"/>
                                                    <label for="myCheckbox4"><img src="{{asset('frontend/img/app-img/seat4.png')}}"/></label>
                                                </td>
                                                @endif
                                            
                                            </tr>
                                            <tr>
                                                @if($seats[5] == '5')
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/red.png')}}" width="70%" />
                                                </td>
                                                @else
                                                <td style="width:20%;">
                                                    <input type="checkbox" id="myCheckbox5" name="seats[]" value="5" />
                                                    <label for="myCheckbox5"><img src="{{asset('frontend/img/app-img/seat5.png')}}"/></label>
                                                </td>
                                                @endif

                                                @if($seats[6] == '6')
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/red.png')}}" width="70%" />
                                                </td>
                                                @else
                                                <td style="width:20%;">
                                                    <input type="checkbox" id="myCheckbox6" name="seats[]" value="6" />
                                                    <label for="myCheckbox6"><img src="{{asset('frontend/img/app-img/seat6.png')}}"/></label>
                                                </td>
                                                @endif

                                                @if($seats[7] == '7')
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/red.png')}}" width="70%" />
                                                </td>
                                                @else
                                                <td style="width:20%;">
                                                    <input type="checkbox" id="myCheckbox7" name="seats[]" value="7"/>
                                                    <label for="myCheckbox7"><img src="{{asset('frontend/img/app-img/seat7.png')}}"/></label>
                                                </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($seats[8] == '8')
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/red.png')}}" width="70%" />
                                                </td>
                                                @else
                                                <td style="width:20%;">
                                                    <input type="checkbox" id="myCheckbox8" name="seats[]" value="8"/>
                                                    <label for="myCheckbox8"><img src="{{asset('frontend/img/app-img/seat8.png')}}"/></label>
                                                </td>
                                                @endif

                                                @if($seats[9] == '9')
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/red.png')}}" width="70%" />
                                                </td>
                                                @else
                                                <td style="width:20%;">
                                                    <input type="checkbox" id="myCheckbox9" name="seats[]"  value="9" placeholder="9"/>
                                                    <label for="myCheckbox9"><img src="{{asset('frontend/img/app-img/seat9.png')}}"/></label>
                                                </td>
                                                @endif

                                                @if($seats[10] == '10')
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/red.png')}}" width="70%" />
                                                </td>
                                                @else
                                                <td style="width:20%;">
                                                    <input type="checkbox" id="myCheckbox10" name="seats[]" value="10"/>
                                                    <label for="myCheckbox10"><img src="{{asset('frontend/img/app-img/seat10.png')}}"/></label>
                                                </td>
                                                @endif
                                            </tr>
                                            <tr>

                                                @if($seats[11] == '11')
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/red.png')}}" width="70%" />
                                                </td>
                                                @else
                                                <td style="width:20%;">
                                                    <input type="checkbox" id="myCheckbox11" name="seats[]" value="11" />
                                                    <label for="myCheckbox11"><img src="{{asset('frontend/img/app-img/seat11.png')}}"/></label>
                                                </td>
                                                @endif

                                                @if($seats[12] == '12')
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/red.png')}}" width="70%" />
                                                </td>
                                                @else
                                                <td style="width:20%;">
                                                    <input type="checkbox" id="myCheckbox12" name="seats[]"  value="12"/>
                                                    <label for="myCheckbox12"><img src="{{asset('frontend/img/app-img/seat12.png')}}"/></label>
                                                </td>
                                                @endif

                                                @if($seats[13] == '13')
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/red.png')}}" width="70%" />
                                                </td>
                                                @else
                                                <td style="width:20%;">
                                                    <input type="checkbox" id="myCheckbox13" name="seats[]" value="13"/>
                                                    <label for="myCheckbox13"><img src="{{asset('frontend/img/app-img/seat13.png')}}"/></label>
                                                </td>
                                                @endif
                                            </tr>
                                        </table>
                                    @else
                                        <table align="center" width="75%" height="" style="
                                            border-top-left-radius:20px;  
                                            border-top-right-radius:20px; 
                                            border-collapse:separate; 
                                            border:solid black 1px;
                                            margin:auto; 
                                            ">
                                            <tr>
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/driver.png')}}"/>
                                                </td>

                                                <td style="width:20%;">&nbsp;</td>

                                                @if($seats[1] == '1')
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/red.png')}}"/>
                                                </td>
                                                @else
                                                <td style="width:20%;">
                                                    <input type="checkbox" id="myCheckbox1" name="seats[]"  value="1" style="display:none" />
                                                    <label for="myCheckbox1"><img src="{{asset('frontend/img/app-img/seat1.png')}}"/></label>
                                                </td>
                                                @endif
                                            
                                            </tr>
                                            <tr>
                                                @if($seats[2] == '2')
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/red.png')}}" width="70%" />
                                                </td>
                                                @else
                                                <td style="width:20%;">
                                                    <input type="checkbox" id="myCheckbox2" name="seats[]"  value="2" />
                                                    <label for="myCheckbox2"><img src="{{asset('frontend/img/app-img/seat2.png')}}"/></label>
                                                </td>
                                                @endif

                                                <td style="width:20%;">&nbsp;</td>

                                                @if($seats[3] == '3')
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/red.png')}}" width="70%" />
                                                </td>
                                                @else
                                                <td style="width:20%;">
                                                    <input type="checkbox" id="myCheckbox3" name="seats[]" value="3" />
                                                    <label for="myCheckbox3"><img src="{{asset('frontend/img/app-img/seat3.png')}}"/></label>
                                                </td>
                                                @endif
                                            
                                            </tr>
                                            <tr>
                                                @if($seats[4] == '4')
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/red.png')}}" width="70%" />
                                                </td>
                                                @else
                                                <td style="width:20%;">
                                                    <input type="checkbox" id="myCheckbox4" name="seats[]" value="4"/>
                                                    <label for="myCheckbox4"><img src="{{asset('frontend/img/app-img/seat4.png')}}"/></label>
                                                </td>
                                                @endif

                                                <td style="width:20%;">&nbsp;</td>

                                                @if($seats[5] == '5')
                                                <td style="width:20%;">
                                                    <img src="{{asset('frontend/img/app-img/red.png')}}" width="70%" />
                                                </td>
                                                @else
                                                <td style="width:20%;">
                                                    <input type="checkbox" id="myCheckbox5" name="seats[]" value="5" />
                                                    <label for="myCheckbox5"><img src="{{asset('frontend/img/app-img/seat5.png')}}"/></label>
                                                </td>
                                                @endif
                                            </tr>
                                        </table>
                                    @endif

                                    <table align="center" width="75%" height="" style="margin:auto; margin-top:15px; ">
                                        <tr>
                                            <td class="text-left">
                                                <input type="checkbox" name="tandc" required/> <tag>I have read and agree to the <a class="text-danger" data-toggle="modal" data-target="#termsandcond">terms and conditions</a> of service</tag>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                @if($trip->status_id == '11')
                                                    <tag class="text-success mt-1 mb-3">This Vehicle is filled Up, try another</button>
                                                
                                                @else
                                                    <button type="submit" class="btn btn-md btn-dark mt-3 mb-3">Continue to Payment</button>                                          
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Modal -->
<div id="termsandcond" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p>
            <h3>VALGEE TRANSPORT SERVICES [VTS] TERMS & CONDITIONS</h3>
            <br>
            <h5>Purpose & Scope</h5>
            <p>
                The purpose of the terms and conditions is to govern the contractual relations between Clients and Valgee Transport Services, hereinafter referred to simply as the ‘VTS’, with regards to any undertaking or transaction pertaining transportation services.
            </p>
            
            <p>  
                Except specific terms and conditions are agreed with a Client, and unless otherwise provided, the terms and conditions herein are applicable.
            </p>

            <p>
                The Client or any other agent acting on his/her behalf, acknowledges having read these terms prior to booking, and expressly accepts the same.
            </p>

            <p>
                Due to the nature of Nigerian roads and the consequences of the current pandemic, the pricing of our services as well as the estimated take off and arrival timelines are approximations only and not definite, they may be subject to change independent of our schedule or choice.
            </p>

            <h5>Bookings, Payments & Reservation</h5>
           
            <p>
                Bookings and payments for both shared or Hire VTS reservations can be made onsite at our office addresses provided here or online via this link www.valgee.com .
                In the unlikely event a reservation duly made is not secured, affected Client[s] will be rescheduled to another departure time at no extra cost. 
            </p>
            <p>
                VTS generally has a no refund policy for all reservations made from any of its sales channels. Tickets and reservations cannot be transferred to third parties without the prior permission of VTS sought and obtained.
            </p>
            <h5>Check-in & Boarding</h5>
            
            <p>
                Clients on shared service are required to check-in at the designated take off points thirty [30] minutes before the fixed time of departure. Departure time will not be extended for Client’s that don’t check in and board on schedule. A penalty of twenty [20%] percent of the cost of the Client’s ticket will be charged for rescheduling due to lateness or complete change in travel plans for both Hire and shared service. Client’s that book any shared service but fail to board on schedule may be provided alternative transportation means but subject to vehicle and seat availability. Boarding points are at designated locations as provided here except otherwise agreed.
            </p>
            
            <h5>Luggage Regulations</h5>
            
            <p>
                Clients on shared service are advised to travel light on VTS, our services are primarily designed to transport persons and not goods. For logistics purposes, we are unable to accommodate any luggage exceeding 20 kg, with 30”x22”x15 dimensions on shared services for each Client.
            </p>
            
            <h5>EXCESS LUGGAGE</h5>
            <p>
                We recommend prior notice and arrangement with VTS in cases of excess luggage at the point of booking/reservation so as to clarify on the best means of transporting Client’s luggage. In cases where Client’s luggage exceeds the regulated weight or dimensions, affected Client’s will be asked to either purchase extra seat[s] to accommodate the luggage or pay for alternative arrangement on prior or subsequent vehicles going along the same route.
            </p>
            
            <h5>PACKING & PACKAGING</h5>
            <p>
                Clients are responsible for proper packing and packaging of their luggage/property on transit as VTS will not be held responsible for goods/luggage damaged due to poor/inappropriate packaging.
                We also recommend the use of flexible travelling bags/boxes as rigid/plastic boxes are fragile and may pose a challenge during luggage loading, handling or offloading.
                Fragile items such as electronics, laptops and other valuables are to be carried by Clients. Fragile Hand luggage are not to be placed in the trunk of our vehicles.
            </p>
            
            <h5>BANNED & REGULATED ITEMS</h5>
            <p>
                Items banned either by the Nigeria Customs Service, National Drug Law Enforcement Agency, National Food & Drugs Administration and Control or any other Nigerian Law for the time being in force, or such other illegal or prohibited items/products/goods are not allowed on our Vehicles.
                Regulated items/products/goods are to be disclosed and necessary permissions for conveying such luggage/property confirmed before check-in/boarding. 
            </p>
            <p>
                VTS will report and hand over Client’s who attempt to, or break any law, to relevant authorities and will not be held liable or responsible 
                for the confiscation or seizure of any such items by law enforcement agencies.
                Explosives and such other hazardous materials such as but not limited to - gas cylinders (empty or with content), generators, building materials, fuel in gallons, agrochemicals, herbicides, pesticides; are not allowed on our vehicles.
            </p>
            
            
            
            <h5>LUGGAGE ID/LABELLING</h5>
            <p>
                On each parcel, item or luggage unit, clear labelling shall be provided to allow immediate and clear identification of the owner, consignee, place of delivery where applicable and the nature of the goods. The information on the labels must match those appearing on the Client’s receipts/boarding pass. Labels shall also meet any applicable regulatory requirements, notably those pertaining to hazardous/regulated products.
            
            </p>
            <p>Luggage is conveyed at owner’s risk especially on shared service, Client’s are advised to take responsibility for their property until arrival and disembarking. Found but unclaimed properties/luggage will be kept for a maximum of 30 [thirty] days before being disposed of (except perishable items which will be discarded depending on how soon they may get bad).
                Clients shall be solely liable for all consequences arising from lack of poor labelling or marking of luggage/property.
            </p>
            
            <h5>Reservation rescheduling</h5>
            <p>
                Clients with unused reservations have 30 [thirty] days to utilise the reservations or consider such tickets forfeited. Note that all rescheduling is subject to vehicle and seat availability on desired route and subject to current rates.
            </p>
            <h5>Online transaction Complications</h5>
            <p>
                Clients are required to contact their banks for account statements should they require a refund due to double debits and debits on card transactions or USSD payments without value using our online booking platform to enable us substantiate and process such claims.
            </p>
            <p>
                Requests for refunds due to online complications may also be processed by sending a mail to valgee.com. Confirmed errors will be addressed provided the account number to be credited has been provided by the Client, a refund will be made within 7 [seven]  to 10 [ten] working days.
            </p>
            <h5>UNDER AGE CLIENTS</h5>
            <p>
                We care about the welfare of underage Clients and have provided a 50% discount on tickets purchased for children between the ages of 2-12 on the app.
                Under age Clients below 12 years cannot travel alone. Discount for under age Clients is limited to a maximum of 3 [three] under age Clients per Parent. Unaccompanied children between the ages of 12 to 17 can travel on the condition that the parent or guardian of the underage Client fills appropriate forms authorizing such movement at the point of reservations/booking.
            </p>
            
            <h5>CHALLENGES WHILE ON TRANSIT</h5>
            <p>
                We do our best to maintain our vehicles in order to fulfil our brief by satisfying our customers, however in the event that any of our vehicles breakdown while enroute, alternative arrangements will be made to convey Client’s to their destination within the best possible time.
                Where an alternative vehicle is provided by VTS to complete the trip, tickets cannot be reused and the Clients will not be entitled to any form of compensation for the delay occasioned to get a new vehicle to complete the trip.
            </p>
            <p>
                For further inquiries please contact our customer relations desk via email at info@valgee.com or mobile phone on: +234 806 088 5322
            </p>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close and Accept</button>
      </div>
    </div>

  </div>
</div>
@stop