<form id="login-form" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <div class="form-group has-feedback">
        <input name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
        {{-- <span class="glyphicon glyphicon-envelope form-control-feedback email-icon"></span> --}}
         @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
        <input name="password" type="password" class="form-control" placeholder="Password" required>
        {{-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> --}}
            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
    </div>
    <div class="row">
        <div class="col-xs-8">
            <!--    <div class="checkbox icheck">
                        <label>
                          <input type="checkbox"> Remember Me
                        </label>
                    </div>-->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
    </div>
</form>