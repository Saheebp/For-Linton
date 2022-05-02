@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Dashboard
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

@stop

@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-6">
                    <h4 class="m-t-5">
                        <i class="fa fa-home"></i>
                        Dashboard
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="outer">
        <div class="inner bg-container">


            <div class="row widget_countup">
                        
                <div class="col-12 col-sm-6 col-xl-3">
                    <div id="top_widget1">
                        
                        <div class="">
                            <a class="text-dark" href="{{ route('projects.indexFilter', $new) }}">
                                <div class="bg-white text-primary text-white b_r_5 section_border">
                                    <div class="p-t-l-r-15">
                                        <div id="widget_countup12">{{ $all_projects->where('status_id', $new)->count() }}</div>
                                        <div>New Projects</div>
                                    </div>
                                    <div>&nbsp;</div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3 media_max_573">
                    <div id="top_widget2">

                        <div class="">
                            <a class="text-dark" href="{{ route('projects.indexFilter', $pending) }}">
                                <div class="bg-white text-warning b_r_5 section_border">
                                    <div class="p-t-l-r-15">
                                        <div id="widget_countup22">{{ $all_projects->where('status_id', $pending)->count() }}</div>
                                        <div>Pending Projects</div>
                                    </div>
                                    <div>&nbsp;</div>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>

                <div class="col-12 col-sm-6 col-xl-3 media_max_1199">
                    <div id="top_widget3">

                        <div class="">
                            <a class="text-dark" href="{{ route('projects.indexFilter', $overdue) }}">
                                <div class="bg-white text-dark b_r_5 section_border">
                                    <div class="p-t-l-r-15">
                                        <div id="widget_countup12"> {{ $all_projects->where('status_id', $completed)->count() }}</div>
                                        <div>Completed Projects</div>
                                    </div>
                                    <div>&nbsp;</div>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>

                <div class="col-12 col-sm-6 col-xl-3 media_max_1199">
                    <div id="top_widget4">

                        <div class="">
                            <a class="text-dark" href="{{ route('projects.indexFilter', $overdue) }}">
                                <div class="bg-white text-danger b_r_5 section_border">
                                    <div class="p-t-l-r-15">
                                        <div id="widget_countup12"> {{ $all_projects->where('status_id', $overdue)->count() }}</div>
                                        <div>Overdue Projects</div>
                                    </div>
                                    <div>&nbsp;</div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row m-t-35">
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-white">
                            <span class="card-title">Today Stats</span>
                            <div class="dropdown chart_drop float-right">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                                <i class="fa fa-arrows-alt"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="demo-chartist mb-md m-t-15" id="chart1"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-lg-3 m-t-35">
                    <div class="bg-white section_border circliful_section">
                        <div class="tab-content text-center">
                            <div  class="tab-pane active" id="fa-icons">
                                <h4 class="p-t-30">Design Progress</h4>
                                <div id="myStat"></div>
                            </div>
                            <div class="tab-pane" id="themify-icons">
                                <h4 class="p-t-30">Coding Progress</h4>
                                <div id="myStat2" ></div>
                            </div>
                            <div class="tab-pane" id="ionicons">
                                <h4 class="p-t-30">Doc's Progress</h4>
                                <div id="myStat3"></div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs m-t-35 text-center">
                            <li class="nav-item">
                                <a class="nav-link active" href="#fa-icons" data-toggle="tab">
                                    <div><i class="fa fa-pie-chart"></i></div>
                                    <span>Design</span>
                                </a>
                            </li>
                            <li class="nav-item" id="themify_icon">
                                <a class="nav-link" href="#themify-icons" data-toggle="tab">
                                    <div><i class="fa fa-check-square-o"></i></div>
                                    <span>Coding</span>
                                </a>
                            </li>

                            <li class="nav-item" id="ionicons_tab">
                                <a class="nav-link" href="#ionicons" data-toggle="tab">
                                    <div><i class="fa fa-pencil"></i></div>
                                    <span>Docs</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card m-t-35 real_charts">
                        <div class="card-header bg-white">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-center" href="#orders_section" role="tab" data-toggle="tab">Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-center" href="#sales_section" role="tab" data-toggle="tab">Sales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-center" href="#users_section" role="tab" data-toggle="tab">Users</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">


                            <div class="tab-content m-t-20">
                                <div role="tabpanel" class="tab-pane fade show active" id="orders_section">
                                    <div id="order_realtime" class="flotChart1">
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="sales_section">
                                    <div id="sale_realtime" class="flotChart1">

                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="users_section">
                                    <div id="users_realtime" class="flotChart1">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="col-lg-5 col-12 m-t-35">
                    <div class="row">
                        <div class="col-12 text-center text-white">
                            <div class="lorem_background">
                                <div>
                                    <img src="{{ asset('admin/img/mailbox_imgs/2.jpg') }}" alt="lorem" class="img-fluid rounded-circle lorem_img">
                                </div>
                                <div class="text-white font_18">Stuart</div>
                                <div>stuart@gmail.com</div>
                                <div class="text-center lorem_bg m-b-0">
                                    <div class="row">
                                        <div class="col-3 lorem_font_icon">
                                            <i class="fa fa-facebook"></i>
                                        </div>
                                        <div class="col-3 lorem_font_icon">
                                            <i class="fa fa-twitter"></i>
                                        </div>
                                        <div class="col-3 lorem_font_icon">
                                            <i class="fa fa-google-plus"></i>
                                        </div>
                                        <div class="col-3">
                                            <i class="fa fa-instagram"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="list-group bg-white section_border">
                                <a href="#" class="lorem_group_item lorem_group_item_bottom">
                                    <span class="badge badge-pill badge-primary float-right">224</span>
                                    <span class="p-l-10">Followers</span>
                                    <span class="float-left">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </a>
                                <a href="#" class="lorem_group_item">
                                    <span class="badge badge-pill badge-primary float-right">14</span>
                                    <span class="p-l-10">Following</span>
                                    <span class="float-left">
                                        <i class="fa fa-users"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- <div class="row">
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col m-t-35">
                            <div class="weather_img">
                                <div class="row header_align">
                                    <div class="col-sm-8 col-7 text-white info">
                                        <div class="city">City: Jos</div>
                                        <div class="night">Night - 21:17 PM</div>

                                        <div class="temp">24<sup>o</sup></div>
                                        <div class="wind">
                                            <span>28 km/h</span>
                                        </div>
                                    </div>
                                    <div class="icon col-5 col-sm-4">
                                        <img src="{{ asset('admin/img/weather1.png') }}" alt="weather" class="img-fluid">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="background_opacity">
                                            <div class="row header_align">
                                                <div class="col-2 border_right days_margin_top">
                                                    <div class="day text-center">
                                                        <div class="day_font">Mon</div>
                                                        <div>
                                                            <img src="{{ asset('admin/img/w5.png') }}" alt="weather" class="img-fluid">
                                                        </div>
                                                        <div class="day_font">30<sup>o</sup></div>
                                                    </div>
                                                </div>
                                                <div class="col-2 border_right days_margin_top">
                                                    <div class="day text-center">
                                                        <div class="day_font">Tue</div>
                                                        <div>
                                                            <img src="{{ asset('admin/img/w2.png') }}" alt="weather" class="img-fluid">
                                                        </div>
                                                        <div class="day_font">29<sup>o</sup></div>
                                                    </div>
                                                </div>
                                                <div class="col-2 border_right days_margin_top">
                                                    <div class="day text-center">
                                                        <div class="day_font">Wed</div>
                                                        <div>
                                                            <img src="{{ asset('admin/img/w3.png') }}" alt="weather" class="img-fluid">
                                                        </div>
                                                        <div class="day_font">34<sup>o</sup></div>
                                                    </div>
                                                </div>
                                                <div class="col-2 border_right days_margin_top">
                                                    <div class="day text-center">
                                                        <div class="day_font">Thu</div>
                                                        <div>
                                                            <img src="{{ asset('admin/img/w4.png') }}" alt="weather" class="img-fluid">
                                                        </div>
                                                        <div class="day_font">32<sup>o</sup></div>
                                                    </div>
                                                </div>
                                                <div class="col-2 border_right days_margin_top">
                                                    <div class="day text-center">
                                                        <div class="day_font">Fri</div>
                                                        <div>
                                                            <img src="{{ asset('admin/img/w5.png') }}" alt="weather" class="img-fluid">
                                                        </div>
                                                        <div class="day_font">35<sup>o</sup></div>
                                                    </div>
                                                </div>
                                                <div class="col-2 days_margin_top">
                                                    <div class="day text-center">
                                                        <div class="day_font">Sat</div>
                                                        <div>
                                                            <img src="{{ asset('admin/img/w2.png') }}" alt="weather" class="img-fluid">
                                                        </div>
                                                        <div class="day_font">36<sup>o</sup></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card m-t-35">

                        <div class="card-body m-t-10">
                            <svg id="fillgauge1"  width="100%" height="193"></svg>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Average Monthly Uploads</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="test-circle">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <br />
                                    <span id="monthly_upload"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 m-t-35">
                    <div class="social-counter text-center">
                        <ul class="m-b-0">
                            <li class="facebook">
                                <a href="#">
                                    <div class="row">
                                        <div class="col-4 text-right social_icon_top"><span class="social-icon text-center"><i class="fa fa-facebook"></i></span></div>
                                        <div class="col-8 text-left social_fa_top"><span class="count"><span id="fb_count">354</span>K</span> Likes</div>
                                    </div>
                                </a>
                            </li>
                            <li class="twitter">
                                <a href="#">
                                    <div class="row">
                                        <div class="col-4 text-right social_icon_top"><span class="social-icon text-center"><i class="fa fa-twitter"></i></span></div>
                                        <div class="col-8 text-left social_fa_top"><span class="count" id="tw_count">547</span> Followers</div>
                                    </div>
                                </a>
                            </li>
                            <li class="google">
                                <a href="#">
                                    <div class="row">
                                        <div class="col-4 text-right social_icon_top"><span class="social-icon text-center"><i class="fa fa-google-plus"></i></span></div>
                                        <div class="col-8 text-left social_fa_top"><span class="count" id="g+_count">678</span> Followers</div>
                                    </div>
                                </a>
                            </li>

                            <li class="instagram">
                                <a href="#">
                                    <div class="row">
                                        <div class="col-4 text-right social_icon_top"><span class="social-icon text-center"><i class="fa fa-instagram"></i></span></div>
                                        <div class="col-8 text-left social_fa_top"><span class="count">2M</span> Followers</div>
                                    </div>
                                </a>
                            </li>
                            <li class="linkedin">
                                <a href="#">
                                    <div class="row">
                                        <div class="col-4 text-right social_icon_top"><span class="social-icon text-center"><i class="fa fa-linkedin"></i></span></div>
                                        <div class="col-8 text-left social_fa_top"><span class="count" id="in_count">124</span> Followers</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
@stop

@section('footer_scripts')
    
@stop
