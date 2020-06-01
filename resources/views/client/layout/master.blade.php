<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Taxes Zone-10 | <?= $title; ?> </title>
    <!-- Bootstrap -->
    <link href="{{ URL::asset('assets/client/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/client/css/styles.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="home-back-link">
            <a href="http://taxeszone10dhaka.org"> <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span>Back Home</a>    
        </div>
    </div>
        
      @yield('content')
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ URL::asset('assets/client/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ URL::asset('assets/client/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
  </body>
</html>