<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HOME</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/editor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/editor/admin_interface/css/font-awesome/font-awesome.min.css')}}">
    <!-- MetisMenu CSS -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/editor/admin_interface/css/metisMenu/metisMenu.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/editor/admin_interface/css/sb-admin/sb-admin-2.css')}}">
    <!-- Upload Css -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/editor/admin_interface/css/uploads.css')}}">
    <!-- Style -->
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/editor/admin_interface/css/admin_style.css')}}">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/editor/admin_interface/css/datatables/dataTables.bootstrap.css')}}">


<!-- SCRIPT -->
    <!-- jQuery -->
    <script type="text/javascript" src="{{URL::asset('public/editor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::asset('public/editor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Validate -->
    <script type="text/javascript" src="{{URL::asset('public/editor/jquery/jquery.validate.min.js')}}"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{URL::asset('public/editor/admin_interface/js/metisMenu/metisMenu.min.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{URL::asset('public/editor/admin_interface/js/sb-admin-2.js')}}"></script>

    <!-- Ckeditor and Ckfinder -->
    <script type="text/javascript" src="{{URL::asset('public/editor/ckeditor/ckeditor.js')}}" ></script>
    <script type="text/javascript" src="{{URL::asset('public/editor/ckfinder/ckfinder.js')}}" ></script>

    <!-- /jQuery -->

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top admin_navbar" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">STUDYING ENGLISH</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <!-- MESSAGES -->
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Daothan</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                                </div>
                                <div>Than just comment </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->

                <!-- TASK COMPLETE -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="" onclick="Window.location.reload(true);">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="" onclick="Window.location.reload(true);">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- END TASK COMPLETE -->

                <!-- ALERT -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>

                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END ALERT -->


                <!-- USER -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user"></i> {{isset(Auth::user()->name) ? Auth::user()->name : ''}} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                         <!-- Show level user -->
                        <li>
                            <a onclick="view_user_login({{Auth::user()->id}})"><i class="fa fa-user fa-fw"></i>
                                <i>
                                    {{((Auth::user()->level=='0')) ? 'Super Admin' :''}}
                                    {{(isset(Auth::user()->level) && (Auth::user()->level=='1')) ? 'Admin':''}}
                                    {{(isset(Auth::user()->level) && (Auth::user()->level=='2')) ? 'Member':''}}
                                </i>
                            </a>
                        </li>
                        <!-- End show level user -->

                        <!-- Edit User logging -->
                        <li>
                            <a onclick="edit_user_login({{Auth::user()->id}})"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <!-- End edit User logging -->

                        <!-- Logout -->
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('user.logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                        <!-- End Logout -->
                    </ul>
                </li>
                <!-- END USER -->

                <!-- Login and Register -->
                <li class="{{isset(Auth::user()->name) || (url()->current()==route('user.login')) ? 'hidden' : null}}">
                    <a href="{{route('user.login')}}"><strong>Login</strong></a>
                </li>
                <li class="{{isset(Auth::user()->name) || (url()->current()==route('user.register')) ? 'hidden' : null}}">
                    <a href="{{route('user.register')}}"><strong>Register</strong></a>
                </li>
                <!-- End Login and Register -->
            </ul>


            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <!-- Dashboard -->
                        <li>
                            <a href="{{route('user.home')}}"><i class="glyphicon glyphicon-home"></i> Home User</a>
                        </li>

                        <li>
                            <a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <!-- Tables -->
                         <li>
                            <a href=""><i class="fa fa-table fa-fw "></i> Tables <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href="{{route('admin.user.show')}}">Users</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.cate.show')}}">Categories</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.detail.show')}}">Details</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Forms Add  -->
                        <li>
                            <a href=""><i class="fa fa-edit fa-fw"></i> Add <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a data-toggle="modal" id="add_user_header">Users</a>
                                </li>
                                <li>
                                    <a data-toggle="modal" id="add_cate_header">Categories</a>
                                </li>
                                <li>
                                    <a data-toggle="modal" id="add_detail_header">Details</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

       <div id="page-wrapper">
            <!-- Show Flash Message -->
                <!-- Show Flash -->
                <div class="col-md-6 col-md-offset-3">
                    @if(Session::has('flash_message'))
                        <h3 class="flash text-center text-{{Session::get('flash_level')}}"><strong><i>{{Session::get('flash_message')}}</i></strong></h3>
                    @endif
                </div>
                <script type="text/javascript">$('h3.flash').delay(3000).slideUp();</script>

            <!-- End Show Flash Message -->

            @yield('content')
        </div>

    </div>
        @extends('admin/layouts/user_login_detail')
        @extends('admin/layouts/user_login_edit')
        @extends('admin/layouts/dashboard_add_user')
        @extends('admin/layouts/dashboard_add_cate')
        @extends('admin/layouts/dashboard_add_detail')


        <!-- DataTables JavaScript -->
        <script type="text/javascript" src="{{URL::asset('public/editor/admin_interface/js/datatables/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('public/editor/admin_interface/js/datatables/dataTables.bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('public/editor/admin_interface/js/datatables/dataTables.responsive.js')}}"></script>
        <!-- Admin JavaScript -->
        <script type="text/javascript" src="{{URL::asset('public/editor/admin_interface/js/admin_master_script.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('public/editor/admin_interface/js/admin_user_checkbox.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('public/editor/admin_interface/js/admin_cate_checkbox.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('public/editor/admin_interface/js/admin_detail_checkbox.js')}}"></script>



</body>
</html>