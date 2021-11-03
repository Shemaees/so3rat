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

        .green {
            color: #1c937c;
            font-weight: bold;
        }

        .days-table {
            border: 1px solid #1c937c;
            border-radius: 5% !important;
        }

        .days-table td {
            padding: 2px;
        }

        .days-table thead tr th {
            background-color: #1c937c;
            color: white;
        }

        a.green-div {
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            background-color: #1c937c;
            color: white;
            padding: 2px;
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
                            <li class="breadcrumb-item active" aria-current="page"> {{ __('front/global.search') }} </li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title float-right pr-5">نتائج البحث</h2>
                </div>
                <div class="col-md-4 col-12 d-md-block d-none">
                    <div class="sort-by">
                        <span class="sort-title">Sort by</span>
                        <span class="sortby-fliter">
                            <select class=" form-control pt-0 pb-0 select2-selection__rendered">
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
                    @foreach ($doctors as $doctor)
                        @php
                            $profile = $doctor->profile;
                        @endphp
                        <div class="card search-d-card">
                            <div class="card-body" style=" padding-top:10px; overflow: hidden; ">

                                <div class="doctor-widget row w-100 p-1">

                                    <div class="doctor-img col-3">
                                        <a href="#">
                                            <img src="{{ asset($doctor->photo) }}" class="img-fluid"
                                                alt="User Image">
                                        </a>

                                        <h5 class="mt-4 text-bold green">
                                            {{ @$profile->country . ' - ' . @$profile->city }}</h5>

                                        <div class="rating"> <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">(4)</span>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-6 p-0 pl-1"><small>تعليقات 2347</small></div>
                                            <div class="col-md-6 p-0 pr-1"><small>اشتراكات 2245</small></div>
                                        </div>

                                    </div>


                                    <div class="col-5">
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <h3 class="doc-name float-right green"> <b> {{ $doctor->name }} </b></h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="doc-name float-right green"> المؤهل </h4>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <small class="float-right "> البكالريوس من جامعة
                                                    {{ @$profile->qualification ? @$profile->qualification : '.........' }}
                                                </small>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-12">
                                                <small class="float-right "> الماجستير من جامعة
                                                    {{ @$profile->specialty_certificate ? @$profile->specialty_certificate : '..........' }}
                                                </small>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <small class="float-right "> الدكتوراه من جامعة
                                                    {{ @$profile->university_qualification ? @$profile->university_qualification : '............' }}
                                                </small>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <h4 class="doc-name float-right green w-100 "> الإهتمامات </h4>
                                                @forelse ($doctor->interests->take(3) as $interrest)
                                                    <h5>{{ $interrest->name }}</h5>
                                                @empty
                                                    <h5 class="w-100">لا يوجد</h5>
                                                @endforelse
                                            </div>
                                        </div>

                                        <div class="row w-100">
                                            <div class="col-md-6">
                                                <span class="green">طريقة التواصل</span>
                                                <div class="social-icon ">
                                                    <ul class="pr-1" style="list-style: none;">
                                                        <li class="d-inline ">
                                                            <a href="#" target="_blank" class="green"><i
                                                                    class="fa fa-user"></i></a>
                                                        </li>

                                                        <li class="d-inline mr-3">
                                                            <a href="#" target="_blank" class="green"><i
                                                                    class="fa fa-users"></i> </a>
                                                        </li>

                                                        <li class="d-inline mr-3">
                                                            <a href="#" target="_blank" class="green"><i
                                                                    class="fa fa-users"></i> </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="green">قنوات التواصل</span>
                                                <div class="social-icon ">
                                                    <ul class="pr-1" style="list-style: none;">
                                                        <li class="d-inline ">
                                                            <a href="#" target="_blank" class="green"><i
                                                                    class="fab fa-instagram"></i></a>
                                                        </li>

                                                        <li class="d-inline mr-3">
                                                            <a href="#" target="_blank" class="green"><i
                                                                    class="fab fa-twitter"></i> </a>
                                                        </li>

                                                        <li class="d-inline mr-3">
                                                            <a href="#" target="_blank" class="green"><i
                                                                    class="fab fa-facebook-f"></i> </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-4 p-0">
                                        <table class="days-table w-100 text-center">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">أيام التواصل</th>
                                                    <th colspan="2">أوقات التواصل</th>
                                                </tr>
                                                <tr>
                                                    <th> من</th>
                                                    <th> إلي</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($doctor->communications as $communication)
                                                    <tr>
                                                        <td>{{ $communication->day }}</td>
                                                        <td>{{ $communication->start_at }}</td>
                                                        <td>{{ $communication->end_at }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <div class="row">
                                    <a class="apt-btn col-12 green-div "
                                        href="{{ route('booking', [$doctor->id]) }}">اشتراك</a>
                                </div>

                            </div>
                        </div>
                    @endforeach
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
