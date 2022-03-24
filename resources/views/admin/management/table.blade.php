@extends('admin.layout')
@section('title')
    Projects
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
                    <h4 class="mt-0 header-title">Company Users</h4>
                    @if (session('message'))
                        <div class="alert alert-success m-4 text-center ml-3">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table id="datatable-buttons" style="    width: 100%;
                        display: block;
                        overflow-y: auto;" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">Request User Name</th>
                                <th class="text-center">Request User Email</th>
                                <th class="text-center">Project User Name</th>
                                <th class="text-center">Project User Email</th>
                                <th class="text-center">Project Type</th>
                                <th class="text-center">View Profile</th>
                                <th class="text-center">Create Room</th>
                                <th class="text-center">NDA Status Developer</th>
                                <th class="text-center">NDA Status Investor</th>
                                <th class="text-center">Project Status From Developer</th>
                                <th class="text-center">Project Status From Investor</th>
                                <th class="text-center">Project Status From Admin</th>
                                <th class="text-center">Action Project</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($projects)
                                @foreach ($projects as $user)
                                    <tr>
                                        <td class="text-center">{{ $user->name }}</td>
                                        <td class="text-center">{{ $user->email }}</td>
                                        <td class="text-center">{{ $user->ProjectName }}</td>
                                        <td class="text-center">{{ $user->ProjectEmail }}</td>
                                        <td class="text-center">{{ $user->ProjectType }}</td>
                                        @if ($user->role == 'Individual')
                                            <td class="text-center"><a
                                                    href="/admin/view-user-individual-profile/{{ $user->user_id }}">View
                                                    Profile</a>
                                            </td>
                                        @endif
                                        @if ($user->role == 'Company')
                                            <td class="text-center"><a
                                                    href="/admin/view-user-company-profile/{{ $user->user_id }}">View
                                                    Profile</a></td>
                                        @endif
                                        <td class="text-center">
                                            <form action="{{ route('create_dataroom') }}" method="POST">
                                                @csrf
                                                <input type="text" hidden value="{{ $user->user_id }}" name="invester_id" >
                                                <input type="text" hidden value="{{ $user->project_user_id }}" name="developer_id" >
                                                <input type="text" hidden value="{{ $user->ProjectName }}" name="project_name" >
                                                <button class="btn btn-success" type="submit">Create Room</button>
                                            </form>
                                        </td>

                                        @if ($user->nda_developer == 2)
                                            <td class="text-center"><span class="badge badge-primary">Pending</span></td>
                                        @endif
                                        @if ($user->nda_developer == 1)
                                            <td class="text-center"><span class="badge badge-success">Active</span></td>
                                        @endif
                                        @if ($user->nda_developer == 0)
                                            <td class="text-center"><span class="badge badge-danger">Blocked</span></td>
                                        @endif
                                        @if ($user->nda_investor == 2)
                                            <td class="text-center"><span class="badge badge-primary">Pending</span></td>
                                        @endif
                                        @if ($user->nda_investor == 1)
                                            <td class="text-center"><span class="badge badge-success">Active</span></td>
                                        @endif
                                        @if ($user->nda_investor == 0)
                                            <td class="text-center"><span class="badge badge-danger">Blocked</span></td>
                                        @endif
                                        @if ($user->request_status_dev == 1)
                                            <td class="text-center"><span class="badge badge-success">Active</span></td>
                                        @endif
                                        @if ($user->request_status_dev == 0)
                                            <td class="text-center"><span class="badge badge-danger">Blocked</span></td>
                                        @endif
                                        @if ($user->request_status_inves == 1)
                                            <td class="text-center"><span class="badge badge-success">Active</span></td>
                                        @endif
                                        @if ($user->request_status_inves == 0)
                                            <td class="text-center"><span class="badge badge-danger">Blocked</span></td>
                                        @endif
                                        @if ($user->request_status_admin == 1)
                                            <td class="text-center"><span class="badge badge-success">Active</span></td>
                                        @endif
                                        @if ($user->request_status_admin == 0)
                                            <td class="text-center"><span class="badge badge-danger">Blocked</span></td>
                                        @endif
                                        <td class="text-center">
                                            <a href="/admin/user-project-active/{{ $user->id }}"
                                                class="badge badge-success text-white" style="cursor: pointer;">Active</a>
                                            <a href="/admin/user-project-block/{{ $user->id }}"
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
    </div>

@endsection

@section('extra-scripts')
    <script src="{{ asset('panel') }}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/jszip.min.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/buttons.colVis.min.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="{{ asset('panel') }}/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('panel') }}/assets/pages/datatables.init.js"></script>
    <script src="{{ asset('panel') }}/assets/js/app.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable2').DataTable();
        });
    </script>
    <script>
        @if (Session::has('message'))
            toastr.options = {
            "closeButton": true
            , "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif
    </script>
@endsection
