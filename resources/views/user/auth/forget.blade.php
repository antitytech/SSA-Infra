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
                            <h2>Forget Password</h2>
                        </b></a>
                </h3>
                <div class="p-3">
                    <form class="form-horizontal" action="{{ route('forget-password') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-12"><input class="form-control" type="email" required=""
                                    name="email" placeholder="Email"></div>
                        </div>
                        <div class="form-group text-center row m-t-20">
                            <div class="col-12"><button
                                    class="btn btn-danger btn-block waves-effect waves-light" type="submit">Send
                                    Email</button></div>
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
        @if (Session::has('success'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.success("{{ session('success') }}");
        @endif
    </script>
        <script>
            @if (Session::has('error'))
                toastr.options =
                {
                "closeButton" : true,
                "progressBar" : true
                }
                toastr.error("{{ session('error') }}");
            @endif
        </script>
</body>

</html>
