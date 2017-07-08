<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Illuminate\Support\MessageBag;
use Session;
use DB;
class ManagerController extends Controller
{
     public function getLogin()
    {
      return view('manager.login');
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
      // Attempt to log the user in
      if (Auth::guard('manager')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
      	
        Session::put('session_manager',Auth::guard('manager')->user()->fullname);
        Session::put('session_teamid',Auth::guard('manager')->user()->teamid);


        return view('manager.index',['user'=>Auth::guard('manager')->user()]);
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
        Auth::guard('manager')->logout();
        return view('manager.login');
    }

  public function acceptrequest($menu)
    {

       echo $menu;
     DB::table('pto_request')->where('rqid',$menu)->update(['approvalofmanager'=>1]);
       return redirect()->back();

    }
  public function denyrequest($menu)
    {
        echo $menu;
      DB::table('pto_request')->where('rqid',$menu)->update(['approvalofmanager'=>2]);
       return redirect()->back();
    }
}
