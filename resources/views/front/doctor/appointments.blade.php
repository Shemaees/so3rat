@extends('layouts.app')
@section('content')


    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Appointments</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Appointments</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Profile Sidebar -->
                    @include('front.includes.profile_sidebar')
                    <!-- /Profile Sidebar -->

                </div>

                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="appointments">
                        @foreach ($requests as $item)
                            <!-- Appointment List -->
                            <div class="appointment-list">
                                <div class="profile-info-widget">
                                    <a href="{{ route('patient-profile') }}" class="booking-doc-img">
                                        <img src="{{ asset(@$item->patient->photo) }}" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h3><a href="{{ route('patient-profile') }}">{{$item->patient->name}}</a></h3>
                                        <div class="patient-details">
                                            <h5><i class="far fa-clock"></i> {{$item->created_at}}</h5>
                                            <h5><i class="fas fa-map-marker-alt"></i> Newyork, United States</h5>
                                            <h5><i class="fas fa-envelope"></i> {{$item->patient->email}}</h5>
                                            <h5 class="mb-0"><i class="fas fa-phone"></i> {{$item->patient->phone}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="appointment-action">
                                    <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal"
                                        data-target="#appt_details">
                                        <i class="far fa-eye"></i> View
                                    </a>
                                    <a href="{{route('appointments-status',[$item->id,'Accepted'])}}" class="btn btn-sm bg-success-light">
                                        <i class="fas fa-check"></i> Accept
                                    </a>
                                    <a href="{{route('appointments-status',[$item->id,'Rejected'])}}" class="btn btn-sm bg-danger-light">
                                        <i class="fas fa-times"></i> Cancel
                                    </a>
                                </div>
                            </div>
                            <!-- /Appointment List -->
                        @endforeach


                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->

    <!-- Appointment Details Modal -->
    <div class="modal fade custom-modal" id="appt_details">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Appointment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="info-details">
                        <li>
                            <div class="details-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="title">#APT0001</span>
                                        <span class="text">21 Oct 2019 10:00 AM</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-right">
                                            <button type="button" class="btn bg-success-light btn-sm"
                                                id="topup_status">Completed</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <span class="title">Status:</span>
                            <span class="text">Completed</span>
                        </li>
                        <li>
                            <span class="title">Confirm Date:</span>
                            <span class="text">29 Jun 2019</span>
                        </li>
                        <li>
                            <span class="title">Paid Amount</span>
                            <span class="text">$450</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Appointment Details Modal -->

@endsection
