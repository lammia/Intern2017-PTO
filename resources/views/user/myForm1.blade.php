
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Drift Team </title>
	<link href="{{ asset('bootstraps/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('bootstraps/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('bootstraps/nprogress.css') }}" rel="stylesheet">
	<link href="{{ asset('bootstraps/green.css') }}" rel="stylesheet">  
	<link href="{{ asset('bootstraps/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
	<link href="{{ asset('bootstraps/jqvmap.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('bootstraps/daterangepicker.css') }}" rel="stylesheet">
	<link href="{{ asset('bootstraps/custom.min.css') }}" rel="stylesheet">

	
	<script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
	<script src="{{ asset('js/dateselector.min.js') }}"></script>
 
	<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('css/datepicker.css') }}"></script>
	
	<script>
		$(function () 
		{  
			$('#datepicker').datepicker({ format: "yyyy-mm-dd" }).on('changeDate', function (ev) {    $(this).datepicker('hide');  });
			$('#datepicker1').datepicker({ format: "yyyy-mm-dd" }).on('changeDate', function (ev) {    $(this).datepicker('hide');  });
		}
			);		
	</script>
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				@include('user.nav');
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">           
					@include('user.topnav');           
				</div>
			</div>
			<!-- /top navigation -->

			<!-- page content -->
			<div class="right_col" role="main">
				<!-- top tiles -->
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-7">@if (Session::has('flash_message1'))

						<div class="alert alert-danger" role="alert">
							{!! Session::get('flash_message1') !!}
						</div>
						@endif
						@if (Session::has('flash_message2'))
						<div class="alert alert-success" role="alert">
							{!! Session::get('flash_message2') !!}
						</div>
						@endif	
					</div>
				</div>
				<div class="container-fluid">


						 
					<form action="{!!route('abc')!!}" method="POST" name="formRequest">
						<input type="hidden" name="_token" 	value="{!!csrf_token()!!}">
						<fieldset class="form-group">
						<div class="col-sm-1" ></div>
						<span class="col-md-4" style= >Your name</span>
					        <div class="col-md-2">
								<input type="text" class="form-control" id="formGroupExampleInput" value=<?php 
                            $value = Session::get('session_user');
                            echo $value;


                            ?> readonly="true" name="nameEngineer"></div>

							</fieldset>

							<fieldset class="form-group">
								<legend>
									<div class="col-sm-1" ></div>
									<span class="label label-info col-md-2">Your PTO info:</span></legend>

									<div class="row">
										<div class="col-sm-1" ></div>
										<div class="col-md-4">
											Your PTO remaining is
										</div>
										<div class="col-md-3">
											<input  name="remaining" id="inputDay-Offer" class="form-control" readonly="true" title="" value=<?php 
                            $value = Session::get('session_dleft');
                            echo $value;
                            ?> >
										</div>
										<div class="col-md-1">
											days.
										</div>
									</div>
								<!-- <div class="row">
									<div class="col-md-6">
										The days you want to leave a absence:
									</div>
									<div class="col-md-3">
										<input type="number" name="howlong" id="inputHowlong" class="form-control" value="" min="1" max="15" step="1" required="required" title="">
									</div>

									<div class="col-md-1">
										days.
									</div>
								</div>
							-->
							<div class="row">
								<div class="col-sm-1" ></div>
								<div class="col-md-4">
									The day starts:
								</div>
								<div class="col-md-3">
									<input type="text" name="dayStarts" id="datepicker" class="form-control" value="" title="">

								</div>
							</div>

							<div class="row">
								<div class="col-sm-1" ></div>
								<div class="col-md-4">
									The day ends:
								</div>
								<div class="col-md-3">
									<input type="text" name="dayEnds" id="datepicker1" class="form-control" value="" title="">

								</div>
							</div>


						</div>						
					</fieldset>
					<fieldset >

						<legend>
									<div class="col-sm-1"></div>
									<span class="label label-info col-md-2">Reason:</span></legend>
						<div class="col-md-1"></div>
						<div class="col-md-7">
							<textarea name="reason" id="input" class="form-control" rows="3"></textarea>
						</div>
						<div class="col-md-1">
							<small>* This can be skipped</small>
						</div>
					</fieldset> 
					<br>
					<div class="col-md-4"></div>

					<button type="submit" class="btn btn-primary">Submit</button>
				
				</form>

			</div>
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

<!-- jQuery 
<script src="{{ asset('js/jquery.min.js') }}"></script>-->


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
<!-- Flot plugins 
<script src="{{ asset('js/jquery.flot.orderBars.js') }}"></script>
<script src="{{ asset('js/jquery.flot.spline.min.js') }}"></script>
<script src="{{ asset('js/curvedLines.js') }}"></script>
-->
<!-- DateJS -->
<script src="{{ asset('js/date.js') }}"></script>
<!-- JQVMap 
<script src="{{ asset('js/jquery.vmap.js') }}"></script>
<script src="{{ asset('js/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('js/jquery.vmap.sampledata.js') }}"></script>
-->
<!-- bootstrap-daterangepicker 
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/daterangepicker.js') }}"></script>
-->
<!-- Custom Theme Scripts -->
<script src="{{ asset('js/custom.min.js') }}"></script>

</body>
</html>
