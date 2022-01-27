@extends('user.layout')
@section('title')
    Verify Email
@endsection
@section('extra-heads')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
    alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

@endsection
@section('content')
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center mt-0 m-b-15">
                    <a href="/" class="logo logo-admin"><b>
                            <h2>Verify Your Email</h2>
                        </b></a>
                </h3>
                <div class="p-3">
                    <form class="form-horizontal" action="https://mannatthemes.com/annex/vertical/index.html">
                        <div class="form-group row">
                            <div class="col-12"><input class="form-control" type="text" name="otp" required=""
                                    placeholder="Enter OTP"></div>
                        </div>
                        <div class="form-group text-center row m-t-20">
                            <div class="col-12"><button class="btn btn-danger btn-block waves-effect waves-light"
                                    type="submit">Verify Email</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
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
@endsection
