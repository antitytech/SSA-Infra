<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>SSA INFRA - Admin Login</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Mannatthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{asset('panel')}}/assets/images/favicon.ico">
    <link href="{{asset('panel')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('panel')}}/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{asset('panel')}}/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
    alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body class="fixed-left">
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center mt-0 m-b-15">
                    <a class="logo logo-admin"><b><h2>Admin Login</h2></b></a>
                </h3>
                <div class="p-3">
                    <form action="/admin/authenticate" method="POST">
                        @if(session('error'))
                        <div class="alert alert-danger m-4 text-center ml-3">
                            {{ session('error')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @csrf
                        <div class="form-group row">
                            <div class="col-12"><input class="form-control" type="email" required="" name="email" placeholder="Email"></div>
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <div class="col-12"><input class="form-control" type="password" required="" name="password" placeholder="Password"></div>
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="form-group text-center row m-t-20">
                            <div class="col-12"><button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Login</button></div>
                        </div>

                        <div class="form-group m-t-10 mb-0 row">
                            <div class="col-sm-7 m-t-20"><a href="/admin/forget-password" class="text-muted"><i class="mdi mdi-lock"></i> <small>Forgot your password ?</small></a></div>
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
    <script>
        @if (Session::has('message'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
</body>

</html>
