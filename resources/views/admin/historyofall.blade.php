@extends('admin.index')

@section('title')
@parent HistoryOfAll
@stop

@section('content')

<script LANGUAGE="JavaScript">
    function confirmAction() {
        return confirm("Are you sure deleting this PTO request?")
    }
</script>

<?php  
$list = DB::table('pto_request')
->join('users', 'pto_request.id', '=', 'users.id')
->join('team', 'team.teamid', '=', 'users.teamid')
->where('pto_request.approvalofadmin','!=',0)
->select('pto_request.rqid', 
 'users.email',
 'users.fullname',
 'users.dayleft',
 'team.teamname',
 'pto_request.dateofrequest',
 'pto_request.datestart',
 'pto_request.dateend',
 'pto_request.reason',
 'pto_request.reasonforrejected',
 'pto_request.approvalofadmin'
 ) 
->get();

        //echo '<pre>';
        //print_r($list);
        //echo '</pre>';
        //echo $dem = $list->count(); echo '</br>';

$list1 = DB::table('pto_request')
->join('managers', 'pto_request.mgid', '=', 'managers.mgid')
->join('team', 'team.teamid', '=', 'managers.teamid')
->where('pto_request.approvalofadmin','!=',0)
->select('pto_request.rqid', 
 'managers.email',
 'managers.fullname',
 'managers.dayleft',
 'team.teamname',
 'pto_request.dateofrequest',
 'pto_request.datestart',
 'pto_request.dateend',
 'pto_request.reason',
 'pto_request.reasonforrejected',
 'pto_request.approvalofadmin'
 ) 
->get();
        //echo '<pre>';
        //print_r($list1);
       // echo '</pre>';
        //echo $dem1 = $list1->count();

?> 
<h3 style="color: blue" align="center">PTO HISTORY OF ENGINEER</h3>
<table id="example" class="stripe responstable " width="100%" cellspacing="0" border-collapse: collapse ;>

    <thead>
        <tr align="center" style="">
            <th style="color: #fff">RqId</th>                                 
            <th style="color: #fff">Email</th>
            <th style="color: #fff">FullName</th>
            <th style="color: #fff">DayLeft</th>
            <th style="color: #fff">TeamName</th>

            <th style="color: #fff">DateofRequest</th>
            <th style="color: #fff">DateStart</th>
            <th style="color: #fff">DateEnd</th>
            <th style="color: #fff">Reason</th>
            <th style="color: #fff">Rejected</th>
            <th style="color: #fff">Admin</th> 
            <th style="color: #fff">Action</th>
                              
        </tr>
    </thead> 
    <tfoot class="aaa">
        <tr>
            <th style="color: #000">RqId</th>
            <th style="color: #000">Email</th>
            <th style="color: #000">FullName</th>
            <th style="color: #000">DayLeft</th>
            <th style="color: #000">TeamName</th>
            <th style="color: #000">DateofRequest</th>
            <th style="color: #000">DateStart</th>
            <th style="color: #000">DateEnd</th>

        </tr>
    </tfoot>                       
    <tbody>                      

      <?php foreach ($list as $tem) : ?>
        <tr>
          <?php foreach ($tem as $key => $value) : ?>
            <td><?php 
                if($value =='1' && $key=='approvalofadmin') $value='Accept';
                if($value =='2' && $key=='approvalofadmin') $value='Reject';
                echo $value; ?></td>
            <?php endforeach; ?>

            <td style="width: 150px">
            <div style="float: left;">
            <?php if($value == 'Accept'){ ?>
            <a href="editPtoOfAll/<?php echo $tem->rqid ; ?>" class ="btn btn-success" >Edit</a>
            </div>
            <div style="float: right;">
            <a href="deletePtoOfAll/<?php echo $tem->rqid ; ?>" class ="btn btn-danger" 
              onclick="return confirmAction()" >Delete</a>
            </div>
            </td>
            <?php }
            else { ?>
            <div style="float: left;">
            <a disabled="disabled" href="editPtoOfAll/<?php echo $tem->rqid ; ?>" class ="btn btn-success" >Edit</a>
            </div>
            <div style="float: right;">
            <a disabled="disabled" href="deletePtoOfAll/<?php echo $tem->rqid ; ?>" class ="btn btn-danger" 
              onclick="return confirmAction()" >Delete</a>
            </div>
            </td>
            <?php }?>                     
            
          </tr>
      <?php endforeach; ?>

      <?php foreach ($list1 as $tem) : ?>
        <tr>
          <?php foreach ($tem as $key => $value) : ?>
            <td><?php 
                if($value =='1' && $key=='approvalofadmin') $value='Accept';
                if($value =='2' && $key=='approvalofadmin') $value='Deny';
                echo $value; ?></td>
            <?php endforeach; ?>

            <td style="width: 150px">
            <div style="float: left;">
            <?php if($value == 'Accept'){ ?>
            <a href="editPtoOfAll/<?php echo $tem->rqid ; ?>" class ="btn btn-success" >Edit</a>
            </div>
            <div style="float: right;">
            <a href="deletePtoOfAll/<?php echo $tem->rqid ; ?>" class ="btn btn-danger"
              onclick="return confirmAction()" >Delete</a>
            </div>
            </td>
            <?php }
            else { ?>
            <div style="float: left;">
            <a disabled="disabled" href="editPtoOfAll/<?php echo $tem->rqid ; ?>" class ="btn btn-success" >Edit</a>
            </div>
            <div style="float: right;">
            <a disabled="disabled" href="deletePtoOfAll/<?php echo $tem->rqid ; ?>" class ="btn btn-danger" 
              onclick="return confirmAction()" >Delete</a>
            </div>
            </td>
            <?php }?> 
          </tr>
      <?php endforeach; ?>

  </tbody>  


</table>


@stop         




