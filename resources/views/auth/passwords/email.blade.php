<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reset Password | Courier Portal</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('plugins/iCheck/square/blue.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('bower_components/icon/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('bower_components/icon/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('bower_components/icon/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ URL::asset('bower_components/icon/site.webmanifest') }}">
  <link rel="mask-icon" href="{{ URL::asset('bower_components/icon/safari-pinned-tab.svg') }}" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('login') }}"><img src="{{ URL::asset('public/images/logo/logo.png') }}" width="200px" height="auto"></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Reset Password</p>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('password.email') }}" method="POST">
       {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email"  name="email" value="{{ old('email') }}" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
         @if ($errors->has('email'))
            <span style="color: #c70000;" class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      
      <div class="row">
        <div class="col-xs-4 form-group">
          <button type="submit" class="btn btn-primary  btn-flat">Send Password Reset Link</button>
        </div>
      </div>
    </form>
    <!-- /.social-auth-links -->
    <a href="{{ route('login') }}">
        Login
    </a>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</body>
</html>
