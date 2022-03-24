@extends('user.layout')
@section('title')
    Add Projects Contracts
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
                    <form action="{{ route('store_projects_contracts') }}" method="POST" enctype="multipart/form-data">
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
                        <h5 class="header-title mt-0" style="font-size: 25px">Projects Contracts</h5>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Building permits available</label>
                                <select name="BuildingPermitsAvailable" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                @if ($errors->has('BuildingPermitsAvailable'))
                                    <span class="text-danger">{{ $errors->first('BuildingPermitsAvailable') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">General risks</label>
                                <select name="GeneralRisks" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                @if ($errors->has('GeneralRisks'))
                                    <span class="text-danger">{{ $errors->first('GeneralRisks') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Environmental permits available</label>
                                <select name="EnvironmentalPermitsAvailable" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                @if ($errors->has('EnvironmentalPermitsAvailable'))
                                    <span class="text-danger">{{ $errors->first('EnvironmentalPermitsAvailable') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Third party liability risks</label>
                                <select name="ThirdPartyLiability" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                @if ($errors->has('ThirdPartyLiability'))
                                    <span class="text-danger">{{ $errors->first('ThirdPartyLiability') }}</span>
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
                                <label for="">Transit risks</label>
                                <select name="TransitRisks" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                @if ($errors->has('TransitRisks'))
                                    <span class="text-danger">{{ $errors->first('TransitRisks') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Interconnection permits available</label>
                                <select name="InterconnectionPermitsAvailable" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                @if ($errors->has('InterconnectionPermitsAvailable'))
                                    <span class="text-danger">{{ $errors->first('InterconnectionPermitsAvailable') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Construction/Erection risks</label>
                                <select name="Construction_ErectionRisks" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                @if ($errors->has('Construction_ErectionRisks'))
                                    <span class="text-danger">{{ $errors->first('Construction_ErectionRisks') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Project developer is the EPC</label>
                                <select name="ProjectDeveloperEPC" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                @if ($errors->has('ProjectDeveloperEPC'))
                                    <span class="text-danger">{{ $errors->first('ProjectDeveloperEPC') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Professional Indemnity/Error & Omission risks</label>
                                <select name="ProfessionalIndemnity" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                @if ($errors->has('ProfessionalIndemnity'))
                                    <span class="text-danger">{{ $errors->first('ProfessionalIndemnity') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">EPC contract(s) status</label>
                                <select name="EPC_Contract" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="To-be-defined">To-be-defined</option>
                                    <option value="Tender process on-going">Tender process on-going</option>
                                    <option value="Term sheets available">Term sheets available</option>
                                    <option value="Contract signed">Contract signed</option>
                                </select>
                                @if ($errors->has('EPC_Contract'))
                                    <span class="text-danger">{{ $errors->first('EPC_Contract') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Procurement contractor</label>
                               <input type="text" class="form-control" name="ProcurementContractor" placeholder="Enter Procurement contractor">
                                @if ($errors->has('ProcurementContractor'))
                                    <span class="text-danger">{{ $errors->first('ProcurementContractor') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Insurance costs</label>
                                <input type="text" class="form-control" name="InsuranceCosts"
                                    placeholder="Enter Insurance costs">
                                @if ($errors->has('InsuranceCosts'))
                                    <span class="text-danger">{{ $errors->first('InsuranceCosts') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Insurance costs Currency</label>
                                <select name="InsuranceCostsCurrency" class="select2 form-control mb-3 custom-select"
                                style="width: 100%; height:36px;">
                                <option value="">Select Currency</option>
                                <option value="EUR">Euro</option>
                                <option value="GBP">United Kingdom Pounds</option>
                                <option value="DZD">Algeria Dinars</option>
                                <option value="ARP">Argentina Pesos</option>
                                <option value="AUD">Australia Dollars</option>
                                <option value="ATS">Austria Schillings</option>
                                <option value="BSD">Bahamas Dollars</option>
                                <option value="BBD">Barbados Dollars</option>
                                <option value="BEF">Belgium Francs</option>
                                <option value="BMD">Bermuda Dollars</option>
                                <option value="BRR">Brazil Real</option>
                                <option value="BGL">Bulgaria Lev</option>
                                <option value="CAD">Canada Dollars</option>
                                <option value="CLP">Chile Pesos</option>
                                <option value="CNY">China Yuan Renmimbi</option>
                                <option value="CYP">Cyprus Pounds</option>
                                <option value="CSK">Czech Republic Koruna</option>
                                <option value="DKK">Denmark Kroner</option>
                                <option value="NLG">Dutch Guilders</option>
                                <option value="XCD">Eastern Caribbean Dollars</option>
                                <option value="EGP">Egypt Pounds</option>
                                <option value="FJD">Fiji Dollars</option>
                                <option value="FIM">Finland Markka</option>
                                <option value="FRF">France Francs</option>
                                <option value="DEM">Germany Deutsche Marks</option>
                                <option value="XAU">Gold Ounces</option>
                                <option value="GRD">Greece Drachmas</option>
                                <option value="HKD">Hong Kong Dollars</option>
                                <option value="HUF">Hungary Forint</option>
                                <option value="ISK">Iceland Krona</option>
                                <option value="INR">India Rupees</option>
                                <option value="IDR">Indonesia Rupiah</option>
                                <option value="IEP">Ireland Punt</option>
                                <option value="ILS">Israel New Shekels</option>
                                <option value="ITL">Italy Lira</option>
                                <option value="JMD">Jamaica Dollars</option>
                                <option value="JPY">Japan Yen</option>
                                <option value="JOD">Jordan Dinar</option>
                                <option value="KRW">Korea (South) Won</option>
                                <option value="LBP">Lebanon Pounds</option>
                                <option value="LUF">Luxembourg Francs</option>
                                <option value="MYR">Malaysia Ringgit</option>
                                <option value="MXP">Mexico Pesos</option>
                                <option value="NLG">Netherlands Guilders</option>
                                <option value="NZD">New Zealand Dollars</option>
                                <option value="NOK">Norway Kroner</option>
                                <option value="PKR">Pakistan Rupees</option>
                                <option value="XPD">Palladium Ounces</option>
                                <option value="PHP">Philippines Pesos</option>
                                <option value="XPT">Platinum Ounces</option>
                                <option value="PLZ">Poland Zloty</option>
                                <option value="PTE">Portugal Escudo</option>
                                <option value="ROL">Romania Leu</option>
                                <option value="RUR">Russia Rubles</option>
                                <option value="SAR">Saudi Arabia Riyal</option>
                                <option value="XAG">Silver Ounces</option>
                                <option value="SGD">Singapore Dollars</option>
                                <option value="SKK">Slovakia Koruna</option>
                                <option value="ZAR">South Africa Rand</option>
                                <option value="KRW">South Korea Won</option>
                                <option value="ESP">Spain Pesetas</option>
                                <option value="XDR">Special Drawing Right (IMF)</option>
                                <option value="SDD">Sudan Dinar</option>
                                <option value="SEK">Sweden Krona</option>
                                <option value="CHF">Switzerland Francs</option>
                                <option value="TWD">Taiwan Dollars</option>
                                <option value="THB">Thailand Baht</option>
                                <option value="TTD">Trinidad and Tobago Dollars</option>
                                <option value="TRL">Turkey Lira</option>
                                <option value="VEB">Venezuela Bolivar</option>
                                <option value="ZMK">Zambia Kwacha</option>
                                <option value="EUR">Euro</option>
                                <option value="XCD">Eastern Caribbean Dollars</option>
                                <option value="XDR">Special Drawing Right (IMF)</option>
                                <option value="XAG">Silver Ounces</option>
                                <option value="XAU">Gold Ounces</option>
                                <option value="XPD">Palladium Ounces</option>
                                <option value="XPT">Platinum Ounces</option>
                            </select>
                                @if ($errors->has('InsuranceCostsCurrency'))
                                    <span class="text-danger">{{ $errors->first('InsuranceCostsCurrency') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Comment About Insurance</label>
                                <input type="text" class="form-control" name="CommentAboutInsurance"
                                    placeholder="Enter Comment About Insurance">
                                @if ($errors->has('CommentAboutInsurance'))
                                    <span class="text-danger">{{ $errors->first('CommentAboutInsurance') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Engineering contractor</label>
                                <input type="text" class="form-control" name="EngineeringContractor"
                                    placeholder="Enter Engineering contractor">
                                @if ($errors->has('EngineeringContractor'))
                                    <span class="text-danger">{{ $errors->first('EngineeringContractor') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Construction contractor</label>
                                <input type="text" class="form-control" name="ConstructionContractor"
                                    placeholder="Enter Construction contractor">
                                @if ($errors->has('ConstructionContractor'))
                                    <span class="text-danger">{{ $errors->first('ConstructionContractor') }}</span>
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

