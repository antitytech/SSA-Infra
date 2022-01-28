@extends('user.layout')
@section('title')
    Individual User
@endsection

@section('extra-heads')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
                                alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 offset-lg-3 offset-md-3" style="margin-top: 50px">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="header-title mt-0">Update Profile</h4>
                    <form action="" method="POST">
                        @csrf
                        @if (Session::has('Success'))
                            <div class="alert alert-success m-4" style="width: 90%;">
                                {{ Session::get('Success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Name</label>
                                <input class="form-control" type="text" required="" name="name"
                                    placeholder="Enter Your Name" value="{{ Auth::guard('web')->user()->name ?? '' }}"
                                    readonly>
                            </div>
                            @if ($errors->has('author'))
                                <span class="text-danger">{{ $errors->first('author') }}</span>
                            @endif
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Email</label>
                                <input class="form-control" type="text" required=""
                                    name="email" placeholder="Enter Your Email"
                                    value="{{ Auth::guard('web')->user()->email ?? '' }}" readonly></div>
                            @if ($errors->has('author'))
                                <span class="text-danger">{{ $errors->first('author') }}</span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Phone</label>
                                <input class="form-control" type="text" required=""
                                    name="Phone" placeholder="Enter Phone"></div>
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Name</label>
                                <input class="form-control" type="text" required=""
                                    name="title" placeholder="Title"></div>
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Name</label>
                                <input class="form-control" type="text" required=""
                                    name="journal" placeholder="Journal Name"></div>
                            @if ($errors->has('journal'))
                                <span class="text-danger">{{ $errors->first('journal') }}</span>
                            @endif
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Name</label>
                                <input class="form-control" type="text" required=""
                                    name="title" placeholder="Title"></div>
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Name</label>
                                <input class="form-control" type="text" required=""
                                    name="year" placeholder="Year"></div>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Name</label>
                                <input class="form-control" type="text" required=""
                                    name="title" placeholder="Title"></div>
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Name</label>
                                <input class="form-control" type="text" required=""
                                    name="pages" placeholder="Pages"></div>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Name</label>
                                <input class="form-control" type="text" required=""
                                    name="title" placeholder="Title"></div>
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Name</label>
                                <select name="category" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option>Select</option>
                                    <option value="Wireless Communication">Wireless Communication</option>
                                    <option value="Computational Intelligence">Computational Intelligence</option>
                                    <option value="Intelligent Radar and Beamforming">Intelligent Radar and Beamforming
                                    </option>
                                    <option value="Computer Vision & Machine Learning">Computer Vision & Machine Learning
                                    </option>
                                    <option value="Information Security and Biometrics">Information Security and Biometrics
                                    </option>
                                    <option value="Sparse Signal Processing">Sparse Signal Processing</option>
                                    <option value="Power and Control">Power and Control</option>
                                    <option value="Biomedical Imaging">Biomedical Imaging</option>
                                    <option value="Cognitive Radios">Cognitive Radios</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Name</label>
                                <input class="form-control" type="text" required=""
                                    name="title" placeholder="Title"></div>
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button class="btn btn-success" type="submit"> Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection

@section('extra-scripts')
    <script src="{{ asset('panel') }}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('panel') }}/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/jszip.min.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('panel') }}/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('panel') }}/assets/pages/datatables.init.js"></script>
    <!-- App js -->
    <script src="{{ asset('panel') }}/assets/js/app.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable2').DataTable();
        });
    </script>
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
    </script>
@endsection
