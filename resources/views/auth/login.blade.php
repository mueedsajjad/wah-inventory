<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SGA - WAH Industries Ltd.</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('public/plugins/icheck-bootstrap/icheck-bootstrap.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.css')}}">
    <link rel="stylesheet" href="{{asset('public/dist/css/style.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700')}}" rel="stylesheet">
</head>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="dashboard.html" class="navbar-brand">
            <!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                  style="opacity: .8">-->
            <span class="brand-text font-weight-normal text-white"><img class=" pr-3" src="{{asset('public/img/logo.png')}}" alt="logo"> SGA - WAH Industries</span>
        </a>
        <!--    <a href="index2.html"><b>SGA</b> - WAH Industries Ltd.</a>-->
    </div>

    @if(!empty($errors->first()))
        <div class="alert alert-danger" style="text-align:center">
            <span>{{$errors->first()}}</span>
        </div>
    @endif

    <!-- /.login-logo -->
    <div class="card my-login-bg">
        <div class="card-body  login-card-body">
            <h5 class="login-box-msg my-3">Sign in to start your session</h5>

            <form action="{{route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append bg-light">
                        <div class="input-group-text">
                            <span class="fas fa-envelope text-dark"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append bg-light">
                        <div class="input-group-text">
                            <span class="fas fa-lock text-dark"></span>
                        </div>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-8">
                        <div class="icheck-danger">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">

                        <button type="submit"  class="btn btn-danger btn-block">Sign In</button>
{{--                        <a href="{{url('store/dashboard')}}"  class="btn btn-danger btn-block">Sign In</a>--}}
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="my-3">
                <a href="forgot-password.html" class="text-white">I forgot my password</a>
            </p>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/dist/js/adminlte.min.js')}}"></script>

</body>
</html>

