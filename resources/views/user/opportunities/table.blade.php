@extends('user.layout')
@section('title')
    Opportunities
@endsection
@section('extra-heads')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endsection
@section('content')
    <div class="row" style="margin-top: 25px">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Opportunities</h4>
                    <div class="row">
                        @isset($projects)
                            @foreach ($projects as $projects)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="card" style="width: 23rem;">
                                        <img class="Platform_image" src="{{ asset('/images/' . $projects->Image) }}"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $projects->Name }}</h5>
                                            <p class="card-text">Projects has been modified by
                                                <b>{{ $projects->User_Name }}</b> on {{ $projects->created_at }}
                                            </p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <div class="row">
                                                <div class="col-12">
                                                    <li class="list-group-item">Project Name: {{ $projects->ProjectName }}
                                                    </li>
                                                    <li class="list-group-item">Platform: <span
                                                            style="color: #de9114">{{ $projects->ChoosePlatform }}</span></li>
                                                    <li class="list-group-item">Project Stage: {{ $projects->ProjectStage }}
                                                    </li>
                                                    <li class="list-group-item">Country: {{ $projects->Country }}</li>

                                                    <li class="list-group-item" style="text-align: center">
                                                        <form action="{{ route('requestproject') }}" method="POST">
                                                            @csrf
                                                            <input type="text" name="user_id"
                                                                value="{{ Auth::guard('web')->user()->id }}" hidden>
                                                            <input type="text" name="projectid" value="{{ $projects->id }}" hidden>
                                                            <input type="text" name="ProjectName" value="{{ $projects->ProjectName }}" hidden>
                                                            <input type="text" name="ProjectEmail" value="{{ $projects->ProjectEmail }}" hidden>
                                                            <input type="text" name="ProjectType" value="{{ $projects->ProjectType }}" hidden>
                                                            <input type="text" name="Offtaker" value="{{ $projects->Offtaker }}" hidden>
                                                            <input type="text" name="PPA_Status" value="{{ $projects->PPA_Status }}" hidden>
                                                            <input type="text" name="ChoosePlatform" value="{{ $projects->ChoosePlatform }}" hidden>
                                                            <input type="text" name="grid" value="{{ $projects->grid }}" hidden>
                                                            <input type="text" name="DateCommissioning" value="{{ $projects->DateCommissioning }}" hidden>
                                                            <input type="text" name="Evacuation" value="{{ $projects->Evacuation }}" hidden>
                                                            <input type="text" name="SiteIdentified" value="{{ $projects->SiteIdentified }}" hidden>
                                                            <input type="text" name="ProjectStage" value="{{ $projects->ProjectStage }}" hidden>
                                                            <input type="text" name="Country" value="{{ $projects->Country }}" hidden>
                                                            <input type="text" name="City" value="{{ $projects->City }}" hidden>
                                                            <input type="text" name="Developer" value="{{ $projects->Developer }}" hidden>
                                                            <input type="text" name="Region" value="{{ $projects->Region }}" hidden>
                                                            <input type="text" name="EPC_Contractor" value="{{ $projects->EPC_Contractor }}" hidden>
                                                            <input type="text" name="EPC_Structure" value="{{ $projects->EPC_Structure }}" hidden>
                                                            <input type="text" name="Street" value="{{ $projects->Street }}" hidden>
                                                            <input type="text" name="PostalCode" value="{{ $projects->PostalCode }}" hidden>
                                                            <input type="text" name="OwnershipStructure" value="{{ $projects->OwnershipStructure }}" hidden>
                                                            <input type="text" name="SpecialPurposeVehicle" value="{{ $projects->SpecialPurposeVehicle }}" hidden>
                                                            <input type="text" name="Image" value="{{ $projects->Image}}" hidden>
                                                            <input type="text" name="requested" value="{{ $projects->requested }}" hidden>
                                                            <input type="text" name="role" hidden>
                                                            <input type="text" name="project_user_id" value="{{ $projects->user_id }}" hidden>
                                                            <input type="text" name="id" value="{{ $projects->id }}" hidden>
                                                            <input type="text" name=" request_user_id" value="{{ Auth::guard('web')->user()->id }}" hidden>
                                                            <button class="Platform_btn">Request Project</button>
                                                        </form>
                                                    </li>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        @endisset
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
    </script>
@endsection
