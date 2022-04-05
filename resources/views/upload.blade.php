@extends('layouts.frontend')

{{-- Page title --}}
@section('title')
    Registration Documents
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
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> Update Contractor Documents
                        </div>
                        <div class="card-body m-t-35">
                            <div class="row">
                                <div class="col-lg-6 offset-md-3 col-sm-12">
                                    <form action="{{ route('users.upload') }}"  method="POST" enctype="multipart/form-data">
                                    @csrf
                                        
                                        <div class="form-group">
                                            <label class="h4"> Upload Registration Docs</label>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="input-group mb-1">
                                                    <input class="form-control col-12" type="file" name="file">
                                                </div>
                                            </div>
                                        
                                            <div class="col-lg-12">
                                                <label for="subject1" class="col-form-label">
                                                    File Name <tag class="text-danger h6"> (docx, doc, pdf)</tag>
                                                </label>
                                                <div class="input-group">
                                                    <select class="form-control" name="name" required>
                                                        <option value="">-- Select Documents --</option>
                                                        <option value="CAC Documents">CAC Documents</option>
                                                        <option value="Evidence of Jobs Done">Evidence of Jobs Done</option>
                                                        <option value="Other Documents">Other Documents</option>
                                                    </select>
                                                </div>
                                            </div>
                                
                                            <div class="col-lg-12">
                                                <label for="subject1" class="col-form-label">
                                                    File Description
                                                </label>
                                                <div class="input-group mb-1">
                                                    <input class="form-control col-12" type="text" name="description">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-5">
                                            <div class="row">
                                                
                                                <div class="col-lg-6 offset-md-3">
                                                    <input type="submit" value="Upload and Save" class="btn btn-success btn-block login_button">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> All Documents
                        </div>
                        <div class="card-body m-t-35">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width:30%;">Name</th>
                                    <th style="width:10%;">Type</th>
                                    <th style="width:40%;">Description</th>
                                    <th style="width:15%;">File</th>
                                    <th style="width:5%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Auth::user()->userResources as $resource)
                                    <tr>
                                        <td class="text-left">
                                            {{ $resource->name ?? '' }}
                                        </td>
                                        <td style="width:10%;">
                                            {{ $resource->type ?? '' }}
                                        </td>
                                        <td style="width:40%;">
                                            {{ $resource->description ?? '' }}
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('users.download', $resource->id)}}"><i class="fa fa-download"></i> Download</a>
                                        </td>
                                        <td style="width:5%;">
                                            <a class="btn btn-sm btn-outline-secondary"><i class="fa fa-trash"></i> Delete</a>
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