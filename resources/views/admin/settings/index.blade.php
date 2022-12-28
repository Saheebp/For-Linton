@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    System Configuration
    @parent
@stop

@section('header_styles')
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('admin/vendors/select2/css/select2.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('admin/vendors/datatables/css/scroller.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('admin/vendors/datatables/css/colReorder.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('admin/vendors/datatables/css/dataTables.bootstrap.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/pages/dataTables.bootstrap.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/plugincss/responsive.dataTables.min.css')}}" />
    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/pages/tables.css')}}" />
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
                        <i class="fa fa-cogs"></i>
                        System Settings
                    </h4>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home')}}">
                                <i class="fa ti-file" data-pack="default" data-tags=""></i>
                                Settings
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">...</a>
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
                                <div class="col-sm-12 col-lg-6 m-t-5">
                                    <div class="card-header bg-white">
                                        <i class="fa fa-table"></i> Product Config
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                                            <thead>
                                            <tr>
                                                <th style="width:40%; padding:2px;">Name</th>
                                                <th style="width:5%; padding:2px;">Value</th>
                                                <th style="width:25%; padding:2px;">Last Updated</th>
                                                <th style="width:5%; padding:2px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($product as $product)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->value }}</span></td>
                                                <td>{{ date('d M Y, h:i A', strtotime($item->updated_at)) }}</td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" href="#">Update</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-6 m-t-5">
                                    <div class="card-header bg-white">
                                        <i class="fa fa-table"></i> Referral Config
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                                            <thead>
                                            <tr>
                                                <th style="width:40%; padding:2px;">Name</th>
                                                <th style="width:5%; padding:2px;">Value</th>
                                                <th style="width:25%; padding:2px;">Last Updated</th>
                                                <th style="width:5%; padding:2px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($referral as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->value }} </span></td>
                                                <td>{{ date('d M Y, h:i A', strtotime($item->updated_at)) }}</td>
                                                <td>
                                                    <a class="btn btn-secondary btn-sm text-white" data-toggle="modal" data-target="#modalReferral{{$item->id}}">Update</a>
                                                    <div class="modal fade" id="modalReferral{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="modalLabel">Booking Details</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <form class="form-horizontal" action="#" method="POST">
                                                                @csrf
                                                            
                                                                <div class="modal-body">
                                                                    
                                                                    <input type="hidden" name="source" value="admin">

                                                                    <div class="form-group row">
                                                                        <div class="col-lg-12">
                                                                            <label for="subject1" class="col-form-label">
                                                                                Travelling from
                                                                            </label>
                                                                            <div class="input-group">
                                                                            <select class="form-control" name="route">
                                                                                <option value="">Select Route</option>
                                                                                
                                                                            </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <div class="col-lg-12 text-left">
                                                                            <label for="subject1" class="col-form-label">
                                                                                Type of Vehicle
                                                                            </label>
                                                                            <select name="type" class="form-control pt-0 pb-0" required>
                                                                                <option value="">Select Type</option>
                                                                                <option value="regular">Regular - 14 Seater</option>
                                                                                <option value="prestige">Prestige - 5 Seater</option>
                                                                            </select>
                                                                            @if ($errors->has('type'))
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $errors->first('type') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <div class="col-lg-12 text-left">
                                                                            <label for="subject1" class="col-form-label">
                                                                            Departure Date
                                                                            </label>
                                                                            <input type="date" class="form-control" name="date" placeholder="Trip Date"  required>
                                                                            @if ($errors->has('date'))
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $errors->first('date') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <div class="col-lg-12 text-left">
                                                                            <label for="subject1" class="col-form-label">
                                                                            Number of Seats
                                                                            </label>
                                                                            <input type="number" class="form-control" name="noofseats" min="1" max="13" value="1" required>
                                                                            @if ($errors->has('noofseats'))
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $errors->first('noofseats') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row text-right">
                                                                        <div class="col-lg-12">
                                                                            <button class="btn btn-responsive layout_btn_prevent btn-primary" type="submit">Continue</button>
                                                                            <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                    
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
                                </div>

                                <div class="col-sm-12 col-lg-6 m-t-5">
                                    <div class="card-header bg-white">
                                        <i class="fa fa-table"></i> Payment Config
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                                            <thead>
                                            <tr>
                                                <th style="width:40%; padding:2px;">Name</th>
                                                <th style="width:5%; padding:2px;">Value</th>
                                                <th style="width:25%; padding:2px;">Last Updated</th>
                                                <th style="width:5%; padding:2px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($payment as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->value }} </span></td>
                                                <td>{{ date('d M Y, h:i A', strtotime($item->updated_at)) }}</td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" href="#">Update</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            
                                        </table>
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
    <script type="text/javascript" src="{{asset('admin/vendors/select2/js/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendors/datatables/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/pluginjs/dataTables.tableTools.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendors/datatables/js/dataTables.colReorder.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendors/datatables/js/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendors/datatables/js/dataTables.responsive.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendors/datatables/js/dataTables.rowReorder.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendors/datatables/js/buttons.colVis.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendors/datatables/js/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendors/datatables/js/buttons.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendors/datatables/js/buttons.print.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendors/datatables/js/dataTables.scroller.min.js')}}"></script>
    <!-- end of plugin scripts -->
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('admin/js/pages/simple_datatables.js')}}"></script>
    <!-- end of global scripts-->
@stop