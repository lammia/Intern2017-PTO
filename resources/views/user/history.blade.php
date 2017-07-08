@extends('user.index')

@section('title')
@parent History
@stop

@section('date')
<link href="{{ asset('css/table.css') }}" rel="stylesheet">
@stop

@section('content')

<?php  
/*------------------------Lam them cho Kenny-----------------------*/
$value1 = Session::get('session_id');
//echo $value1;

$tam = DB::table('users')
->where('email',$value1)
->select('id')
->get();
DB::table('pto_request')->where('id',$tam['0']->id)->update(['status'=>-1]);


$list = DB::table('pto_request')
->join('users', 'pto_request.id', '=', 'users.id')
->join('team', 'team.teamid', '=', 'users.teamid')
->where('users.email','=',$value1)
->select('pto_request.rqid', 
 'users.email',
 'users.fullname',
 'users.dayleft',
 'team.teamname',
 'pto_request.dateofrequest',
 'pto_request.datestart',
 'pto_request.dateend',
 'pto_request.reason',
 'pto_request.approvalofmanager',
 'pto_request.reasonforrejected',
 'pto_request.approvalofadmin'
 ) 
->get();
$dem = $list->count();    
?>
<table class="table table-hover table-bordered responstable" style="border-collapse:collapse; border:#ff00ff solid 2px;">
  <h3 style="color: blue" align="center"> PTO HISTORY</h3>
  <thead>
    <tr align="center">
      <th style="color: #fff; text-align: center">RqId</th> 
      <th style="color: #fff; text-align: center">Email</th>
      <th style="color: #fff; text-align: center">FullName</th>
      <th style="color: #fff; text-align: center">DateStart</th>
      <th style="color: #fff; text-align: center">DateEnd</th>
      <th style="color: #fff; text-align: center">Reason</th>
      <th style="color: #fff; text-align: center">Status</th>
      <th style="color: #fff; text-align: center">Detail</th>
      <th style="color: #fff; text-align: center">Action</th>                                
    </tr>
  </thead>
  @for($i=0;$i<$dem;$i++)
  <tbody>
    <tr class="odd gradeX" align="center">
      <td><?php print_r($list[$i]->rqid); ?></td>
      <td><?php print_r($list[$i]->email); ?></td>
      <td><?php print_r($list[$i]->fullname); ?></td>
      <td><?php print_r($list[$i]->datestart); ?></td>
      <td><?php print_r($list[$i]->dateend); ?></td>
      <td><?php print_r($list[$i]->reason); ?></td>
      <td>
        <?php $testmanager = $list[$i]->approvalofmanager;?>
        @if($testmanager==1)
          <?php $testadmin = $list[$i]->approvalofadmin;?>
          @if($testadmin==1) Admin accept
          @elseif($testadmin==2) Admin rejected
          @else Manager accept
          @endif
        @elseif($testmanager==2) Manager rejected
        @else Waiting
        @endif
      </td>
      <td><a style="color: blue" href="">Detail</a></td>
     
      @if($list[$i]->approvalofmanager==0)

      <td style="width: 150px">
      <div style="float: left;">
          <button type="Submit" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $list[$i]->rqid; ?>">Edit</button>
        </div>
        <div style="float: right;">
          <form action="/DeleteRequestUser/<?php echo $list[$i]->rqid ?>" method ="post">
           <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
           <button type="Submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete
           </button>
         </form>
       </div>

       <form action="/editrequest/<?php echo $list[$i]->rqid; ?>" method ="post"> 
        <input type="hidden" name="_token"  value="{!!csrf_token()!!}">
        <!-- Modal -->


        <div id="<?php echo $list[$i]->rqid; ?>" class="modal fade" role="dialog">

          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div style="background:#CCCCCC " class="modal-header">

                <h4 style="text-align: center; padding-top: 15px;" class="modal-title">EDIT PTO REQUEST</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div style="padding-left: 50px;" class="modal-body">


                <div class="form-group row">
                  <label for="example-text-input" class="col-2 col-form-label">Request ID</label>
                  <div class="col-10">
                    <input class="form-control" type="text" id="example-text-input" disabled="disabled" name="rq" value="<?php echo $list[$i]->rqid ;?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="example-text-input" class="col-2 col-form-label">Day left</label>
                  <div class="col-10">
                    <input class="form-control" type="text" id="example-text-input" disabled="disabled" name="rq" value="<?php echo $list[$i]->dayleft ; ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="example-date-input" class="col-2 col-form-label">Start Date</label>
                  <div class="col-10">
                    <input class="form-control" type="date" id="example-date-input"  name="ds" class="form-control" value="<?php echo $list[$i]->datestart ; ?>" title="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="example-date-input" class="col-2 col-form-label">End Date</label>
                  <div class="col-10">
                    <input class="form-control" type="date" id="example-date-input"  name="de" class="form-control" value="<?php echo $list[$i]->dateend ; ?>" title="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="example-text-input" class="col-2 col-form-label">Reason</label>
                  <div class="col-10">
                    <input class="form-control" type="textarea" id="example-text-input"  name="rs" value="<?php echo $list[$i]->reason ; ?>">
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="Submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

      </form>
    </td>

    @else <td><button type="Submit" disabled="disabled" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $list[$i]->rqid ; ?>">Edit</button>
    <button type="Submit" disabled="disabled" class="btn btn-danger">Delete</button></td>

    @endif


  </tr>

</tbody>
@endfor
</table>
<div class="row">

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


@stop