<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="full-url" content="{{ URL('') }}">
    <meta name="language" content="{{ app()->getLocale() }}">
    <title>Doccure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <!-- Favicons -->
    <link type="image/x-icon" href="{{asset('assets/front/img/favicon.png')}}" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/plugins/fontawesome/css/all.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/plugins/intlTelInput/css/intlTelInput.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/plugins/intlTelInput/css/isValidNumber.css') }}">
    @yield('styles')
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
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
        form {
            margin-top: 2em;
            border: 1px solid #249680;
            padding: 1em;
            text-align: right;
        }

    </style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="{{asset('assets/front/js/html5shiv.min.js')}}"></script>
        <script src="{{asset('assets/front/js/respond.min.js')}}"></script>
        <![endif]-->
</head>

<body class="account-page" >

<!-- Main Wrapper -->
<div class="main-wrapper">
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid" >
            <div class="row">
                <div class="col-md-12 offset-md-2">
                    <!-- Login Tab Content -->
                    @yield('content')
                    <!-- /Login Tab Content -->
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/front/js/jquery.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('assets/front/js/popper.min.js')}}"></script>
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>

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
