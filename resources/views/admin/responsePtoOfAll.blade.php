@extends('admin.index')
    @section('title')
    @parent ResponsePTO
    @stop

        <!-- top tiles -->
        @section('content')
        <?php  
        $list = DB::table('pto_request')
        ->join('users', 'pto_request.id', '=', 'users.id')
        ->join('team', 'team.teamid', '=', 'users.teamid')
        ->where('pto_request.approvalofadmin','=',0)
        ->where('pto_request.approvalofmanager','=',1)
        ->select('pto_request.rqid',
         'users.email',
         'users.fullname',
         'team.teamname',
         'pto_request.dateofrequest',
         'pto_request.datestart',
         'pto_request.dateend',
         'pto_request.reason'
         
         ) 
        ->get();
        //  echo '<pre>';
        //  print_r($list);
        //  echo '</pre>';
        
        $dem = $list->count();

        $list1 = DB::table('pto_request')
        ->join('managers', 'pto_request.mgid', '=', 'managers.mgid')
        ->join('team', 'team.teamid', '=', 'managers.teamid')

        ->where('pto_request.approvalofadmin','=',0)
        ->where('pto_request.approvalofmanager','=',1)
        ->select('pto_request.rqid',
         'managers.email',
         'managers.fullname',
         'team.teamname',
         'pto_request.dateofrequest',
         'pto_request.datestart',
         'pto_request.dateend',
         'pto_request.reason'
         ) 
        ->get();
        //  echo '<pre>';
        //  print_r($list1);
        //  echo '</pre>';
         $dem1 = $list1->count();


        ?> 
        <table class="table table-hover table-bordered responstable">
          <h3 style="color: blue" align="center">PTO OF TEAM</h3>
          <thead>
            <tr align="center" style="background:pink">
              <th style="color: #fff">RqId</th>                                                             
              <th style="color: #fff">Email</th>
              <th style="color: #fff">FullName</th>

              <th style="color: #fff">TeamName</th>

              <th style="color: #fff">DateofRequest</th>
              <th style="color: #fff">DateStart</th>
              <th style="color: #fff">DateEnd</th>
              <th style="color: #fff">Reason</th>  

              <th style="color: #fff">Accept</th>
              <th style="color: #fff">Deny</th>                         
            </tr>
          </thead>
          @for($i=0;$i<$dem;$i++)
          <tbody>

            <tr class="odd gradeX" align="center">

              <td><?php print_r($list[$i]->rqid); ?></td>
              <td><?php print_r($list[$i]->email); ?></td>
              <td><?php print_r($list[$i]->fullname); ?></td>

              <td><?php print_r($list[$i]->teamname); ?></td>
              <td><?php print_r($list[$i]->dateofrequest); ?></td>
              <td><?php print_r($list[$i]->datestart); ?></td>
              <td><?php print_r($list[$i]->dateend); ?></td>
              <td><?php print_r($list[$i]->reason); ?></td> 

              <td><a href="acceptPtoOfAll/<?php echo $list[$i]->rqid ; ?>" class ="btn btn-success">Accept</a></td>            
              
      <!--<td><button type="Submit" class="btn btn-danger"> Deny </button></td>
        -->      
  <td><button type="Submit" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $list[$i]->rqid; ?> ">Deny</button>      
        
          <form action="denyPtoOfAll/<?php echo $list[$i]->rqid ; ?>" method ="get"> 
            <!-- Modal -->             
            <div id="<?php echo $list[$i]->rqid ; ?>" class="modal fade" role="dialog">  <div class="modal-dialog">
              <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" align="left">Form Rejected</h4>
                  </div>
                <div class="modal-body">

                <table class="table table-hover table-bordered" style="border-collapse:collapse;">
                  <td>Reason</td>
                  <td><textarea type="text" class="form-control" name="deny"></textarea></td>
                  </table>
                </div>
                <div class="modal-footer">
                <button type="Submit" class="btn btn-success">Submit</button>        
                </div>
                  </div>
              </div>
            </div>
          </form> 
     </td>   
           </tr>
         </tbody>

         @endfor
         @for($i=0;$i<$dem1;$i++)
         <tbody>

          <tr class="odd gradeX" align="center">
            <td><?php print_r($list1[$i]->rqid); ?></td>
            <td><?php print_r($list1[$i]->email); ?></td>
            <td><?php print_r($list1[$i]->fullname); ?></td>

            <td><?php print_r($list1[$i]->teamname); ?></td>
            <td><?php print_r($list1[$i]->dateofrequest); ?></td>
            <td><?php print_r($list1[$i]->datestart); ?></td>
            <td><?php print_r($list1[$i]->dateend); ?></td>
            <td><?php print_r($list1[$i]->reason); ?></td> 
            <td><a href="acceptPtoOfAll/<?php echo $list1[$i]->rqid ; ?>" class ="btn btn-success">Accept</a></td>

           <td><button type="Submit" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $list1[$i]->rqid ; ?>">Deny</button>      
        
          <form action="denyPtoOfAll/<?php echo $list1[$i]->rqid ; ?>" method ="get"> 
            <!-- Modal -->             
           <div id="<?php echo $list1[$i]->rqid ; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Modal Header</h4>
                  </div>
              <div class="modal-body">
                  <table class="table table-hover table-bordered" style="border-collapse:collapse;">
                  <td>Reason</td>
                  <td><textarea type="text" class="form-control" name="deny"></textarea></td>
                  </table>
              </div>
             <div class="modal-footer">
                <button type="Submit" class="btn btn-success">Submit</button>
                
              </div>
             </div>

          </div>

          </div>
          </form> 
     </td>    
           </tr>
         </tbody>
         @endfor
       </table>
     <!-- Phong ngua khi bi hu code :3-->
     <!-- <form action="denyPtoOfAll/<?php// echo $list1[$i]->rqid ; ?>" method = "get">
              <td>
               <textarea type="text" class="form-control" name="deny" ></textarea></td>               
               <td><button type="Submit" class="btn btn-danger"> Deny </button>
              </td>
            </form>
      -->
     <!-- /page content -->

     <!-- footer content -->
@endsection