@extends('auth.layouts.master')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="login-box">

        <div class="row">
            <div class="login-logo">
                <a href="http://obscure.taxes"><b>Taxes Zone </b> -10 </a>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading-reset">Please put an eamil to Reset </div>
                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-Mail Address</label>

                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                            </button>
                        </div>
                    </form>
                    <div class="row"> 
                    <div class="col-md-12"> 
                        
                        <a href="{{ url('/login') }}"><i class="fa fa-btn fa-arrow-circle-left "></i> Go Back</a>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
