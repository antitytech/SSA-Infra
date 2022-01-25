<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>SSA INFRA - User Forget Password</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Mannatthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{asset('panel')}}/assets/images/favicon.ico">
    <link href="{{asset('panel')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('panel')}}/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{asset('panel')}}/assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body class="fixed-left">
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center mt-0 m-b-15">
                    <a href="/" class="logo logo-admin"><img src="{{asset('panel')}}/assets/images/logo.png" height="24" alt="logo"></a>
                </h3>
                <div class="p-3">
                    <form class="form-horizontal" action="{{ route('updatepassword') }}" method="POST">
                        @csrf
                        <input type="hidden" name="password_token" value="{{$token}}" />
                        <div class="form-group row">
                            <div class="col-12"><input class="form-control" type="email" value="{{ $email }}" name="email" placeholder="Email"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12"><input class="form-control" type="password" name="password"  placeholder="New Password"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12"><input class="form-control" type="password" name="c_password" placeholder="Confirm Password"></div>
                        </div>
                        <div class="form-group text-center row m-t-20">
                            <div class="col-12"><button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Send Email</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('panel')}}/assets/js/jquery.min.js"></script>
    <script src="{{asset('panel')}}/assets/js/popper.min.js"></script>
    <script src="{{asset('panel')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{asset('panel')}}/assets/js/modernizr.min.js"></script>
    <script src="{{asset('panel')}}/assets/js/detect.js"></script>
    <script src="{{asset('panel')}}/assets/js/fastclick.js"></script>
    <script src="{{asset('panel')}}/assets/js/jquery.slimscroll.js"></script>
    <script src="{{asset('panel')}}/assets/js/jquery.blockUI.js"></script>
    <script src="{{asset('panel')}}/assets/js/waves.js"></script>
    <script src="{{asset('panel')}}/assets/js/jquery.nicescroll.js"></script>
    <script src="{{asset('panel')}}/assets/js/jquery.scrollTo.min.js"></script>
    <script src="{{asset('panel')}}/assets/js/app.js"></script>
</body>

</html>
