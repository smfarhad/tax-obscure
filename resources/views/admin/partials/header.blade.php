<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> {{ $data['title']}} | TAXES ZONE - 10</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{ URL::asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->                                             
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{URL::asset('assets/admin/css/dashboard.css')}}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{URL::asset('assets/admin/css/skins/skin-green.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{URL::asset('assets/admin/plugins/iCheck/flat/blue.css')}}">
        <!-- Morris chart -->
        <link rel="stylesheet" href="{{URL::asset('assets/admin/plugins/morris/morris.css')}}">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{URL::asset('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{URL::asset('assets/admin/plugins/datepicker/datepicker3.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{URL::asset('assets/admin/plugins/daterangepicker/daterangepicker.css')}}">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{URL::asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
        <!-- data table  -->
        <link rel="stylesheet" href="{{URL::asset('assets/admin/plugins/datatables/dataTables.bootstrap.css')}}">
             
    </head>
    <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="{{URL::to('/admin')}}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>T </b>10</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>TAXES </b> ZONE - 10</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{URL::asset('assets/admin/img')}}/avatar5.png" class="user-image" alt="User Image">
                                    <span class="hidden-xs">{{Auth::user()->name}}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="{{URL::asset('assets/admin/img')}}/avatar5.png" class="img-circle" alt="User Image">

                                        <p>
                                            {{Auth::user()->name}}
                                            <small>User since {{date('M  Y', strtotime(Auth::user()->create_at))}}</small>
                                            <!--<small>Member since Nov. 2012</small>-->
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
<!--                                    <li class="user-body">
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Followers</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Sales</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Friends</a>
                                            </div>
                                        </div>
                                         /.row 
                                    </li>-->
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="{{URL::to('/admin/profile')}}" class="btn btn-default btn-flat">My Settings</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{URL::to('/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>