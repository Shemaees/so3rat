<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="full-url" content="{{ URL('') }}">
    <meta name="language" content="{{ app()->getLocale() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('assets/dashboard/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/dashboard/images/ico/favicon.ico')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/css-rtl/plugins/animate/animate.css')}}">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/css-rtl/vendors.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/dashboard/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/css-rtl/pages/chat-application.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/css-rtl/app.css')}}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/dashboard/css-rtl/core/menu/menu-types/vertical-menu.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/css-rtl/custom-rtl.css')}}">
@yield('style_vendor')
<!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/css-rtl/plugins/animate/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/css-rtl/style-rtl.css')}}">
    <!-- END Custom CSS-->
    @notify_css
    @yield('style')
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        a[disabled] {
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
            display: block !important;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            z-index: 148;
            content: ' ' !important;
            line-height: 0;
        }

        input.error, select.error, textarea.error {
            border-color: red !important;
        }

        label span.error {
            color: red;
            font-size: 12px;
        }

        .errorMessage {
            text-align: center;
            font-size: 15pt;
        }
        .navbar-semi-light .navbar-header2 , .header-navbar .navbar-wrapper{
            background: #249680 !important;
        }
        .navbar-semi-light .navbar-header {
            background: #24967c;
            color: white !important;
        }
        .navbar-semi-light .navbar-header ul li a h3 {
            background: #24967c;
            color: white !important;
            font-weight: bold !important;
        }
    </style>
</head>
<body
    class="vertical-layout vertical-menu 2-columns  @if(Request::is('dashboard/users/tickets/reply*')) chat-application @endif menu-expanded fixed-navbar"
    data-open="click" data-menu="vertical-menu" data-col="2-columns">
<!-- fixed-top-->
@include('dashboard.includes.header')

<!-- ////////////////////////////////////////////////////////////////////////////-->
@include('dashboard.includes.sidebar')

@yield('content')

<div id="notification"></div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

@include('dashboard.includes.footer')

@notify_js
@notify_render

<!-- BEGIN PAGE VENDOR JS-->

<script src="{{asset('assets/dashboard/vendors/js/vendors.min.js')}}" type="text/javascript"></script>

@yield('vendor')

<!-- END PAGE VENDOR JS-->

<!-- BEGIN MODERN JS-->
<script src="{{asset('assets/dashboard/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/dashboard/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/dashboard/js/scripts/customizer.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/dashboard/js/scripts/ui/ui.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->

<!-- BEGIN PAGE LEVEL JS-->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'LANGUAGE': $('meta[name="language"]').attr('content'),
            'TYPE': 'web',
        },
    });
    let dashboardRequest = window.dashboardRequest = {
        fullURL: $("meta[name='full-url']").attr('content'),
        URL: function (path = '/') {
            return this.fullURL + path
        },
        makeRequest(type, url, param, callback) {
            ajaxParameters = {};
            ajaxParameters.type = type;
            ajaxParameters.url = (url.indexOf(this.fullURL) == -1) ? this.URL(url) : url;
            if (typeof param != "function") {
                ajaxParameters.data = param;
            }
            ajaxParameters.success = function (msg) {
                (typeof param == "function") ? param(msg) : callback(msg)
            };
            $.ajax(ajaxParameters);
        },
        get: function (url, param, callback) {
            this.makeRequest('GET', url, param, callback);
        },
        post: function (url, param, callback) {
            param._token = $("meta[name='csrf-token']").attr('content');
            // var formData = new FormData(param);
            // var files = $('input[type="file"]');
            // $.each(files, function () {
            //     formData.append(this.name, this);
            // });
            this.makeRequest('POST', url, param, callback);
        },
        addCommas: function (nStr) {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        },
        stringLimit: function (string, limit = 90) {
            return string.substring(0, limit) + (string.length > limit ? '....' : '')
        },
        generatePaginationHtml: function (meta) {
            html = '';
            links = meta.links
            if (links.length > 3) {
                links.forEach(function (item) {
                    if (item.label == '&laquo; Previous') {
                        item.label = '&laquo;';
                        page = meta.current_page - 1
                    } else if (item.label == 'Next &raquo;') {
                        item.label = '&raquo;';
                        page = meta.current_page + 1
                    } else {
                        page = item.label
                    }
                    html += '<li class="page-item ' + (item.url == null ? 'disabled' : '') + ' ' + (item.active ? 'active' : '') + '"><a data-url="' + item.url + '" data-page="' + page + '" ' + (item.url == null ? 'disabled="disabled"' : '') + ' class="page-link" href="#">' + item.label + '</a></li>';
                })
            }

            return html;
        },
        getErrorMessageHtml(message) {
            if (typeof message == 'object') {
                let html = '<div class="alert alert-danger"><ul>';
                for (let key in message) {
                    html += '<li>' + message[key] + '</li>';
                }
                html += '</ul></div>';
                console.log(html)
                return html;
            }
            return '<div class="alert alert-danger">' + message + '</div>';
        },
        getSuccessMessageHtml(message) {
            if (typeof message == 'object') {
                let html = '<div class="alert alert-success"><ul>';
                for (let key in message) {
                    html += '<li>' + message[key] + '</li>';
                }
                html += '</ul></div>';
                return html;
            }
            return '<div class="alert alert-success">' + message + '</div>';
        },
    };
</script>
@yield('script')
<!-- E<script>ND PAGE LEVEL JS-->
</body>
</html>
