@extends('client.layout.master')
@section('content')
<div class="row">
    <div class="index-form-render">
        <h1 class="text-center"> Taxes Zone 10  </h1>
        <div class="col-md-6 col-md-offset-3">
            
        @foreach($assess as $row)
            <h3><a href="{{action('SearchController@show', [$row->id])}}">{{$row->name}}</a></h3>
            <p>{{$row->tin}}</p>
            <p>{{$row->date}}</p>
        @endforeach
         
        </div>
    </div>
</div>
@endsection
