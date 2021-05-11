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
                        <i class="fa fa-table"></i>Customer Booking Information
                    </div>
                    <div class="card-body m-t-35 bg-white">
                        
                        <div class="row align-items-center justify-content-between">
                            <div class="col-12 col-lg-6">
                            <table id="example1" class="display table table-stripped table-bordered">
                                <tbody>
                                    <tr><td><b>Trip ID: </b></td><td>{{ $trip->id }}</td></tr>
                                    <tr><td><b>Route: </b></td><td>{{ $trip->route->origin }} - {{ $trip->route->destination }}</td></tr>
                                    <tr><td><b>Vehicle: </b></td><td>{{ $trip->vehicle->reg_no }}, {{ $trip->vehicle->description }} ({{ $trip->vehicle->capacity }}-Seater)</td></tr>
                                    <tr><td><b>Trip Status: </b></td><td><span class="badge badge-{{ $trip->status->style }}">{{ $trip->status->name }}</span></td></tr>
                                    <tr><td><b>Trip Date: </b></td><td>{{ date('d M Y', strtotime($trip->date)) }}, {{ date('h:ia', strtotime($trip->time)) }}</td></tr>
                                    <tr><td><b>Amount: </b></td><td>&#8358;{{ number_format(floatval($trip->amount), 2) }} per seat</td></tr>
                                </tbody>
                            </table>
                            </div>
                            <div class="col-12 col-lg-6">
                                <form action="{{ route('admin.booking.seats') }}" method="POST"  style="padding-top:20px;">
                                    @csrf
                                    
                                    <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                                    <input type="hidden" name="noofseats" value="{{ $noofseats }}">
                                    
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
                                                    <input class="form-control" type="email" name="email" value="" required />
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
                                                <button type="submit" class="btn btn-primary mt-15">Continue & Select Seats </button>
                                            </div>
                                        </td>
                                    </tr>

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
