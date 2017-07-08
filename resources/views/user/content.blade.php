@extends('user.index')

@section('title')
@parent Welcome Engineer
@stop

@section('content')
<?php 
$id = Session::get('session_id');
$res = DB::select('select * from users where email = :email', ['email' => $id]);
$user = DB::table('users')->where('id', $res[0]->id)->pluck('teamid');
$team = DB::table('team')->where('teamid', $user[0])->pluck('teamname');
$now = date('Y-m-d',time());
$now = strtotime($now);
$date = DB::table('pto_request')->where('id', $res[0]->id)->pluck('rqid','datestart');
$start = null;

$cloneID=null;
foreach ($date as $dateset => $rqid) {
    if (($start === null) || ((strtotime($start)-$now) > (strtotime($dateset)-$now))
        &&(strtotime($start)>=$now)) {
        $start = $dateset;
    $cloneID = $rqid;
}
}
?>

<div class="col-md-6 col-sm-6 col-xs-12" style="height: 80%;">
 
    <div class="panel panel-primary" style="height: 30%s;background-image: url(images/bg1.jpg);">
        <div class="panel-heading">
         <h3 class="panel-title">About yourself</h3>
     </div>
     <div class="panel-body" style="padding-left: 10px;height: auto;color: #333;">
        <h1 style="font-weight:bold;">{{$res[0]->fullname}}</h1>
        

        <div class="row ">
            <div style=" width: 200px; float: left;font-size: 20px;padding-left: 10px;">
                Your remaining PTO:
            </div>
            <div style="width: 30px;float: left;height: 30px;margin-right: 7 px; padding-right: 3px;">
             <center><p style="font-size: 20px; font-weight: bold;

                border-bottom: 1px dashed #046ca3;
                box-shadow: inset 0 -1px 0 0 #046ca3, inset 0 1px 0 0 #046ca3, 0 1px 0 0 #046ca3, 0 -1px 0 0 #046ca3;
                margin-bottom: 1px;

                background-color:dashed #046ca3 ">{{$res[0]->dayleft}}</p></center>
            </div>
            <div style=" width: 100px;float: left;font-size: 20px;">days.</div>
        </div>

        <h2>Current team: {{$team[0]}}</h2>
        <h2>Your email: {{$res[0]->email}}</h2>
        
    </div>
</div>


<div class="panel panel-primary" style="height: auto;margin-top: 20px;
background-image: url(images/bg2.jpeg);">

<div class="panel-heading">
    <h3 class="panel-title">Panel title</h3>
</div>

<div class="panel-body" style="height: 70%;">
    <h1 id="h1">UPCOMMING PTO</h1>
    <div class="row">
        <?php
        if ($cloneID==null) echo "nothing";
        else{
         $rq = DB::select('select * from pto_request where rqid ='.$cloneID);  
         switch ($rq[0]->approvalofmanager) {
            case '0':
            ?><span class="label label-default" style="float:left;font-size: 22px;background-color: #FFD700;">Manager</span>
            <?php 
            break;
            case '1':
            ?><span class="label label-default" style="float:left;font-size: 22px;background-color: blue;">Manager</span>
            <?php 
            break;
            case '2':
            ?><span class="label label-default" style="float:left;font-size: 22px;background-color: red;">Manager</span>
            <?php 
            break;
            default:
            # code...
            break;
        };

        switch ($rq[0]->approvalofadmin) {
            case '0':
            ?><span class="label label-default" style="float:right;font-size: 22px;background-color: #FFD700;">Admin</span>
            <?php 
            break;
            case '1':
            ?><span class="label label-default" style="float:right;font-size: 22px;background-color: blue;">Admin</span>
            <?php 
            break;
            case '2':
            ?><span class="label label-default" style="float:right;font-size: 22px;background-color: red;">Admin</span>
            <?php 
            break;
            default:
            # code...
            break;
        };

        ?>
    </div>
    <div style="color: #42393B;
    font-family: 'PT Serif';
    font-size: 40px;
    line-height: 40px;
    margin: 0px;
    padding: 0px;
    max-width: 500px;
    text-align: center;
    ;">
    <center>From: {{$rq[0]->datestart}}</center>
    <center>To: {{$rq[0]->dateend}}</center>
</div>
<?php }?>

</div>

</div>

</div>
</div>
@stop