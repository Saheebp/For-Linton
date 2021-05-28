@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Contractors
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
                            <a href="#"> Contractor </a>
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

                    <div class="card">
                        <div class="text-right p-3">
                            <button class="btn btn-sm btn-outline-secondary align-right" data-toggle="modal" data-target="#Suspendccount">Suspend Account</button> |
                            <button class="btn btn-sm btn-outline-primary align-right" data-toggle="modal" data-target="#modalPasswordUpdate">Reset & Send Password</button> |
                            <button class="btn btn-sm btn-outline-warning align-right" data-toggle="modal" data-target="#modalBioUpdate">Update Bio Data</button> 
                            
                            <div class="modal fade" id="modalBioUpdate" role="dialog" aria-labelledby="modalLabelprimary">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">Update Bio {{ $contractor->name }}</h4>
                                        </div>
                                        <div class="modal-body text-left">
                                            <p class="p-2">
                                            <form class="form-horizontal" method="POST" action="{{ route('contractors.bioupdate', $contractor->id) }}">
                                            @csrf
                                                <div class="form-group row">
                                                    <div class="col-lg-6 col-6">

                                                        <input hidden readonly value="{{ $contractor->id }}" name="id">
                                                        
                                                        <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                Name
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" id="name" value="{{ $contractor->name }}" class="form-control" placeholder=" Chukwu Idris Adebayo" name="name">
                                                            </div>
                                                            <span class="text-danger">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                Email
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-envelope"></i>
                                                                </span>
                                                                <input type="email"  value="{{ $contractor->email }}" id="email" class="form-control" placeholder=" abcd@gmail.com" name="email">
                                                            </div>
                                                            <span class="text-danger">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                Phone
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-phone"></i>
                                                                </span>
                                                                <input type="tel" id="phone"  value="{{ $contractor->phone }}" class="form-control" placeholder=" 08012345678" name="phone">
                                                            </div>
                                                            <span class="text-danger">
                                                                <strong>{{ $errors->first('phone') }}</strong>
                                                            </span>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                Address
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-road"></i>
                                                                </span>
                                                                <input type="text" id="address"  value="{{ $contractor->address }}" class="form-control" placeholder=" 23 Valgee Avenue" name="address">
                                                            </div>
                                                            <span class="text-danger">
                                                                <strong>{{ $errors->first('address') }}</strong>
                                                            </span>
                                                        </div>

                                                    </div>

                                                    <div class="col-lg-6 col-6">

                                                        <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                Next of Kin Name
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" id="name" value="{{ $contractor->nok_name }}" class="form-control" placeholder=" Chukwu Idris Adebayo" name="nok_name">
                                                            </div>
                                                            <span class="text-danger">
                                                                <strong>{{ $errors->first('nok_name') }}</strong>
                                                            </span>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                Next Of Kin Phone
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-phone"></i>
                                                                </span>
                                                                <input type="tel" id="phone"  value="{{ $contractor->nok_phone }}" class="form-control" placeholder=" 08012345678" name="nok_phone">
                                                            </div>
                                                            <span class="text-danger">
                                                                <strong>{{ $errors->first('nok_phone') }}</strong>
                                                            </span>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </p>
                                        </div> 
                                        <div class="modal-footer">
                                            <button class="btn btn-md btn-warning" type="submit">Save Changes</button>
                                            <button class="btn btn-md btn-dark" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="Suspendccount" role="dialog" aria-labelledby="modalLabelprimary">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-secondary">
                                            <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">Reset Password for {{ $contractor->name }}</h4>
                                        </div>
                                        <div class="modal-body text-left">
                                            <p class="p-2">
                                            Are you sure you want to Suspend this account?
                                           </p>
                                        </div> 
                                        <div class="modal-footer">
                                            <button class="btn btn-md btn-secondary" type="submit">Suspend</button>
                                            <button class="btn btn-md btn-dark" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modalPasswordUpdate" role="dialog" aria-labelledby="modalLabelprimary">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">Reset Password for {{ $contractor->name }}</h4>
                                        </div>
                                        <div class="modal-body text-left">
                                            <p class="p-2">
                                            Are you sure you want to reset and send this contractors password to them?
                                           </p>
                                        </div> 
                                        <div class="modal-footer">
                                            <a class="btn btn-md btn-primary" href="#">Reset and Send</a>
                                            <button class="btn btn-md btn-dark" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> Contractor Information
                        </div>
                        <div class="card-body m-t-35">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 m-t-15">
                                    <table id="example1" class="display table table-stripped table-bordered">
                                        <tbody>
                                            <tr><td><b>User ID: </b></td><td>{{ $contractor->id }}</td></tr>
                                            <tr><td><b>Name </b></td><td>{{ $contractor->name }}</td></tr>
                                            <tr><td><b>Email </b></td><td>{{ $contractor->email }}</td></tr>
                                            <tr><td><b>Phone </b></td><td>{{ $contractor->phone }}</td></tr>
                                            <tr><td><b>Address </b></td><td>{{ $contractor->address }}</td></tr>
                                            <tr><td><b>Date Registered: </b></td><td>{{ date('D M Y, h:iA', strtotime($contractor->created_at)) }}</td></tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-lg-6 col-sm-12 m-t-15">
                                    <table id="example1" class="display table table-stripped table-bordered">
                                        <tbody>
                                            <tr><td><b>Next of Kin Name: </b></td><td>{{ $contractor->nok_name }}</td></tr>
                                            <tr><td><b>Next of Kin Phone: </b></td><td>{{ $contractor->nok_phone }}</td></tr>
                                            <tr><td><b>Total Bookings </b></td><td>{{ $contractor->booking_count }}</td></tr>
                                            <tr><td><b>Total Referrals </b></td><td>{{ $contractor->referral_count }}</td></tr>
                                            <tr><td><b>Wallet Balance </b></td><td>&#8358;{{ number_format(floatval($wallet_bal ?? '0'), 2) }}</td></tr>
                                            <tr><td><b>Date Updated: </b></td><td>{{ date('D M Y, h:iA', strtotime($contractor->updated_at)) }}</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card m-t-35">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> Request for Quotes
                        </div>
                        <div class="card-body m-t-35">
                        
                            <div class="table-responsive">
                                <table id="example1" class="table table-striped table-bordered bordered">
                                    <thead>
                                    <tr>
                                        <th style="width:3%;">Status</th>
                                        <th style="width:15%;">Title</th>
                                        <th style="width:7%;">Department </th>
                                        <th style="width:5%;">Start</th>
                                        <th style="width:5%;">Due Date</th>
                                        <th style="width:2%;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contractor->requests as $request)
                                        <tr>
                                            <td><span class="badge badge-{{$request->status->style }}">{{ $request->status->name }}</span></td>
                                            <td>{{ $request->name }}</td>
                                            <td>{{ $request->department->name }}</td>
                                            <td>{{ date('d M Y', strtotime($request->start)) }}</td>
                                            <td>{{ date('d M Y', strtotime($request->end)) }}</td>
                                            <td>
                                                <a class="btn btn-dark btn-sm text-white  align-left" href="{{ route('requests.show', $request->id) }}">Manage</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div style="text-align: right; width:100%;"></div>
                        </div>
                    </div>

                    <div class="card m-t-35">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> Submission History
                        </div>
                        <div class="card-body m-t-35">
                            <div class="table-responsive">
                                <table id="example1" class="table">
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">SNo</th>
                                            <th style="width:35%;">Name </th>
                                            <th style="width:15%;">Phone </th>
                                            <th style="width:20%;">Date </th>
                                            <th style="width:10%;" colspan="1" class="text-left"> Quotation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contractor->quotes as $quote)
                                        <tr>
                                            <td class="text-left">
                                                N/A
                                            </td>
                                            <td style="width:20%;">
                                                {{ $quote->contractor->org_name ?? '' }}
                                            </td>
                                            <td style="width:40%;">
                                                {{ $quote->contractor->org_phone ?? '' }}
                                            </td>
                                            <td style="width:40%;">
                                                {{ $quote->created_at ?? '' }}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('quotes.download', $quote->id)}}"><i class="fa fa-download"></i> Download</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card m-t-35">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> Wallet Transactions
                        </div>
                        <div class="card-body m-t-35">
                            <div class="table-responsive">
                                <table id="example1" class="display table table-stripped table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width:15%;">Date</th>
                                        <th>Transaction</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach($wallets as $wallet)
                                    <tr>
                                        <td>{{ date('d M Y, h:i A', strtotime($wallet->created_at)) }}</td>
                                        <td>{{ $wallet->type }}</td>
                                        <td>{{ $wallet->description }}</td>
                                        <td>&#8358;{{ number_format(floatval($wallet->amount), 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                    
                                </table>
                            </div>
                            <div style="text-align: right; width:100%;">{{ $wallets->links() }}</div>
                        
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
