<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
use Validator;
//use Auth;
use Session;
use Illuminate\Support\MessageBag;



class MyController extends Controller
{
    //
    public function getForm(){
    	return view('login');
    }
    public function postForm(Request $request){    	
    	$rules = [
      'email' =>'required|email',
      'password' => 'required|min:8'
      ];
      $messages = [
      'email.required' => 'Email is a required field.',
      'email.email' => 'Email is invalid',
      'password.required' => 'Password is a required field.',
      'password.min' => 'Password consists 8 characters at least.',
      ];
      $validator = Validator::make($request->all(), $rules, $messages);
      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    } 
    else {
        $email = $request->input('email');
        $password = $request->input('password');

          /*  $user = User::find(1);
            Auth::login($user);
        */
            /*----------------------Cu-----------------------------
            if( Auth::attempt(['email' => $email, 'password' =>$password])) {
               Session::put('session_user',Auth::user()->fullname);
               Session::put('session_dleft',Auth::user()->dayleft);
               Session::put('session_id',Auth::user()->email);

               

               return view('user.index',['user'=>Auth::user()]);
            } else {
                $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
            ------------------------Cu------------------------------*/
            if( Auth::attempt(['email' => $email, 'password' =>$password])) {
             Session::put('session_user',Auth::user()->fullname);
             Session::put('session_id',Auth::user()->email);

             
             return view('user.content');

             //  return view('user.index',['user'=>Auth::user()]);
               //return view('user.index');
         } else if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
             
           Session::put('session_admin',Auth::guard('admin')->user()->fullname);
           return view('admin.index',['user'=>Auth::guard('admin')->user()]);
                // if successful, then redirect to their intended location
                //return redirect()->intended(route('admin.dashboard'));
       }
       else if (Auth::guard('manager')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        
           Session::put('session_manager',Auth::guard('manager')->user()->fullname);
           Session::put('session_teamid',Auth::guard('manager')->user()->teamid);
           Session::put('session_emailmanager',Auth::guard('manager')->user()->email);

                // return view('manager.index',['user'=>Auth::guard('manager')->user()])
           return view('manager.content');
       }
       else{
        $errors = new MessageBag(['errorlogin' => 'Email or Password that you have entered is incorect.']);
        return redirect()->back()->withInput()->withErrors($errors);
    }
}   
}
public function logout(){
    Auth::logout();
       // Session::flush();
    return view('login');
}

}
