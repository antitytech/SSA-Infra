@extends('user.layout')
@section('title')
    Add Projects Operations
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
                    <form action="{{ route('store_projects_maintenance') }}" method="POST" enctype="multipart/form-data">
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
                        <h5 class="header-title mt-0" style="font-size: 25px">Operations</h5>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Maintenance yearly costs</label>
                                <input type="text" class="form-control" name="MaintenanceYearlyCosts"
                                    placeholder="Enter Maintenance yearly costs">
                                @if ($errors->has('MaintenanceYearlyCosts'))
                                    <span class="text-danger">{{ $errors->first('MaintenanceYearlyCosts') }}</span>
                                @endif
                            </div>

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
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Operational risks</label>
                                <select name="OperationalRisks" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                @if ($errors->has('OperationalRisks'))
                                    <span class="text-danger">{{ $errors->first('OperationalRisks') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">General & Overhead yearly costs</label>
                                <input type="text" class="form-control" name="OverheadYearlyCosts"
                                    placeholder="Enter General & Overhead yearly costs">
                                @if ($errors->has('OverheadYearlyCosts'))
                                    <span class="text-danger">{{ $errors->first('OverheadYearlyCosts') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Third party liability risks</label>
                                <select name="ThirdParty" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                @if ($errors->has('ThirdParty'))
                                    <span class="text-danger">{{ $errors->first('ThirdParty') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">O&M contract in place*</label>
                                <select name="OM_ContractInPlace" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                @if ($errors->has('OM_ContractInPlace'))
                                    <span class="text-danger">{{ $errors->first('OM_ContractInPlace') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Yield/Performances risks</label>
                                <select name="Yield/PerformancesRisks" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                @if ($errors->has('Yield/PerformancesRisks'))
                                    <span class="text-danger">{{ $errors->first('Yield/PerformancesRisks') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">O&M yearly costs</label>
                                <input type="text" class="form-control" name="OM_YearlyCosts"
                                    placeholder="Enter Maintenance yearly costs">

                                @if ($errors->has('OM_YearlyCosts'))
                                    <span class="text-danger">{{ $errors->first('OM_YearlyCosts') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">O&M yearly costs Currency</label>
                                <select name="OM_Currency" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
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
                                @if ($errors->has('OM_Currency'))
                                    <span class="text-danger">{{ $errors->first('OM_Currency') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Insurance costs</label>
                                <input type="text" class="form-control" name="InsuranceCosts"
                                    placeholder="Enter Insurance costs">

                                @if ($errors->has('InsuranceCosts'))
                                    <span class="text-danger">{{ $errors->first('InsuranceCosts') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Insurance costs Currency</label>
                                <select name="InsuranceCurrency" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
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
                                @if ($errors->has('InsuranceCurrency'))
                                    <span class="text-danger">{{ $errors->first('InsuranceCurrency') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Comments about the O&M Costs</label>
                                <input type="text" class="form-control" name="CommentsOMCosts"
                                    placeholder="Enter Insurance costs">

                                @if ($errors->has('CommentsOMCosts'))
                                    <span class="text-danger">{{ $errors->first('CommentsOMCosts') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Comments about insurance costs</label>
                                <input type="text" class="form-control" name="CommentsAboutInsuranceCosts"
                                    placeholder="Enter Comments about insurance costs">

                                @if ($errors->has('CommentsAboutInsuranceCosts'))
                                    <span class="text-danger">{{ $errors->first('CommentsAboutInsuranceCosts') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">O&M escalation rate (% per year)</label>
                                <input type="text" class="form-control" name="OM_EscalationRate"
                                    placeholder="Enter O&M escalation rate (% per year)">

                                @if ($errors->has('OM_EscalationRate'))
                                    <span class="text-danger">{{ $errors->first('OM_EscalationRate') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Insurer name(s)</label>
                                <input type="text" class="form-control" name="InsurerName"
                                    placeholder="Enter Insurer name(s)">

                                @if ($errors->has('InsurerName'))
                                    <span class="text-danger">{{ $errors->first('InsurerName') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">O&M contractor</label>
                                <input type="text" class="form-control" name="OM_Contractor"
                                    placeholder="Enter O&M contractor">
                                @if ($errors->has('OM_Contractor'))
                                    <span class="text-danger">{{ $errors->first('OM_Contractor') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Comments regarding the O&M and insurance</label>
                                <input type="text" class="form-control" name="CommentsRegardingOM_Insurance"
                                    placeholder="Enter Comments regarding the O&M and insurance">

                                @if ($errors->has('CommentsRegardingOM_Insurance'))
                                    <span class="text-danger">{{ $errors->first('CommentsRegardingOM_Insurance') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Warranty end-date</label>
                                <input type="date" class="form-control" name="WarrantyEndDate"
                                    placeholder="">

                                @if ($errors->has('TeaserOffTaker'))
                                    <span class="text-danger">{{ $errors->first('TeaserOffTaker') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Yield/Performances risks</label>
                                <select name="Yield_PerformancesRisks" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                @if ($errors->has('Yield_PerformancesRisks'))
                                    <span class="text-danger">{{ $errors->first('Yield_PerformancesRisks') }}</span>
                                @endif
                            </div>
                          
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Items not covered by warranty</label>
                                <input type="text" class="form-control" name="ItemsNotWarranty"
                                    placeholder="Enter Items not covered by warranty">
                                @if ($errors->has('ItemsNotWarranty'))
                                    <span class="text-danger">{{ $errors->first('ItemsNotWarranty') }}</span>
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
