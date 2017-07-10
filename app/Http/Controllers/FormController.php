<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\requestInfo;
use Illuminate\Support\MessageBag;
use DateTime;
use Session;
use DB;
class FormController extends Controller
{
  public function insert (request $request){

    $value = Session::get('session_id');
    $list = DB::table('users')
    ->where('email',$value)
    ->select('dayleft','id')
    ->get();
    $dayleft = $list['0']->dayleft;
    echo 'dayleft la '.$dayleft.'<br>';

    $time1 =strtotime($request->dayStarts); 
    $time2 =strtotime($request->dayEnds);
    $now = date('Y-m-d',time());
    $now = strtotime($now);
    $diff = (($time2-$time1)/ (60 * 60 * 24));
    if (($time2<$now)|($time1<$now)) {
      return redirect('newPTO')->with(['flash_message1'=>'Failed. Please check your dates!!']);
    }
    elseif (($diff>$dayleft)|($diff<0)) 
      return redirect('newPTO')->with(['flash_message1'=>'Failed. Please check your dates!!']);
    else {

     $dayleftnew = $dayleft - $diff;
     echo 'dayleft moi la '.$dayleftnew.'<br>';

     
     echo 'email la '.$value.'<br>' ;
     
     $a = $list['0']->id;
     echo $a;
     
     $data = new requestInfo;
     $data->id=$a;
     //$data->mgid="";
     $data->dateofrequest=date('Y-m-d',time());
     $data->datestart=$request->dayStarts;
     $data->dateend=$request->dayEnds;
     $data->reason=$request->reason;
     $data->approvalofmanager=0;
     $data->reasonforrejected="";
     $data->approvalofadmin=0;
     $data->status=0;
     $data->save();
     
     
     return redirect('newPTO')->with(['flash_message2'=>'Successed']);
   }
   
   
 }
 public function viewform (){
  //return view('user.myForm');
    return view('user.registerpto');
} 

}
