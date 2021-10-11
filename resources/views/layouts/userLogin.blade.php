<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>Doccure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Favicons -->
    <link type="image/x-icon" href="{{asset('front/assets/img/favicon.png')}}" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/plugins/fontawesome/css/all.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="{{asset('front/assets/js/html5shiv.min.js')}}"></script>
        <script src="{{asset('front/assets/js/respond.min.js')}}"></script>
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
<script src="{{asset('front/assets/js/jquery.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('front/assets/js/popper.min.js')}}"></script>
<script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('front/assets/js/script.js')}}"></script>


</body>

</html>
