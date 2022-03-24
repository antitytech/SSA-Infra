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

    </style>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row" style="box-shadow: 0px 0px 15px 0px #aaa;
                            border-radius: 15px;">
                <div class="col-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-lg-4 col-md-6 col-sm-6 bg-c-lite-green user-profile"
                                style="margin-top: auto; margin-bottom: auto; border-radius: 15px;">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25">
                                        @if (Auth::guard('web')->user()->avatar)
                                            <img src="{{ Auth::guard('web')->user()->avatar }}"
                                                class="rounded-circle img-radius" height="300px" width="300px"
                                                alt="User-Profile-Image">
                                        @elseif (Auth::guard('web')->user()->Image)
                                            <img src="{{ asset('images/' . Auth::guard('web')->user()->Image) }}"
                                                class="rounded-circle img-radius" height="300px" width="300px"
                                                alt="User-Profile-Image">
                                        @else
                                            <img src="https://zrsgaming.eu/zrs.png" class="rounded-circle img-radius"
                                                height="300px" width="300px" alt="User-Profile-Image" />
                                        @endif
                                    </div>
                                    
                                    <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                    <div class="row">
                                            @isset($individual)
                                                @foreach ($individual as $individual)
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">Name</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $individual->name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="150" data-speed="150">Email
                                                            </h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $individual->email }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="850" data-speed="850">Phone
                                                            </h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $individual->Phone }} </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="190" data-speed="190">Title
                                                            </h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $individual->Title }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="190" data-speed="190">Date Of
                                                                Birth</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $individual->DOB }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="190" data-speed="190">Tax
                                                                Residence</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $individual->TaxResidence }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="190" data-speed="190">Country
                                                                of
                                                                Residence</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $individual->CountryResidence }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="190" data-speed="190">Primary
                                                                Citizenship</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $individual->PrimaryCitizenship }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="190" data-speed="190">Mailing
                                                                Address</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $individual->MAILINGADDRESS }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="190" data-speed="190">Address
                                                                line 1</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $individual->Addressline1 }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="190" data-speed="190">Address
                                                                line 2</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $individual->Addressline2 }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="190" data-speed="190">City</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $individual->City }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="190" data-speed="190">Zip</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $individual->Zip }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="190" data-speed="190">State
                                                            </h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $individual->State }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="190" data-speed="190">Country
                                                            </h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $individual->Country }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="190" data-speed="190">Roles
                                                            </h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $individual->ROLES }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="190" data-speed="190">Profile
                                                                Role</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $individual->role }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
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
