@extends('user.layout')
@section('title')
    User Dashboard
@endsection
@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group float-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="#">SSA Infra</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="col-3 align-self-center">
                                    <div class="round"><i class="mdi mdi-rename-box"></i></div>
                                </div>
                                <div class="col-6 align-self-center text-center">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner">{{ $request_projects }}</h5>
                                        <p class="mb-0 text-muted">My Projects Worldwide</p>
                                    </div>
                                </div>
                                <div class="col-3 align-self-end align-self-center">
                                    <h6 class="m-0 float-right text-center text-success"><a href=""
                                            style="color: #3cab94 !important;"><i class="mdi mdi-arrow-right"></i> <span>Add
                                                Projects</span></a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="col-3 align-self-center">
                                    <div class="round"><i class="fa fa-dollar"></i></div>
                                </div>
                                <div class="col-6 text-center align-self-center">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner">{{ $Opportunities }}</h5>
                                        <p class="mb-0 text-muted">Investment Opportunities</p>
                                    </div>
                                </div>
                                <div class="col-3 align-self-end align-self-center">
                                    <h6 class="m-0 float-right text-center text-success"><a href=""
                                            style="color: #3cab94 !important;"><i class="mdi mdi-arrow-right"></i> <span>Add
                                                Opportunities</span></a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="col-3 align-self-center">
                                    <div class="round"><i class="fa fa-dollar"></i></div>
                                </div>
                                <div class="col-6 align-self-center text-center">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner">7514</h5>
                                        <p class="mb-0 text-muted">My ongoing transactions</p>
                                    </div>
                                </div>
                                <div class="col-3 align-self-end align-self-center">
                                    <h6 class="m-0 float-right text-center text-success"><a href=""
                                            style="color: #3cab94 !important;"><i class="mdi mdi-arrow-right"></i> <span>Add
                                                Transactions</span></a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="col-3 align-self-center">
                                    <div class="round"><i class="mdi mdi-poll-box"></i></div>
                                </div>
                                <div class="col-6 align-self-center text-center">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner">{{ $platform }}</h5>
                                        <p class="mb-0 text-muted">My Platforms</p>
                                    </div>
                                </div>
                                <div class="col-3 align-self-end align-self-center">
                                    <h6 class="m-0 float-right text-center text-success"><a href="{{ route('add_platforms') }}"
                                            style="color: #3cab94 !important;"><i class="mdi mdi-arrow-right"></i> <span>Add
                                                Platforms</span></a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="col-3 align-self-center">
                                    <div class="round"><i class="mdi mdi-rename-box"></i></div>
                                </div>
                                <div class="col-6 align-self-center text-center">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner">{{ $projects }}</h5>
                                        <p class="mb-0 text-muted">My Projects</p>
                                    </div>
                                </div>
                                <div class="col-3 align-self-end align-self-center">
                                    <h6 class="m-0 float-right text-center text-success"><a href="{{ route('add_projects') }}"
                                            style="color: #3cab94 !important;"><i class="mdi mdi-arrow-right"></i> <span>Add
                                                Projects</span></a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="col-3 align-self-center">
                                    <div class="round"><i class="mdi mdi-rocket"></i></div>
                                </div>
                                <div class="col-6 align-self-center text-center">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner">{{ $investments }}</h5>
                                        <p class="mb-0 text-muted">My investments</p>
                                    </div>
                                </div>
                                <div class="col-3 align-self-end align-self-center">
                                    <h6 class="m-0 float-right text-center text-success"><a href=""
                                            style="color: #3cab94 !important;"><i class="mdi mdi-arrow-right"></i> <span>Add
                                                investments</span></a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
        </div>
        <!-- container -->
    </div>
@endsection
