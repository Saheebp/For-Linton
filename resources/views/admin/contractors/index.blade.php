@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Contractors
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
                        <i class="fa fa-users"></i>
                        Contractors
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
                            <a href="#">Contractors</a>
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
                                <div class="col-12">
                                    <div class="button_section_align">
                                        <!-- <h5>Glow Buttons</h5> -->
                                        <div class="row">
                                            
                                            
                                            <div class="col-lg-6 col-sm-12 m-t-15 text-right">
                                               
                                            </div>

                                            <div class="col-lg-6 col-sm-12 m-t-15 text-right">
                                                <form method="POST" action="{{ route('contractors.search') }}">
                                                @csrf
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
                            <i class="fa fa-table"></i> All Contractors {{ isset($title) ? $title:'' }}
                        </div>
                        <div class="card-body m-t-35">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                    <tr>
                                        <th style="width:30%; padding:5px;">Name</th>
                                        <th style="width:10%; padding:5px;">Email</th>
                                        <th style="width:10%; padding:5px;">Phone</th>
                                        <th style="width:10%; padding:5px;">Email</th>
                                        <th style="width:12%; padding:5px;">Registered on</th>
                                        <th style="width:5%; padding:5px;">Status</th>
                                        <th style="width:5%; padding:5px;" colspan="2">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tag type="hidden" value="{{ $i=1 }}" >
                                    @foreach($contractors as $contractor)
                                    <tr>
                                        <td>{{ $contractor->org_name }}</td>
                                        <td>{{ $contractor->org_email }}</td>
                                        <td>{{ $contractor->org_phone }}</td>
                                        <td>{{ $contractor->org_email }}</td>
                                        <td>{{ date('d M Y, h:i A', strtotime($contractor->created_at)) }}</td>
                                        <td><span class="badge badge-{{$contractor->status->style }}"> {{ $contractor->status->name }}</span></td>
                                        <td>
                                            <a class="btn btn-success btn-sm text-white" href="{{ route('contractors.show', $contractor->id) }}">View Records</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    
                                </table>
                                <div style="text-align: right; width:100%;">{{ $contractors->links() }}</div>
                    
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