<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,admin-scalable=0,minimal-ui">
    <title>@yield('title')</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Mannatthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @include('admin.layouts.heads')
    @yield('extra-heads')
</head>

<body class="fixed-left">

    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <div id="wrapper">

        @include('admin.layouts.sidebar')

        <div class="content-page">

            <div class="content">

                @include('admin.layouts.header')

                @yield('content')

            </div>
            @include('admin.layouts.footer')

        </div>
    </div>


    @include('admin.layouts.scripts')

    @yield('extra-scripts')

</body>

</html>
