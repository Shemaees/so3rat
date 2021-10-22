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
        <link type="image/x-icon" href="{{asset('assets/front/img/favicon.png')}}" rel="icon">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('assets/front/plugins/fontawesome/css/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/front/plugins/fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/plugins/intlTelInput/css/intlTelInput.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/plugins/intlTelInput/css/isValidNumber.css') }}">

    <!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <style>
            a[disabled]{
                cursor: no-drop;
            }
            .loading::after {
                position: absolute;
                background: center 1.7857142857rem no-repeat rgba(255, 255, 255, .5);
                background-image: url(https://cf2.s3.souqcdn.com/public/style/img/loading.gif);
                background-repeat: no-repeat;
                background-position: center center;
                background-color: rgba(250, 250, 250, .8);
                background-size: 1.7857142857rem auto;
            }
            .loading::after {
                display: block!important;
                width: 100%;
                height: 100%;
                left: 0;
                top: 0;
                z-index: 148;
                content: ' '!important;
                line-height: 0;
            }
            input.error,select.error,textarea.error{
                border-color:red!important;
            }
            label span.error{
                color:red;
                font-size: 12px;
            }
            .errorMessage {
                text-align: center;
                font-size: 15pt;
            }
        </style>
        @yield('style')
    </head>
    <body>
    <!-- Main Wrapper -->
        <div class="main-wrapper">
            
            @include('front.includes.header')

            @yield('content')

            @include('front.includes.footer')
        </div>
    <!--[if lt IE 9]>
        <script src="{{asset('assets/front/js/html5shiv.min.js')}}"></script>
        <script src="{{asset('assets/front/js/respond.min.js')}}"></script>
        <![endif]-->
    <!-- jQuery -->
    <script src="{{asset('assets/front/js/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{asset('assets/front/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-ar_AR.min.js"></script>

    <!-- Slick JS -->
    <script src="{{asset('assets/front/js/slick.js')}}"></script>

    <script src="{{asset('assets/front/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
    <script src="{{asset('assets/front/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>

    <script src="{{ asset('assets/front/plugins/intlTelInput/js/intlTelInput.js') }}"></script>
    <script src="{{ asset('assets/front/plugins/intlTelInput/js/intlTelInput-jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" ></script>

    <script src="{{ asset('assets/front/js/ajax.js') }}"></script>
    <script src="{{ asset('assets/front/plugins/intlTelInput/js/phone.js') }}"></script>
    @yield('scripts')

    <!-- Custom JS -->
    <script src="{{asset('assets/front/js/script.js')}}"></script>
    </body>
</html>
