@section('date')	


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

@stop


@section('content2')
<!-- top tiles -->

<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>Maternity Leave</h3>
		</div>

	</div>            
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Form Design</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>                     
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br/>

					<div class="control-label col-md-3 col-sm-3 col-xs-12">
					</div>  
					<div class="control-label col-md-3 col-sm-3 col-xs-12">
						
						@if (Session::has('flash_message1'))

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

				<form action="{!!route('abc')!!}" method="POST" name="formRequest" data-parsley-validate class="form-horizontal form-label-left">
					<input type="hidden" name="_token"  value="{!!csrf_token()!!}">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Your Name :
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" required="required" class="form-control"
							id="formGroupExampleInput" value=<?php 
							$value1 = Session::get('session_user');
							echo $value1;
							?> readonly="true" name="nameEngineer">
						</div>
					</div>
					<div class="form-group">
						
						<legend><span class="label label-info col-md-2">Your PTO info :</span></legend>
						
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">The day starts :</label>
						
						<div class="col-md-6 col-sm-6 col-xs-12">
							
							<input type="text" name="dayStarts" id="datepicker" class="form-control" value="" title="">
						</div>

					</div>

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12"> :</label>
						
						<div class="col-md-6 col-sm-6 col-xs-12">
							
							<input type="radio" name="sinh" value="toisinh">Toi sinh<br>
  							<input type="radio" name="sinh" value="vosinh">Vo sinh<br>

						</div>

					</div>


					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							<button type="submit" class="btn btn-success">Submit</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

@show

