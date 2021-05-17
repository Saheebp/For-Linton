@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Procurement
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
                        Procurement
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
                            <a href="#">Procurement</a>
                        </li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    
    <div class="outer">
        <div class="inner bg-container">
            <div class="card">
                <div class="card-body m-t-35">
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
                                    <div class="bg-white text-primary text-white b_r_5 section_border">
                                        <div class="p-t-l-r-15">
                                            <div id="widget_countup12">{{ $requests->where('status_id', $new)->count() }}</div>
                                            <div>New Requests</div>
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
                                    <div class="bg-white text-warning b_r_5 section_border">
                                        <div class="p-t-l-r-15">
                                            <div id="widget_countup22">{{ $requests->where('status_id', $pending)->count() }}</div>
                                            <div>Pending Requests</div>
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
                                    <div class="bg-white text-dark b_r_5 section_border">
                                        <div class="p-t-l-r-15">
                                            <div id="widget_countup12"> {{ $requests->where('status_id', $completed)->count() }}</div>
                                            <div>Closed Requests</div>
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
                                    <div class="bg-white text-danger b_r_5 section_border">
                                        <div class="p-t-l-r-15">
                                            <div id="widget_countup12"> {{ $requests->where('status_id', $overdue)->count() }}</div>
                                            <div>Overdue Requests</div>
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
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="button_section_align">
                                                    <!-- <h5>Glow Buttons</h5> -->
                                                    <div class="row">
                                                        
                                                        <div class="col-lg-4 col-sm-12 mb-3 text-left">
                                                            
                                                        @role('SuperUser|Director')
                                                            <button class="btn btn-raised btn-secondary adv_cust_mod_btn"
                                                                    data-toggle="modal" data-target="#modalCreate">Create New Request
                                                            </button>
                                                            @endrole

                                                            <div class="modal fade" id="modalCreate" role="dialog" aria-labelledby="modalLabelprimary">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        
                                                                        <div class="modal-header bg-secondary">
                                                                            <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">New Request Details</h4>
                                                                        </div>
                                                                        <form method="POST" action="{{ route('procurement.store') }}">
                                                                            <div class="modal-body">
                                                                                @csrf
                                                                                <div class="form-group row">
                                                                                    
                                                                                    <div class="col-12">
                                                                                        <label for="subject1" class="col-form-label">
                                                                                            Request Title
                                                                                        </label>
                                                                                        <div class="input-group">
                                                                                            <input type="text" id="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror form-control" placeholder="" name="name">
                                                                                        </div>
                                                                                        @error('name')
                                                                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                                                                        @enderror
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <label for="subject1" class="col-form-label">
                                                                                            Request Subject
                                                                                        </label>
                                                                                        <div class="input-group">
                                                                                            <textarea id="subject" value="{{ old('subject') }}" class="form-control" placeholder="" name="subject"></textarea>
                                                                                        </div>
                                                                                        @error('subject')
                                                                                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                                                                                        @enderror
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <label for="subject1" class="col-form-label">
                                                                                            Request Description
                                                                                        </label>
                                                                                        <div class="input-group">
                                                                                            <textarea id="description" value="{{ old('description') }}" class="form-control" placeholder="" name="description"></textarea>
                                                                                        </div>
                                                                                        @error('description')
                                                                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                                                                        @enderror
                                                                                    </div>

                                                                                    <div class="col-lg-6">
                                                                                        <label End="subject1" class="col-form-label">
                                                                                            Start Date
                                                                                        </label>
                                                                                        <div class="input-group">
                                                                                            <input type="date" id="start" class="form-control" name="start" required>
                                                                                        </div>
                                                                                        @error('start')
                                                                                            <span class="text-danger">{{ $errors->first('start') }}</span>
                                                                                        @enderror
                                                                                    </div>

                                                                                    <div class="col-lg-6">
                                                                                        <label End="subject1" class="col-form-label">
                                                                                            Due Date
                                                                                        </label>
                                                                                        <div class="input-group">
                                                                                            <input type="date" id="end" class="form-control" name="end" required>
                                                                                        </div>
                                                                                        @error('end')
                                                                                            <span class="text-danger">{{ $errors->first('end') }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                
                                                                                    <div class="col-lg-12">
                                                                                        <label for="subject1" class="col-form-label">
                                                                                            Department
                                                                                        </label>
                                                                                        <div class="input-group">
                                                                                            <select class="form-control" name="department" required>
                                                                                                <option value="">-- Select Department --</option>
                                                                                                <option value="1">Admin</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>


                                                                                </div>                                                                    
                                                                            </div> 
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-sm btn-success" type="submit">Save Changes</button>
                                                                                <button class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-sm-12 m-t-15 text-right">
                                                        </div>

                                                        <div class="col-lg-4 col-sm-12 m-t-15 text-right">
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

                    <div class="card">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> All Procurement Requests
                        </div>
                        <div class="card-body m-t-35">

                            <div class="row">
                                <div class="col-lg-6 col-sm-12 text-right">
                                    <form method="POST" action="{{ route('projects.filter') }}">
                                    @csrf
                                        <div class="form-group row">
                                            <div class="col-md-10">
                                                <div class="input-group mb-3">
                                                    <input class="form-control col-12" type="date" name="date" placeholder="search by ref no, ">
                                                    <div class="input-group-append"><button class="btn btn-outline-success" type="submit">Filter by Start Date</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                                <div class="col-lg-6 col-sm-12 text-right">
                                    <form method="POST" action="{{ route('projects.search') }}">
                                    @csrf
                                        <div class="form-group row">
                                            <div class="col-md-10">
                                                <div class="input-group mb-3">
                                                    <input class="form-control col-12" type="text" name="data">
                                                    <div class="input-group-append"><button class="btn btn-outline-success" type="submit">search Records</button></div>
                                                    <div class="input-group-append"><a class="btn btn-outline-dark" href="{{ route('payments.index') }}">Reset</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="example1" class="table table-striped table-bordered bordered">
                                    <thead>
                                    <tr>
                                        <th style="width:5%;">Status</th>
                                        <th style="width:10%;">Title</th>
                                        <th style="width:10%;">Department </th>
                                        <th style="width:5%;">Created</th>
                                        <th style="width:5%;">Due Date</th>
                                        <th style="width:5%;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($requests as $request)
                                        <tr>
                                            <td><span class="badge badge-{{$request->status->style }}">{{ $request->status->name }}</span></td>
                                            <td>{{ date('d M Y', strtotime($request->name)) }}</td>
                                            <td>{{ $request->department->name }}</td>
                                            <td>{{ $request->created_at }}</td>
                                            <td>{{ $request->duedate }}</td>
                                            <td>
                                                <a class="btn btn-dark btn-sm text-white  align-left" href="#">Manage</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div style="text-align: right; width:100%;">{{ $requests->links() }}</div>
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
