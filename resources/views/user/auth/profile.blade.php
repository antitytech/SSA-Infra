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

        .responsive {}

        @media only screen and (min-width: 320px) and (max-width: 479px) {
            .responsive {
                height: 100px;
                width: 100px;
            }
        }

        @media only screen and (min-width: 480px) and (max-width: 767px) {
            .responsive {
                height: 200px;
                width: 200px;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .responsive {
                height: 180px;
                width: 180px;
            }
        }
        @media only screen and (min-width: 992px) and (max-width: 1023px) {
            .responsive {
                height: 180px;
                width: 180px;
            }
        }
        @media only screen and (min-width: 1024px) and (max-width: 1440px) {
            .responsive {
                height: 180px;
                width: 180px;
            }
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
                                        <img src="https://zrsgaming.eu/zrs.png"
                                                class="rounded-circle img-radius responsive" height="300px" width="300px"
                                                alt="User-Profile-Image" />
                                        @endif
                                        @endif
                                    </div>
                                    <h6 class="f-w-600">{{ Auth::guard('web')->user()->name }}</h6>
                                    @if (Auth::guard('web')->user()->role == 'Individual')
                                        @isset($individuals)
                                            @foreach ($individuals as $individuals)
                                                <p>{{ $individuals->ROLES }}</p>
                                            @endforeach
                                        @endisset
                                    @endif
                                    @if (Auth::guard('web')->user()->role == 'Company')
                                        @isset($Companys)
                                            @foreach ($Companys as $Companys)
                                                <p>{{ $Companys->ROLES }}</p>
                                            @endforeach
                                        @endisset
                                    @endif
                                    <a href="{{ route('profileimage') }}" class="edit_prof">Edit Image</a>
                                    <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                    <div class="row">
                                        @if (Auth::guard('web')->user()->role == 'Company')
                                            @isset($Company)
                                                @foreach ($Company as $Company)
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">Name</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $Company->name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">Email</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $Company->email }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">Phone</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $Company->Phone }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">Company
                                                                Name</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $Company->CompanyName }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">Company
                                                                Logo</h6>
                                                            <p class="text-muted f-w-400">
                                                                <a href="/images/{{ $Company->CompanyLogo }}">View Logo</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">Company
                                                                Listed</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $Company->listed }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">
                                                                Registration Number</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $Company->RegistrationNumber }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">
                                                                Incorporation Country</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $Company->IncorporationCountry }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">Principle
                                                                Business</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $Company->PrincipleBusiness }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">Company
                                                                Email</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $Company->CompanyEmail }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">Company
                                                                Website</h6>
                                                            <p class="text-muted f-w-400">
                                                                <a
                                                                    href="{{ $Company->CompanyWebsite }}">{{ $Company->CompanyWebsite }}</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">Company
                                                                Income</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $Company->income }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">Investor
                                                            </h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $Company->Investor }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">Mailing
                                                                Address</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $Company->MailingAddress }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">Address
                                                                line 1</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $Company->Addressline1 }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">City</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $Company->City }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">Zip</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $Company->Zip }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">State</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $Company->State }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">Role</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $Company->ROLES }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">
                                                                Incorporation</h6>
                                                            <p class="text-muted f-w-400">
                                                                <a href="/images/{{ $Company->Incorporation }}">View Logo</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="count-data text-center">
                                                            <h6 class="m-b-10 f-w-600" data-to="500" data-speed="500">Role</h6>
                                                            <p class="text-muted f-w-400">
                                                                {{ $Company->role }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endisset
                                        @endif

                                        @if (Auth::guard('web')->user()->role == 'Individual')
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
                                        @endif
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
