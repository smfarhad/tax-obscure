<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Taxes Zone - 10 | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{ URL::asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/dashboard.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/site.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ URL::asset('assets/admin/plugins/iCheck/square/blue.css')}}">
    </head>
    <body class="hold-transition login-page">
        @yield('content')
        <!-- jQuery 2.2.3 -->
        <script src="{{ URL::asset('assets/admin/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="{{ URL::asset('assets/admin/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <!-- iCheck -->
        <script src="{{ URL::asset('assets/admin/plugins/iCheck/icheck.min.js')}}"></script>
        <!-- SIte js-->
        <script src="{{ URL::asset('assets/admin/js/sites.js')}}"></script>
    </body>
</html>
