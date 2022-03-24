@extends('user.layout')
@section('title')
    Add Projects Site
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
                    <form action="{{ route('store_projects_site') }}" method="POST" enctype="multipart/form-data">
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
                        <h5 class="header-title mt-0" style="font-size: 25px">Projects Site</h5>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Site area</label>
                                <input type="text" class="form-control" name="SiteArea"
                                    placeholder="Enter Site area">
                                 
                                @if ($errors->has('SiteArea'))
                                    <span class="text-danger">{{ $errors->first('SiteArea') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Site unit</label>
                                <select name="SiteUnit" class="select2 form-control mb-3 custom-select"
                                style="width: 100%; height:36px;">
                                <option value="">Select an option</option>
                                        <option value="Hectare">Hectare</option>
                                        <option value="Square meter">Square meter</option>
                                        <option value="Square feet">Square feet</option>
                                        <option value="Ngan">Ngan</option>
                                        <option value="Rai">Rai</option>
                            </select>
                                @if ($errors->has('SiteUnit'))
                                    <span class="text-danger">{{ $errors->first('SiteUnit') }}</span>
                                @endif
                            </div>

                         
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="">Site area Address</label>
                                <input type="text" class="form-control" name="Address"
                                    placeholder="Enter Site Existing Address">
                                @if ($errors->has('Address'))
                                    <span class="text-danger">{{ $errors->first('Address') }}</span>
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
                                <label for="">Site main usage</label>
                                <select name="SiteMainUsage" class="select2 form-control mb-3 custom-select"
                                style="width: 100%; height:36px;">
                                <option value="">Select an option</option>
                                        <option value="Natural site">Natural site</option>
                                        <option value="Commercial site">Commercial site</option>
                                        <option value="Industrial site">Industrial site</option>
                                        <option value="Agricultural site">Agricultural site</option>
                                        <option value="Municipal site">Municipal site</option>
                                        <option value="Military site">Military site</option>
                                        <option value="Other">Other</option>
                            </select>
                                @if ($errors->has('SiteMainUsage'))
                                    <span class="text-danger">{{ $errors->first('SiteMainUsage') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Contract for site signed</label>
                                <select name="ContractSigned" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                @if ($errors->has('ContractSigned'))
                                    <span class="text-danger">{{ $errors->first('ContractSigned') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Site owner is one of the PPA off-taker</label>
                                <select name="SiteOwnerPPAoff_taker" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                @if ($errors->has('SiteOwnerPPAoff_taker'))
                                    <span class="text-danger">{{ $errors->first('SiteOwnerPPAoff_taker') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Site owner payment</label>
                                <select name="SiteOwnerPayment" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="Lease">Lease</option>
                                    <option value="Included in PPA">Included in PPA</option>
                                    <option value="Purchase of land">Purchase of land</option>
                                    <option value="Revenue Sharing">Revenue Sharing</option>
                                    <option value="Other">Other</option>
                                </select>
                                @if ($errors->has('SiteOwnerPayment'))
                                    <span class="text-danger">{{ $errors->first('SiteOwnerPayment') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Site contract type</label>
                                <select name="SiteContractType" class="select2 form-control mb-3 custom-select"
                                    style="width: 100%; height:36px;">
                                    <option value="">Select an option</option>
                                    <option value="Free Hold">Free Hold</option>
                                    <option value="Lease < PPA duration">Lease < PPA duration</option>
                                    <option value="Lease equal to PPA duration">Lease equal to PPA duration</option>
                                    <option value="Lease > PPA duration">Lease > PPA duration</option>
                                    <option value="Other">Other</option>
                                </select>
                                @if ($errors->has('SiteContractType'))
                                    <span class="text-danger">{{ $errors->first('SiteContractType') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Site rent/lease cost per year</label>
                                <input type="text" class="form-control" name="SiteCostPerYear"
                                    placeholder="Enter Site rent/lease cost per year">
                                @if ($errors->has('SiteCostPerYear'))
                                    <span class="text-danger">{{ $errors->first('SiteCostPerYear') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Site rent/lease cost per year Currency</label>
                                <select name="SiteCurrency" class="select2 form-control mb-3 custom-select"
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
                                @if ($errors->has('SiteCurrency'))
                                    <span class="text-danger">{{ $errors->first('SiteCurrency') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Duration lease (years)</label>
                                <input type="text" class="form-control" name="DurationLease"
                                    placeholder="Enter Duration lease (years)">
                                @if ($errors->has('DurationLease'))
                                    <span class="text-danger">{{ $errors->first('DurationLease') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Site access/easement</label>
                                <select name="SiteAccess" class="select2 form-control mb-3 custom-select"
                                style="width: 100%; height:36px;">
                                <option value="">Select Currency</option>
                                <option value="Contractual">Contractual</option>
                                <option value="Unsettled">Unsettled</option>
                                <option value="None">None</option>
                                <option value="Not needed">Not needed</option>
                                <option value="Other">Other</option>
                            </select>
                                @if ($errors->has('SiteAccess'))
                                    <span class="text-danger">{{ $errors->first('SiteAccess') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Site accessible by truck</label>
                                <select name="SiteAccessibleTruck" class="select2 form-control mb-3 custom-select"
                                style="width: 100%; height:36px;">
                                <option value="">Select an option</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                                @if ($errors->has('SiteAccessibleTruck'))
                                    <span class="text-danger">{{ $errors->first('SiteAccessibleTruck') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Comments about logistics plan, distance from port of delivery</label>
                                <input type="text" class="form-control" name="logistics"
                                    placeholder="Enter Comments about logistics">
                                @if ($errors->has('logistics'))
                                    <span class="text-danger">{{ $errors->first('logistics') }}</span>
                                @endif
                            </div>
                          
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Road Survey Completed</label>
                                <select name="RoadSurvey" class="select2 form-control mb-3 custom-select"
                                style="width: 100%; height:36px;">
                                <option value="">Select an option</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                                @if ($errors->has('RoadSurvey'))
                                    <span class="text-danger">{{ $errors->first('RoadSurvey') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="">Comments about the site</label>
                                <input type="text" class="form-control" name="CommentsSite"
                                    placeholder="Enter Comments about Site">
                                @if ($errors->has('CommentsSite'))
                                    <span class="text-danger">{{ $errors->first('CommentsSite') }}</span>
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
