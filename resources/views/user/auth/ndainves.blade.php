@extends('user.layout')
@section('title')
Non Disclosure Agreement
@endsection

@section('extra-heads')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 offset-lg-3 offset-md-3" style="margin-top: 50px">
        <div class="card m-b-30">
            <div class="card-body">
                <form action="{{ route('post.nda.investor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h5 class="header-title mt-0" style="font-size: 25px; text-align:center;">Non Disclosure Agreement</h5>
                    <div class="form-group row">
                        <div class="col-12">
                            <p style="text-align:center;">Here it is the non disclosure agreement. Click on this link to get Non Disclosure Agreement(NDA). <a href="{{ asset('non-disclosure-agreement.pdf') }}" download="{{ asset('non-disclosure-agreement.pdf') }}">Click here</a> Read all the form clearly before sign on the papers. After sign upload your scanned file here. </p>
                            <label for="">Non Disclosure Agreement</label>
                            <input type="file" class="form-control" name="nda_inves" >
                            <input type="text" hidden class="form-control" name="inves_user_id" value="{{ $id }}" placeholder="Enter Opportunity Brief">
                            @if ($errors->has('nda_inves'))
                            <span class="text-danger">{{ $errors->first('nda') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <button class="btn btn-success" type="submit"> Submit</button>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <div class="col-12">
                            <a href="/stripe-payment" class="btn btn-success">Make a Payment</a>
                        </div>
                    </div> --}}

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
    @if(Session::has('message'))
    toastr.options = {
        "closeButton": true
        , "progressBar": true
    }
    toastr.success("{{ session('message') }}");
    @endif

</script>
@endsection
