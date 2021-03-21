@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Products
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
                        Products
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
                            <a href="#">Products</a>
                        </li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>

    <div class="outer">
        <div class="inner bg-container">
            <!--top section widgets-->
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
                            <div class="bg-success text-white b_r_5 section_border">
                                <div class="p-t-l-r-15">
                                    <div id="widget_countup12">&#8358;{{ number_format(floatval(0), 2) }}</div>
                                    <div>Completed Payments</div>
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
                            <div class="bg-warning text-white b_r_5 section_border">
                                <div class="p-t-l-r-15">
                                    <div id="widget_countup22">&#8358;{{ number_format(floatval(0), 2) }}</div>
                                    <div>Pending Payments</div>
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
                                    <div id="widget_countup12">&#8358;{{ number_format(floatval(0), 2) }}</div>
                                    <div>Completed Payments</div>
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
                            <div class="bg-primary text-white b_r_5 section_border">
                                <div class="p-t-l-r-15">
                                    <div id="widget_countup12">&#8358;{{ number_format(floatval(0), 2) }}</div>
                                    <div>Completed Payments</div>
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
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="button_section_align">
                                        <!-- <h5>Glow Buttons</h5> -->
                                        <div class="row">
                                            
                                            <div class="col-lg-6 col-sm-12 m-t-1 text-right">
                                            </div>

                                            <div class="col-lg-6 col-sm-12 m-t-1 text-right">
                                                <form method="POST" action="{{ route('products.search') }}">
                                                @csrf

                                                    <input class="form-control col-12" type="hidden" name="filtertype" value="search">
                                                    
                                                    <div class="form-group row">
                                                        <div class="col-md-10">
                                                            <div class="input-group mb-3">
                                                                <input class="form-control col-12" type="text" name="data">
                                                                <div class="input-group-append"><button class="btn btn-outline-success" type="submit">search Records</button></div>
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
                            <i class="fa fa-table"></i> All Products {{ isset($title) ? $title:'' }}
                        </div>
                        <div class="card-body m-t-35">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered bordered">
                                    <thead>
                                        <tr>
                                            <th style="width:3%;">ID</th>
                                            <th style="width:20%;">Name</th>
                                            <th style="width:10%;">Atrributes</th>
                                            <th style="width:10%;">Category</th>
                                            <th style="width:5%;">Brand</th>
                                            <th style="width:5%;">Qty</th>
                                            <th style="width:5%;">Price</th>
                                            <th style="width:5%;">Status</th>
                                            <th style="width:5%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->brand->name }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>&#8358;{{ $product->amount }}</td>
                                            <td><span class="badge badge-{{ $product->status->style }}">{{ $product->status->name }}</span></td>
                                            <td>
                                                <a class="btn btn-secondary btn-sm text-white" data-toggle="modal" data-target="#modalDetails{{$product->id}}">Manage</a>&nbsp;&nbsp;
                                                
                                                <div class="modal fade" id="modalDetails{{$product->id}}" role="dialog" aria-labelledby="modalLabelprimary">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary"> [product ID: {{ $product->id }}]</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="p-2">
                                                                    <table width="100%">
                                                                        <tr>
                                                                            <td><b>Name:</b></td>
                                                                            <td>{{ $product->name }}</td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <td><b>Amount:</b></td>
                                                                            <td>&#8358;{{ $product->amount }}</td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <td><b>Product Status:</b></td>
                                                                            <td><span class="text-{{ $product->status->style }}">{{ $product->status->name }}</span></td>
                                                                        </tr>
                                                                    </table>
                                                                </p>
                                                            </div> 
                                                            
                                                            <div class="modal-footer container-fluid">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        
                                                                        <a class="btn btn-sm btn-warning text-white mt-1" data-toggle="modal" data-target="#modalDelete{{$product->id}}">Delete</a>&nbsp;&nbsp;
                                                                        <button class="btn btn-sm btn-white text-dark mt-1" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="modalDelete{{$product->id}}" role="dialog" aria-labelledby="modalLabelprimary">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">{{ $product->name }}</h4>
                                                            </div>
                                                            <form method="POST" action="{{ route('products.destroy') }}">
                                                            @csrf

                                                            <input value="{{ $product->id }}" name="id" hidden readonly >
                                                            <div class="modal-body">
                                                                <h3 class="p-5 text-center">
                                                                    Are you sure you want to Delete this product?
                                                                </h3>
                                                            </div> 
                                                            <div class="modal-footer">
                                                                <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Close</button>
                                                                <button class="btn btn-sm btn-danger" type="submit">Yes, Delete product</button>
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
                            
                            <div style="text-align: right; width:100%;">{{ $products->links() }}</div>
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