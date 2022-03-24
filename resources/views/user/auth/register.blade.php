<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>SSA INFRA - User Register</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Mannatthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link rel="shortcut icon" href="{{ asset('images/ssa.png') }}">
    <link href="{{ asset('panel') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('panel') }}/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('panel') }}/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
    alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body class="fixed-left">
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center mt-0 m-b-15">
                    <a href="/" class="logo logo-admin"><b>
                            <h2>Register</h2>
                        </b></a>
                </h3>
                <div class="p-3">
                    <form action="/save" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-12"><input class="form-control" type="text" name="name"
                                    placeholder="Name">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-12"><input class="form-control" type="email" name="email"
                                    placeholder="Email">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-12"><input class="form-control" type="password" name="password"
                                    placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-12"><input class="form-control" name="password_confirmation"
                                    type="password" placeholder="Confirm Password">
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox"><input type="checkbox"
                                        class="custom-control-input" id="customCheck1" value="Readed" name="termsConditions"> <label
                                        class="custom-control-label font-weight-normal" for="customCheck1">I accept <a
                                            href="#" class="text-muted">Terms and Conditions</a></label>
                                            </div>
                                            @if ($errors->has('termsConditions'))
                                            <span class="text-danger">{{ $errors->first('termsConditions') }}</span>
                                        @endif
                            </div>
                        </div>
                        <div class="form-group text-center row m-t-20">
                            <div class="col-6" style="margin-left: auto; margin-right: auto;"><button
                                    class="btn btn-danger btn-block waves-effect waves-light"
                                    type="submit">Login</button></div>
                        </div>
                        <div class="form-group text-center row m-t-20">
                            <div class="col-6"><a href="{{ route('social.oauth', 'google') }}"><img
                                        src="{{ asset('images/Google__G__Logo.svg.png') }}" height="50px"
                                        alt="Google"></a></div>
                            <div class="col-6"><a href="{{ route('social.oauth', 'linkedin') }}"><img
                                        src="{{ asset('images/linkedin.png') }}" height="50px" alt="Linkedin"></a>
                            </div>
                        </div>
                        <div class="form-group m-t-10 mb-0 row">
                            <div class="col-12 m-t-20 text-center"><a href="/user/login" class="text-muted">Already
                                    have account?</a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('panel') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('panel') }}/assets/js/popper.min.js"></script>
    <script src="{{ asset('panel') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('panel') }}/assets/js/modernizr.min.js"></script>
    <script src="{{ asset('panel') }}/assets/js/detect.js"></script>
    <script src="{{ asset('panel') }}/assets/js/fastclick.js"></script>
    <script src="{{ asset('panel') }}/assets/js/jquery.slimscroll.js"></script>
    <script src="{{ asset('panel') }}/assets/js/jquery.blockUI.js"></script>
    <script src="{{ asset('panel') }}/assets/js/waves.js"></script>
    <script src="{{ asset('panel') }}/assets/js/jquery.nicescroll.js"></script>
    <script src="{{ asset('panel') }}/assets/js/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('panel') }}/assets/js/app.js"></script>

    <script>
        @if (Session::has('message'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.success("{{ session('message') }}");
        @endif
    </script>
</body>

</html>
