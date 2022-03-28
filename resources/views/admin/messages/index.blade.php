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
                            <a href="index1.html">
                                <i class="fa fa-home" data-pack="default" data-tags=""></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Email</a>
                        </li>
                        <li class="active breadcrumb-item">Inbox</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>

    <div class="outer">
        <div class="inner bg-container">
            <div class="row web-mail">
                <div class="col-lg-3 mail_compose_list">
                    <div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="mail_compose.html">
                                    <i class="fa fa-edit"></i>
                                    Compose
                                </a>
                            </li>
                            <li class="list-group-item bg-success">
                                <a href="mail_inbox.html" class="mail_inbox_text_col">
                                    <i class="fa fa-inbox"></i>
                                    Inbox
                                </a>
                            </li>
                            <!-- <li class="list-group-item">
                                <a href="mail_view.html">
                                    <i class="fa fa-eye"></i>
                                    View Mail
                                </a>
                            </li> -->
                            <li class="list-group-item">
                                <a href="mail_sent.html">
                                    <i class="fa fa-sign-out"></i>
                                    Sent
                                </a>
                            </li>
                            <!-- <li class="list-group-item">
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
                            <li class="list-group-item">
                                <a href="mail_trash.html">
                                    <span class="badge badge-pill badge-primary float-right">16</span>
                                    <i class="fa fa-trash"></i>
                                    Trash
                                </a>
                            </li>
                            <li class="list-group-item" id="more_items">
                                <a>
                                    <!-- <i class="fa fa-angle-down float-right"></i> -->
                                    More
                                </a>
                            </li>
                            <li class="list-group-item starred_mail">
                                <a href="#">
                                    <span class="badge badge-pill badge-primary float-right">3</span>
                                    <i class="fa fa-star"></i>
                                    Starred
                                </a>
                            </li>
                            <li class="list-group-item starred_mail">
                                <a href="#">
                                    <span class="badge badge-pill badge-primary float-right">14</span>
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
                            </li>
                        </ul>
                    </div>
                    <div class="mail_ul_active m-t-35">
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
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card mail media_max_991">
                        <div class="card-header bg-white">
                            <div class="row">
                                <div class="col-sm-6 col-12 m-t-10 dropdown_list_hover">
                                    <div class="btn-group float-left table-bordereds">
                                        <label class="custom-control custom-checkbox  mb-0 mr-0">
                                            <input type="checkbox" class="custom-control-input select-all">
                                            <span class="custom-control-indicator"></span>
                                        </label>
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="select-all1">
                                                <span>All</span>
                                            </li>
                                            <li id="select-none">
                                                <span>None</span>
                                            </li>
                                            <li id="mail_read">
                                                <span>Read</span>
                                            </li>
                                            <li id="mail_unread">
                                                <span>UnRead</span>
                                            </li>
                                            <li id="mail_starred">
                                                <span>Starred</span>
                                            </li>
                                            <li id="mail_unstarred">
                                                <span>Unstarred</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="btn-group float-left table-bordered text-primary" id="refresh_inbox">
                                        <i class="fa fa-refresh"></i>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="input-group margin bottom">
                                        <input type="text" class="form-control inbox_search_height m-t-10" placeholder="Search">
                                        <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary inbox_search_height m-t-10">Search</button>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body m-t-25 p-d-0">
                            <div class="tabs tabs-bordered tabs-icons">
                                <!-- <ul class="nav nav-tabs">
                                    <li class="nav-item" id="primary2">
                                        <a href="#primary" class="nav-link active" data-toggle="tab"
                                            aria-expanded="true"><i class="fa fa-inbox"></i> Primary</a>
                                    </li>
                                    <li class="nav-item" id="social2">
                                        <a href="#social" class="nav-link" data-toggle="tab"
                                            aria-expanded="false"><i class="fa fa-group"></i> Social</a>
                                    </li>
                                    <li class="nav-item" id="promotions2">
                                        <a href="#promotions" class="nav-link" data-toggle="tab"
                                            aria-expanded="false"><i class="fa fa-star"></i> Promotions</a>
                                    </li>
                                </ul> -->

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane table-responsive reset padding-all fade active show"
                                            id="primary">
                                        <table class="table">
                                            <tbody>
                                            <tr class="mail-unread">
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star"></i></td>
                                                <td class="sent_to_mailview">John Doe</td>
                                                <td class="sent_to_mailview">Hello friend</td>
                                                <td class="sent_to_mailview"></td>
                                                <td class="sent_to_mailview">11/04/2014 14:35 AM</td>
                                            </tr>
                                            <tr class="mail-unread">
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star"></i></td>
                                                <td class="sent_to_mailview">Jaimie Doe</td>
                                                <td class="sent_to_mailview">Where are you dude?!?</td>
                                                <td class="sent_to_mailview"></td>
                                                <td class="sent_to_mailview">11/04/2014 14:35 AM</td>
                                            </tr>
                                            <tr class="mail-unread">
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star text-warning"></i></td>
                                                <td class="sent_to_mailview">John Cena</td>
                                                <td class="sent_to_mailview">Please confirm your registration</td>
                                                <td class="sent_to_mailview"><i class="fa fa-paperclip"></i></td>
                                                <td class="sent_to_mailview">11/04/2014 14:35 AM</td>
                                            </tr>
                                            <tr class="mail-unread">
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star starred"></i></td>
                                                <td class="sent_to_mailview">Office</td>
                                                <td class="sent_to_mailview">Reminder about the Meeting for Today</td>
                                                <td class="sent_to_mailview"></td>
                                                <td class="sent_to_mailview">11/04/2014 14:35 AM</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star text-warning"></i></td>
                                                <td class="sent_to_mailview">Jonathan Fox</td>
                                                <td class="sent_to_mailview">Dinner tonight at Tina's</td>
                                                <td class="sent_to_mailview"></td>
                                                <td class="sent_to_mailview">11/04/2014 14:35 AM</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star text-warning"></i></td>
                                                <td class="sent_to_mailview">Peter Norton</td>
                                                <td class="sent_to_mailview">Lorem ipsum dolor sit amet</td>
                                                <td class="sent_to_mailview"></td>
                                                <td class="sent_to_mailview">11/04/2014 14:35 AM</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star"></i></td>
                                                <td class="sent_to_mailview">Marin Robbinson</td>
                                                <td class="sent_to_mailview">Consectetur adipisicing elit.</td>
                                                <td class="sent_to_mailview"></td>
                                                <td class="sent_to_mailview">11/04/2014 14:35 AM</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="text-white"><i class="fa fa-star starred"></i></td>
                                                <td class="sent_to_mailview">Kimy Jorda</td>
                                                <td class="sent_to_mailview">Impedit vero possimus dolores.</td>
                                                <td class="sent_to_mailview"><i class="fa fa-paperclip"></i></td>
                                                <td class="sent_to_mailview">11/04/2014 14:35 AM</td>
                                            </tr>
                                            <!--
                                            <tr>
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star"></i></td>
                                                <td class="sent_to_mailview">Marin Robbinson</td>
                                                <td class="sent_to_mailview">Vitae esse ullam tenetur.</td>
                                                <td class="sent_to_mailview"></td>
                                                <td class="sent_to_mailview">11/04/2014 14:35 AM</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star"></i></td>
                                                <td class="sent_to_mailview">Benny Stuart</td>
                                                <td class="sent_to_mailview">Velit, accusamus.</td>
                                                <td class="sent_to_mailview"></td>
                                                <td class="sent_to_mailview">08/04/2014 02:00 AM</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star"></i></td>
                                                <td class="sent_to_mailview">Sandy Chris</td>
                                                <td class="sent_to_mailview">Corrupti, dolorum ab nobis ex culpa.</td>
                                                <td class="sent_to_mailview"></td>
                                                <td class="sent_to_mailview">08/04/2014 02:00 AM</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star"></i></td>
                                                <td class="sent_to_mailview">Mitchel Johnson</td>
                                                <td class="sent_to_mailview">Nesciunt aperiam praesentium blanditiis</td>
                                                <td class="sent_to_mailview"></td>
                                                <td class="sent_to_mailview">08/04/2014 02:00 AM</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star"></i></td>
                                                <td class="sent_to_mailview">Mitchel Johnson</td>
                                                <td class="sent_to_mailview">Illo eius porro nisi sapiente.</td>
                                                <td class="sent_to_mailview"><i class="fa fa-paperclip"></i></td>
                                                <td class="sent_to_mailview">08/04/2014 02:00 AM</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star"></i></td>
                                                <td class="sent_to_mailview">David Miller</td>
                                                <td class="sent_to_mailview">Modi aut tempora provident ab consequatur.</td>
                                                <td class="sent_to_mailview"></td>
                                                <td class="sent_to_mailview">08/04/2014 02:00 AM</td>
                                            </tr> -->
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <div class="tab-pane table-responsive reset padding-all fade"
                                            id="social">
                                        <table class="table">
                                            <tbody>
                                            <tr class="mail-unread">
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star"></i></td>
                                                <td class="sent_to_mailview">Facebook</td>
                                                <td class="sent_to_mailview">18 new firend requests</td>
                                                <td class="sent_to_mailview"></td>
                                                <td class="sent_to_mailview">11/04/2014 14:35 AM</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star"></i></td>
                                                <td class="sent_to_mailview">Twitter</td>
                                                <td class="sent_to_mailview">Lorem ipsum solet mit dolor.</td>
                                                <td class="sent_to_mailview"></td>
                                                <td class="sent_to_mailview">11/04/2014 14:35 AM</td>
                                            </tr>
                                            <tr class="">
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star"></i></td>
                                                <td class="sent_to_mailview">Google+</td>
                                                <td class="sent_to_mailview">Impedit vero possimus dolores.</td>
                                                <td class="sent_to_mailview"><i class="fa fa-paperclip"></i></td>
                                                <td class="sent_to_mailview">11/04/2014 14:35 AM</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane table-responsive reset padding-all fade"
                                            id="promotions">
                                        <table class="table">
                                            <tbody>
                                            <tr class="mail-unread">
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star"></i></td>
                                                <td class="sent_to_mailview">Ebay</td>
                                                <td class="sent_to_mailview">Qonsequer novo dolores.</td>
                                                <td class="sent_to_mailview"></td>
                                                <td class="sent_to_mailview">11/04/2014 14:35 AM</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star"></i></td>
                                                <td class="sent_to_mailview">NewEgg</td>
                                                <td class="sent_to_mailview">Lorem ipsum solet mit dolor.</td>
                                                <td class="sent_to_mailview"></td>
                                                <td class="sent_to_mailview">11/04/2014 14:35 AM</td>
                                            </tr>
                                            <tr class="">
                                                <td>
                                                    <div class="checker m-l-20">
                                                        <label class="custom-control custom-checkbox">
                                                            <input name="checkbox" type="checkbox"
                                                                    class="custom-control-input ">
                                                            <span class="custom-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star"></i></td>
                                                <td class="sent_to_mailview">BestBuy</td>
                                                <td class="sent_to_mailview">Impedit vero possimus dolores.</td>
                                                <td class="sent_to_mailview"><i class="fa fa-paperclip"></i></td>
                                                <td class="sent_to_mailview">11/04/2014 14:35 AM</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div> -->
                                </div>
                            </div>
                        </div>

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
