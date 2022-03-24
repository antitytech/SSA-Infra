@extends('user.layout')
@section('title')
    Add Projects Taxes
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
                    <form action="{{ route('store_projects_taxes') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($projectsid)
                            @foreach ($projectsid as $projectsid)
                                <input type="text" hidden value="{{ $projectsid->id }}" name="ProjectId">
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
                        <h5 class="header-title mt-0" style="font-size: 25px">Projects Taxes</h5>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Corporate income tax (%)</label>
                                <input type="text" class="form-control" name="CorporateIncomeTax"
                                placeholder="Enter Comment About Insurance">
                                @if ($errors->has('CorporateIncomeTax'))
                                    <span class="text-danger">{{ $errors->first('CorporateIncomeTax') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Withholding tax (%)</label>
                                <input type="text" class="form-control" name="WithholdingTax"
                                placeholder="Enter Comment About Insurance">
                                @if ($errors->has('WithholdingTax'))
                                    <span class="text-danger">{{ $errors->first('WithholdingTax') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">VAT/GST on revenue (%)</label>
                                <input type="text" class="form-control" name="VAT_GST_Revenue"
                                placeholder="Enter Comment About Insurance">
                                @if ($errors->has('VAT_GST_Revenue'))
                                    <span class="text-danger">{{ $errors->first('VAT_GST_Revenue') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">VAT/GST on expense (%)</label>
                                <input type="text" class="form-control" name="VAT_GST_Expense"
                                placeholder="Enter Comment About Insurance">
                                @if ($errors->has('VAT_GST_Expense'))
                                    <span class="text-danger">{{ $errors->first('VAT_GST_Expense') }}</span>
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
                                <label for="">Import duties & VAT (%) </label>
                                <input type="text" class="form-control" name="ImportDutiesVAT"
                                placeholder="Enter Comment About Insurance">
                                @if ($errors->has('ImportDutiesVAT'))
                                    <span class="text-danger">{{ $errors->first('ImportDutiesVAT') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Other tax incentives description</label>
                                <input type="text" class="form-control" name="OtherTax"
                                placeholder="Enter Comment About Insurance">
                                @if ($errors->has('OtherTax'))
                                    <span class="text-danger">{{ $errors->first('OtherTax') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Comments regarding the taxes</label>
                                <input type="text" class="form-control" name="TaxesComments"
                                placeholder="Enter Comment About Insurance">
                                @if ($errors->has('TaxesComments'))
                                    <span class="text-danger">{{ $errors->first('TaxesComments') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Schedule</label>
                                <select name="Schedule" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="Straight line">Straight line</option>
                                    <option value="Declining balance">Declining balance</option>
                                    <option value="Schedule">Schedule</option>
                                </select>
                                @if ($errors->has('Schedule'))
                                    <span class="text-danger">{{ $errors->first('Schedule') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Depreciation term Value</label>
                                <input type="text" class="form-control" name="DepreciationTerm"
                                placeholder="Enter Comment About Insurance">
                                @if ($errors->has('DepreciationTerm'))
                                    <span class="text-danger">{{ $errors->first('DepreciationTerm') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Depreciation term (% of years)</label>
                                <select name="DepreciationTermYear" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="%">%</option>
                                    <option value="Years">Years</option>
                                </select>
                                @if ($errors->has('DepreciationTermYear'))
                                    <span class="text-danger">{{ $errors->first('DepreciationTermYear') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Initial allowance %</label>
                               <input type="text" class="form-control" name="InitialAllowance" placeholder="Enter Procurement contractor">
                                @if ($errors->has('InitialAllowance'))
                                    <span class="text-danger">{{ $errors->first('InitialAllowance') }}</span>
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

