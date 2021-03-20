@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Customers
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
                            <a href="#"> Trips </a>
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
                            <button class="btn btn-sm btn-outline-secondary align-right" data-toggle="modal" data-target="#startTrip">Suspend Account</button> |
                            <button class="btn btn-sm btn-outline-primary align-right" data-toggle="modal" data-target="#startTrip">Update Password</button> |
                            <button class="btn btn-sm btn-outline-warning align-right" data-toggle="modal" data-target="#endTrip">Update Bio</button> |
                            <button class="btn btn-sm btn-danger align-right" data-toggle="modal" data-target="#startTrip">Credit Wallet</button> |
                            <button class="btn btn-sm btn-success align-right" data-toggle="modal" data-target="#endTrip">Debit Wallet</button>
                        </div>

                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> Customer Information
                        </div>
                        <div class="card-body m-t-35">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 m-t-15">
                                    <table id="example1" class="display table table-stripped table-bordered">
                                        <tbody>
                                            <tr><td><b>User ID: </b></td><td>{{ $customer->id }}</td></tr>
                                            <tr><td><b>Name </b></td><td>{{ $customer->name }}</td></tr>
                                            <tr><td><b>Email </b></td><td>{{ $customer->email }}</td></tr>
                                            <tr><td><b>Phone </b></td><td>{{ $customer->phone }}</td></tr>
                                            <tr><td><b>Address </b></td><td>{{ $customer->address }}</td></tr>
                                            <tr><td><b>Reg Date: </b></td><td>{{ date('D M Y, h:iA', strtotime($customer->created_at)) }}</td></tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-lg-6 col-sm-12 m-t-15">
                                    <table id="example1" class="display table table-stripped table-bordered">
                                        <tbody>
                                            <tr><td><b>Next of Kin Name: </b></td><td>{{ $customer->nok_name }}</td></tr>
                                            <tr><td><b>Next of Kin Phone: </b></td><td>{{ $customer->nok_phone }}</td></tr>
                                            <tr><td><b>Total Bookings </b></td><td>{{ $customer->booking_count }}</td></tr>
                                            <tr><td><b>Total Referrals </b></td><td>{{ $customer->referral_count }}</td></tr>
                                            <tr><td><b>Wallet Balance </b></td><td>&#8358;{{ number_format(floatval($wallet_bal ?? '0'), 2) }}</td></tr>
                                            <tr><td><b>Reg Date: </b></td><td>{{ date('D M Y, h:iA', strtotime($customer->created_at)) }}</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card m-t-35">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> Booking History
                        </div>
                        <div class="card-body m-t-35">
                        
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered bordered">
                                    <thead>
                                        <tr>
                                            <th style="width:10%;">Payment Ref</th>
                                            <th style="width:13%;">Booking Date</th>
                                            <th style="width:13%;">Trip Info</th>
                                            <th style="width:30%;">Passenger</th>
                                            <th style="width:10%;">Phone</th>
                                            <th style="width:5%;">Type</th>
                                            <th style="width:5%;">Status</th>
                                            <th style="width:5%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->ref_no }}</td>
                                            <td>{{ date('d M Y, h:iA', strtotime($booking->created_at)) }},<br>{{ date('d M Y, h:iA', strtotime($booking->updated_at)) }}</td>
                                            <td>{{ date('d M Y', strtotime($booking->trip->date)) }} | {{ date('h:iA', strtotime($booking->trip->time)) }} | {{ $booking->trip->route->origin }}-{{ $booking->trip->route->destination }}</td>
                                            <td>{{ $booking->name }}</td>
                                            <td>{{ $booking->phone }}</td>
                                            <td class="text-capitalize">{{ $booking->trip->tripType->name }}</td>
                                            <td><span class="badge badge-{{$booking->status->style }}">{{ $booking->status->name }}</span></td>
                                            <td>
                                                <a class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#modal-15{{$booking->id}}">Details</a>&nbsp;&nbsp;
                                                <div class="modal fade" id="modal-15{{$booking->id}}" role="dialog" aria-labelledby="modalLabelprimary">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">{{ $booking->name }}</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="p-2">
                                                                    <table width="100%">
                                                                        <tr>
                                                                            <td><b>Ref No:</b></td>
                                                                            <td>{{ $booking->ref_no }} [{{ $booking->trip->id }}]</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Vehicle No:</b></td>
                                                                            <td>{{ $booking->trip->vehicle->reg_no }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Driver:</b></td>
                                                                            <td>{{ $booking->trip->vehicle->user->name }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Seat No:</b></td>
                                                                            <td>{{ $booking->seat_no }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Route:</b></td>
                                                                            <td>{{ $booking->trip->route->origin }} - {{ $booking->trip->route->destination }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Amount:</b></td>
                                                                            <td>&#8358;{{ $booking->trip->amount }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Date of Trip:</b></td>
                                                                            <td>{{ date('d F Y', strtotime($booking->trip->date)) }}</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td><b>Status:</b></td>
                                                                            <td><span class="text-{{ $booking->status->style }}">{{ $booking->status->name }}</span></td>
                                                                        </tr>
                                                                    </table>
                                                                </p>
                                                            </div> 
                                                            <div class="modal-footer">

                                                                @if($booking->ref_no != NULL && $booking->status_id != $paid&& $booking->status_id != $cancelled && $booking->seat_no != NULL)
                                                                    <a class="btn btn-sm btn-warning text-white" data-toggle="modal" data-target="#modalPay{{$booking->id}}"> Make Payment</a>
                                                                @endif
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
                                                                                                <td>{{ $booking->ref_no }}</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><b>Date:</b></td>
                                                                                                <td>{{ date('d M Y, h:i A', strtotime($booking->created_at)) }}</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><b>Amount:</b></td>
                                                                                                <td>&#8358;{{ number_format(floatval($booking->trip->amount), 2) }}</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><b>Status:</b></td>
                                                                                                <td><span class="badge badge-{{ $booking->status->style }}">{{ $booking->status->name }}</span></td>
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

                                                                <a class="btn btn-sm btn-secondary" href="{{ route('trips.show', [ 'trip' => $booking->trip ] ) }}">View Trip</a>
                                                                
                                                                @if($booking->status_id != $paid && $booking->status_id != $cancelled)
                                                                    @role('SuperUser|Director|Admin')
                                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#modalCance{{$booking->id}}">Cancel Booking</a>&nbsp;&nbsp;
                                                                    @endrole

                                                                    <!-- @role('SuperUser|Director')
                                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#modalDelete{{$booking->id}}">Cancel Booking</a>&nbsp;&nbsp;
                                                                    @endrole -->
                                                                @endif    
                                                                <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Close</button>
                                                                                      
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="modalCance{{$booking->id}}" role="dialog" aria-labelledby="modalLabelprimary">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">{{ $booking->name }}</h4>
                                                            </div>
                                                            <form method="POST" action="{{ route('admin.booking.cancelbooking') }}">
                                                            @csrf

                                                            <input value="{{ $booking->id }}" name="id" hidden readonly >
                                                            <div class="modal-body">
                                                                <h3 class="p-5 text-center">
                                                                    Are you sure you want to cancel this booking?
                                                                </h3>
                                                            </div> 
                                                            <div class="modal-footer">
                                                                <button class="btn btn-sm btn-danger" type="submit">Yes, Cancel Booking</button>
                                                                <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Close</button>
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
                            <div style="text-align: right; width:100%;">{{ $bookings->links() }}</div>
                        </div>
                    </div>

                    <div class="card m-t-35">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> Payment History
                        </div>
                        <div class="card-body m-t-35">
                            <div class="table-responsive">
                                <table id="example1" class="display table table-stripped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th style="width:15%;">Date</th>
                                        <th>Ref No</th>
                                        <th>Amount</th>
                                        <th>Purpose</th>
                                        <th>Type</th>
                                        <th style="width:5%;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach($payments as $payment)
                                    <tr>
                                        <td><span class="badge badge-{{$payment->status->style }}">{{ $payment->status->name }}</span></td>
                                        <td>{{ date('d M Y, h:i A', strtotime($payment->created_at)) }}</td>
                                        <td>{{ isset($payment->ref_no)? $payment->ref_no: 'N/A' }}</td>
                                        <td>&#8358;{{ number_format(floatval($payment->amount), 2) }}</td>
                                        <td>{{ $payment->purpose }}</td>
                                        <td>{{ isset($payment->type)? $payment->type: 'N/A' }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-secondary text-white" data-toggle="modal" data-target="#modalView{{$payment->id}}"> View</a>
                                            <div class="modal fade" id="modalView{{$payment->id}}" role="dialog" aria-labelledby="modalLabelprimary">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">Payment Receipt</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="p-2">
                                                                <table width="100%">
                                                                    <tr>
                                                                        <td><b>Ref No:</b></td>
                                                                        <td>{{ $payment->ref_no }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Date:</b></td>
                                                                        <td>{{ date('d M Y, h:i A', strtotime($payment->created_at)) }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Email:</b></td>
                                                                        <td>{{ $payment->user->email }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Phone:</b></td>
                                                                        <td>{{ $payment->user->phone }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Amount:</b></td>
                                                                        <td>&#8358;{{ number_format(floatval($payment->amount), 2) }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Status:</b></td>
                                                                        <td><span class="badge badge-{{ $payment->status->style }}">{{ $payment->status->name }}</span></td>
                                                                    </tr>
                                                                </table>
                                                            </p>
                                                        </div> 
                                                        <div class="modal-footer">
                                                            <button class="btn btn-sm btn-outline-success" data-dismiss="modal">Print Receipt</button>
                                                            <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Close</button>
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
                            <div style="text-align: right; width:100%;">{{ $payments->links() }}</div>
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
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach($wallets as $wallet)
                                    <tr>
                                        <td>{{ date('d M Y, h:i A', strtotime($wallet->created_at)) }}</td>
                                        <td>{{ $wallet->type }}</td>
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
