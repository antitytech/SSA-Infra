@extends('user.layout')
@section('title')
    Add Projects Environmental
@endsection

@section('extra-heads')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 50px">
            <div class="card m-b-30">
                <div class="card-body">
                    <form action="{{ route('store_projects_environmental') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($projectsid)
                        @foreach ( $projectsid as $projectsid)
                            <input type="text" hidden value="{{ $projectsid->id }}" name="ProjectId" >
                        @endforeach
                        @endisset
                        @if (Session::has('message'))
                            <div class="alert alert-success m-4" style="width: 90%;">
                                {{ Session::get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <h5 class="header-title mt-0" style="font-size: 25px">Environmental</h5>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Environmental and Social Impact Assessment report available</label>
                                <select name="Assessment" class="select2 form-control mb-3 custom-select"
                                style="width: 100%; height:36px;">
                                <option value="">Select an option</option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                            </select>
                                @if ($errors->has('Assessment'))
                                    <span class="text-danger">{{ $errors->first('Assessment') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Environmental and Social Management Plan available</label>
                                <select name="ManagementPlan" class="select2 form-control mb-3 custom-select"
                                style="width: 100%; height:36px;">
                                <option value="">Select an option</option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                            </select>
                                @if ($errors->has('ManagementPlan'))
                                    <span class="text-danger">{{ $errors->first('ManagementPlan') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Select Projects</label>
                                <select name="ProjectName" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    @isset($projects)
                                        @foreach ($projects as $projects)
                                            <option value="{{ $projects->ProjectName }}">{{ $projects->ProjectName }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                                @if ($errors->has('ProjectName'))
                                    <span class="text-danger">{{ $errors->first('ProjectName') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Environmental and Social Consultant</label>
                                <input type="text" class="form-control" name="Consultant" placeholder="Enter Environmental and Social Consultant">
                                @if ($errors->has('Consultant'))
                                    <span class="text-danger">{{ $errors->first('Consultant') }}</span>
                                @endif
                            </div>
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

