<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <title>
        STARKS | 
        @section('title')
        @show
    </title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('admin/img/logo1.ico') }}"/>

    <!--global styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/components.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/custom.css')}}" />
    <!-- end of global styles-->

    <link type="text/css" rel="stylesheet" href="{{asset('admin/vendors/chartist/css/chartist.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('admin/vendors/circliful/css/jquery.circliful.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/pages/index.css')}}"/>
    <link type="text/css" rel="stylesheet" href="#" id="skin_change" />
    @yield('header_styles')
</head>

<body class="body fixedNav_position fixedMenu_left">

<!-- <div class="preloader" style=" position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 100000;
    backface-visibility: hidden;
    background: #ffffff;">
        <div class="preloader_img" style="width: 200px;
            height: 200px;
            position: absolute;
            left: 48%;
            top: 48%;
            background-position: center;
            z-index: 999999">
        <img src="{{ asset('admin/img/loader.gif') }}" style=" width: 40px;" alt="loading...">
    </div>
</div> -->
<div id="wrap">
    <div id="top" class="fixed">
        <!-- .navbar -->
        <nav class="navbar navbar-static-top">
            <div class="container-fluid m-0">
                <a class="navbar-brand" href="{{ route('admin.home') }}">
                    <h4> <!--<img src="{{ asset('admin/img/logo1.ico') }}" class="admin_img" alt="logo"> --> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STARKS ADMIN</h4>
                </a>
                <div class="menu mr-sm-auto">
                    <span class="toggle-left" id="menu-toggle">
                        <i class="fa fa-bars"></i>
                    </span>
                </div>
                <div class="top_search_box d-none d-md-flex">
                    <form class="header_input_search">
                        <input type="text" placeholder="Search" name="search">
                        <button type="submit">
                            <span class="font-icon-search"></span>
                        </button>
                        <div class="overlay"></div>
                    </form>
                </div>
                <div class="topnav dropdown-menu-right">
                    <div class="btn-group small_device_search" data-toggle="modal"
                         data-target="#search_modal">
                        <i class="fa fa-search text-primary"></i>
                    </div>
                    <div class="btn-group">
                        <div class="notifications no-bg">
                            <a class="btn btn-default btn-sm messages" data-toggle="dropdown" id="messages_section"> <i
                                    class="fa fa-envelope-o fa-1x"></i>
                                <span class="badge badge-pill badge-warning notifications_badge_top">{{ ($messages->count() == 0 ? '' : $messages->count()) }}</span>
                            </a>
                            <div class="dropdown-menu drop_box_align" role="menu" id="messages_dropdown">
                                <div class="popover-header">You have {{ $messages->count() }} Messages</div>
                                <div id="messages">
                                @foreach ( $messages as $message)
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{{ asset('admin/img/mailbox_imgs/5.jpg') }}" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data"><strong>{{ $message->creator->name }}</strong>
                                                {{ $message->body }}
                                                <br>
                                                <small>add to timeline</small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                    
                                </div>
                                <div class="popover-footer">
                                    <a href="mail_inbox.html" class="text-white">Inbox</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="btn-group">
                        <div class="notifications messages no-bg">
                            <a class="btn btn-default btn-sm" data-toggle="dropdown" id="notifications_section"> <i
                                    class="fa fa-bell-o"></i>
                                <span class="badge badge-pill badge-danger notifications_badge_top">9</span>
                            </a>
                            <div class="dropdown-menu drop_box_align" role="menu" id="notifications_dropdown">
                                <div class="popover-header">You have 9 Notifications</div>
                                <div id="notifications">
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{{ asset('admin/img/mailbox_imgs/1.jpg') }}" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o"></i>
                                                <strong>Remo</strong>
                                                sent you an image
                                                <br>
                                                <small class="primary_txt">just now.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{{ asset('admin/img/mailbox_imgs/2.jpg') }}" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o"></i>
                                                <strong>clay</strong>
                                                business propasals
                                                <br>
                                                <small class="primary_txt">20min Back.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{{ asset('admin/img/mailbox_imgs/3.jpg') }}" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o"></i>
                                                <strong>John</strong>
                                                meeting at Ritz
                                                <br>
                                                <small class="primary_txt">2hrs Back.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{{ asset('admin/img/mailbox_imgs/6.jpg') }}" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o"></i>
                                                <strong>Luicy</strong>
                                                Request Invitation
                                                <br>
                                                <small class="primary_txt">Yesterday.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{{ asset('admin/img/mailbox_imgs/1.jpg') }}" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o"></i>
                                                <strong>Remo</strong>
                                                sent you an image
                                                <br>
                                                <small class="primary_txt">just now.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{{ asset('admin/img/mailbox_imgs/2.jpg') }}" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o"></i>
                                                <strong>clay</strong>
                                                business propasals
                                                <br>
                                                <small class="primary_txt">20min Back.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{{ asset('admin/img/mailbox_imgs/3.jpg') }}" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o"></i>
                                                <strong>John</strong>
                                                meeting at Ritz
                                                <br>
                                                <small class="primary_txt">2hrs Back.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{{ asset('admin/img/mailbox_imgs/6.jpg') }}" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o"></i>
                                                <strong>Luicy</strong>
                                                Request Invitation
                                                <br>
                                                <small class="primary_txt">Yesterday.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{{ asset('admin/img/mailbox_imgs/1.jpg') }}" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o"></i>
                                                <strong>Remo</strong>
                                                sent you an image
                                                <br>
                                                <small class="primary_txt">just now.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="popover-footer">
                                    <a href="#" class="text-white">View All</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="btn-group">
                        <div class="notifications request_section no-bg">
                            <a class="btn btn-default btn-sm messages" id="request_btn"> <i
                                    class="fa fa-sliders" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="btn-group">
                        <div class="user-settings no-bg">
                            <button type="button" class="btn btn-default no-bg micheal_btn" data-toggle="dropdown">
                                <img src="{{ asset('admin/img/admin.jpg') }}" class="admin_img2 img-thumbnail rounded-circle avatar-img"
                                     alt="avatar"> <strong>{{ Auth::check() ? Auth::user()->name : '' }}</strong>
                                <span class="fa fa-sort-down white_bg"></span>
                            </button>
                            <div class="dropdown-menu admire_admin">
                                <a class="dropdown-item title" href="#">
                                    STARKS Admin</a>
                                <!-- <a class="dropdown-item" href="edit_user.html"><i class="fa fa-cogs"></i>
                                    Account Settings</a>
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-user"></i>
                                    User Status
                                </a>
                                <a class="dropdown-item" href="mail_inbox.html"><i class="fa fa-envelope"></i>
                                    Inbox</a>

                                <a class="dropdown-item" href="lockscreen.html"><i class="fa fa-lock"></i>
                                    Lock Screen</a> -->
                                
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>
                                    {{ __('Logout') }}
                                </a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     @csrf
                                 </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- /.navbar -->
        <!-- /.head -->
    </div>

    <!-- /#top -->
    <div class="wrapper fixedNav_top">

        <div id="left" class="fixed">
            <div class="menu_scroll left_scrolled">
                <div class="left_media">
                    <div class="media user-media">
                        <div class="user-media-toggleHover">
                            <span class="fa fa-user"></span>
                        </div>
                        <div class="user-wrapper">
                            <a class="user-link" href="#">
                                <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="User Picture"
                                     src="{{ asset('admin/img/admin.jpg') }}">
                                <p class="user-info menu_hide">{{ Auth::check() ? Auth::user()->name : '' }}</p>
                            </a>
                        </div>
                    </div>
                    <hr/>
                </div>
                <ul id="menu">
                    <li class="@if(request()->is('home')) active @endif">
                        <a href="{{ route('home') }}">
                            <i class="fa fa-home"></i>
                            <span class="link-title menu_hide">&nbsp;Dashboard</span>
                        </a>
                    </li>


                    @role('Super User|Level 1|Level 2|Level 3|Level 4|Level 5')
                    <li class="@if(request()->is('projects')) active @endif">
                        <a href=#">
                            <i class="fa fa-tasks"></i>
                            <span class="link-title menu_hide">&nbsp; Projects</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('projects.index') }}">
                                    <i class="fa fa-spinner fa-spin"></i>
                                    &nbsp; View Projects
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('projects.create') }}">
                                    <i class="fa fa-spinner fa-spin"></i>
                                    &nbsp; Create New Project
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endrole

                    @role('Super User|Level 1|Level 2|Level 3|Level 4|Level 5')
                    <!-- <li class="dropdown_menu">
                        <a href="{{ route('tasks.index') }}">
                            <i class="fa fa-history"></i>
                            <span class="link-title menu_hide">&nbsp; Tasks</span>
                        </a>
                    </li> -->
                    @endrole

                    @role('Super User|Level 1|Level 2|Level 3|Level 4|Level 5')
                    <li class="dropdown_menu @if(request()->is('requests')) active @endif">
                        <a href="#">
                            <i class="fa fa-download"></i>
                            <span class="link-title menu_hide">&nbsp; Procurement</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('requests.index') }}">
                                    <i class="fa fa-spinner fa-spin"></i>
                                    &nbsp; Requests for quotes
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contractors.index') }}">
                                    <i class="fa fa-spinner fa-spin"></i>
                                    &nbsp; Contactors
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endrole

                    @role('Super User|Level 1|Level 2|Level 3|Level 4|Level 5')
                    <li class="dropdown_menu @if(request()->is('warehouse')) active @endif">
                        
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span class="link-title menu_hide">&nbsp; Warehouse</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('warehouse.index') }}">
                                    <i class="fa fa-spinner fa-spin"></i>
                                    &nbsp; Items
                                </a>
                            </li>
                            <li class="@if(request()->is('categories')) active @endif">
                                <a href="{{ route('categories.index') }}">
                                    <i class="fa fa-spinner fa-spin"></i>
                                    &nbsp; Categories
                                </a>
                            </li>
                            <li class="@if(request()->is('batches')) active @endif">
                                <a href="{{ route('batches.index') }}">
                                    <i class="fa fa-spinner fa-spin"></i>
                                    &nbsp; Batches
                                </a>
                            </li>
                            <li class="@if(request()->is('inventories')) active @endif">
                                <a href="{{ route('inventories.index') }}">
                                    <i class="fa fa-spinner fa-spin"></i>
                                    &nbsp; Inventories
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endrole

                    @role('Super User|Level 1|Level 2|Level 3|Level 4|Level 5')
                    <li class="@if(request()->is('messages')) active @endif">
                        <a href="{{ route('messages.index') }}">
                            <i class="fa fa-envelope"></i>
                            <span class="link-title menu_hide">&nbsp; Messaging</span>
                        </a>
                    </li>
                    @endrole

                    @role('Super User|Level 1|Level 2|Level 3|Level 4|Level 5')
                    <!-- <li class="@if(request()->is('reports')) active @endif">
                        <a href="{{ route('reports.index') }}">
                            <i class="fa fa-bar-chart"></i>
                            <span class="link-title menu_hide">&nbsp; Reports & Analytics</span>
                        </a>
                    </li> -->
                    @endrole

                    @role('Super User|Level 1|Level 2|Level 3')
                    <li class="dropdown_menu @if(request()->is('admin')) active @endif">
                        <a href="{{ route('admin.home') }}">
                            <i class="fa fa-users"></i>
                            <span class="link-title menu_hide">&nbsp; Users</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li class="@if(request()->is('users')) active @endif">
                                <a href="{{ route('users.index') }}">
                                    <i class="fa fa-spinner fa-spin"></i>
                                    &nbsp; Manage Users
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endrole

                    @role('Super User|Level 1|Level 2|Level 3')
                    <li class="@if(request()->is('logs')) active @endif">
                        <a href="{{ route('logs.index') }}">
                            <i class="fa fa-history"></i>
                            <span class="link-title menu_hide">&nbsp; Logs</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                    </li>
                    @endrole

                    @role('Super User|Level 1')
                    <li class="dropdown_menu @if(request()->is('admin')) active @endif">
                        <a href="{{ route('permissions.index') }}">
                            <i class="fa fa-shield"></i>
                            <span class="link-title menu_hide">&nbsp; Permissions</span>
                            <!-- <span class="fa arrow menu_hide"></span> -->
                        </a>
                        <!-- <ul>
                            <li>
                                <a href="{{ route('admin.home') }}">
                                    <i class="fa fa-spinner fa-spin"></i>
                                    &nbsp; Permissions
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.home') }}">
                                    <i class="fa fa-spinner fa-spin"></i>
                                    &nbsp; Roles
                                </a>
                            </li>
                        </ul> -->
                    </li>
                    @endrole

                    @role('Super User|Level 1|Level 2|Level 3')
                    <!-- <li class="dropdown_menu">
                        <a href="{{ route('admin.home') }}">
                            <i class="fa fa-file"></i>
                            <span class="link-title menu_hide">&nbsp; Reports</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('admin.home') }}">
                                    <i class="fa fa-spinner fa-spin"></i>
                                    &nbsp; Accounting
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    @endrole

                    @role('Super User|Level 1|Level 2|Level 3')
                    <!-- <li class="">
                        <a href="{{ route('settings.index') }}">
                            <i class="fa fa-cogs"></i>
                            <span class="link-title menu_hide">&nbsp; Settings</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                    </li> -->
                    @endrole
                </ul>
                <!-- /#menu -->
            </div>
        </div>
       
        <!-- /#left -->
        <div id="content" class="bg-container">

            <!-- Content -->
            @yield('content')
            <!-- Content end -->

        </div>
    </div>
    <!--wrapper-->
    <!-- <div id="request_list">
        <div class="request_scrollable">
            <ul class="nav nav-tabs m-t-15">
                <li class="nav-item">
                    <a class="nav-link active text-center" href="#settings" data-toggle="tab">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" href="#favourites" data-toggle="tab">Favorites</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="settings">
                    <div id="settings_section">
                        <div class="layout_styles mx-3">
                            <div class="row">
                                <div class="col-12 m-t-35">
                                    <h4>Layout settings</h4>
                                </div>
                            </div>
                            <form autocomplete="off">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="float-left m-t-20">Fixed Header</div>
                                        <div class="float-right m-t-15">
                                            <div id="setting_fixed_nav">
                                                <input class="make-switch" data-on-text="ON" data-off-text="OFF" type="checkbox"
                                                       data-size="small" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="float-left m-t-20">Fixed Menu</div>
                                        <div class="float-right m-t-15">
                                            <div id="setting_fixed_menunav">
                                                <input class="make-switch" data-on-text="ON" data-off-text="OFF" name="radioBox" type="checkbox"
                                                       data-size="small" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="float-left m-t-20">No Breadcrumb</div>
                                        <div class="float-right m-t-15">
                                            <div id="setting_breadcrumb">
                                                <input class="make-switch" data-on-text="ON" data-off-text="OFF" type="checkbox"
                                                       data-size="small">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="mx-3">
                            <div class="row">
                                <div class="col-12 m-t-35">
                                    <h4 class="setting_title">General Settings</h4>
                                </div>
                            </div>
                            <div class="data m-t-5">
                                <div class="row">
                                    <div class="col-2"><i class="fa fa-bell-o setting_ions text-info"></i></div>
                                    <div class="col-7">
                                        <span class="chat_name">Notifications</span><br/>
                                        Get new notifications
                                    </div>
                                    <div class="col-2 checkbox float-right">
                                        <label class="text-info">
                                            <input type="checkbox" value="" checked>
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="data">
                                <div class="row">
                                    <div class="col-2"><i class="fa fa-envelope-o setting_ions text-danger"></i>
                                    </div>
                                    <div class="col-7">
                                        <span class="chat_name">Messages</span><br/>
                                        Get new messages
                                    </div>
                                    <div class="col-2 checkbox float-right">
                                        <label class="text-danger">
                                            <input type="checkbox" value="" checked>
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="data">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa fa-exclamation-triangle setting_ions text-warning"></i>
                                    </div>
                                    <div class="col-7">
                                        <span class="chat_name">Warnings</span><br/>
                                        Get new warnings
                                    </div>
                                    <div class="col-2 checkbox float-right">
                                        <label class="text-warning">
                                            <input type="checkbox" value="" checked>
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="data">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa fa-calendar texlayout_stylest-primary setting_ions"></i>
                                    </div>
                                    <div class="col-7">
                                        <span class="chat_name">Events</span><br/>
                                        Show new events
                                    </div>
                                    <div class="col-2 checkbox float-right">
                                        <label class="text-primary">
                                            <input type="checkbox" value="" >
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="favourites">
                    <div id="requests" class="mx-3">
                        <div class="m-t-35">
                            <h4 class="setting_title">Favorites</h4>
                        </div>
                        <div class="data m-t-10">
                            <div class="row">
                                <div class="col-2">
                                    <img src="img/images1.jpg" class="message-img avatar rounded-circle" alt="avatar1"></div>
                                <div class="col-8 message-data"><span class="chat_name">Philip J. Webb</span><br/>
                                    Available
                                </div>
                                <div class="col-1">
                                    <i class="fa fa-circle text-success"></i>
                                </div>
                            </div>
                        </div>
                        <div class="data">
                            <div class="row">
                                <div class="col-2">
                                    <img src="img/mailbox_imgs/8.jpg" class="message-img avatar rounded-circle" alt="avatar1">
                                </div>
                                <div class="col-8 message-data">
                                    <span class="chat_name">Nancy T. Strozier</span><br/>
                                    Away
                                </div>
                                <div class="col-1">
                                    <i class="fa fa-circle text-warning"></i>
                                </div>
                            </div>
                        </div>
                        <div class="data">
                            <div class="row">
                                <div class="col-2">
                                    <img src="img/mailbox_imgs/3.jpg" class="message-img avatar rounded-circle" alt="avatar1">
                                </div>
                                <div class="col-8 message-data">
                                    <span class="chat_name">Robbinson</span><br/>
                                    Offline
                                </div>
                                <div class="col-1">
                                    <i class="fa fa-circle"></i>
                                </div>
                            </div>
                        </div>
                        <h4 class="setting_title">Contacts</h4>
                        <div class="data m-t-10">
                            <div class="row">
                                <div class="col-2">
                                    <img src="img/mailbox_imgs/7.jpg" class="message-img avatar rounded-circle" alt="avatar1">
                                </div>
                                <div class="col-8 message-data">
                                    <span class="chat_name">Chester Hardesty</span><br/>
                                    Busy
                                </div>
                                <div class="col-1">
                                    <i class="fa fa-circle text-warning"></i>
                                </div>
                            </div>
                        </div>
                        <div class="data">
                            <div class="row">
                                <div class="col-2">
                                    <img src="img/mailbox_imgs/2.jpg" class="message-img avatar rounded-circle"
                                         alt="avatar1"></div>
                                <div class="col-8 message-data">
                                    <span class="chat_name">Peter</span><br/>
                                    Online
                                </div>
                                <div class="col-1">
                                    <i class="fa fa-circle text-warning"></i>
                                </div>
                            </div>
                        </div>
                        <div class="data">
                            <div class="row">
                                <div class="col-2">
                                    <img src="img/mailbox_imgs/6.jpg" class="message-img avatar rounded-circle" alt="avatar1">
                                </div>
                                <div class="col-8 message-data">
                                    <span class="chat_name">Devin Hartsell</span><br/>
                                    Available
                                </div>
                                <div class="col-1">
                                    <i class="fa fa-circle text-success"></i>
                                </div>
                            </div>
                        </div>
                        <div class="data">
                            <div class="row">
                                <div class="col-2">
                                    <img src="img/mailbox_imgs/4.jpg" class="message-img avatar rounded-circle"
                                         alt="avatar1"></div>
                                <div class="col-8 message-data">
                                    <span class="chat_name">Kimy Zorda</span><br/>
                                    Available
                                </div>
                                <div class="col-1">
                                    <i class="fa fa-circle text-success"></i>
                                </div>
                            </div>
                        </div>
                        <div class="data">
                            <div class="row">
                                <div class="col-2">
                                    <img src="img/mailbox_imgs/5.jpg" class="message-img avatar rounded-circle"
                                         alt="avatar1"></div>
                                <div class="col-8 message-data">
                                    <span class="chat_name">Jessica Bell</span><br/>
                                    Offline
                                </div>
                                <div class="col-1">
                                    <i class="fa fa-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- /#content -->

    <!-- <div id="right">
        <div class="right_content">
            <div class="well-small dark m-t-15">
                <div class="row m-0">
                    <div class="col-lg-12 p-d-0">
                        <div class="skinmulti_btn" onclick="javascript:loadjscssfile('blue_black_skin.css','css')">
                            <div class="skin_blue skin_size b_t_r"></div>
                            <div class="skin_blue_border skin_shaddow skin_size b_b_r"></div>
                        </div>
                        <div class="skinmulti_btn" onclick="javascript:loadjscssfile('green_black_skin.css','css')">
                            <div class="skin_green skin_size b_t_r"></div>
                            <div class="skin_green_border skin_shaddow skin_size b_b_r"></div>
                        </div>
                        <div class="skinmulti_btn" onclick="javascript:loadjscssfile('purple_black_skin.css','css')">
                            <div class="skin_purple skin_size b_t_r"></div>
                            <div class="skin_purple_border skin_shaddow skin_size b_b_r"></div>
                        </div>
                        <div class="skinmulti_btn" onclick="javascript:loadjscssfile('orange_black_skin.css','css')">
                            <div class="skin_orange skin_size b_t_r"></div>
                            <div class="skin_orange_border skin_shaddow skin_size b_b_r"></div>
                        </div>
                        <div class="skinmulti_btn" onclick="javascript:loadjscssfile('red_black_skin.css','css')">
                            <div class="skin_red skin_size b_t_r"></div>
                            <div class="skin_red_border skin_shaddow skin_size b_b_r"></div>
                        </div>
                        <div class="skinmulti_btn" onclick="javascript:loadjscssfile('mint_black_skin.css','css')">
                            <div class="skin_mint skin_size b_t_r"></div>
                            <div class="skin_mint_border skin_shaddow skin_size b_b_r"></div>
                        </div>
                        
                        <div class="skin_btn skinsingle_btn skin_blue b_r height_40 skin_shaddow"
                             onclick="javascript:loadjscssfile('blue_skin.css','css')"></div>
                        <div class="skin_btn skinsingle_btn skin_green b_r height_40 skin_shaddow"
                             onclick="javascript:loadjscssfile('green_skin.css','css')"></div>
                        <div class="skin_btn skinsingle_btn skin_purple b_r height_40 skin_shaddow"
                             onclick="javascript:loadjscssfile('purple_skin.css','css')"></div>
                        <div class="skin_btn  skinsingle_btn skin_orange b_r height_40 skin_shaddow"
                             onclick="javascript:loadjscssfile('orange_skin.css','css')"></div>
                        <div class="skin_btn skinsingle_btn skin_red b_r height_40 skin_shaddow"
                             onclick="javascript:loadjscssfile('red_skin.css','css')"></div>
                        <div class="skin_btn skinsingle_btn skin_mint b_r height_40 skin_shaddow"
                             onclick="javascript:loadjscssfile('mint_skin.css','css')"></div>
                    </div>
                    <div class="col-lg-12 text-center m-t-15">
                        <button class="btn btn-dark button-rounded"
                                onclick="javascript:loadjscssfile('black_skin.css','css')">Dark
                        </button>
                        <button class="btn btn-secondary button-rounded default_skin"
                                onclick="javascript:loadjscssfile('default.css','css')">Default
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

</div>
<!-- /#wrap -->
<!-- global scripts-->
<script type="text/javascript" src="{{asset('admin/js/components.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/custom.js')}}"></script>
<!--end of global scripts-->

<!--  plugin scripts -->
<script type="text/javascript" src="{{asset('admin/vendors/countUp/js/countUp.min.js') }}"></script>
<script type="text/javascript" src="{{asset('admin/vendors/flip/js/jquery.flip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/pluginjs/jquery.sparkline.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/vendors/chartist/js/chartist.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/pluginjs/chartist-tooltip.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/vendors/swiper/js/swiper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/vendors/circliful/js/jquery.circliful.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/vendors/flotchart/js/jquery.flot.js')}}" ></script>
<script type="text/javascript" src="{{asset('admin/vendors/flotchart/js/jquery.flot.resize.js')}}"></script>
<!--end of plugin scripts-->
<script type="text/javascript" src="{{asset('admin/js/pages/index.js')}}"></script>

<!-- page level js -->
@yield('footer_scripts')
<!-- end page level js -->

</body>
</html>