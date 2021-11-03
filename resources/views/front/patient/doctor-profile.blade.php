
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
        .aboutMe {
            margin-top: 12px;
            border: 1px solid #e0e1e0;
            background-color: #fafafa;
            min-height: 160px;
            border-radius: 6px;
            padding: 1%;
            box-shadow: 1px 1px 0  2px #FAFAFD;
        }
    </style>
@endsection
@section('content')
        <!-- Breadcrumb -->
        <div class="breadcrumb-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12 col-12">

                        <h2 class="breadcrumb-title">الملف التعريفي للطبيب</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Page Content -->
        <div class="content">
            <div class="container">

                <!-- Doctor Widget -->
                <div class="card">
                    <div class="card-body">

                            @php
                            $profile = $doctor->doctorProfile;
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


                    </div>
                </div>
                <!-- /Doctor Widget -->

                <!-- Doctor Details Tab -->
                <div class="card">
                    <div class="card-body pt-0">

                        <!-- Tab Menu -->
                        <nav class="user-tabs mb-4">
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#doc_overview" data-toggle="tab">نظرة عامة</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#doc_reviews" data-toggle="tab">التقييم</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#doc_business_hours" data-toggle="tab">آليات التواصل</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- /Tab Menu -->

                        <!-- Tab Content -->
                        <div class="tab-content pt-0">

                            <!-- Overview Content -->
                            <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <span class="green">نبذة عني <i class="fa fa-edit"></i></span>
                                        <div class="aboutMe">
                                            {{ @$doctor->profile->about }}
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <b class="green mt-3 mr-3">الشهادات العلمية</b>
                                <br>
                                <hr>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <small class="text-right " dir="rtl"> البكالريوس من جامعة
                                            {{ @$profile->qualification ? @$profile->qualification : '' }}
                                        </small>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12">
                                        <small class="float-right "> الماجستير من جامعة
                                            {{ @$profile->specialty_certificate ? @$profile->specialty_certificate : '' }}
                                        </small>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <small class="float-right "> الدكتوراه من جامعة
                                            {{ @$profile->university_qualification ? @$profile->university_qualification : '' }}
                                        </small>
                                    </div>
                                </div>


                                <hr>

                                <div class="row">
                                    <div class="col-12 text-right">
                                        <span class="green ">رقم رخصتي الطبية  </span>
                                        <br>
                                        {{ @$doctor->profile->medical_license_number }}

                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <span class="green">نبذة عن برنامج الرعاية التغذوية<i class="fa fa-edit"></i></span>
                                        <div class="aboutMe">
                                            ...
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /Overview Content -->

                            <!-- Locations Content -->
                            <div role="tabpanel" id="doc_locations" class="tab-pane fade">

                                <!-- Location List -->
                                <div class="location-list">
                                    <div class="row">

                                        <!-- Clinic Content -->
                                        <div class="col-md-6">
                                            <div class="clinic-content">
                                                <h4 class="clinic-name"><a href="#">Smile Cute Dental Care Center</a></h4>
                                                <p class="doc-speciality">MDS - Periodontology and Oral Implantology, BDS</p>
                                                <div class="rating">
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star"></i>
                                                    <span class="d-inline-block average-rating">(4)</span>
                                                </div>
                                                <div class="clinic-details mb-0">
                                                    <h5 class="clinic-direction"> <i class="fas fa-map-marker-alt"></i> 2286 Sundown Lane, Austin, Texas 78749, USA <br><a href="javascript:void(0);">Get Directions</a></h5>
                                                    <ul>
                                                        <li>
                                                            <a href="assets/img/features/feature-01.jpg" data-fancybox="gallery2">
                                                                <img src="assets/img/features/feature-01.jpg" alt="Feature Image">
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="assets/img/features/feature-02.jpg" data-fancybox="gallery2">
                                                                <img src="assets/img/features/feature-02.jpg" alt="Feature Image">
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="assets/img/features/feature-03.jpg" data-fancybox="gallery2">
                                                                <img src="assets/img/features/feature-03.jpg" alt="Feature Image">
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="assets/img/features/feature-04.jpg" data-fancybox="gallery2">
                                                                <img src="assets/img/features/feature-04.jpg" alt="Feature Image">
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Clinic Content -->

                                        <!-- Clinic Timing -->
                                        <div class="col-md-4">
                                            <div class="clinic-timing">
                                                <div>
                                                    <p class="timings-days">
                                                        <span> Mon - Sat </span>
                                                    </p>
                                                    <p class="timings-times">
                                                        <span>10:00 AM - 2:00 PM</span>
                                                        <span>4:00 PM - 9:00 PM</span>
                                                    </p>
                                                </div>
                                                <div>
                                                    <p class="timings-days">
                                                        <span>Sun</span>
                                                    </p>
                                                    <p class="timings-times">
                                                        <span>10:00 AM - 2:00 PM</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Clinic Timing -->

                                        <div class="col-md-2">
                                            <div class="consult-price">
                                                $250
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Location List -->

                                <!-- Location List -->
                                <div class="location-list">
                                    <div class="row">

                                        <!-- Clinic Content -->
                                        <div class="col-md-6">
                                            <div class="clinic-content">
                                                <h4 class="clinic-name"><a href="#">The Family Dentistry Clinic</a></h4>
                                                <p class="doc-speciality">MDS - Periodontology and Oral Implantology, BDS</p>
                                                <div class="rating">
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star"></i>
                                                    <span class="d-inline-block average-rating">(4)</span>
                                                </div>
                                                <div class="clinic-details mb-0">
                                                    <p class="clinic-direction"> <i class="fas fa-map-marker-alt"></i> 2883 University Street, Seattle, Texas Washington, 98155 <br><a href="javascript:void(0);">Get Directions</a></p>
                                                    <ul>
                                                        <li>
                                                            <a href="assets/img/features/feature-01.jpg" data-fancybox="gallery2">
                                                                <img src="assets/img/features/feature-01.jpg" alt="Feature Image">
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="assets/img/features/feature-02.jpg" data-fancybox="gallery2">
                                                                <img src="assets/img/features/feature-02.jpg" alt="Feature Image">
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="assets/img/features/feature-03.jpg" data-fancybox="gallery2">
                                                                <img src="assets/img/features/feature-03.jpg" alt="Feature Image">
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="assets/img/features/feature-04.jpg" data-fancybox="gallery2">
                                                                <img src="assets/img/features/feature-04.jpg" alt="Feature Image">
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- /Clinic Content -->

                                        <!-- Clinic Timing -->
                                        <div class="col-md-4">
                                            <div class="clinic-timing">
                                                <div>
                                                    <p class="timings-days">
                                                        <span> Tue - Fri </span>
                                                    </p>
                                                    <p class="timings-times">
                                                        <span>11:00 AM - 1:00 PM</span>
                                                        <span>6:00 PM - 11:00 PM</span>
                                                    </p>
                                                </div>
                                                <div>
                                                    <p class="timings-days">
                                                        <span>Sat - Sun</span>
                                                    </p>
                                                    <p class="timings-times">
                                                        <span>8:00 AM - 10:00 AM</span>
                                                        <span>3:00 PM - 7:00 PM</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Clinic Timing -->

                                        <div class="col-md-2">
                                            <div class="consult-price">
                                                $350
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Location List -->

                            </div>
                            <!-- /Locations Content -->

                            <!-- Reviews Content -->
                            <div role="tabpanel" id="doc_reviews" class="tab-pane fade">

                                <!-- Review Listing -->
                                <div class="col-12 text-center">
                                        جاري العمل عليها
                                    </div>
                                <!-- /Write Review -->

                            </div>
                            <!-- /Reviews Content -->

                            <!-- Business Hours Content -->
                            <div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">

                                        <!-- Business Hours Widget -->
                                        <div class="widget business-widget">
                                            <div class="widget-content text-center">

                                                    <div class="p-0">
                                                        <table class="days-table w-100 text-center" style="border-radius: 20px;">
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
                                                    {{-- <div class="listing-day current">
                                                        <div class="day">Today <span>5 Nov 2019</span></div>
                                                        <div class="time-items">
                                                            <span class="open-status"><span class="badge bg-success-light">Open Now</span></span>
                                                            <span class="time">07:00 AM - 09:00 PM</span>
                                                        </div>
                                                    </div>
                                                    <div class="listing-day">
                                                        <div class="day">Monday</div>
                                                        <div class="time-items">
                                                            <span class="time">07:00 AM - 09:00 PM</span>
                                                        </div>
                                                    </div>
                                                    <div class="listing-day">
                                                        <div class="day">Tuesday</div>
                                                        <div class="time-items">
                                                            <span class="time">07:00 AM - 09:00 PM</span>
                                                        </div>
                                                    </div>
                                                    <div class="listing-day">
                                                        <div class="day">Wednesday</div>
                                                        <div class="time-items">
                                                            <span class="time">07:00 AM - 09:00 PM</span>
                                                        </div>
                                                    </div>
                                                    <div class="listing-day">
                                                        <div class="day">Thursday</div>
                                                        <div class="time-items">
                                                            <span class="time">07:00 AM - 09:00 PM</span>
                                                        </div>
                                                    </div>
                                                    <div class="listing-day">
                                                        <div class="day">Friday</div>
                                                        <div class="time-items">
                                                            <span class="time">07:00 AM - 09:00 PM</span>
                                                        </div>
                                                    </div>
                                                    <div class="listing-day">
                                                        <div class="day">Saturday</div>
                                                        <div class="time-items">
                                                            <span class="time">07:00 AM - 09:00 PM</span>
                                                        </div>
                                                    </div>
                                                    <div class="listing-day closed">
                                                        <div class="day">Sunday</div>
                                                        <div class="time-items">
                                                            <span class="time"><span class="badge bg-danger-light">Closed</span></span>
                                                        </div>
                                                    </div> --}}

                                            </div>
                                        </div>
                                        <!-- /Business Hours Widget -->

                                    </div>
                                </div>
                            </div>
                            <!-- /Business Hours Content -->

                        </div>
                    </div>
                </div>
                <!-- /Doctor Details Tab -->

            </div>
        </div>
        <!-- /Page Content -->


    <!-- Voice Call Modal -->
    <div class="modal fade call-modal" id="voice_call">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Outgoing Call -->
                    <div class="call-box incoming-box">
                        <div class="call-wrapper">
                            <div class="call-inner">
                                <div class="call-user">
                                    <img alt="User Image" src="assets/img/doctors/doctor-thumb-02.jpg" class="call-avatar">
                                    <h4>Dr. Darren Elder</h4>
                                    <span>Connecting...</span>
                                </div>
                                <div class="call-items">
                                    <a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
                                    <a href="voice-call.html" class="btn call-item call-start"><i class="material-icons">call</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Outgoing Call -->

                </div>
            </div>
        </div>
    </div>
    <!-- /Voice Call Modal -->

    <!-- Video Call Modal -->
    <div class="modal fade call-modal" id="video_call">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <!-- Incoming Call -->
                    <div class="call-box incoming-box">
                        <div class="call-wrapper">
                            <div class="call-inner">
                                <div class="call-user">
                                    <img class="call-avatar" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                                    <h4>Dr. Darren Elder</h4>
                                    <span>Calling ...</span>
                                </div>
                                <div class="call-items">
                                    <a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
                                    <a href="video-call.html" class="btn call-item call-start"><i class="material-icons">videocam</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Incoming Call -->

                </div>
            </div>
        </div>
    </div>
    <!-- Video Call Modal -->

   @endsection
