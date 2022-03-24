@extends('admin.layout')
@section('title')
    Users
@endsection

@section('extra-heads')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
                alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

@endsection
@section('content')
    <div class="row" style="margin-top: 25px">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">All Users</h4>
                    @if (session('message'))
                        <div class="alert alert-success m-4 text-center ml-3">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Roles</th>
                                <th class="text-center">Profile</th>
                                <th class="text-center">Profile Status</th>
                                <th class="text-center">Action Profile</th>
                                <th class="text-center">Login With</th>
                                <th class="text-center">Email Status</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($user)
                                @foreach ($user as $user)
                                    <tr>
                                        <td class="text-center">{{ $user->name }}</td>
                                        <td class="text-center">{{ $user->email }}</td>
                                        <td class="text-center">{{ $user->role ?? 'No Roles'}}</td>

                                        @if ($user->role == 'Individual')
                                            <td class="text-center"><a href="/admin/user-individual-profile/{{ $user->id }}">View Profile</a></td>
                                        @endif
                                        @if ($user->role == 'Company')
                                            <td class="text-center"><a href="/admin/user-company-profile/{{ $user->id }}">View Profile</a></td>
                                        @endif
                                        @if ($user->role == 'NULL')
                                        <td class="text-center">No Data</td>
                                    @endif
                                        @if ($user->response == 1)
                                            <td class="text-center"><span class="badge badge-success">Active</span></td>
                                        @endif
                                        @if ($user->response == 0)
                                            <td class="text-center"><span class="badge badge-danger">Blocked</span></td>
                                        @endif
                                        <td class="text-center">
                                            <a href="/user-profile-active/{{ $user->id }}"
                                                class="badge badge-success text-white" style="cursor: pointer;">Active</a>

                                            <a href="/user-profile-block/{{ $user->id }}"
                                                class="badge badge-danger text-white" style="cursor: pointer;">Block</a>

                                        </td>
                                        <td class="text-center">{{ $user->LoginWith ?? 'No LoginWith'}}</td>
                                        @if ($user->v_otp == 1)
                                            <td class="text-center"><span class="badge badge-success">Verified</span></td>
                                        @endif
                                        @if ($user->v_otp == 0)
                                            <td class="text-center"><span class="badge badge-danger">Non-Verified</span></td>
                                        @endif
                                        @if ($user->status == 1)
                                            <td class="text-center"><span class="badge badge-success">Active</span></td>
                                        @endif
                                        @if ($user->status == 0)
                                            <td class="text-center"><span class="badge badge-danger">Blocked</span></td>
                                        @endif
                                        <td class="text-center">
                                            <a href="/user-status-active/{{ $user->id }}"
                                                class="badge badge-success text-white" style="cursor: pointer;">Active</a>

                                            <a href="/user-status-block/{{ $user->id }}"
                                                class="badge badge-danger text-white" style="cursor: pointer;">Block</a>

                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end col -->
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
