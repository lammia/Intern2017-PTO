<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\requestInfo;
use Illuminate\Support\MessageBag;
use DateTime;
use Session;

class EditRequestController extends Controller
{
    public function update(request $request, $menu){

      $list=DB::table('pto_request')->where('rqid', $menu)->select('mgid')->get();
      $mgid = $list['0']->mgid;
      $list2=DB::table('managers')->where('mgid', $mgid)->select('dayleft')->get();
      $value= $list2['0']->dayleft;

    	$time1=strtotime($request->ds);
    	$time2=strtotime($request->de);
    	$now = date('Y-m-d',time());
   		$now = strtotime($now);
   		$diff = (($time2-$time1)/ (60 * 60 * 24));

   		if($time1<$now | $time2 < $now){
   			 return redirect('historymanager')->with(['flash_message1'=>'Failed. Please check your dates!!']);
		  }

		  else if ($diff > $value | $diff<0){
            return redirect('historymanager')->with(['flash_message1'=>'Failed. Please check your dates!!!']);
  		}

  		else{
    	DB::table('pto_request')->where('rqid',$menu)->update(['datestart'=>$request->ds, 'dateend'=>$request->de, 'reason'=>$request->rs]);
    	return redirect('historymanager');
    	}
    }

    public function delete($menu){
      DB::table('pto_request')->where('rqid',$menu)->delete();
      return redirect('historymanager');
      }

}