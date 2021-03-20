@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Trips
    @parent
@stop

@section('header_styles')
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/select2/css/select2.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/datatables/css/scroller.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/datatables/css/colReorder.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/datatables/css/dataTables.bootstrap.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/pages/dataTables.bootstrap.css')}}" />
    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('css/pages/tables.css')}}" />
    <!--End of page level styles-->

@stop

{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <h4 class="nav_top_align skin_txt">
                        <i class="fa fa-road"></i>
                        Trips
                    </h4>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home')}}">
                                <i class="fa ti-file" data-pack="default" data-tags=""></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Trips </a>
                        </li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-light lter bg-container">
            <div class="row">
                <div class="col-12 data_tables">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success pt-0 pb-0">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    @if ($message = Session::get('failure'))
                    <div class="alert alert-danger pt-0 pb-0">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    
                    <div class="card-header bg-white">
                        <i class="fa fa-table"></i>Booking Reschedule
                    </div>
                    <div class="card-body m-t-35 bg-white">
                        
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 mt-5 mb-5">

                            <div class="pt-3 pb-3"><h4>Customer Imformation</h4></div>
                            
                            <table id="example1" class="display table table-stripped table-bordered">
                                <tbody>
                                    <tr><td><b>Name: </b></td><td>{{ $booking->name }}</td></tr>
                                    <tr><td><b>Phone: </b></td><td>{{ $booking->phone }}</td></tr>
                                    <tr><td><b>Email: </b></td><td>{{ $booking->user->email }}</td></tr>
                                    <tr><td><b>Ref No: </b></td><td>{{ $booking->ref_no }}</td></tr>
                                </tbody>
                            </table>

                            <div class="pt-3 pb-3"><h4>New Trip Information</h4></div>

                            <table id="example1" class="display table table-stripped table-bordered">
                                <tbody>
                                    <!-- <tr><td><b>Trip ID: </b></td><td>{{ $trip->id }}</td></tr> -->
                                    <tr><td><b>Route: </b></td><td>{{ $trip->route->origin }} - {{ $trip->route->destination }}</td></tr>
                                    <tr><td><b>Vehicle: </b></td><td>{{ $trip->vehicle->reg_no }}, {{ $trip->vehicle->description }} ({{ $trip->vehicle->capacity }}-Seater)</td></tr>
                                    <tr><td><b>Trip Status: </b></td><td><span class="badge badge-{{ $trip->status->style }}">{{ $trip->status->name }}</span></td></tr>
                                    <tr><td><b>Trip Date: </b></td><td>{{ date('d M Y', strtotime($trip->date)) }}, {{ date('h:ia', strtotime($trip->time)) }}</td></tr>
                                    <tr><td><b>Amount: </b></td><td>&#8358;{{ number_format(floatval($trip->amount), 2) }} per seat</td></tr>
                                </tbody>
                            </table>
                            </div>
                            
                            <div class="col-lg-4 pb-3 col-sm-12 mt-5 mb-5">
                           
                                <div class="mt-3 text-center"><h4>Seat Arrangement</h4></div>
                                
                                <table id="example1" width="50%" class="display table table-stripped table-bordered">
                                    <form action="{{ route('admin.booking.reschedule.finalize') }}" method="POST">
                                    @csrf

                                        <input type="hidden" name="booking_id" value="{{ $booking->id }}" >
                                        <input type="hidden" name="trip_id" value="{{ $trip->id }}" >
                                        <input type="hidden" name="source" value="admin">
                                        
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

                                            <table border="0" width="20%" height="10px;" class="mt-3 mb-3 text-center" style="margin:auto;">
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

                                        <div class="text-left m-2">
                                            @if($trip->tripType->name == 'regular')
                                                <table align="center" width="75px" height="" style="
                                                    border-top-left-radius:20px;  
                                                    border-top-right-radius:20px; 
                                                    border-collapse:separate; 
                                                    border:solid black 1px;
                                                    margin:auto; 
                                                    ">
                                                    <tr>
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/driver.png')}}"  width="75px;"/>
                                                        </td>

                                                        <td style="width:20%;">&nbsp;</td>

                                                        @if($seats[1] == '1')
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/red.png')}}"  width="75px;"/>
                                                        </td>
                                                        @else
                                                        <td style="width:20%;">
                                                            <input type="checkbox" id="myCheckbox1" name="seats[]"  value="1" />
                                                            <label for="myCheckbox1"><img src="{{asset('frontend/img/app-img/seat1.png')}}"  width="75px;"/></label>
                                                        </td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        @if($seats[2] == '2')
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/red.png')}}"  width="75px;"/>
                                                        </td>
                                                        @else
                                                        <td style="width:20%;">
                                                            <input type="checkbox" id="myCheckbox2" name="seats[]"  value="2" />
                                                            <label for="myCheckbox2"><img src="{{asset('frontend/img/app-img/seat2.png')}}"  width="75px;"/></label>
                                                        </td>
                                                        @endif
                                            
                                                        @if($seats[3] == '3')
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/red.png')}}"  width="75px;"/>
                                                        </td>
                                                        @else
                                                        <td style="width:20%;">
                                                            <input type="checkbox" id="myCheckbox3" name="seats[]" value="3" />
                                                            <label for="myCheckbox3"><img src="{{asset('frontend/img/app-img/seat3.png')}}"  width="75px;"/></label>
                                                        </td>
                                                        @endif

                                                        @if($seats[4] == '4')
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/red.png')}}"  width="75px;"/>
                                                        </td>
                                                        @else
                                                        <td style="width:20%;">
                                                            <input type="checkbox" id="myCheckbox4" name="seats[]" value="4"/>
                                                            <label for="myCheckbox4"><img src="{{asset('frontend/img/app-img/seat4.png')}}"  width="75px;"/></label>
                                                        </td>
                                                        @endif
                                                    
                                                    </tr>
                                                    <tr>
                                                        @if($seats[5] == '5')
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/red.png')}}"  width="75px;"/>
                                                        </td>
                                                        @else
                                                        <td style="width:20%;">
                                                            <input type="checkbox" id="myCheckbox5" name="seats[]" value="5" />
                                                            <label for="myCheckbox5"><img src="{{asset('frontend/img/app-img/seat5.png')}}"  width="75px;"/></label>
                                                        </td>
                                                        @endif

                                                        @if($seats[6] == '6')
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/red.png')}}"  width="75px;"/>
                                                        </td>
                                                        @else
                                                        <td style="width:20%;">
                                                            <input type="checkbox" id="myCheckbox6" name="seats[]" value="6" />
                                                            <label for="myCheckbox6"><img src="{{asset('frontend/img/app-img/seat6.png')}}"  width="75px;"/></label>
                                                        </td>
                                                        @endif

                                                        @if($seats[7] == '7')
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/red.png')}}"  width="75px;"/>
                                                        </td>
                                                        @else
                                                        <td style="width:20%;">
                                                            <input type="checkbox" id="myCheckbox7" name="seats[]" value="7"/>
                                                            <label for="myCheckbox7"><img src="{{asset('frontend/img/app-img/seat7.png')}}"  width="75px;"/></label>
                                                        </td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        @if($seats[8] == '8')
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/red.png')}}"  width="75px;"/>
                                                        </td>
                                                        @else
                                                        <td style="width:20%;">
                                                            <input type="checkbox" id="myCheckbox8" name="seats[]" value="8"/>
                                                            <label for="myCheckbox8"><img src="{{asset('frontend/img/app-img/seat8.png')}}"  width="75px;"/></label>
                                                        </td>
                                                        @endif

                                                        @if($seats[9] == '9')
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/red.png')}}"  width="75px;"/>
                                                        </td>
                                                        @else
                                                        <td style="width:20%;">
                                                            <input type="checkbox" id="myCheckbox9" name="seats[]"  value="9" placeholder="9"/>
                                                            <label for="myCheckbox9"><img src="{{asset('frontend/img/app-img/seat9.png')}}"  width="75px;"/></label>
                                                        </td>
                                                        @endif

                                                        @if($seats[10] == '10')
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/red.png')}}"  width="75px;"/>
                                                        </td>
                                                        @else
                                                        <td style="width:20%;">
                                                            <input type="checkbox" id="myCheckbox10" name="seats[]" value="10"/>
                                                            <label for="myCheckbox10"><img src="{{asset('frontend/img/app-img/seat10.png')}}"  width="75px;"/></label>
                                                        </td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        @if($seats[11] == '11')
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/red.png')}}"  width="75px;"/>
                                                        </td>
                                                        @else
                                                        <td style="width:20%;">
                                                            <input type="checkbox" id="myCheckbox11" name="seats[]" value="11" />
                                                            <label for="myCheckbox11"><img src="{{asset('frontend/img/app-img/seat11.png')}}"  width="75px;"/></label>
                                                        </td>
                                                        @endif

                                                        @if($seats[12] == '12')
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/red.png')}}"  width="75px;"/>
                                                        </td>
                                                        @else
                                                        <td style="width:20%;">
                                                            <input type="checkbox" id="myCheckbox12" name="seats[]" />
                                                            <label for="myCheckbox12"><img src="{{asset('frontend/img/app-img/seat12.png')}}"  width="75px;"/></label>
                                                        </td>
                                                        @endif

                                                        @if($seats[13] == '13')
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/red.png')}}"  width="75px;"/>
                                                        </td>
                                                        @else
                                                        <td style="width:20%;">
                                                            <input type="checkbox" id="myCheckbox13" name="seats[]" value="13"/>
                                                            <label for="myCheckbox13"><img src="{{asset('frontend/img/app-img/seat13.png')}}"  width="75px;"/></label>
                                                        </td>
                                                        @endif
                                                    </tr>
                                                </table>
                                            @else
                                                <table align="center" width="75px" height="" style="
                                                    border-top-left-radius:20px;  
                                                    border-top-right-radius:20px; 
                                                    border-collapse:separate; 
                                                    border:solid black 1px;
                                                    margin:auto; 
                                                    ">
                                                    <tr>
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/driver.png')}}"  width="75px;"/>
                                                        </td>

                                                        <td style="width:20%;">&nbsp;</td>

                                                        @if($seats[1] == '1')
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/red.png')}}"  width="75px;"/>
                                                        </td>
                                                        @else
                                                        <td style="width:20%;">
                                                            <input type="checkbox" id="myCheckbox1" name="seats[]"  value="1" />
                                                            <label for="myCheckbox1"><img src="{{asset('frontend/img/app-img/seat1.png')}}" width="75px;"/></label>
                                                        </td>
                                                        @endif
                                                    
                                                    </tr>
                                                    <tr>
                                                        @if($seats[2] == '2')
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/red.png')}}"  width="75px;"/>
                                                        </td>
                                                        @else
                                                        <td style="width:20%;">
                                                            <input type="checkbox" id="myCheckbox2" name="seats[]"  value="2" />
                                                            <label for="myCheckbox2"><img src="{{asset('frontend/img/app-img/seat2.png')}}"  width="75px;"/></label>
                                                        </td>
                                                        @endif

                                                        <td style="width:20%;">&nbsp;</td>

                                                        @if($seats[3] == '3')
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/red.png')}}"  width="75px;"/>
                                                        </td>
                                                        @else
                                                        <td style="width:20%;">
                                                            <input type="checkbox" id="myCheckbox3" name="seats[]" value="3" />
                                                            <label for="myCheckbox3"><img src="{{asset('frontend/img/app-img/seat3.png')}}"  width="75px;"/></label>
                                                        </td>
                                                        @endif
                                                    
                                                    </tr>
                                                    <tr>
                                                        @if($seats[4] == '4')
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/red.png')}}"  width="75px;"/>
                                                        </td>
                                                        @else
                                                        <td style="width:20%;">
                                                            <input type="checkbox" id="myCheckbox4" name="seats[]" value="4"/>
                                                            <label for="myCheckbox4"><img src="{{asset('frontend/img/app-img/seat4.png')}}"  width="75px;"/></label>
                                                        </td>
                                                        @endif

                                                        <td style="width:20%;">&nbsp;</td>

                                                        @if($seats[5] == '5')
                                                        <td style="width:20%;">
                                                            <img src="{{asset('frontend/img/app-img/red.png')}}"  width="75px;"/>
                                                        </td>
                                                        @else
                                                        <td style="width:20%;">
                                                            <input type="checkbox" id="myCheckbox5" name="seats[]" value="5" />
                                                            <label for="myCheckbox5"><img src="{{asset('frontend/img/app-img/seat5.png')}}"  width="75px;"/></label>
                                                        </td>
                                                        @endif
                                                    </tr>
                                                </table>
                                            @endif
                                        </div>
                                        
                                        <div class="text-center pl-5 pl-sm-5 col-12 mt-3">
                                            @if($trip->status_id == '11')
                                                <tag class="text-success mt-1 mb-3">This Vehicle is filled Up, try another</button>
                                            @else
                                                <button type="submit" class="btn btn-md btn-success mt-1 mb-3">Save & Reschedule</button>
                                            @endif
                                        </div>
                                    </form>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->
    <!-- /.content -->
@stop


@section('footer_scripts')
    <!--plugin scripts-->
    <script type="text/javascript" src="{{asset('vendors/select2/js/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/pluginjs/dataTables.tableTools.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.colReorder.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.responsive.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.rowReorder.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/buttons.colVis.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/buttons.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/buttons.print.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/datatables/js/dataTables.scroller.min.js')}}"></script>
    <!-- end of plugin scripts -->
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('js/pages/simple_datatables.js')}}"></script>
    <!-- end of global scripts-->
@stop
