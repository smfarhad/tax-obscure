@extends('client.layout.master')
@section('content')
<div class="row">
    <div class="hearing-list-render">
        <h1 class="text-center"> Hearing Details  </h1>
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-bordered table-striped text-center hearing-table-render">
                <tr>
                    <th>Hearing Date</th>
                    <th>Place</th>
                    <th>Name</th>
                    <th>TIN</th>
                    <th>Assesment Year</th>
                </tr>
                @foreach($assess as $row)
                <tr>
                    <td>@if($row->date !='0000-00-00') {{date('F j, Y', strtotime($row->date))}} @else {{'Date Not Set'}} @endif </td>
                    <td>{{$row->place}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->tin}}</td>
                    <td>{{$row->asses_year}} - {{$row->asses_year+1}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="back-to-search text-center col-md-6 col-md-offset-3">
            <div class="row">
                <a href="http://obscure.taxeszone10dhaka.org">
                    <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span>Back To Search
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
