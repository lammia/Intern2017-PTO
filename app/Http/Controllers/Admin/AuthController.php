<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Illuminate\Support\MessageBag;
use Session;
use DB;
use DateTime;
class AuthController extends Controller
{
   /* public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    */

    public function getLogin()
    {
      return view('admin.login');
    }

    public function postLogin(Request $request)
    {
      // Validate the form data
      $rules = [
        'email' =>'required|email',
        'password' => 'required|min:8'
      ];
      $messages = [
        'email.required' => 'Email là trường bắt buộc',
        'email.email' => 'Email không đúng định dạng',
        'password.required' => 'Mật khẩu là trường bắt buộc',
        'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
      ];
      $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } 
        else{
      //echo $request->input('password');
      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

        Session::put('session_admin',Auth::guard('admin')->user()->fullname);

        return view('admin.index',['user'=>Auth::guard('admin')->user()]);
        // if successful, then redirect to their intended location
        //return redirect()->intended(route('admin.dashboard'));
      }

      // if unsuccessful, then redirect back to the login with the form data
      else   $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
                return redirect()->back()->withInput()->withErrors($errors);
      //redirect()->back()->withInput($request->only('email', 'remember'));
      
    }
}
    public function logout()
    {
        Auth::guard('admin')->logout();
        return view('admin.login');
    }

    public function acceptrequest($menu)
    {

      echo $menu;
      $list = DB::table('pto_request')->where('rqid',$menu)->get();
      echo '<pre>';
      print_r($list);
      echo '</pre>';

      /*-------------- Lam them ben thong bao cho Kenny-------------*/
     // View::("user.history")=>with('name',$menu);
      //Session::put('ss_acceptPTO',$menu);
      //Session::push('ss_acceptPTO.key', $menu);
      DB::table('pto_request')->where('rqid',$menu)->update(['status'=>1]);
     

      if ($list['0']->id == null ) {
         echo 'Day la cho xu ly managers'; echo '</br>';

         echo $list['0']->datestart; echo '</br>';
         echo $list['0']->dateend;   echo '</br>';

         echo $time1 =strtotime($list['0']->datestart);  echo '</br>';
         echo $time2 =strtotime($list['0']->dateend);    echo '</br>';
      
         echo $diff1 = (($time2-$time1)/ (60 * 60 * 24));

         $list1 = DB::table('managers')
         ->join('pto_request', 'pto_request.mgid', '=', 'managers.mgid')      
         ->where('pto_request.rqid',$menu)
         ->select('managers.dayleft')
         ->get();
         echo '<pre>';
         print_r($list1);
         echo '</pre>';

         echo $diff2 = $list1['0']->dayleft; echo '</br>';
         echo 'ngay update cua manager la ' .$ngayupdate = $diff2 - $diff1; echo '</br>';


         echo $mgid = $list['0']->mgid; echo '</br>';
         DB::table('pto_request')->where('rqid',$menu)->update(['approvalofadmin'=>1]);
         DB::table('managers')->where('mgid',$mgid)->update(['dayleft'=>$ngayupdate]);
      }
      else 
      {
         echo 'Day la cho xu ly users'; echo '</br>';

         echo $list['0']->datestart; echo '</br>';
         echo $list['0']->dateend;   echo '</br>';

         echo $time1 =strtotime($list['0']->datestart);  echo '</br>';
         echo $time2 =strtotime($list['0']->dateend);    echo '</br>';
      
         echo $diff1 = (($time2-$time1)/ (60 * 60 * 24));

         $list2 = DB::table('users')
         ->join('pto_request', 'pto_request.id', '=', 'users.id')      
         ->where('pto_request.rqid',$menu)
         ->select('users.dayleft')
         ->get();
         echo '<pre>';
         print_r($list2);
         echo '</pre>';

         echo $diff2 = $list2['0']->dayleft; echo '</br>';
         echo 'ngay update cua user la ' .$ngayupdate = $diff2 - $diff1;

         echo $id = $list['0']->id; echo '</br>';

         DB::table('pto_request')->where('rqid',$menu)->update(['approvalofadmin'=>1]);
         DB::table('users')->where('id',$id)->update(['dayleft'=>$ngayupdate]);
      }  
      
      return redirect()->back();

    }
  public function denyrequest(Request $request, $menu)
    {
      
      echo $menu;
      echo $deny = $request->deny;

     DB::table('pto_request')->where('rqid',$menu)->update(['status'=>2]);

      DB::table('pto_request')->where('rqid',$menu)->update([
        'approvalofadmin'=>2,
       'reasonforrejected'=>$deny
        ]);
      return redirect()->back();
      
    }

  public function editrequest(Request $request, $menu)
    {
      
      echo $menu;
      $list = DB::table('pto_request')->where('rqid',$menu)->get();
      echo '<pre>';
      print_r($list);
      echo '</pre>';

      if ($list['0']->id == null ) {
         echo 'Day la cho xu ly managers'; echo '</br>';

         echo $list['0']->datestart; echo '</br>';
         echo $list['0']->dateend;   echo '</br>';

         echo $time1 =strtotime($list['0']->datestart);  echo '</br>';
         echo $time2 =strtotime($list['0']->dateend);    echo '</br>';
      
         echo $diff1 = (($time2-$time1)/ (60 * 60 * 24));

         $list1 = DB::table('managers')
         ->join('pto_request', 'pto_request.mgid', '=', 'managers.mgid')      
         ->where('pto_request.rqid',$menu)
         ->select('managers.dayleft')
         ->get();
         echo '<pre>';
         print_r($list1);
         echo '</pre>';

         echo $diff2 = $list1['0']->dayleft; echo '</br>';
         echo 'ngay update dayleft cua manager la ' .$ngayupdate = $diff2 + $diff1; echo '</br>';


         echo $mgid = $list['0']->mgid; echo '</br>';
         DB::table('pto_request')->where('rqid',$menu)->update(['approvalofadmin'=>0]);
         DB::table('managers')->where('mgid',$mgid)->update(['dayleft'=>$ngayupdate]);
      }

      else 
      {
         echo 'Day la cho xu ly users'; echo '</br>';

         echo $list['0']->datestart; echo '</br>';
         echo $list['0']->dateend;   echo '</br>';

         echo $time1 =strtotime($list['0']->datestart);  echo '</br>';
         echo $time2 =strtotime($list['0']->dateend);    echo '</br>';
      
         echo $diff1 = (($time2-$time1)/ (60 * 60 * 24));

         $list2 = DB::table('users')
         ->join('pto_request', 'pto_request.id', '=', 'users.id')      
         ->where('pto_request.rqid',$menu)
         ->select('users.dayleft')
         ->get();
         echo '<pre>';
         print_r($list2);
         echo '</pre>';

         echo $diff2 = $list2['0']->dayleft; echo '</br>';
         echo 'ngay update dayleft cua user la ' .$ngayupdate = $diff2 + $diff1;

         echo $id = $list['0']->id; echo '</br>';

         DB::table('pto_request')->where('rqid',$menu)->update([
          'approvalofadmin'=>0,
          'approvalofmanager'=>0
          ]);
         DB::table('users')->where('id',$id)->update(['dayleft'=>$ngayupdate]);
      }  

      return redirect()->back();
    }

    public function deleterequest(Request $request, $menu)
    {
      echo $menu;
      DB::table('pto_request')->where('rqid', '=', $menu)->delete();
      return redirect()->back();
    }
}

