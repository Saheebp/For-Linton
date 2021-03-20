@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Accounts
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
                        <i class="fa fa-money"></i>
                        Payments
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
                            <a href="#">Payments</a>
                        </li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>

    @role("SuperUser|Director|Admin|Account")
    <div class="outer">
        <div class="inner bg-container">
            <div class="row widget_countup">
                <div class="col-12 col-sm-6 col-xl-3">
                    <div id="">
                        
                        <div class="front">
                            <div class="bg-primary p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="">Completed Payments</div>
                                <h3 class="text-white">&#8358;{{ number_format(floatval(isset($completed) ? $completed : ''), 2) }}</h3>
                                <!-- <div class="tag-white">
                                    <span id="percent_count1">85</span>%
                                </div> -->
                                <div class="previous_font">Payments Verified</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3 media_max_573">
                    <div id="">
                        <div class="front">
                            <div class="bg-warning p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="">Pending Payments</div>
                                <h3 class="text-white">&#8358;{{ number_format(floatval(isset($pending) ? $pending : ''), 2) }}</h3>
                                
                                <!-- <div class="tag-white">
                                    <span id="percent_count2">&nbsp;</span>
                                </div> -->
                                <div class="previous_font">Payments not verified</div>
                            </div>
                        </div>
                    </div>

                </div>


                <!-- <div class="col-12 col-sm-6 col-xl-3 media_max_573">
                    <div id="top_widget2">
                        <div class="front">
                            <div class="bg-success p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="">Prestige</div>
                                <h3 class="text-white">&#8358;{{ number_format(floatval(isset($prestige) ? $prestige : ''), 2) }}</h3>
                                
                                <div class="tag-white">
                                    <span id="percent_count2">&nbsp;</span>
                                </div> 
                                <div class="previous_font">Payments for prestige</div>
                            </div>
                        </div>

                        <div class="back">
                            <div class="bg-white b_r_5 section_border">
                                <div class="p-t-l-r-15">
                                    <div class="float-right m-t-5 text-success">
                                        <i class="fa fa-bus"></i>
                                    </div>
                                    <div id="widget_countup22">{{ $bookings ?? ""}}</div>
                                    <div>Bookings</div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <span id="salesspark-chart" class="spark_line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> -->


                <!-- <div class="col-12 col-sm-6 col-xl-3 media_max_573">
                    <div id="top_widget2">
                        <div class="front">
                            <div class="bg-warning p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="">Regular</div>
                                <h3 class="text-white">&#8358;{{ number_format(floatval(isset($regular) ? $regular : ''), 2) }}</h3>
                                
                                <div class="tag-white">
                                    <span id="percent_count2">&nbsp;</span>
                                </div>
                                <div class="previous_font">Payments for regular</div>
                            </div>
                        </div>

                        <div class="back">
                            <div class="bg-white b_r_5 section_border">
                                <div class="p-t-l-r-15">
                                    <div class="float-right m-t-5 text-success">
                                        <i class="fa fa-bus"></i>
                                    </div>
                                    <div id="widget_countup22">{{ $bookings ?? ""}}</div>
                                    <div>Bookings</div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <span id="salesspark-chart" class="spark_line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> -->

            </div>
        </div>
    </div> 

    @endrole
    <div class="outer">
        <div class="inner bg-light lter bg-container">
            <div class="row">
                <div class="col-12 data_tables">
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
                    
                    @if ($errors->any())
                    <div class="alert alert-danger pt-0 pb-0">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="card">
                        <div class="card-body m-t-35">
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="button_section_align">
                                        <!-- <h5>Glow Buttons</h5> -->
                                        <div class="row">
                                            
                                            <div class="col-lg-4 col-sm-12 m-t-15 text-right">
                                                <form method="POST" action="{{ route('payment.datefilter') }}">
                                                @csrf
                                                    <div class="form-group row">
                                                        <div class="col-md-10">
                                                            <div class="input-group mb-3">
                                                                <input class="form-control col-12" type="date" name="date" placeholder="search by ref no, ">
                                                                <div class="input-group-append"><button class="btn btn-outline-success" type="submit">Filter by Payment Date</button></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            
                                            <div class="col-lg-4 col-sm-12 m-t-15 text-right">
                                                <div class="input-group-append">
                                                    <a class="btn btn-outline-success" href="{{ route('accounts.payments',['Paid']) }}">All Paid</a>
                                                    <a class="btn btn-outline-warning" href="{{ route('accounts.payments',['Pending']) }}">All Pending</a>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-sm-12 m-t-15 text-right">
                                                <form method="POST" action="{{ route('payment.search') }}">
                                                @csrf
                                                    <div class="form-group row">
                                                        <div class="col-md-10">
                                                            <div class="input-group mb-3">
                                                                <input class="form-control col-12" type="text" name="data">
                                                                <div class="input-group-append"><button class="btn btn-outline-success" type="submit">Search</button></div>
                                                                <div class="input-group-append"><a class="btn btn-outline-dark" href="{{ route('payments.index') }}">Reset</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> All Payments {{ isset($title) ? $title:'' }}
                        </div>
                        
                        <div class="card-body m-t-35">
                            <div class="table-responsive">
                                <table id="example1" class="table table-striped table-bordered bordered">
                                    <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>ID</th>
                                        <th>Ref No</th>
                                        <th style="width:18%;">Trans Date</th>
                                        <th style="width:18%;">Updated</th>
                                        <th style="width:30%;">Name</th>
                                        <th>Amount</th>
                                        <th>Purpose</th>
                                        <th>Type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($payments as $payment)
                                        <tr>
                                            <td><span class="badge badge-{{$payment->status->style }}">{{ $payment->status->name }}</span></td>
                                            <td>{{ $payment->id }}</td>
                                            <td>{{ $payment->ref_no }}</td>
                                            <td>{{ date('d M Y, h:i A', strtotime($payment->created_at)) }}</td>
                                            <td>{{ date('d M Y, h:i A', strtotime($payment->updated_at)) }}</td>
                                            <td><a href="{{ route('customer.show', $payment->user_id) }}">{{ $payment->user->name }}</a></td>
                                            <td>&#8358;{{ number_format(floatval($payment->amount), 2) }}</td>
                                            <td>{{ $payment->purpose }}</td>
                                            <td>{{ $payment->type }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div style="text-align: right; width:100%;">{{ $payments->links() }}</div>
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
