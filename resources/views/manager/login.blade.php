<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Latest compiled and minified CSS & JS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="css/login.css" rel="stylesheet"/>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
    <meta charset="UTF-8">
    <link href="css/login.css" rel="stylesheet"/>    
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
@yield('NoiDung')
<form action="{{route('postForm2')}}" method="post">
        <h1>Login</h1>
        @if($errors->has('errorlogin'))
            <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  {{$errors->first('errorlogin')}}
             </div>
        @endif
        <input placeholder="Email" type="text" name="email" required="" value="{{old('email')}}">
        @if($errors->has('email'))
                            <p style="color:red">{{$errors->first('email')}}</p>
                        @endif
        <input placeholder="Password" type="password" name="password" required="">
        @if($errors->has('password'))
                            <p style="color:red">{{$errors->first('password')}}</p>
                        @endif
        <!-required buộc người dùng nhập dữ liệu mới submit được-!>
        
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
</form>


</body>
</html>