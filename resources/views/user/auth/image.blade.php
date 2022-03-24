@extends('user.layout')

@section('title')
    User Profile
@endsection
@section('extra-heads')
    <link rel="stylesheet" href="{{ asset('profile.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
                        alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endsection

@section('content')
    <style>
        .edit_prof {
            color: white;
            background: black;
            padding: 10px 20px;
            border-radius: 12px;
        }

        .edit_prof:hover {
            color: black;
            background: white;
            border: 2px solid red;
        }

        @media only screen and (min-width: 320px) and (max-width: 479px) {
            .responsive {
                height: 100px;
                width: 100px;
            }

            .input_field {
                width: 170%;
            }
        }

        @media only screen and (min-width: 480px) and (max-width: 767px) {
            .responsive {
                height: 200px;
                width: 200px;
            }

            .input_field {
                width: 170%;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .responsive {
                height: 180px;
                width: 180px;
            }

            .input_field {
                width: 160%;
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1023px) {
            .responsive {
                height: 180px;
                width: 180px;
            }

            .input_field {
                width: 160%;
            }
        }

        @media only screen and (min-width: 1024px) and (max-width: 1440px) {
            .responsive {
                height: 180px;
                width: 180px;
            }

            .input_field {
                width: 160%;
            }
        }

    </style>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row">

                <div class="col-lg-4 col-md-6 col-sm-6 bg-c-lite-green user-profile"
                    style="margin-top: auto; margin-bottom: auto; border-radius: 15px; margin-left: auto; margin-right: auto;">
                    <div class="card-block text-center text-white">
                        <div class="m-b-25">
                            @if (Auth::guard('web')->user()->Image)
                                <img src="{{ asset('images/' . Auth::guard('web')->user()->Image) }}"
                                    class="rounded-circle img-radius responsive" height="300px" width="300px"
                                    alt="User-Profile-Image">
                            @else
                                @if (Auth::guard('web')->user()->avatar)
                                    <img src="{{ Auth::guard('web')->user()->avatar }}"
                                        class="rounded-circle img-radius responsive" height="300px" width="300px"
                                        alt="User-Profile-Image">
                                @else
                                    <img src="https://zrsgaming.eu/zrs.png" class="rounded-circle img-radius responsive"
                                        height="300px" width="300px" alt="User-Profile-Image" />
                                @endif
                            @endif
                        </div>
                        <h3>Select Image</h3>
                        <form action="{{ route('storeimage') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-8">
                                    <input type="file" name="Image" id="" class="input_field edit_prof">
                                </div>
                                @if ($errors->has('Image'))
                                    <span class="text-white">{{ $errors->first('Image') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success" style="margin-top: 20px;">Upload</button>
                                </div>
                            </div>

                        </form>
                        <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                    </div>
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
@endsection
