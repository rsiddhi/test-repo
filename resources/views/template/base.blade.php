<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Information System</title>

  <!-- Bootstrap core CSS -->
  <link  href="{{asset('/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="{{asset('/bower_components/jquery/dist/jquery.js')}}"></script>
  <script src="{{asset('/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('/bower_components/jquery/dist/jquery-ui.js')}}"></script>
</head>

<body role="document">

  <!-- Fixed navbar -->
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Information System</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="/dashboard">Dashboard</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Member <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="/members">View all Membes</a></li>
              <li><a href="/members/create">Create Member</a></li>
            </ul>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>

  <div class="container">

    <div style="margin-top: 70px;"></div>
    
    <div class="page-header">
      <h1>{{$title}}</h1>
    </div>

    @if(isset($message))
        <div class="alert alert-success">{{$message}}</div>
      @endif

      @if(isset($error_message))
        <div class="alert alert-danger">{{$error_message}}</div>
      @endif

      @if(Session::has('message'))
        <div class="alert alert-success">{!! Session::get('message') !!}</div>
      @endif

      @if(Session::has('error_message'))
        <div class="alert alert-danger">{!! Session::get('error_message') !!}</div>
      @endif    

      @yield("content")

  </div>
  <div class="row-fluid">
  <hr>
  <footer>
      <p class="pull-right"><a href="#">Back to top</a></p>
      <p>Copyright © {{date('Y')}} </p>
  </footer>
</div>
</body>
</html>