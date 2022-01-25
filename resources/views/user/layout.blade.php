<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>@yield('title')</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Mannatthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @include('user.layouts.heads')
    @yield('extra-heads')
</head>

<body class="fixed-left">

    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <div id="wrapper">

        @include('user.layouts.sidebar')

        <div class="content-page">

            <div class="content">

                @include('user.layouts.header')

                @yield('content')

            </div>
            @include('user.layouts.footer')

        </div>
    </div>


    @include('user.layouts.scripts')

    @yield('extra-scripts')

</body>

</html>
