@extends('layouts.app')
@section('style')
    <!-- Select2 CSS -->
    {{-- <link rel="stylesheet" href="{{asset('assets/front/plugins/select2/css/select2.min.css')}}"> --}}
    <style>
        .doc-details {
            display: flex !important;
            flex-direction: column;
            align-items: flex-start;
        }

        .filter-widget {
            display: flex !important;
            flex-direction: column;
            align-items: flex-start;
        }

    </style>
@endsection
@section('content')

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('front/global.home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('front/global.search') }}</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title float-right pr-5">نتائج البحث</h2>
                </div>
                <div class="col-md-4 col-12 d-md-block d-none">
                    <div class="sort-by">
                        <span class="sort-title">Sort by</span>
                        <span class="sortby-fliter">
                            <select class="select2-selection__rendered">
                                <option>اختر</option>
                                <option class="sorting">الأكثر تقييما</option>
                                <option class="sorting">الأقل سعرا</option>
                                <option class="sorting">الأكثر سعرا</option>
                                <option class="sorting">الأكثر اشتراكا</option>
                                <option class="sorting">الأقل اشتراكا</option>
                            </select>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Search Filter -->
                    <div class="card search-filter">
                        <div class="card-header float-right">
                            <h4 class="card-title mb-0 float-right">{{ __('front/search.filter') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="filter-widget">
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" placeholder="Select Date">
                                </div>
                            </div>
                            <div class="filter-widget d-flex">
                                <h4>{{ __('front/global.gender') }}</h4>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="gender_type" checked>
                                        <span class="checkmark"></span> {{ __('front/global.male') }}
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="gender_type">
                                        <span class="checkmark"></span> {{ __('front/global.female') }}
                                    </label>
                                </div>
                            </div>
                            <div class="filter-widget">
                                <h4>{{ __('front/global.days') }}</h4>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist" checked>
                                        <span class="checkmark"></span> السبت
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist" checked>
                                        <span class="checkmark"></span> الأحد
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> الأثنين
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> الثلاثاء
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span>الأربعاء
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> الخميس
                                    </label>
                                </div>
                            </div>
                            <div class="btn-search">
                                <button type="button" class="btn btn-block">Search</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Search Filter -->

                </div>

                <div class="col-md-12 col-lg-8 col-xl-9">

                    <!-- Doctor Widget -->
                    <div class="card">
                        <div class="card-body">
                            @foreach ($doctors as $doctor)
                                <div class="doctor-widget">
                                    <div class="doctor-img col-3">
                                        <a href="#">
                                            <img src="{{ asset($doctor->photo) }}"
                                                class="img-fluid" alt="User Image">
                                        </a>
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-4">
                                                <h4 class="doc-name float-right">الأسم: {{$doctor->name}}</h4>
                                            </div>
                                            <div class="col-4">
                                                <h4 class="doc-name float-right">الدولة:{{$doctor->doctorProfile->country}}</h4>
                                            </div>
                                            <div class="col-4">
                                                <h4 class="doc-name float-right">المدينة:{{$doctor->doctorProfile->city}}</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <h4 class="doc-name float-right">رقم مقيم:{{$doctor->doctorProfile->medical_license_number}}</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-7 d-flex doc-details">
                                                <div class="d-flex">
                                                    <h4 class="doc-name float-right">المؤهل:</h4>
                                                    <p>Test data</p>
                                                </div>
                                                <div class="d-flex">
                                                    <h4 class="doc-name  float-right">البكاليوريوس:</h4>
                                                    <p>Test data</p>
                                                </div>
                                                <div class="d-flex">
                                                    <h4 class="doc-name  float-right">الماجيستير:</h4>
                                                    <p>Test data</p>
                                                </div>
                                                <div class="d-flex">
                                                    <h4 class="doc-name float-right">الدكتوراه:</h4>
                                                    <p>Test data</p>
                                                </div>
                                            </div>
                                            <div class="col-5 doc-details">
                                                <div class="d-flex">
                                                    <h4 class="doc-name float-right">طريقه التواصل:</h4>
                                                    <p>{{$doctor->doctorProfile->communication_way}}</p>
                                                </div>
                                                <div class="d-flex">
                                                    <h4 class="doc-name float-right">قنوات التواصل:</h4>
                                                    @foreach ($doctor->channels as $channel)
                                                    <p>{{$channel->channel_type}} {{$channel->link}}</p><br>
                                                    @endforeach

                                                </div>
                                                <div class="d-flex">
                                                    <h4 class="doc-name float-right">ايام التواصل:</h4>
                                                    @foreach ($doctor->communications->pluck('day') as $communication)
                                                    <p>{{$communication}}</p>
                                                    @endforeach
                                                </div>
                                                <div class="d-flex">
                                                    <h4 class="doc-name float-right">اوقات التواصل:</h4>
                                                    <p>Test data</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="float-right"> الاهتمامات</h4>
                                                @foreach ($doctor->interests as $interest)
                                                {{$interest->name}}
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="clinic-booking">

                                            <a class="view-pro-btn " href="{{ route('doctor-patient-profile',[$doctor->id]) }}">الملف
                                                الشخصي</a>
                                            <a class="apt-btn " href="{{ route('booking',[$doctor->id]) }}">اشتراك</a>
                                        </div>
                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- /Doctor Widget -->
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->

@endsection

@section('scripts')
    <!-- Sticky Sidebar JS -->
    <script src="{{ asset('assets/front/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset('assets/front/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

    <!-- Select2 JS -->
    {{-- <script src="{{asset('assets/front/plugins/select2/js/select2.min.js')}}"></script> --}}

    <!-- Datetimepicker JS -->
    <script src="{{ asset('assets/front/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- Fancybox JS -->
    <script src="{{ asset('assets/front/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
@endsection
