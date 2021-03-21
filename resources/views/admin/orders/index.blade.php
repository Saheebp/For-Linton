@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Orders
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
                        <i class="fa fa-book"></i>
                        Orders
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
                            <a href="#">Orders</a>
                        </li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>

    <div class="outer">
        <div class="inner bg-container">
        <div class="row widget_countup">
                <div class="col-12 col-sm-6 col-xl-3">
                    <div id="top_widget1">
                        <!-- <div class="front">
                            <div class="bg-primary p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="user_font">Customers</div>
                                <div id="widget_countup1">3,250</div>
                                <div class="tag-white">
                                    <span id="percent_count1">85</span>%
                                </div>
                                <div class="previous_font">Yearly Users stats</div>
                            </div>
                        </div> -->
                        <div class="">
                            <div class="bg-white b_r_5 section_border">
                                <div class="p-t-l-r-15">
                                    <div class="float-right m-t-5">
                                        <i class="fa fa-users text-dark"></i>
                                    </div>
                                    <div id="widget_countup12">{{ $customers ?? "" }}</div>
                                    <div>New Customers</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <span id="visitsspark-chart" class="spark_line"></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3 media_max_573">
                    <div id="top_widget2">
                        <!-- <div class="front">
                            <div class="bg-success p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="user_font">Income</div>
                                <div id="widget_countup2">1,140</div>
                                <div class="tag-white">
                                    <span id="percent_count2">60</span>%
                                </div>
                                <div class="previous_font">Sales per month</div>
                            </div>
                        </div> -->

                        <div class="">
                            <div class="bg-white b_r_5 section_border">
                                <div class="p-t-l-r-15">
                                    <div class="float-right m-t-5 text-primary">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div id="widget_countup22">{{ $bookings ?? ""}}</div>
                                    <div>Orders in Progress</div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <span id="salesspark-chart" class="spark_line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-sm-6 col-xl-3 media_max_1199">
                    <div id="top_widget3">
                        <!-- <div class="front">
                            <div class="bg-warning p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                                <div class="user_font">Bookings</div>
                                <div id="widget_countup3">85</div>
                                <div class="tag-white ">
                                    <span id="percent_count3">30</span>%
                                </div>
                                <div class="previous_font">Monthly comments</div>
                            </div>
                        </div> -->

                        <div class="">
                            <div class="bg-white b_r_5 section_border">
                                <div class="p-t-l-r-15">
                                    <div class="float-right m-t-5 text-warning">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div id="widget_countup32">{{ $trips ?? "" }}</div>
                                    <div>Awaiting response</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <span id="mousespeed" class="spark_line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-sm-6 col-xl-3 media_max_1199">
                    <div id="top_widget4">
                        <!-- <div class="front">
                            <div class="bg-danger p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="user_font">Rating</div>
                                <div id="widget_countup4">8</div>
                                <div class="tag-white">
                                    <span id="percent_count4">80</span>%
                                </div>
                                <div class="previous_font">This month ratings </div>
                            </div>
                        </div> -->

                        <div class="">
                            <div class="bg-white section_border b_r_5">
                                <div class="p-t-l-r-15">
                                    <div class="float-right m-t-5 text-success">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>

                                    <div id="widget_countup42">{{ $routes ?? ""}}</div>
                                    <div>Completed Orders</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span id="rating" class="spark_line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

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
                            

                            <div class="row mb-5">
                                <div class="col-lg-4 col-sm-12 m-t-15 text-left">
                                    
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="button_section_align">
                                        <!-- <h5>Glow Buttons</h5> -->
                                        <div class="row">
                                            
                                            <div class="col-lg-6 col-sm-12 m-t-1 text-right">
                                                <form method="POST" action="{{ route('orders.filter') }}">
                                                @csrf

                                                    <input class="form-control col-12" type="hidden" name="filtertype" value="orderdate">
                                                
                                                    <div class="form-group row">
                                                        <div class="col-md-10">
                                                            <div class="input-group mb-3">
                                                                <input class="form-control col-12" type="date" name="data">
                                                                <div class="input-group-append"><button class="btn btn-outline-success" type="submit">Filter by Order Date</button></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            
                                        
                                            <div class="col-lg-6 col-sm-12 m-t-1 text-right">
                                                <form method="POST" action="{{ route('orders.search') }}">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <div class="col-md-10">
                                                            <div class="input-group mb-3">
                                                                <input class="form-control col-12" type="text" name="data">
                                                                <div class="input-group-append"><button class="btn btn-outline-success" type="submit">Search Records</button></div>
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
                            <i class="fa fa-table"></i> All Orders {{ isset($title) ? $title:'' }}
                        </div>
                        <div class="card-body m-t-35">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered bordered">
                                    <thead>
                                        <tr>
                                            <th style="width:13%;">Order Date</th>
                                            <th style="width:13%;">Products</th>
                                            <th style="width:30%;">Customer</th>
                                            <th style="width:10%;">Cost</th>
                                            <th style="width:10%;">Payment Ref</th>
                                            <th style="width:5%;">Status</th>
                                            <th style="width:5%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>{{ date('d M Y, h:iA', strtotime($order->created_at)) }}</td>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->firstname." ".$order->lastname }}</td>
                                            <td>&#8358;{{ $order->amount }}</td>
                                            <td>{{ $order->ref_no }}</td>
                                            <td><span class="badge badge-{{ $order->status->style }}">{{ $order->status->name }}</span></td>
                                            <td>
                                                <a class="btn btn-secondary btn-sm text-white" data-toggle="modal" data-target="#modalDetails{{$order->id}}">Manage</a>&nbsp;&nbsp;
                                                
                                                <div class="modal fade" id="modalDetails{{$order->id}}" role="dialog" aria-labelledby="modalLabelprimary">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary"> [Order ID: {{ $order->id }}]</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="p-2">
                                                                    <table width="100%">
                                                                        <tr>
                                                                            <td><b>Name:</b></td>
                                                                            <td>{{ $order->name }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Ref No:</b></td>
                                                                            <td>{{ $order->ref_no }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Products:</b></td>
                                                                            <td>...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Amount:</b></td>
                                                                            <td>&#8358;{{ $order->amount }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Date of order:</b></td>
                                                                            <td>{{ date('d F Y', strtotime($order->date)) }} </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td><b>Order Status:</b></td>
                                                                            <td><span class="text-{{ $order->status->style }}">{{ $order->status->name }}</span></td>
                                                                        </tr>
                                                                    </table>
                                                                </p>
                                                            </div> 
                                                            
                                                            <div class="modal-footer container-fluid">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        @if($order->status_id != $paid)
                                                                            @role('SuperUser')
                                                                            <a class="btn btn-sm btn-dark text-white text-right mt-1" data-toggle="modal" data-target="#modalPay{{$booking->id}}"> Make Payment</a>
                                                                            <div class="modal fade" id="modalPay{{$booking->id}}" role="dialog" aria-labelledby="modalLabelprimary">
                                                                                <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                    
                                                                                        <form method="POST" action="{{ route('payment.update') }}">
                                                                                        @csrf
                                                                                            <div class="modal-header bg-primary">
                                                                                                <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">Make Payment</h4>
                                                                                            </div>
                                                                                            
                                                                                            <div class="modal-body">
                                                                                                <p class="p-2">
                                                                                                    <table width="100%">
                                                                                                        <tr>
                                                                                                            <td><b>Ref No:</b></td>
                                                                                                            <td>{{ $order->ref_no }}</td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td><b>Date:</b></td>
                                                                                                            <td>{{ date('d M Y, h:i A', strtotime($order->created_at)) }}</td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td><b>Amount:</b></td>
                                                                                                            <td>&#8358;{{ number_format(floatval($order->amount), 2) }}</td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td><b>Status:</b></td>
                                                                                                            <td><span class="badge badge-{{ $order->status->style }}">{{ $order->status->name }}</span></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td colspan="2">
                                                                                                                <div class="form-group row">
                                                                                                                    <div class="col-lg-12 text-left">
                                                                                                                        <label for="subject1" class="col-form-label">
                                                                                                                            Payment Type
                                                                                                                        </label>

                                                                                                                        <input type="hidden" name="purpose" value="bookings">
                                                                                                                        <input type="hidden" name="ref_no" value="{{ $booking->ref_no }}">
                                                                                                                        <input type="hidden" name="payment_id" value="{{ $booking->payment_id }}">
                                                                                                                        <input type="hidden" name="booking_id" value="{{ $booking->id }}">

                                                                                                                        <select name="type" class="form-control pt-0 pb-0" required>
                                                                                                                            <option value="">- Select -</option>
                                                                                                                            <option value="cash">Cash</option>
                                                                                                                            <option value="transfer">Transfer</option>
                                                                                                                            <option value="pos">POS</option>
                                                                                                                            <option value="card">Paystack</option>
                                                                                                                        </select>
                                                                                                                        @if ($errors->has('type'))
                                                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                                                <strong>{{ $errors->first('type') }}</strong>
                                                                                                                            </span>
                                                                                                                        @endif
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </p>
                                                                                            </div> 

                                                                                            <div class="modal-footer">
                                                                                                <button type="submit" class="btn btn-sm btn-dark">Update Payment</button>
                                                                                                <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Close</button>
                                                                                            </div>
                                                                                        </form>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            @endrole
                                                                        @endif
                                                                        
                                                                        <a class="btn btn-sm btn-secondary mt-1" href="{{ route('customers.show', [ $order->user_id ] ) }}">View Profile</a>
                                                                        
                                                                        <a class="btn btn-sm btn-success mt-1" href="{{ route('admin.order.receipt', [ 'order'=>$order ] ) }}">Print Receipt</a>
                                                                        @if($booking->status_id != $paid)
                                                                            @role('SuperUser|Director|Admin|Manager|Officer')
                                                                                @if($order->status_id == $pending )
                                                                                <a class="btn btn-sm btn-danger text-white mt-1" data-toggle="modal" data-target="#modalCancel{{$booking->id}}">Cancel Order</a>&nbsp;&nbsp;
                                                                                <div class="modal fade" id="modalCancel{{$order->id}}" role="dialog" aria-labelledby="modalLabelprimary">
                                                                                    <div class="modal-dialog" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-primary">
                                                                                                <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">{{ $order->name }}</h4>
                                                                                            </div>
                                                                                            <form method="POST" action="{{ route('admin.order.cancel') }}">
                                                                                            @csrf

                                                                                            <input value="{{ $order->id }}" name="id" hidden readonly >
                                                                                            <div class="modal-body">
                                                                                                <h3 class="p-5 text-center">
                                                                                                    Are you sure you want to cancel this order?
                                                                                                </h3>
                                                                                            </div> 
                                                                                            <div class="modal-footer">
                                                                                                <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Close</button>
                                                                                                <button class="btn btn-sm btn-danger" type="submit">Yes, Cancel Order</button>
                                                                                            </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                @endif
                                                                            @endrole
                                                                        @endif

                                                                        <button class="btn btn-sm btn-white text-dark mt-1" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="modalDelete{{$order->id}}" role="dialog" aria-labelledby="modalLabelprimary">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">{{ $order->user->firstname }}</h4>
                                                            </div>
                                                            <form method="POST" action="{{ route('admin.order.delete') }}">
                                                            @csrf

                                                            <input value="{{ $order->id }}" name="id" hidden readonly >
                                                            <div class="modal-body">
                                                                <h3 class="p-5 text-center">
                                                                    Are you sure you want to Delete this order?
                                                                </h3>
                                                            </div> 
                                                            <div class="modal-footer">
                                                                <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Close</button>
                                                                <button class="btn btn-sm btn-danger" type="submit">Yes, Delete order</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                            
                            <div style="text-align: right; width:100%;">{{ $orders->links() }}</div>
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