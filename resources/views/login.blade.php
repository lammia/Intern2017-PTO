<!--login page ****Kenny-->
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <title>Login pages</title>
    <meta charset="utf-8">
    <link href="css/login.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--webfonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

    <!-----start-main---->
    <div class="login-form">
        <div class="head">

            <img src="images/enclave_logo.png" alt=""/>            

        </div>
        @yield('NoiDung')
        <form action="{{route('postForm')}}" method="post">
            @if($errors->has('errorlogin'))
            <div class="alert alert-danger">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             {{$errors->first('errorlogin')}}
         </div>
         @endif
         <li>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input placeholder="Email" type="text" name="email" required="" value="{{old('email')}}" class="text"><a href="#" class=" icon user"></a>            
        </li>
        @if($errors->has('email'))
        <p style="color:red">{{$errors->first('email')}}</p>
        @endif
        <li>
            <input placeholder="Password" type="password" name="password" required=""><a href="#" class=" icon lock"></a>            
        </li>
        @if($errors->has('password'))
        <p style="color:red">{{$errors->first('password')}}</p>
        @endif
        <div class="p-container">
            <!-- <label class="checkbox"><input type="checkbox" name="checkbox" checked><i></i>Remember Me</label> -->
            <input type="checkbox" name="checkbox" checked class="checkbox"><i></i>Remember Me
            <a href="#" style="padding-left: 20%;"> Forgot password</a>
            <input type="submit" value="SIGN IN" >
            {!! csrf_field() !!}
            <div class="clear"> </div>
        </div>
    </form>
</div>
<!--//End-login-form-->
<!-----start-copyright---->
<div class="copy-right" style="text-align: center;>
    <p">-- Drifting Team --</p>
    <p>Dean - Hanley - Lauren - Kenny - Top - Hardy</p>
</div>
<!-----//end-copyright---->

</body>
</html>