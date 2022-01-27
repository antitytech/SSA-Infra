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
                            <h2>Change Your Password</h2>
                        </b></a>
                </h3>

                <div class="p-3">
                    <form class="form-horizontal" action="{{ route('changePassword') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <div class="col-12"><input class="form-control" name="password" type="text" name="otp"
                                    required="" placeholder="Enter Old Password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="col-12"><input class="form-control" name="new_password" type="text" name="otp"
                                required="" placeholder="Enter New Password">
                            @if ($errors->has('new_password'))
                                <span class="text-danger">{{ $errors->first('new_password') }}</span>
                            @endif
                        </div>
                        </div>
                        <div class="form-group text-center row m-t-20">
                            <div class="col-12"><button class="btn btn-danger btn-block waves-effect waves-light"
                                    type="submit">Update</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
    <script>
        @if (Session::has('message'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.error("{{ session('message') }}");
        @endif
    </script>
@endsection
