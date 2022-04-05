@extends('layouts.frontend')

{{-- Page title --}}
@section('title')
    Procurement Requests
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
                            <i class="fa fa-table"></i> All Requests
                        </div>
                        <div class="card-body m-t-35">

                            <div class="table-responsive">
                                <table id="example1" class="table table-striped table-bordered bordered">
                                    <thead>
                                    <tr>
                                        <th style="width:5%;">SNo</th>
                                        <th style="width:5%;">Status</th>
                                        <th style="width:40%;">Title</th>
                                        <th style="width:10%;">Department </th>
                                        <th style="width:15%;">Start</th>
                                        <th style="width:15%;">Due Date</th>
                                        <th style="width:10%;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($quotes as $quote)
                                        <tr>
                                            <td>RFQ{{ $quote->requestFq->id }}</span></td>
                                            <td><span class="badge badge-{{$quote->status->style }}">{{ $quote->status->name }}</span></td>
                                            <td>{{ $quote->requestFq->name }}</td>
                                            <td>{{ $quote->requestFq->department->name }}</td>
                                            <td>{{ date('d M Y', strtotime($quote->requestFq->start)) }}</td>
                                            <td>{{ date('d M Y', strtotime($quote->requestFq->end)) }}</td>
                                            <td>
                                                <button class="btn btn-raised btn-sm btn-secondary adv_cust_mod_btn"
                                                        data-toggle="modal" data-target="#modalRespond{{ $quote->requestFq->id }}">Respond
                                                </button>

                                                <div class="modal fade" id="modalRespond{{ $quote->requestFq->id }}" role="dialog" aria-labelledby="modalLabelprimary">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            
                                                            <div class="modal-header bg-secondary">
                                                                <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">QUOTE UPLOAD FOR : RFQ{{ $quote->requestFq->id }}</h4>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form action="{{ route('quotes.store')}}"  method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                    
                                                                    <input name="quote_id" value="{{ $quote->id }}" hidden readonly>

                                                                    <div class="form-group">
                                                                        <label class="col-form-label"> {{ $quote->requestFq->name }}</label>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label for="cost" class="col-form-label">Total Cost in Quotation</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon addon_password"><i
                                                                                class="fa fa-money text-primary"></i></span>
                                                                            <input type="number" step="0.1" class="form-control form-control-md" id="cost"  name="cost" placeholder="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="files" class="col-form-label">Quotation Files</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon addon_password"><i
                                                                                class="fa fa-file text-primary"></i></span>
                                                                            <input type="file" class="form-control form-control-md" id="file"   name="file" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-group mt-5">
                                                                        <div class="row">
                                                                            
                                                                            <div class="col-lg-6">
                                                                                &nbsp;
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <input type="submit" value="Upload and Save" class="btn btn-success btn-block login_button">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
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
