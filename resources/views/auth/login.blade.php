@extends('auth.layouts.master')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{URL::to('/')}}"><b>Taxes Zone </b> -10 </a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <div style="margin-top: 10px;" class="col-md-12">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            @if ($message = Session::get('warning'))
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
            </div>
            @endif
        </div>
        @include('auth.partials.login_form')
        <!-- /.social-auth-links -->
        <a href="{{URL::to('/password/reset')}}">I forgot my password</a><br>
        <!--<a href="register.html" class="text-center">Register a new membership</a>-->
    </div>
    <!-- /.login-box-body -->
</div>
@endsection