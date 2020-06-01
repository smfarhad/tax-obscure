@if($errors->any())
<div  class="search-box-error col-md-6 col-md-offset-3">
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li> {{$error}} </li>
        @endforeach
    </ul>
</div>
@endif