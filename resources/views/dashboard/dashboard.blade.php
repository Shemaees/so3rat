@extends('layouts.dashboard')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/css-rtl/core/colors/palette-gradient.css')}}">
@endsection
@section('content')

@endsection
@section('vendor')

    <script src="{{asset('assets/dashboard/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/vendors/js/charts/echarts/echarts.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/dashboard/vendors/js/extensions/datedropper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/vendors/js/extensions/timedropper.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/dashboard/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/js/scripts/pages/chat-application.js')}}" type="text/javascript"></script>
@endsection

@section('script')
    <script src="{{asset('assets/dashboard/js/scripts/extensions/date-time-dropper.js')}}" type="text/javascript"></script>
@endsection
