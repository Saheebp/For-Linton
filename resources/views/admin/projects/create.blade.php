@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Projects
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
                        Projects
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
                            <a href="#">Projects</a>
                        </li>
                        <li class="breadcrumb-item active">Create</li>
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
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i> Create Project
                        </div>
                        <div class="card-body m-t-35">
                            <div class="col-lg-6  col-md-8  col-sm-12 mx-auto">
                                <form method="POST" action="{{ route('projects.store') }}">
                                @csrf
                                    <div class="form-group row">
                                        
                                        <div class="col-12">
                                            <label for="subject1" class="col-form-label">
                                                Project Name
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
                                                Project Description
                                            </label>
                                            <div class="input-group">
                                                <textarea id="description" value="{{ old('title') }}" class="form-control" placeholder="" name="description"></textarea>
                                            </div>
                                            @error('description')
                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="subject1" class="col-form-label">
                                                Project Objective
                                            </label>
                                            <div class="input-group">
                                                <textarea id="objective" value="{{ old('objective') }}" class="form-control" placeholder="" name="objective"></textarea>
                                            </div>
                                            @error('objective')
                                                <span class="text-danger">{{ $errors->first('objective') }}</span>
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
                                                End Date
                                            </label>
                                            <div class="input-group">
                                                <input type="date" id="end" class="form-control" name="end" required>
                                            </div>
                                            @error('end')
                                                <span class="text-danger">{{ $errors->first('end') }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="subject1" class="col-form-label">
                                                Project Nature
                                            </label>
                                            <div class="input-group">
                                                <input type="text" id="nature" value="{{ old('nature') }}" class="form-control" placeholder="" name="nature">
                                            </div>
                                            @error('nature')
                                                <span class="text-danger">{{ $errors->first('nature') }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="subject1" class="col-form-label">
                                                Project Type
                                            </label>
                                            <div class="input-group">
                                                <input type="text"  id="type" value="{{ old('type') }}" class="form-control" placeholder="" name="type">
                                            </div>
                                            @error('type')
                                                <span class="text-danger">{{ $errors->first('type') }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <label for="subject1" class="col-form-label">
                                                Source of Funding
                                            </label>
                                            <div class="input-group">
                                                <select class="form-control" id="funding_source" name="funding_source" required>
                                                    <option value="">-- Select Source --</option>
                                                    <option value="Individual">Individual</option>
                                                    <option value="Private">Private</option>
                                                    <option value="Government">Government</option>
                                                </select>
                                            </div>
                                            @error('funding_source')
                                                <span class="text-danger">{{ $errors->first('funding_source') }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <label for="subject1" class="col-form-label">
                                                Estimated Cost
                                            </label>
                                            <div class="input-group">
                                                <input type="number"  id="budget" value="{{ old('budget') }}" class="form-control" placeholder="" name="budget">
                                            </div>
                                            @error('budget')
                                                <span class="text-danger">{{ $errors->first('budget') }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="subject1" class="col-form-label">
                                                Sponsor Name
                                            </label>
                                            <div class="input-group">
                                                <input type="text" id="sponsor_name" value="{{ old('sponsor_name') }}" class="form-control" placeholder="" name="sponsor_name">
                                            </div>
                                            @error('sponsor_name')
                                                <span class="text-danger">{{ $errors->first('sponsor_name') }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <label for="subject1" class="col-form-label">
                                                Sponsor Email
                                            </label>
                                            <div class="input-group">
                                                <input type="email" id="sponsor_email" value="{{ old('sponsor_email') }}" class="form-control" placeholder="" name="sponsor_email">
                                            </div>
                                            @error('sponsor_email')
                                                <span class="text-danger">{{ $errors->first('sponsor_email') }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <label for="subject1" class="col-form-label">
                                                Sponsor Phone
                                            </label>
                                            <div class="input-group">
                                                <input type="tel" id="sponsor_phone" value="{{ old('sponsor_phone') }}" class="form-control" placeholder="" name="sponsor_phone">
                                            </div>
                                            @error('sponsor_phone')
                                                <span class="text-danger">{{ $errors->first('sponsor_phone') }}</span>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <label for="subject1" class="col-form-label">
                                                State
                                            </label>
                                            <div class="input-group">
                                                <select class="form-control" name="state" required>
                                                    <option value="">-- Select State --</option>
                                                    @foreach ($states as $state)
                                                        <option value="{{ $state->name }}">{{ $state->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('state')
                                                <span class="text-danger">{{ $errors->first('state') }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="subject1" class="col-form-label">
                                                L.G.A
                                            </label>
                                            <div class="input-group">
                                                <input type="text" id="lga" value="{{ old('lga') }}" class="form-control" placeholder="" name="lga">
                                            </div>
                                            @error('lga')
                                                <span class="text-danger">{{ $errors->first('lga') }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="subject1" class="col-form-label">
                                                Project Address
                                            </label>
                                            <div class="input-group">
                                                <input type="text" id="address" value="{{ old('address') }}" class="form-control" placeholder="" name="address">
                                            </div>
                                            @error('address')
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12">
                                            <label for="subject1" class="col-form-label">
                                                Manager
                                            </label>
                                            <div class="input-group">
                                                <select class="form-control" name="manager" required>
                                                    <option value="">-- Select Project Manager --</option>
                                                    @foreach ($managers as $manager)
                                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-5">
                                            <div class="row">
                                                <div class="col-lg-6 offset-md-3">
                                                    <input type="submit" value="Save and Create" class="btn btn-success btn-block login_button">
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
        <!-- /.inner -->
    </div>
@stop

