@extends('admin.layout')
@section('title')
    Users Profile
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
                    <h4 class="mt-0 header-title">
                       Users Profile
                    </h4>
                    @if (session('message'))
                        <div class="alert alert-success m-4 text-center ml-3">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%"
                        style="display: block; width: 100%; overflow-x: auto;">
                        <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Date of Birth</th>
                                <th class="text-center">Tax Residence</th>
                                <th class="text-center">CountryResidence</th>
                                <th class="text-center">PrimaryCitizenship</th>
                                <th class="text-center">MAILINGADDRESS</th>
                                <th class="text-center">Addressline1</th>
                                <th class="text-center">Addressline2</th>
                                <th class="text-center">City / Town</th>
                                <th class="text-center">Zip / Postal code</th>
                                <th class="text-center">State / Province / Region</th>
                                <th class="text-center">Country</th>
                                <th class="text-center">Roles</th>
                                <th class="text-center">Passport</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($user)
                                @foreach ($user as $user)
                                    <tr>
                                        <td class="text-center">{{ $user->name }}</td>
                                        <td class="text-center">{{ $user->email }}</td>
                                        <td class="text-center">{{ $user->Phone }}</td>
                                        <td class="text-center">{{ $user->Title }}</td>
                                        <td class="text-center">{{ $user->DOB }}</td>
                                        <td class="text-center">{{ $user->TaxResidence }}</td>
                                        <td class="text-center">{{ $user->CountryResidence }}</td>
                                        <td class="text-center">{{ $user->PrimaryCitizenship }}</td>
                                        <td class="text-center">{{ $user->MAILINGADDRESS }}</td>
                                        <td class="text-center">{{ $user->Addressline1 }}</td>
                                        <td class="text-center">{{ $user->Addressline2 }}</td>
                                        <td class="text-center">{{ $user->City }}</td>
                                        <td class="text-center">{{ $user->Zip }}</td>
                                        <td class="text-center">{{ $user->State }}</td>
                                        <td class="text-center">{{ $user->Country }}</td>
                                        <td class="text-center">{{ $user->ROLES }}</td>
                                        <td class="text-center"> <a href="/images/{{ $user->Passport }}">View Image</a>
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
