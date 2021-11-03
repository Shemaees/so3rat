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
                                <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Profile Settings</h2>
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
                        <div class="card">
                            <div class="card-body">

                                <!-- Profile Settings Form -->
                                <form action="{{route('save_profile_setting')}}" method="POST">
                                    @csrf
                                    <div class="row form-row">
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <div class="change-avatar">
                                                    <div class="profile-img">
                                                        <img src="assets/img/patients/patient.jpg" alt="User Image">
                                                    </div>
                                                    <div class="upload-img">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                            <input type="file" class="upload">
                                                        </div>
                                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $name=explode(' ', $user->name);
                                            $patient_profile=$user->patientProfile;
                                            $blood_group=$patient_profile->blood_group;
                                        @endphp

                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" class="form-control" value="{{$name[0]}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" class="form-control" value="{{@$name[1]}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <div class="cal-icon">
                                                    <input type="date" name="birthdate" class="form-control datetimepicker" value="{{date('Y-m-d', strtotime($user->birthdate))}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Blood Group</label>
                                                <select class="form-control select" name="blood_group">
														<option @if($blood_group=='A-')selected @endif>A-</option>
														<option @if($blood_group=='A+')selected @endif>A+</option>
														<option @if($blood_group=='B-')selected @endif>B-</option>
														<option @if($blood_group=='B+')selected @endif>B+</option>
														<option @if($blood_group=='AB-')selected @endif>AB-</option>
														<option @if($blood_group=='AB+')selected @endif>AB+</option>
														<option @if($blood_group=='O-')selected @endif>O-</option>
														<option @if($blood_group=='O+')selected @endif>O+</option>
													</select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Email ID</label>
                                                <input type="email" name="email" class="form-control" value="{{$user->email}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input type="text" name="phone" value="{{$user->phone}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="address" class="form-control" value="{{$patient_profile->address}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" class="form-control" value="{{$patient_profile->city}}">
                                            </div>
                                        </div>
                                        {{-- <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" class="form-control" value="Newyork">
                                            </div>
                                        </div> --}}
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Zip Code</label>
                                                <input type="text" name="zip" class="form-control" value="{{$patient_profile->zip_code}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" name="country" class="form-control" value="{{$patient_profile->country}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                    </div>
                                </form>
                                <!-- /Profile Settings Form -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Content -->

     @endsection
