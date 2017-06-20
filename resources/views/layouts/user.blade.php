<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mcqhub</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Fira+Sans|Roboto:300,400|Questrial|Satisfy">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type='text/css'>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type='text/css'>
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type='text/css'>
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type='text/css'>

    @yield('moreStyle')


    <!-- Scripts -->
    <script>
        window.Mcqhub = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <!-- navigation -->
        @include('layouts.partials.nav')

        @yield('content')

        @include('layouts.partials.footer')
    </div>



    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('more')

</body>
</html>
