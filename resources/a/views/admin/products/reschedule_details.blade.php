@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Trips
    @parent
@stop

@section('header_styles')
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{ asset('vendors/select2/css/select2.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('vendors/datatables/css/scroller.bootstrap.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('vendors/datatables/css/colReorder.bootstrap.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/pages/dataTables.bootstrap.css') }}" />
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
                        <i class="fa fa-table"></i>Customer Booking Information
                    </div>
                    <div class="card-body m-t-35 bg-white">

                        <div class="row align-items-center justify-content-between">
                            
                            <div class="col-12 pt-3">
                                <h2 class="pt-2">{{ $trip->route->origin }} - {{ $trip->route->destination }}</h2>
                            </div>

                            <div class="col-12 col-lg-6">
                                <table id="example1" class="display table table-stripped table-bordered">
                                    <tbody>
                                        <tr><td><b>Vehicle: </b></td><td>{{ $trip->vehicle->reg_no }}, {{ $trip->vehicle->description }} ({{ $trip->vehicle->capacity }}-Seater)</td></tr>
                                        <tr><td><b>Trip Status: </b></td><td><span class="badge badge-{{ $trip->status->style }}">{{ $trip->status->name }}</span></td></tr>
                                        <tr><td><b>Trip Date: </b></td><td>{{ date('d M Y', strtotime($trip->date)) }}, {{ date('h:ia', strtotime($trip->time)) }}</td></tr>
                                        <tr><td><b>Amount: </b></td><td>&#8358;{{ number_format(floatval($trip->amount), 2) }} per seat</td></tr>
                                    </tbody>
                                </table>

                                <table id="example1" class="display table table-stripped table-bordered">
                                    <tbody>
                                        <tr><td><b>Name: </b></td><td>{{ $booking->name }}</td></tr>
                                        <tr><td><b>Phone: </b></td><td>{{ $booking->phone }}</td></tr>
                                        <tr><td><b>Gender: </b></td><td>{{ $booking->gender }}</td></tr>
                                        <tr><td><b>Email: </b></td><td>{{ $booking->user->email }}</td></tr>
                                    </tbody>
                                </table>
                                
                            </div>


                            <div class="col-12 col-lg-6 pt-5">
                                <table id="example1" class="display table table-stripped table-bordered">
                                    <tbody>
                                        <tr><td><b>Name: </b></td><td>{{ $booking->name }}</td></tr>
                                        <tr><td><b>Phone: </b></td><td>{{ $booking->phone }}</td></tr>
                                        <tr><td><b>Gender: </b></td><td>{{ $booking->gender }}</td></tr>
                                        <tr><td><b>Email: </b></td><td>{{ $booking->user->email }}</td></tr>
                                    </tbody>
                                </table>
                                
                                <form action="{{ route('admin.booking.reschedule.seats') }}" method="POST">
                                    @csrf
                                    
                                    <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                                    <input type="hidden" name="noofseats" value="1">
                                    <input type="hidden" name="booking_id" value="{{ $trip->id }}">
                                    <div class="form-submit text-right">
                                        <button type="submit" class="btn btn-primary mt-15">Continue & Select Seats </button>
                                    </div>
                                </form>
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
