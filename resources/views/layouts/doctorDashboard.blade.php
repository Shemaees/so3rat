<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@extends('layouts.app')
@section('content')
    <style>
        .select2>span{
            width: 100%;
        }
        span.select2.select2-container.select2-container--default.select2-container--focus.select2-container--below.select2-container--open , span.select2.select2-container.select2-container--default{
            width: 100% !important;
        }
        .fa-times{
            color:brown;
            font-size: 34px;
        }
        input#accept_promotions {
            width: 20px;
            height: 20px;
        }
        a.nav-link.nav-dropdown-toggle.active {
            background-color: #ebeaea;
        }
        .content {
            min-height: 200px;
            padding: 0px 0 0;
        }
    </style>
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('front/global.home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('front/global.Dashboard')}}</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">{{ (isset($page_title)) ? $page_title : __('front/global.Dashboard') }}</h2>
                </div>
            </div>
        </div>
    </div>
        <!-- /Breadcrumb -->

        @php
         $user = Auth::user();
        @endphp
        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid pr-0" >

                <div class="row">
                    <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                        <!-- Profile Sidebar -->
                        <div class="profile-sidebar">
                            <div class="widget-profile pro-widget-content">
                                <div class="profile-info-widget">
                                    <a href="#" class="booking-doc-img">
                                        <img src="{{ (@$user->photo) ? url(@$user->photo) : asset('assets/front/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h3>{{ $user->name }}</h3>

                                        <div class="patient-details">
                                            <h5 class="mb-0"> {{ (@$user->profile->about) ? @$user->profile->about : 'BDS, MDS - Oral & Maxillofacial Surgery' }} </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-widget">
                                <nav class="dashboard-menu">
                                    <ul>
                                        <li>
                                            <a href="{{route('doctor-dashboard')}}">
                                                <i class="fas fa-columns"></i>
                                                <span>{{ __('front/global.Dashboard')}}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="appointments.html">
                                                <i class="fas fa-calendar-check"></i>
                                                <span>{{ __('front/global.Appointments')}}</span>
                                            </a>
                                        </li>

                                        <li class="nav-item {{ request()->routeIs('doctor.trainingRequests.index') || isset($trainingRequests)  ? 'active' : '' }} ">
                                            <a class="nav-link  nav-dropdown-toggle  "
                                                href="{{ route('doctor.trainingRequests.index') }}">
                                                <i class="fa-fw fas fa-users nav-icon ml-2 mr-2"></i>
                                                {{ __('front/request.title') }}
                                            </a>
                                        </li>

                                        <li>
                                            <a href="my-patients.html">
                                                <i class="fas fa-user-injured"></i>
                                                <span>{{ __('front/global.MyPatients')}}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="schedule-timings.html">
                                                <i class="fas fa-hourglass-start"></i>
                                                <span>{{ __('front/global.ScheduleTimings')}}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="invoices.html">
                                                <i class="fas fa-file-invoice"></i>
                                                <span>{{ __('front/global.Invoices')}}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="reviews.html">
                                                <i class="fas fa-star"></i>
                                                <span>{{ __('front/global.Reviews')}}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="chat-doctor.html">
                                                <i class="fas fa-comments"></i>
                                                <span>{{ __('front/global.Messages')}}</span>
                                                <small class="unread-msg">23</small>
                                            </a>
                                        </li>
                                        <li class="{{ request()->routeIs('doctor-profile-settings') ? 'active' : '' }} ">
                                            <a href="{{route('doctor-profile-settings')}}">
                                                <i class="fas fa-user-cog"></i>
                                                <span>{{ __('front/global.ProfileSettings')}}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="social-media.html">
                                                <i class="fas fa-share-alt"></i>
                                                <span>{{ __('front/global.SocialMedia')}}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="doctor-change-password.html">
                                                <i class="fas fa-lock"></i>
                                                <span>{{ __('front/global.ChangePassword')}}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="home.html">
                                                <i class="fas fa-sign-out-alt"></i>
                                                <span>{{ __('front/global.Logout')}}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- /Profile Sidebar -->

                    </div>
                    <div class="col-md-7 col-lg-8 col-xl-9">
                       @yield('col-7')

                    </div>
                </div>

            </div>

        </div>
        <!-- /Page Content -->

    @endsection
