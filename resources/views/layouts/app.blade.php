<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="rtl">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="full-url" content="{{ URL('') }}">
        <meta name="language" content="{{ app()->getLocale() }}">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure</title>

        <!-- Favicons -->
        <link type="image/x-icon" href="{{asset('front/assets/img/favicon.png')}}" rel="icon">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('front/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/plugins/fontawesome/css/all.min.css')}}">
        @yield('style')

        <!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    </head>
    <body>
    <!-- Main Wrapper -->
        <div class="main-wrapper">

            @yield('content')

            @include('front.includes.footer')
        </div>
    <!--[if lt IE 9]>
        <script src="{{asset('front/assets/js/html5shiv.min.js')}}"></script>
        <script src="{{asset('front/assets/js/respond.min.js')}}"></script>
        <![endif]-->
    <!-- jQuery -->
    <script src="{{asset('front/assets/js/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{asset('front/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>

    <!-- Slick JS -->
    <script src="{{asset('front/assets/js/slick.js')}}"></script>

    @yield('scripts')

    <!-- Custom JS -->
    <script src="{{asset('front/assets/js/script.js')}}"></script>

    </body>
</html>
