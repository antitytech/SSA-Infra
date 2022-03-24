@extends('user.layout')
@section('title')
    Transactions
@endsection
@section('content')

<div class="row">
    @isset($room)
    @foreach ($room as $room)
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card" style="width: 18rem;margin-top: 30px;">
            <div class="card-body">
              <h5 class="card-title">Project Name:</h5>
              <p class="card-text">{{ $room->project_name }}</p>
              <a href="/user-chat/{{ $room->project_name }}" class="btn btn-primary">Start Chat</a>
            </div>
          </div>
    </div>
    @endforeach
    @endisset
</div>
@endsection

