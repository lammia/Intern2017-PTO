<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title', 'Welcome Admin')</title>
    <link href="{{ asset('bootstraps/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstraps/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstraps/nprogress.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstraps/green.css') }}" rel="stylesheet">  
    <link href="{{ asset('bootstraps/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstraps/jqvmap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('bootstraps/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstraps/custom.min.css') }}" rel="stylesheet">



    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
    

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
    //  $(document).ready(function() {
     //   $('#example').DataTable( {
      //   "lengthMenu": [[2, 10, 25, 50, -1], [2, 10, 25, 50, "All"]]

         /* initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
      "bDestroy": true
       }).fnDestroy();
       });
       */
   </script>
   
   <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">

   <script>



    $(document).ready(function() {     
     table = $('#example').DataTable( {
        
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                .appendTo( $(column.footer()).empty() )
                .on( 'change', function () {
                    var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                        );
                    
                    column
                    .search( val ? '^'+val+'$' : '', true, false )
                    .draw();
                } );
                
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }

        
    });
 });

    
</script>


</head>

<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          @include('admin.nav')
      </div>

      <!-- top navigation -->
      <div class="top_nav">
          <div class="nav_menu">           
              @include('admin.topnav')          
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
            PTO by Drift Team <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
</div>
</div>

    <!-- jQuery 
    <script src="{{ asset('js/jquery.min.js') }}"></script>
-->
<!-- Bootstrap -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('js/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('js/nprogress.js') }}"></script>
<!-- Chart.js -->
<script src="{{ asset('js/Chart.min.js') }}"></script>
<!-- gauge.js -->
<script src="{{ asset('js/gauge.min.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('js/bootstrap-progressbar.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('js/icheck.min.js') }}"></script>
<!-- Skycons -->
<script src="{{ asset('js/skycons.js') }}"></script>
<!-- Flot -->
<script src="{{ asset('js/jquery.flot.js') }}"></script>
<script src="{{ asset('js/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('js/jquery.flot.time.js') }}"></script>
<script src="{{ asset('js/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('js/jquery.flot.resize.js') }}"></script>
<!-- Flot plugins -->
<script src="{{ asset('js/jquery.flot.orderBars.js') }}"></script>
<script src="{{ asset('js/jquery.flot.spline.min.js') }}"></script>
<script src="{{ asset('js/curvedLines.js') }}"></script>
<!-- DateJS -->
<script src="{{ asset('js/date.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('js/jquery.vmap.js') }}"></script>
<script src="{{ asset('js/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('js/jquery.vmap.sampledata.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/daterangepicker.js') }}"></script>

<!-- Custom Theme Scripts -->
<script src="{{ asset('js/custom.min.js') }}"></script>

</body>
</html>
