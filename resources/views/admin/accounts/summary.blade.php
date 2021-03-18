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
                        Accounts
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
                            <a href="#">Accounts</a>
                        </li>
                        <li class="breadcrumb-item active">Summary</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>

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
                            
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> Summary of Transactions {{ isset($date) ? $date : '' }}
                        </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="button_section_align">
                                        <!-- <h5>Glow Buttons</h5> -->
                                        <div class="row">
                                            
                                            <div class="col-2 m-t-15 text-right">
                                            </div>

                                            <div class="col-4 m-t-15 text-right">
                                            </div>

                                            <div class="col-6 m-t-15 text-right">
                                                <form method="POST" action="{{ route('accounts.datefilter') }}">
                                                @csrf
                                                    <div class="form-group row">
                                                        <div class="col-md-10">
                                                            <div class="input-group mb-3">
                                                                <input class="form-control col-12" type="date" name="date" placeholder="search by ref no, ">
                                                                <div class="input-group-append"><button class="btn btn-outline-success" type="submit">Filter by Date</button></div>
                                                                <div class="input-group-append"><a class="btn btn-outline-primary" href="{{ route('accounts.index') }}">Today's Transactions</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="outer">
                                <div class="inner bg-container">
                                    <div class="card-header bg-white text-warning pt-5">
                                        <i class="fa fa-table"></i> All Payments
                                    </div>
                                    <!--top section widgets-->
                                    <div class="row widget_countup pt-3">
                                        <div class="col-12 col-sm-6 col-xl-3 p-2">
                                            <div id="top_widget1">
                                                <div class="">
                                                    <div class="bg-white b_r_5 section_border">
                                                        <div class="p-t-l-r-15">
                                                            <div id="widget_countup12" style="font-size:24px;">&#8358;{{ number_format(floatval($completed_payments), 2) }}</div>
                                                            <div>{{ $completed_payments_count }} Completed Payments</div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <span>&nbsp;</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-12 col-sm-6 col-xl-3 p-2">
                                            <div id="top_widget1">
                                                <div class="">
                                                    <div class="bg-white b_r_5 section_border">
                                                        <div class="p-t-l-r-15">
                                                            <div id="widget_countup12" style="font-size:24px;">&#8358;{{ number_format(floatval($pending_payments), 2) }}</div>
                                                            <div>{{ $pending_payments_count }} Pending Payments</div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <span>&nbsp;</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->

                                        <!-- <div class="col-12 col-sm-6 col-xl-3 p-2">
                                            <div id="top_widget1">
                                                <div class="">
                                                    <div class="bg-white b_r_5 section_border">
                                                        <div class="p-t-l-r-15">
                                                            <div id="widget_countup12" style="font-size:24px;">&#8358;{{ number_format(floatval(0), 2) }}</div>
                                                            <div>?? Payments</div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <span>&nbsp;</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->

                                        <!-- <div class="col-12 col-sm-6 col-xl-3 p-2">
                                            <div id="top_widget1">
                                                <div class="">
                                                    <div class="bg-white b_r_5 section_border">
                                                        <div class="p-t-l-r-15">
                                                            <div id="widget_countup12" style="font-size:24px;">&#8358;{{ number_format(floatval(0), 2) }}</div>
                                                            <div>?? Payments</div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <span>&nbsp;</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>

                                    
                                    <div class="card-header bg-white text-success pt-5">
                                        <i class="fa fa-table"></i> Payment Methods
                                    </div>
                                    <!--top section widgets-->
                                    <div class="row widget_countup pt-3">
                                        <div class="col-12 col-sm-6 col-xl-3 p-2">
                                            <div id="top_widget1">
                                                <div class="">
                                                    <div class="bg-white b_r_5 section_border">
                                                        <div class="p-t-l-r-15">
                                                            <div id="widget_countup12" style="font-size:24px;">&#8358;{{ number_format(floatval($paystack), 2) }}</div>
                                                            <div>{{ $paystack_count }} Card, USSD, etc Payments</div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <span>&nbsp;</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-xl-3 p-2">
                                            <div id="top_widget1">
                                                <div class="">
                                                    <div class="bg-white b_r_5 section_border">
                                                        <div class="p-t-l-r-15">
                                                            <div id="widget_countup12" style="font-size:24px;">&#8358;{{ number_format(floatval($transfer), 2) }}</div>
                                                            <div>{{ $transfer_count }} Transfer Payments</div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <span>&nbsp;</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-xl-3 p-2">
                                            <div id="top_widget1">
                                                <div class="">
                                                    <div class="bg-white b_r_5 section_border">
                                                        <div class="p-t-l-r-15">
                                                            <div id="widget_countup12" style="font-size:24px;">&#8358;{{ number_format(floatval($cash), 2) }}</div>
                                                            <div>{{ $cash_count }} Cash Payments</div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <span>&nbsp;</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-xl-3 p-2">
                                            <div id="top_widget1">
                                                <div class="">
                                                    <div class="bg-white b_r_5 section_border">
                                                        <div class="p-t-l-r-15">
                                                            <div id="widget_countup12" style="font-size:24px;">&#8358;{{ number_format(floatval($bank), 2) }}</div>
                                                            <div>{{ $bank_count }} Bank Payments</div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <span>&nbsp;</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header bg-white text-danger pt-5">
                                        <i class="fa fa-table"></i> Expenditure
                                    </div>
                                    <!--top section widgets-->
                                    <div class="row widget_countup pt-3">

                                        <div class="col-12 col-sm-6 col-xl-3 p-2">
                                            <div id="top_widget1">
                                                <div class="">
                                                    <div class="bg-white b_r_5 section_border">
                                                        <div class="p-t-l-r-15">
                                                            <div id="widget_countup12" style="font-size:24px;">&#8358;{{ number_format(floatval(0), 2) }}</div>
                                                            <div>Refunds</div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <span>&nbsp;</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-xl-3 p-2">
                                            <div id="top_widget1">
                                                <div class="">
                                                    <div class="bg-white b_r_5 section_border">
                                                        <div class="p-t-l-r-15">
                                                            <div id="widget_countup12" style="font-size:24px;">&#8358;{{ number_format(floatval(0), 2) }}</div>
                                                            <div>Fuel</div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <span>&nbsp;</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-xl-3 p-2">
                                            <div id="top_widget1">
                                                <div class="">
                                                    <div class="bg-white b_r_5 section_border">
                                                        <div class="p-t-l-r-15">
                                                            <div id="widget_countup12" style="font-size:24px;">&#8358;{{ number_format(floatval(0), 2) }}</div>
                                                            <div>Allowances</div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <span>&nbsp;</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-xl-3 p-2">
                                            <div id="top_widget1">
                                                <div class="">
                                                    <div class="bg-white b_r_5 section_border">
                                                        <div class="p-t-l-r-15">
                                                            <div id="widget_countup12" style="font-size:24px;">&#8358;{{ number_format(floatval(0), 2) }}</div>
                                                            <div>Utilities</div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <span>&nbsp;</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-xl-3 p-2">
                                            <div id="top_widget1">
                                                <div class="">
                                                    <div class="bg-white b_r_5 section_border">
                                                        <div class="p-t-l-r-15">
                                                            <div id="widget_countup12" style="font-size:24px;">&#8358;{{ number_format(floatval(0), 2) }}</div>
                                                            <div>Repairs</div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <span>&nbsp;</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
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
