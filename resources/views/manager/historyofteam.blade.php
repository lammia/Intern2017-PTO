@extends('manager.index')
@section('title')
@parent HistoryofTeam
@stop
<!-- top tiles -->
@section('date')
<link href="{{ asset('css/table.css') }}" rel="stylesheet">
@stop
@section('content')
<?php  

$value1 = Session::get('session_teamid');
          	//echo $value1;
$list = DB::table('pto_request')
->join('users', 'pto_request.id', '=', 'users.id')
->join('team', 'team.teamid', '=', 'users.teamid')
->where('team.teamid','=',$value1)
->where('pto_request.approvalofmanager','!=',0)
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
  <h3 style="color: blue" align="center">HISTORY PTO OF TEAM</h3>
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
          @elseif($testadmin==2) Admin Rejected
          @else Manager accept
          @endif
        @elseif($testmanager==2) Manager Rejected
        @else Waiting
        @endif
      </td>
      <td><a style="color: blue" href="">Detail</a></td>                          
    </tr>
  </tbody>

  @endfor
</table>

@stop