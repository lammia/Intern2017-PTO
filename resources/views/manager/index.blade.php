<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Welcome Manager')</title>
  <link href="{{ asset('bootstraps/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstraps/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstraps/nprogress.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstraps/green.css') }}" rel="stylesheet">  
  <link href="{{ asset('bootstraps/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstraps/jqvmap.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('bootstraps/daterangepicker.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstraps/custom.min.css') }}" rel="stylesheet">
  
  
  <script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
    <!-- jQuery -->
    

    @yield('date')

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          @include('manager.nav')
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">           
              @include('manager.topnav')          
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col table-responsive" role="main">
          <!-- top tiles -->
            @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            PTO by Drift Team<a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
   
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->    
    <script src="{{ asset('js/date.js') }}"></script>   
   
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/custom.min.js') }}"></script>    
    
  </body>
</html>
