@extends('layouts.app')
@section('content')


        <!-- Breadcrumb -->
        <div class="breadcrumb-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12 col-12">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="home.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Favourites</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Favourites</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @include('front.includes.profile_patient_sidebar')
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <div class="row row-grid">
                            @foreach ($doctors_favourites as $item)
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="profile-widget">
                                    <div class="doc-img">
                                        <a href="doctor-profile.html">
                                            <img class="img-fluid" alt="User Image" src="{{$item->photo}}">
                                        </a>
                                        <a href="javascript:void(0)" class="fav-btn">
                                            <i class="far fa-bookmark"></i>
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="{{route('doctor-patient-profile',[$item->id])}}">Dr.{{$item->name}}</a>
                                            <i class="fas fa-check-circle verified"></i>
                                        </h3>
                                        <p class="speciality">MDS - Periodontology and Oral Implantology, BDS</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <span class="d-inline-block average-rating">(17)</span>
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i> {{$item->doctorProfile->city}}, {{$item->doctorProfile->country}}
                                            </li>
                                            <li>
                                                <i class="far fa-clock"></i> Available on Fri, 22 Mar
                                            </li>
                                            <li>
                                                <i class="far fa-money-bill-alt"></i> {{$item->doctorProfile->follow_up_fee}} <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                                            </li>
                                        </ul>
                                        <div class="row row-sm">
                                            <div class="col-6">
                                                <a href="{{route('doctor-patient-profile',[$item->id])}}" class="btn view-btn">View Profile</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="{{route('booking',[$item->id])}}" class="btn book-btn">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach



                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Content -->

   @endsection
