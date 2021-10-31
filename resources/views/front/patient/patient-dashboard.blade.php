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
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">

                    <!-- Profile Sidebar -->
                    <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                        <div class="profile-sidebar">
                            <div class="widget-profile pro-widget-content">
                                <div class="profile-info-widget">
                                    <a href="#" class="booking-doc-img">
                                        <img src="assets/img/patients/patient.jpg" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h3>Richard Wilson</h3>
                                        <div class="patient-details">
                                            <h5><i class="fas fa-birthday-cake"></i> 24 Jul 1983, 38 years</h5>
                                            <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-widget">
                                <nav class="dashboard-menu">
                                    <ul>
                                        <li class="active">
                                            <a href="patient-dashboard.html">
                                                <i class="fas fa-columns"></i>
                                                <span>Dashboard</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="favourites.html">
                                                <i class="fas fa-bookmark"></i>
                                                <span>Favourites</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="dependent.html">
                                                <i class="fas fa-users"></i>
                                                <span>Dependent</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="chat.html">
                                                <i class="fas fa-comments"></i>
                                                <span>Message</span>
                                                <small class="unread-msg">23</small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="profile-settings.html">
                                                <i class="fas fa-user-cog"></i>
                                                <span>Profile Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="change-password.html">
                                                <i class="fas fa-lock"></i>
                                                <span>Change Password</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="home.html">
                                                <i class="fas fa-sign-out-alt"></i>
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>
                    <!-- / Profile Sidebar -->

                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <div class="card">
                            <div class="card-body pt-0">

                                <!-- Tab Menu -->
                                <nav class="user-tabs mb-4">
                                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#pat_prescriptions" data-toggle="tab">Prescriptions</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#pat_medical_records" data-toggle="tab"><span class="med-records">Medical Records</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#pat_billing" data-toggle="tab">Billing</a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- /Tab Menu -->

                                <!-- Tab Content -->
                                <div class="tab-content pt-0">

                                    <!-- Appointment Tab -->
                                    <div id="pat_appointments" class="tab-pane fade show active">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Doctor</th>
                                                                <th>Appt Date</th>
                                                                <th>Booking Date</th>
                                                                <th>Amount</th>
                                                                <th>Follow Up</th>
                                                                <th>Status</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($requests as $item)
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                                            <img class="avatar-img rounded-circle" src="{{asset($item->doctor->photo)}}" alt="User Image">
                                                                        </a>
                                                                        <a href="doctor-profile.html">Dr. {{$item->doctor->name}} <span>Dental</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>{{$item->created_at->format('Y-m-d')}} <span class="d-block text-info">{{$item->created_at->format('H:m')}}</span></td>
                                                                <td>{{$item->created_at->format('Y-m-d')}}</td>
                                                                <td>{{$item->doctor->doctorProfile->follow_up_fee}}</td>
                                                                <td>{{$item->updated_at->format('Y-m-d')}}</td>
                                                                @if ($item->status=='Accepted')
                                                                <td><span class="badge badge-pill bg-success-light">{{$item->status}}</span></td>
                                                                @elseif($item->status=='Pending')
                                                                <td><span class="badge badge-pill bg-warning-light">{{$item->status}}</span></td>
                                                                @else
                                                                <td><span class="badge badge-pill bg-danger-light">{{$item->status}}</span></td>

                                                                @endif
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                            <i class="fas fa-print"></i> Print
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Appointment Tab -->

                                    <!-- Prescription Tab -->
                                    <div class="tab-pane fade" id="pat_prescriptions">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Date </th>
                                                                <th>Name</th>
                                                                <th>Created by </th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>14 Nov 2019</td>
                                                                <td>Prescription 1</td>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                                            <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
                                                                        </a>
                                                                        <a href="doctor-profile.html">Dr. Ruby Perrin <span>Dental</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                            <i class="fas fa-print"></i> Print
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Prescription Tab -->

                                    <!-- Medical Records Tab -->
                                    <div id="pat_medical_records" class="tab-pane fade">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Date </th>
                                                                <th>Description</th>
                                                                <th>Attachment</th>
                                                                <th>Created</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><a href="javascript:void(0);">#MR-0010</a></td>
                                                                <td>14 Nov 2019</td>
                                                                <td>Dental Filling</td>
                                                                <td><a href="#">dental-test.pdf</a></td>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                                            <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
                                                                        </a>
                                                                        <a href="doctor-profile.html">Dr. Ruby Perrin <span>Dental</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                            <i class="fas fa-print"></i> Print
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Medical Records Tab -->

                                    <!-- Billing Tab -->
                                    <div id="pat_billing" class="tab-pane fade">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Invoice No</th>
                                                                <th>Doctor</th>
                                                                <th>Amount</th>
                                                                <th>Paid On</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <a href="invoice-view.html">#INV-0010</a>
                                                                </td>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                                            <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
                                                                        </a>
                                                                        <a href="doctor-profile.html">Ruby Perrin <span>Dental</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>$450</td>
                                                                <td>14 Nov 2019</td>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                                            <i class="fas fa-print"></i> Print
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Billing Tab -->

                                </div>
                                <!-- Tab Content -->

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /Page Content -->
@endsection
