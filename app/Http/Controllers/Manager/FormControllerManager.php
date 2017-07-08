<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\MessageBag;
use DateTime;
use Session;
use DB;
use App\requestInfo;

class FormControllerManager extends Controller
{
   
	public function insert (request $request){

    $value = Session::get('session_emailmanager');
                          

    $list = DB::table('managers')
    ->where('email','=',$value)
    ->select('mgid','dayleft') 
    ->get();

    $dayleft = $list['0']->dayleft;
    echo 'dayleft la '.$dayleft.'<br>';


    $time1 =strtotime($request->dayStarts); 
    $time2 =strtotime($request->dayEnds);
    $now = date('Y-m-d',time());
    $now = strtotime($now);
$diff = (($time2-$time1)/ (60 * 60 * 24));
	if (($time2<$now)|($time1<$now)) {
		return redirect('newPTOManager')->with(['flash_message11'=>'Failed. Please check your dates!!']);
	}
    elseif (($diff>$dayleft)|($diff<0)) 
            return redirect('newPTOManager')->with(['flash_message11'=>'Failed. Please check your dates!!']);
  else {

     $dayleftnew = $dayleft - $diff;
     echo 'dayleft moi la '.$dayleftnew.'<br>';
  	 
      echo 'email la '.$value.'<br>' ;    
      $a = $list['0']->mgid;
      echo $a;
      
     $data = new requestInfo;
    // $data->id=$a;
     $data->mgid=$a;
     $data->dateofrequest=date('Y-m-d',time());
     $data->datestart=$request->dayStarts;
     $data->dateend=$request->dayEnds;
     $data->reason=$request->reason;
     $data->approvalofmanager=1;
     $data->reasonforrejected="";
     $data->approvalofadmin=0;
     $data->status=0;
     $data->save();
      
  	return redirect('newPTOManager')->with(['flash_message22'=>'Successed']);
  }
}

    public function viewform (){
    	return view('manager.myForm');
	}
} 
