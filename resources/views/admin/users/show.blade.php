@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Users
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
                        Users
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
                            <a href="#"> Users </a>
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
                    @if(!empty($success))
                    <div class="alert alert-success mb-3"> {{ $success }}</div>
                    @endif

                    @if(!empty($error))
                    <div class="alert alert-danger mb-3"> {{ $error }}</div>
                    @endif

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

                            <button class="btn btn-sm btn-success align-right" data-toggle="modal" data-target="#modalPasswordUpdate">Update Password</button>
                            <div class="modal fade" id="modalPasswordUpdate" role="dialog" aria-labelledby="modalLabelprimary">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">Update Password for {{ $user->name }}</h4>
                                        </div>
                                        <div class="modal-body text-left">
                                            <p class="p-2">
                                            <form method="POST" action="{{ route('users.passwordupdate') }}">
                                            @csrf
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        
                                                        <input hidden readonly value="{{ $user->id }}" name="id">
                                                        
                                                        <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                Old Password
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-key"></i>
                                                                </span>
                                                                <input type="password" id="password" class="form-control" name="oldpassword">
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                New Password
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-key"></i>
                                                                </span>
                                                                <input type="password" id="password" class="form-control" name="password">
                                                            </div>
                                                            @error('password')
                                                                <div class="text-danger">{{ $errors->first('password') }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                Confirm Password
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-key"></i>
                                                                </span>
                                                                <input type="password" id="password" class="form-control" name="password_confirmation">
                                                            </div>
                                                            @error('password_confirmation')
                                                                <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                Staff Transaction Code
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-key"></i>
                                                                </span>
                                                                <input type="password" id="password" class="form-control" name="transcode">
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </p>
                                        </div> 
                                        <div class="modal-footer">
                                            <button class="btn btn-md btn-success" type="submit">Save Changes</button>
                                            <button class="btn btn-md btn-dark" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                                
                            @can('update.password')
                            <button class="btn btn-sm btn-primary align-right" data-toggle="modal" data-target="#modalPasswordUpdate">Update Password</button>
                            @endcan
                            <div class="modal fade" id="modalPasswordUpdate" role="dialog" aria-labelledby="modalLabelprimary">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">Update Password for {{ $user->name }}</h4>
                                        </div>
                                        <div class="modal-body text-left">
                                            <p class="p-2">
                                            <form method="POST" action="{{ route('users.adminpasswordupdate') }}">
                                            @csrf
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        
                                                        <input hidden readonly value="{{ $user->id }}" name="id">
                                                        
                                                        <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                Old Password
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-key"></i>
                                                                </span>
                                                                <input type="password" id="password" class="form-control" name="oldpassword">
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                New Password
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-key"></i>
                                                                </span>
                                                                <input type="password" id="password" class="form-control" name="password">
                                                            </div>
                                                            @error('password')
                                                                <div class="text-danger">{{ $errors->first('password') }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                Confirm Password
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-key"></i>
                                                                </span>
                                                                <input type="password" id="password" class="form-control" name="password_confirmation">
                                                            </div>
                                                            @error('password_confirmation')
                                                                <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                Staff Transaction Code
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-key"></i>
                                                                </span>
                                                                <input type="password" id="password" class="form-control" name="transcode">
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </p>
                                        </div> 
                                        <div class="modal-footer">
                                            <button class="btn btn-md btn-outline-primary" type="submit">Save Changes</button>
                                            <button class="btn btn-md btn-dark" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            @can('update.staff')
                            <button class="btn btn-sm btn-success align-right" data-toggle="modal" data-target="#modalBioUpdate">Update Bio</button>
                            @endcan
                            <div class="modal fade" id="modalBioUpdate" role="dialog" aria-labelledby="modalLabelprimary">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-success">
                                            <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">Update Bio {{ $user->name }}</h4>
                                        </div>
                                        <div class="modal-body text-left">
                                            <p class="p-2">
                                            <form method="POST" action="{{ route('users.bioupdate') }}">
                                            @csrf
                                                <div class="form-group row">
                                                    <div class="col-12">

                                                        <input hidden readonly value="{{ $user->id }}" name="id">
                                                        
                                                        <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                Name
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" id="name" value="{{ $user->name }}" class="form-control" placeholder=" Chukwu Idris Adebayo" name="name">
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
                                                                <input type="email"  value="{{ $user->email }}" id="email" class="form-control" placeholder=" abcd@gmail.com" name="email">
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
                                                                <input type="tel" id="phone"  value="{{ $user->phone }}" class="form-control" placeholder=" 08012345678" name="phone">
                                                            </div>
                                                            <span class="text-danger">
                                                                <strong>{{ $errors->first('phone') }}</strong>
                                                            </span>
                                                        </div>

                                                        <!-- <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                Role
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-phone"></i>
                                                                </span>
                                                                <select class="form-control col-12" name="role">
                                                                    <option value=""> -- Select Role --</option>
                                                                    @foreach($roles as $role)
                                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </p>
                                        </div> 
                                        <div class="modal-footer">
                                            <button class="btn btn-md btn-outline-success" type="submit">Save Changes</button>
                                            <button class="btn btn-md btn-dark" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-sm btn-warning align-right" data-toggle="modal" data-target="#modalCodeReset">Reset Transaction Code</button>
                            <div class="modal fade" id="modalCodeReset" role="dialog" aria-labelledby="modalLabelprimary">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">Reset Code {{ $user->name }}</h4>
                                        </div>
                                        <div class="modal-body text-left">
                                            <p class="p-2">
                                            <form method="POST" action="{{ route('users.codeupdate') }}">
                                            @csrf
                                                <div class="form-group row">
                                                    <div class="col-12">

                                                        <input hidden readonly value="{{ $user->id }}" name="id">
                                                        
                                                        Are you sure you want to reset your transaction code?
                                                    </div>
                                                </div>
                                            </p>
                                        </div> 
                                        <div class="modal-footer">
                                            <button class="btn btn-md btn-success" type="submit">Save Changes</button>
                                            <button class="btn btn-md btn-dark" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            @can('manage.roles')
                            <button class="btn btn-sm btn-secondary align-right" data-toggle="modal" data-target="#modalRoleUpdate">Update Role</button>
                            @endcan
                            <div class="modal fade" id="modalRoleUpdate" role="dialog" aria-labelledby="modalLabelprimary">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-secondary">
                                            <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">Update Role for {{ $user->name }}</h4>
                                        </div>
                                        <div class="modal-body text-left">
                                            <p class="p-2">
                                            <form method="POST" action="{{ route('users.roleupdate') }}">
                                            @csrf
                                                <div class="form-group row">
                                                    <div class="col-12">

                                                        <input hidden readonly value="{{ $user->id }}" name="id">
                                                            
                                                        <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                Name
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" id="name" readonly value="{{ $user->name }}" class="form-control" placeholder=" Chukwu Idris Adebayo" name="name">
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                Previous Role
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                                <input type="text" id="name" readonly value="{!! str_replace( array('"','[',']'), ' ', $user->roles->pluck('name')) !!}" class="form-control" placeholder=" Chukwu Idris Adebayo" name="name">
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="subject1" class="col-form-label">
                                                                New Role
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-phone"></i>
                                                                </span>
                                                                <select class="form-control col-12" name="role">
                                                                    <option value=""> -- Select Role --</option>
                                                                    @foreach($roles as $role)
                                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </p>
                                        </div> 
                                        <div class="modal-footer">
                                            <button class="btn btn-md btn-outline-secondary" type="submit">Save Changes</button>
                                            <button class="btn btn-md btn-dark" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            @can('manage permissions')
                            <button class="btn btn-sm btn-dark align-right" data-toggle="modal" data-target="#modalPermissionUpdate">Update Permissions</button>
                            @endcan
                            <div class="modal fade" id="modalPermissionUpdate" role="dialog" aria-labelledby="modalLabelprimary">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-dark">
                                            <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">Update Permission for {{ $user->name }}</h4>
                                        </div>
                                        <div class="modal-body text-left">
                                            <p class="p-2">
                                            <div class="table-responsive">
                                                <div class="table-responsive m-t-3">
                                                    <form class="form-horizontal" action="{{ route('permissions.syncuserpermissions') }}" method="POST">
                                                        @csrf

                                                        <button class="btn btn-md btn-dark mt-2 mb-2 mr-2 float-right" data-dismiss="modal">Close</button>
                                                        <button class="btn btn-outline-secondary m-2 float-right" type="submit">Sync Permissions</button>
                                                    
                                                        <input name="user_id" value="{{ $user->id }}" hidden>
                                                        <table id="example1" class="display table table-stripped table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th style="width:5%;">#</th>
                                                                <th>Name</th>
                                                                <th style="width:5%;">Status</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tag type="hidden" value="{{ $i=1 }}" >
                                                                @foreach($permissions as $permission)
                                                                <tr>
                                                                    <td>{{ $i++."."}}</td>
                                                                    <td>{{ $permission['name'] }} </td>
                                                                    <td><input name="permissions[]" value="{{ $permission['name'] }}" type="checkbox" {{ $permission['status'] }} ></td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    
                                                        <button class="btn btn-md btn-dark mt-2 mb-2 mr-2 float-right" data-dismiss="modal">Close</button>
                                                        <button class="btn btn-outline-secondary m-2 float-right" type="submit">Sync Permissions</button>
                                                    </form>
                                                </div>
                                            </div>
                                            </p>
                                        </div> 
                                        <!-- <div class="modal-footer">
                                            <button class="btn btn-md btn-outline-dark" type="submit">Save Changes</button>
                                            <button class="btn btn-md btn-dark" data-dismiss="modal">Close</button>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                            @can('staff.disable')
                            <button class="btn btn-sm btn-danger align-right" data-toggle="modal" data-target="#modalDelete">Deactivate User</button>
                            @endcan
                            <div class="modal fade" id="modalDelete" role="dialog" aria-labelledby="modalLabelprimary">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h4 class="modal-title text-white text-uppercase" id="modalLabelprimary">Deactivate {{ $user->name }}</h4>
                                        </div>
                                        <div class="modal-body text-left">
                                            <p class="p-2">
                                            <form method="POST" action="{{ route('users.disable') }}">
                                            @csrf
                                                <div class="form-group row">
                                                    <div class="col-12">

                                                        <input hidden readonly value="{{ $user->id }}" name="id">
                                                        <b style="font-size:18px;"> Are you sure you want to deactivate this user? </b>
                                                        <br>Their records will still be on the system, but they will not be able to login and perform any operation.

                                                    </div>
                                                </div>
                                            </p>
                                        </div> 
                                        <div class="modal-footer">
                                            <button class="btn btn-md btn-outline-danger" type="submit">Deactivate User</button>
                                            <button class="btn btn-md btn-dark" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="card-header bg-white">
                            <i class="fa fa-user"></i> User Information
                        </div>
                        <div class="card-body m-t-35">

                            <div class="row">
                                <div class="col-lg-6 col-sm-12 m-t-15">
                                    <h3>{{ $user->name }}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 m-t-15">
                                    <table id="" class="display table table-stripped table-bordered">
                                        <tbody>
                                            <tr><td><b>Role: </b></td><td>{!! str_replace( array('"','[',']'), ' ', $user->roles->pluck('name')) !!}</td></tr>
                                            <tr><td><b>Email </b></td><td>{{ $user->email }}</td></tr>
                                            <tr><td><b>Phone </b></td><td>{{ $user->phone }}</td></tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-lg-6 col-sm-12 m-t-15">
                                    <table id="example1" class="display table table-stripped table-bordered">
                                        <tbody>
                                        <tr>
                                            <tr><td><b>Address </b></td><td>{{ $user->address }}</td></tr>
                                            <tr><td><b>Designation: </b></td><td>{{ $user->designation->name ?? '' }}</td></tr>
                                            <!-- <tr><td><b>Next of Kin Name: </b></td><td>{{ $user->nok_name }}</td></tr>
                                            <tr><td><b>Next of Kin Phone: </b></td><td>{{ $user->nok_phone }}</td></tr>
                                            <tr><td><b>Wallet Balance </b></td><td>#&nbsp;</td></tr> -->
                                            <tr><td><b>Reg Date: </b></td><td>{{ date('D M Y, h:iA', strtotime($user->created_at)) }}</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card m-t-35">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> Activity History
                        </div>
                        <div class="card-body m-t-35">
                            <div class="table-responsive">
                                <table class="table table-striped my-4 w-100">
                                    <thead>
                                        <tr>
                                            <th width="20%" data-priority="1">Date</th>
                                            <th width="50%">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($logs as $log)
                                        <tr class="gradeX">
                                            <td> {{ $log->created_at->toDayDateTimeString() }}</td>
                                            <td> {{ $log->description }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div style="text-align: right; width:100%;">{{ $logs->links() }}</div>
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
