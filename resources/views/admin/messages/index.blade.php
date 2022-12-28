@extends('layouts.backend')

{{-- Page title --}}
@section('title')
    Procurement Quotes
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
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-sm-4">
                    <h4 class="nav_top_align">
                        <i class="fa fa-inbox"></i>
                        Inbox
                    </h4>
                </div>
                <div class="col-sm-8">
                    <ol class="breadcrumb float-right  nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">
                                <i class="fa fa-home" data-pack="default" data-tags=""></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('messages.index') }}">Messaging</a>
                        </li>
                        <li class="active breadcrumb-item">Inbox</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <div>
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
            
            </div>
            <div class="row web-mail">
                <div class="col-lg-3 mail_compose_list">
                    <div>
                        <ul class="list-group">
                            <!-- <li class="list-group-item">
                                <a href="mail_compose.html">
                                    <i class="fa fa-edit"></i>
                                    Compose
                                </a>
                            </li> -->
                            <li class="list-group-item bg-success">
                                <a href="{{ route('messages.index') }}" class="mail_inbox_text_col">
                                    @if ($inbox->count() > 0)
                                    <span class="badge badge-pill badge-primary float-right">{{ $inbox->count() }}</span>
                                    @endif
                                    <i class="fa fa-inbox"></i>
                                    Inbox
                                </a>
                            </li>
                            <!-- <li class="list-group-item">
                                <a href="mail_view.html">
                                    <i class="fa fa-eye"></i>
                                    View Mail
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="mail_sent.html">
                                    <i class="fa fa-sign-out"></i>
                                    Sent
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="mail_spam.html">
                                    <span class="badge badge-pill badge-primary float-right">14</span>
                                    <i class="fa fa-eye-slash"></i>
                                    Spam
                                </a>
                            </li> -->
                            <!-- <li class="list-group-item">
                                <a href="mail_draft.html">
                                    <span class="badge badge-pill badge-primary float-right">16</span>
                                    <i class="fa fa-recycle"></i>
                                    Draft
                                </a>
                            </li> -->
                            <!-- <li class="list-group-item">
                                <a href="mail_trash.html">
                                    <span class="badge badge-pill badge-primary float-right">16</span>
                                    <i class="fa fa-trash"></i>
                                    Trash
                                </a>
                            </li>
                            <li class="list-group-item" id="more_items">
                                <a>
                                    More
                                </a>
                            </li> -->
                            <!-- <li class="list-group-item starred_mail">
                                <a href="#">
                                    <span class="badge badge-pill badge-primary float-right">3</span>
                                    <i class="fa fa-star"></i>
                                    Starred
                                </a>
                            </li>
                            <li class="list-group-item starred_mail">
                                <a href="#">
                                @if ($project_inbox->count() > 0)
                                    <span class="badge badge-pill badge-primary float-right">{{ $project_inbox->count() }}</span>
                                @endif
                                    <i class="fa fa-star"></i>
                                    Projects
                                </a>
                            </li>
                            <li class="list-group-item starred_mail">
                                <a href="#">
                                    <span class="badge badge-pill badge-primary float-right">26</span>
                                    <i class="fa fa-star"></i>
                                    Tasks
                                </a>
                            </li>
                            <li class="list-group-item starred_mail">
                                <a href="#">
                                    <span class="badge badge-pill badge-primary float-right">36</span>
                                    <i class="fa fa-star "></i>
                                    Sub Tasks
                                </a>
                            </li> -->
                        </ul>
                    </div>
                    <!-- <div class="mail_ul_active m-t-35">
                        <ul class="list-group">
                            <li class="list-group-item bg-success">
                                <a href="#" class="mail_inbox_text_col">
                                    <i class="fa fa-comments"></i>
                                    Contacts
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="list-group contact_scroll">
                            <li class="list-group-item status_height">
                                <a href="#">
                                    <span class="status-online m-t-10"></span>
                                    &nbsp; John Cena
                                    <span class="float-left">
                                    <img src="img/mailbox_imgs/1.jpg"
                                            class="rounded-circle img-responsive float-left inbox_contact_img" alt="Image">
                                </span>
                                </a>
                            </li>
                            <li class="list-group-item status_height">
                                <a href="#">
                                    <span class="status-online m-t-10"></span>
                                    &nbsp; Peter Norton
                                    <span class="float-left">
                                    <img src="img/mailbox_imgs/2.jpg"
                                            class="rounded-circle img-responsive float-left inbox_contact_img" alt="Image">
                                </span>
                                </a>
                            </li>
                        </ul>
                    </div> -->
                </div>
                <div class="col-lg-9">
                    <div class="card mail media_max_991">
                        <!-- Content -->
                        @yield('content_message')
                        <!-- Content end -->

                    </div>
                </div>
            </div>
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->
    <!-- Modal -->
    <div class="modal fade" id="search_modal" tabindex="-1" role="dialog"
            aria-hidden="true">
        <form>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="float-right" aria-hidden="true">&times;</span>
                    </button>
                    <div class="input-group search_bar_small">
                        <input type="text" class="form-control" placeholder="Search..." name="search">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </div>
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

    <!-- global scripts-->
    <script type="text/javascript" src="{{asset('js/components.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
    <!-- end of global scripts-->
    <script type="text/javascript" src="{{asset('js/pages/mail_box.js')}}"></script>
@stop
