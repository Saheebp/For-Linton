@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Wallets
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
                        Wallets
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
                            <a href="#">Wallets</a>
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
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success pt-0 pb-0">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('failure'))
                        <div class="alert alert-danger pt-0 pb-0">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> All Wallets
                        </div>
                       
                            @role('Student')
                            <div class="card-body m-t-35">
                            <button class="btn btn-success btn-sm m-1" type="button" onClick="payWithRave()">Top Up Wallet</button>
                                
                                <div class="m-t-35">Wallet Balance: <br>
                                <span class="text-secondary" style="font-size:20px;">&#8358;{{ number_format(floatval(auth()->user()->wallet->balance), 2) }}</span></div>
                            </div>

                            <div class="card-body m-t-35">
                                <table id="example1" class="display table table-stripped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Purpose</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach($payments->where('user_id',auth()->user()->id) as $payment)
                                    <tr>
                                        <td>{{ $payment->id }}</td>
                                        <td>{{ $payment->created_at }}</td>
                                        <td>{{ $payment->user->name }}</td>
                                        <td>&#8358;{{ number_format(floatval($payment->amount), 2) }}</td>
                                        <td>{{ $payment->purpose }}</td>
                                        <td>{{ $payment->type }}</td>
                                        <td><span class="badge badge-{{ $payment->status->style }}">{{ $payment->status->name }}</span></td>
                                        <td><a class="btn btn-primary btn-sm text-white" href="">view</a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                            @endrole

                            @role('Driver')
                            <div class="card-body m-t-35">
                            </div>
                            @endrole

                            @role('Admin')
                            <div class="card-body m-t-35">
                                <table id="example1" class="display table table-stripped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Purpose</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                @foreach($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->id }}</td>
                                        <td>{{ $payment->created_at }}</td>
                                        <td>{{ $payment->user->name }}</td>
                                        <td>{{ $payment->amount }}</td>
                                        <td>{{ $payment->purpose }}</td>
                                        <td>{{ $payment->type }}</td>
                                        <td><span class="badge badge-{{ $payment->status->style }}">{{ $payment->status->name }}</span></td>
                                        <td><a class="btn btn-primary btn-sm text-white" href="">view</a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                            @endrole
                    </div>
                </div>
            </div>
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->
    <!-- /.content -->
@stop
<script>
    const API_publicKey = {!! json_encode(env('RAVE_PUBLIC_KEY')) !!};
    var app_url = {!! json_encode(route('wallet.callback')) !!};
    var txref = "TMS"+Date.now()+""+Math.floor(Math.random() * 300);

    function payWithRave() {
        var x = getpaidSetup({
            PBFPubKey: API_publicKey,
            customer_email: {!! json_encode(auth()->user()->email) !!}, 
            amount: 1000,
            customer_phone: "07061325694", 
            currency: "NGN",
            txref: txref,
            payment_options: "card",
            meta: [
                    { metaname: "user_id", 
                      metavalue: {!! json_encode(auth()->user()->id) !!} 
                    }
                ],
            onclose: function() {},
            callback: function(response) {
                var txref = response.tx.txRef;
                
                if (response.tx.chargeResponseCode == "00" || response.tx.chargeResponseCode == "0") 
                {
                    window.location.href = app_url+"/"+txref;
                } else {
                }

                x.close(); // use this to close the modal immediately after payment.
            }
        });
    }
</script>
<script src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>


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
