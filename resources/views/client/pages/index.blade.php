@extends('client.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="index-form-render">
            <h1 class="text-center"> Use for Assessee  </h1>
            @include('errors.formerrors')
            {!! Form::open(['url' => 'search']) !!}
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    {{ Form::label(null, null, ['class' => 'control-label']) }}
                </div>
                <div class="form-group">
                    {{ Form::text($name, $value, array_merge(['class' => 'form-control input-lg text-center '], $attributes)) }}
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="margin-top-20 btn btn-primary btn-lg">Search</button>
                </div>
            </div>
        </div>
    </div>

</div>
<footer class="footer">
      <div class="container">
          <p style="margin-top: 15px;" class="text-muted"><a style="text-decoration: none;" class="text-bold pull-right" href="{{ url('/admin') }}">Admin Login</a></p>
      </div>
</footer>
{!! Form::close() !!}
@endsection
