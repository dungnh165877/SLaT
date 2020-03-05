<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/logo-icon.png">
    <title>SLaT - @yield('title')</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('layouts.header')
        <div class="app-main">
            @include('layouts.navLeft')
            <div class="app-main__outer">
                @section('content')
                    This is the master sidebar.
                @show
            </div>
        </div>
    </div>
{{--    <script type="text/javascript" src="lib/js/jquery.js"></script>--}}
{{--    <script type="text/javascript" src="lib/js/popper.min.js"></script>--}}
{{--    <script type="text/javascript" src="lib/js/bootstrap.min.js"></script>--}}
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>