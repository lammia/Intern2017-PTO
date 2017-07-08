<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\requestInfo;
use Illuminate\Support\MessageBag;
use DateTime;
use Session;

class EditRequestController extends Controller
{
  public function update(request $request, $menu){

    $list=DB::table('pto_request')->where('rqid', $menu)->select('id')->get();
    $id = $list['0']->id;
    $list2=DB::table('users')->where('id', $id)->select('dayleft')->get();
    $value= $list2['0']->dayleft;

    $time1=strtotime($request->ds);
    $time2=strtotime($request->de);
    $now = date('Y-m-d',time());
    $now = strtotime($now);
    $diff = (($time2-$time1)/ (60 * 60 * 24));

    if($time1<$now | $time2 < $now){
      return redirect('historyuser')->with(['flash_message1'=>'Failed. Please check your dates!!']);
    }

    else if ($diff > $value | $diff<0){
      return redirect('historyuser')->with(['flash_message1'=>'Failed. Please check your dates!!!']);
    }

    else{
     DB::table('pto_request')->where('rqid',$menu)->update(['datestart'=>$request->ds, 'dateend'=>$request->de, 'reason'=>$request->rs]);
     return redirect('historyuser')->with(['flash_message2'=>'Success.']);
   }
 }
 public function delete($menu){
  DB::table('pto_request')->where('rqid',$menu)->delete();
  return redirect('historyuser');
}
}
