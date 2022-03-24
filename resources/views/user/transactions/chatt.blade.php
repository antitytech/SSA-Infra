@extends('user.layout')
@section('title')
    Chat
@endsection
@section('content')
    <style>
        body {
            background-color: #74EBD5;
            background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);

            min-height: 100vh;
        }



        .text-small {
            font-size: 0.9rem;
        }

        .messages-box,
        .chat-box {
            height: 380px;
            overflow-y: scroll;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        input::placeholder {
            font-size: 0.9rem;
            color: #999;
        }

    </style>
    <div class="container py-5 px-4">
        <div class="row rounded-lg overflow-hidden shadow">

            <div class="col-12 px-0">

                <div class="px-4 py-5 chat-box bg-white">
                    @php
                        $id = Auth::guard('web')->user()->id;
                    @endphp
                    @isset($room_dev)
                        @foreach ($room_dev as $room_dev)
                            @if ($room_dev->sender_id == $id)
                                <div class="media w-50 ml-auto mb-3">
                                    <div class="media-body">
                                        <div class="bg-primary rounded py-2 px-3 mb-2">
                                            @if ($room_dev->folder)
                                            <a style="color: white" href="/files/{{ $room_dev->folder   }}">
                                                View
                                                 File
                                            </a>
                                        @endif
                                            <p class="text-small mb-0 text-white">{{ $room_dev->message }}</p>
                                        </div>

                                        <p class="small text-muted">{{ $room_dev->room_developer }}</p>
                                    </div>
                                </div>
                            @else
                                <div class="media w-50 mb-3"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg"
                                        alt="user" width="50" class="rounded-circle">
                                    <div class="media-body ml-3">
                                        <div class="bg-light rounded py-2 px-3 mb-2">
                                            @if ($room_dev->folder)
                                                <a href="/files/{{ $room_dev->folder   }}">
                                                    View
                                                     File
                                                </a>
                                            @endif
                                            <p class="text-small mb-0 text-muted">{{ $room_dev->message }}</p>
                                        </div>
                                        <p class="small text-muted">{{ $room_dev->room_developer }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endisset
                </div>
                <form action="{{ route('chat.store') }}" method="POST" class="bg-light"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <input type="file" name="folder" title="Choose file to send..."
                            class="form-control rounded-0 border-0 bg-light" multiple>
                            @if ($errors->has('folder'))
                            <span class="text-danger">{{ $errors->first('folder') }}</span>
                        @endif
                        <input type="text" name="message" placeholder="Type a message" aria-describedby="button-addon2"
                            class="form-control rounded-0 border-0 py-4 bg-light">
                            @if ($errors->has('message'))
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                        @endif
                        @isset($user)
                            @foreach ($user as $user)
                                <input type="text" hidden value="{{ $user->sender_id }}" name="sender_id">
                                <input type="text" hidden value="{{ $user->receiver_id }}" name="receiver_id">
                                <input type="text" hidden value="{{ $user->project_name }}" name="project_name">
                            @endforeach
                        @endisset
                        <div class="input-group-append">
                            <button id="button-addon2" type="submit" class="btn btn-link"> <i
                                    class="fa fa-paper-plane"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
