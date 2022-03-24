@extends('user.layout')
@section('title')
    Platforms
@endsection
@section('content')
    <div class="row" style="margin-top: 25px">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">My Platforms</h4>
                    <div class="row">
                        @isset($platform)
                            @foreach ($platform as $platform)
                                <div class="col-lg-12 col-md-6 col-sm-6">
                                    <div class="card cardsss" style="width: 45rem;">
                                        <img class="Platform_image" src="{{ asset('/images/' . $platform->Image) }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $platform->Name }}</h5>
                                            <p class="card-text">Platform has been modified by
                                                <b>{{ Auth::guard('web')->user()->name }}</b> on {{ $platform->created_at }}
                                            </p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <div class="row">
                                                <div class="col-12">
                                                    <li class="list-group-item">Technologie: {{ $platform->Type }}</li>
                                                    <li class="list-group-item" >Status: <span style="color: #de9114">{{ $platform->Status }}</span></li>
                                                    <li class="list-group-item">Revenues Streams: {{ $platform->RevenueType }}</li>
                                                    <li class="list-group-item">Currency: {{ $platform->RevenueCurrency }}</li>
                                                    <li class="list-group-item">Type: {{ $platform->Type }}</li>
                                                    <li class="list-group-item">Capacity: {{ $platform->Capacity }}</li>
                                                    <li class="list-group-item">Project Level: {{ $platform->projectLevel }}</li>
                                                    <li class="list-group-item">Country: {{ $platform->Country }}</li>
                                                    <li class="list-group-item">Opportunity Brief: {{ $platform->OpportunityBrief }}</li>
                                                    <li class="list-group-item">Market Landscape: {{ $platform->MarketLandscape }}</li>
                                                    <li class="list-group-item">Reason to Invest: {{ $platform->ReasonInvest }}</li>
                                                    <li class="list-group-item">About Sponsor: {{ $platform->AboutSponsor }}</li>
                                                    <li class="list-group-item">Platform Investment: {{ $platform->PlatformInvestment }}</li>
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
