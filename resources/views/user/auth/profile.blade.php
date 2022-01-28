@extends('user.layout')
@section('content')
@section('title')
User Profile
@endsection

@section('extra-heads')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
    alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

@endsection
<style>

.section {
    padding: 100px 0;
    position: relative;
}
.gray-bg {
    background-color: #f5f5f5;
}
img {
    max-width: 100%;
}
img {
    vertical-align: middle;
    border-style: none;
}
/* About Me
---------------------*/
.about-text h3 {
  font-size: 45px;
  font-weight: 700;
  margin: 0 0 6px;
}
@media (max-width: 767px) {
  .about-text h3 {
    font-size: 35px;
  }
}
.about-text h6 {
  font-weight: 600;
  margin-bottom: 15px;
}
@media (max-width: 767px) {
  .about-text h6 {
    font-size: 18px;
  }
}
.about-text p {
  font-size: 18px;
  max-width: 450px;
}
.about-text p mark {
  font-weight: 600;
  color: #20247b;
}

.about-list {
  padding-top: 10px;
}
.about-list .media {
  padding: 5px 0;
}
.about-list label {
  color: #20247b;
  font-weight: 600;
  width: 88px;
  margin: 0;
  position: relative;
}
.about-list label:after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  right: 11px;
  width: 1px;
  height: 12px;
  background: #20247b;
  -moz-transform: rotate(15deg);
  -o-transform: rotate(15deg);
  -ms-transform: rotate(15deg);
  -webkit-transform: rotate(15deg);
  transform: rotate(15deg);
  margin: auto;
  opacity: 0.5;
}
.about-list p {
  margin: 0;
  font-size: 15px;
}

@media (max-width: 991px) {
  .about-avatar {
    margin-top: 30px;
  }
}

.about-section .counter {
  padding: 22px 20px;
  background: #ffffff;
  border-radius: 10px;
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
}
.about-section .counter .count-data {
  margin-top: 10px;
  margin-bottom: 10px;
}
.about-section .counter .count {
  font-weight: 700;
  color: #20247b;
  margin: 0 0 5px;
}
.about-section .counter p {
  font-weight: 600;
  margin: 0;
}
mark {
    background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
    background-size: 100% 3px;
    background-repeat: no-repeat;
    background-position: 0 bottom;
    background-color: transparent;
    padding: 0;
    color: currentColor;
}
.theme-color {
    color: #fc5356;
}
.dark-color {
    color: #20247b;
}

</style>
<section class="section about-section gray-bg" id="about">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">

            <div class="col-12">
                <div class="about-avatar">
                   <p style="text-align: center"> <img src="https://zrsgaming.eu/zrs.png" height="300px" title="" alt=""></p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="about-text go-to">
                    <h3 class="dark-color">{{ Auth::guard('web')->user()->name ?? 'No Data' }}</h3>
                    <h6 class="theme-color lead"> {{ Auth::guard('web')->user()->email ?? 'No Data' }}</h6>
                    <p><mark>Role as a {{ Auth::guard('web')->user()->ROLES ?? 'No Data' }}</mark></p>
                </div>
            </div>
        </div>
        <div class="counter">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="500" data-speed="500">Phone</h6>
                        <p class="m-0px font-w-600">{{ Auth::guard('web')->user()->Phone ?? 'No Data' }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="150" data-speed="150">Title</h6>
                        <p class="m-0px font-w-600">{{ Auth::guard('web')->user()->Phone ?? 'No Data' }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="850" data-speed="850">Date of Birth</h6>
                        <p class="m-0px font-w-600">{{ Auth::guard('web')->user()->DOB ?? 'No Data' }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="190" data-speed="190">Tax Residence</h6>
                        <p class="m-0px font-w-600">{{ Auth::guard('web')->user()->TaxResidence ?? 'No Data' }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="190" data-speed="190">Country of Residence</h6>
                        <p class="m-0px font-w-600">{{ Auth::guard('web')->user()->CountryResidence ?? 'No Data' }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="190" data-speed="190">Primary Citizenship</h6>
                        <p class="m-0px font-w-600">{{ Auth::guard('web')->user()->PrimaryCitizenship ?? 'No Data' }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="190" data-speed="190">Mailing Address</h6>
                        <p class="m-0px font-w-600">{{ Auth::guard('web')->user()->MAILINGADDRESS ?? 'No Data' }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="190" data-speed="190">Address line 1</h6>
                        <p class="m-0px font-w-600">{{ Auth::guard('web')->user()->Addressline1 ?? 'No Data' }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="190" data-speed="190">Address line 2</h6>
                        <p class="m-0px font-w-600">{{ Auth::guard('web')->user()->Addressline2 ?? 'No Data' }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="190" data-speed="190">Zip</h6>
                        <p class="m-0px font-w-600">{{ Auth::guard('web')->user()->Zip ?? 'No Data' }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="190" data-speed="190">State</h6>
                        <p class="m-0px font-w-600">{{ Auth::guard('web')->user()->State ?? 'No Data' }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="190" data-speed="190">Country</h6>
                        <p class="m-0px font-w-600">{{ Auth::guard('web')->user()->Country ?? 'No Data' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('extra-scripts')
<script>
  @if (Session::has('error'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.error("{{ session('error') }}");
    @endif

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
