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
                    <h4 style="text-align: right"><a href="/add-projects"
                            class="btn btn-success waves-effect waves-light">Add
                            Projects</a></h4>
                    <div class="row">
                        @isset($project)
                            @foreach ($project as $platform)
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
                                                    <li class="list-group-item">Project Name: {{ $platform->ProjectName }}</li>
                                                    <li class="list-group-item" >Platform: <span style="color: #de9114">{{ $platform->ChoosePlatform }}</span></li>
                                                    <li class="list-group-item">Project Stage: {{ $platform->ProjectStage }}</li>
                                                    <li class="list-group-item">Country: {{ $platform->Country }}</li>
                                                    <li class="list-group-item" style="text-align: center"><a href="/view-my-projects/{{ $platform->ProjectName }}" class="Platform_btn">View Project</a></li>
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
