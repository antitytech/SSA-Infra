@extends('user.layout')
@section('title')
    Projects
@endsection
@section('content')
    <div class="row" style="margin-top: 25px">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">My Projects</h4>
                    <h4 style="text-align: right"><a href="/add-Projects"
                            class="btn btn-success waves-effect waves-light">Add
                            Projects</a></h4>
                    <div class="row">
                        @isset($platform)
                            @foreach ($platform as $platform)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="card" style="width: 23rem;">
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
