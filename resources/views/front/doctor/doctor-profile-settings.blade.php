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
    </style>
        <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                                        <li class="active">
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
                        <form action="{{ route('doctor-profile-update') }}" method="post" method="post"  enctype="multipart/form-data" role="form"  >
                            {{ csrf_field() }}
                            <!-- Basic Information -->
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Basic Information</h4>
                                    <div class="row form-row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="change-avatar">
                                                    <div class="profile-img">
                                                        <img src="{{ (@$user->photo) ? url(@$user->photo) : asset('assets/front/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image" id="profileImg_1" onclick="uploade(1)" >
                                                    </div>
                                                    <div class="upload-img mr-5">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                            <input type="file" class="upload" name="photo" id="file_1" onchange="imageUploaded(this , 1)" >
                                                        </div>
                                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" readonly value="{{ $user->name }}" name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" readonly  value="{{ $user->email }}" name="email">
                                            </div>
                                        </div>
                                    

                                        <div class="col-md-6">
                                            <label for="error-password_confirmation"></label>
                                            <div class="form-group form-focus">
                                                <input  name="phone" id="phone" type="tel" value="{{ $user->phone }}" required
                                                        autocomplete="phone" autofocus class="form-control floating @error('phone') error @enderror">
                                                <label for="phone" class="focus-label">?????? ????????????????</label>
                                                <span id="valid-msg" class="hide">??? Valid</span>
                                                <span id="error-msg" class="hide"></span>
                                            </div>
                                            @error('phone')
                                                <span class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="error-phone"></label>
                                            <div class="errorMessage"></div>
                                        </div>
                                            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control select" name="gender">
                                                    <option disabled>Select</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label>Country</label>
                                                <input type="text" class="form-control text-right" value="{{ @$user->profile->country }}" name="country" placeholder="Country" >
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label>City</label>
                                                <input type="text" class="form-control text-right" value="{{ @$user->profile->city }}" name="city" placeholder="City" >
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label>Date of Birth</label>
                                                <input type="date" class="form-control text-right" value="{{ date_create($user->birthdate)->format('Y-m-d') }}" name="birthdate">
                                            </div>
                                        </div>
                                            @php
                                                $doctor_type = @$user->profile->doctor_type;
                                            @endphp

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Type of service provided</label>
                                                <select class="form-control select" name="doctor_type" onchange="changeDocType(this.value)">
                                                    <option disabled>Select</option>
                                                    <option value="Trainee"  {{ ($doctor_type == 'Trainee') ? 'selected' : '' }} >Trainee</option>
                                                    <option value="Trainer" {{ ($doctor_type == 'Trainer') ? 'selected' : '' }} >Trainer</option>
                                                    <option value="Follow up of patients" {{ ($doctor_type == 'Follow up of patients') ? 'selected' : '' }} >Follow up</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div id="Doctor-div" style="{{($doctor_type != 'Follow up of patients') ? 'display:none;' : '' }} ">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"  value="{{ @$user->profile->qualification }}" name="qualification" id="qualification" placeholder="Qualification">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Specialization <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" value="{{ @$user->profile->specialty_certificate }}" name="specialty_certificate" id="specialty_certificate" placeholder="specialty_certificate">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Scientific facility <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"  value="{{ @$user->profile->university }}" name="university" id="university" placeholder="university"  >
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div id="Doctor-div-2" style="{{($doctor_type != 'Follow up of patients') ? 'display:none;' : '' }} ">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>communication method</label>
                                                    <select class="form-control select" name="communication_way">
                                                        <option >Select</option>
                                                        <option value="Private"  {{ (@$user->profile->communication_way == 'Private') ? 'selected' : '' }} >Private</option>
                                                        <option value="Group"  {{ (@$user->profile->communication_way == 'Group') ? 'selected' : '' }} >Group</option>
                                                        <option value="Both"  {{ (@$user->profile->communication_way == 'Both') ? 'selected' : '' }} >Both</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="follow_up_fee">Monthly Service Fee</label>
                                                    <input type="number" class="form-control" placeholder="Monthly Service Fee" step="0.01" name="follow_up_fee" id="follow_up_fee" value="{{ @$user->profile->follow_up_fee }}"  {{ ( $doctor_type == 'Follow up of patients') ? 'required' : '' }}  >
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="accept_promotions"><h3>Do you accept a discount code</h3></label>
                                                    <input type="checkbox" class="" name="accept_promotions" id="accept_promotions"  >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" id="training_fee-div"  style="{{($doctor_type == 'Trainee') ? 'display:none;' : '' }} ">
                                            <div class="form-group">
                                                <label for="training_fee">Training Fee</label>
                                                <input type="number" class="form-control" placeholder="Training Fee" step="0.01" name="training_fee" id="training_fee" value="{{ @$user->profile->training_fee }}"  {{ ( $doctor_type != 'Trainee') ? 'required' : '' }} >
                                            </div>
                                        </div>

                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- /Basic Information -->

                            <div class="card" id="trainer-div" style="{{($doctor_type != 'Trainer' && $doctor_type != 'Follow up of patients') ? 'display:none;' : '' }} ">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- About Me -->
                                            <div class="form-group mb-0">
                                                <label>About Me</label>
                                                <textarea class="form-control" rows="5" name="about" id="about" >{{ @$user->profile->about }}</textarea>
                                            </div>
                                            <!-- /About Me -->
                                        </div>
                                        
                                        @php
                                        $interrests = $user->interests->pluck('name')->toArray();
                                        @endphp
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Interests</label>
                                                <select class="form-control select2" name="interests[]" id="interests" multiple>
                                                    <option disabled>Select</option>
                                                    
                                                    <option {{ (in_array('?????????????? ??????????????????' , $interrests) ? 'selected' : '' ) }} value="?????????????? ?????????????????? "> ?????????????? ??????????????????  </option>
                                                    <option {{ (in_array('?????????????? ????????????????' , $interrests) ? 'selected' : '' ) }} value="?????????????? ????????????????"> ?????????????? ???????????????? </option>
                                                    <option {{ (in_array('?????????? ?????????????? ??????????????' , $interrests) ? 'selected' : '' ) }} value="?????????? ?????????????? ??????????????"> ?????????? ?????????????? ?????????????? </option>
                                                    <option {{ (in_array('?????????????? ??????????????????????' , $interrests) ? 'selected' : '' ) }} value="?????????????? ??????????????????????"> ?????????????? ?????????????????????? </option>
                                                    <option {{ (in_array('???????? ?????????? ' , $interrests) ? 'selected' : '' ) }} value="???????? ?????????? "> ???????? ??????????  </option>
                                                    <option {{ (in_array('?????????? ?????????? ' , $interrests) ? 'selected' : '' ) }} value="?????????? ?????????? "> ?????????? ??????????  </option>
                                                    <option {{ (in_array('???????? ?????????? ' , $interrests) ? 'selected' : '' ) }} value="???????? ?????????? "> ???????? ??????????  </option>
                                                    <option {{ (in_array('???????? ???????????? ' , $interrests) ? 'selected' : '' ) }} value="???????? ???????????? "> ???????? ????????????  </option>
                                                    <option {{ (in_array('?????????? ????????????' , $interrests) ? 'selected' : '' ) }} value="?????????? ????????????"> ?????????? ???????????? </option>
                                                    <option {{ (in_array('???????? ????????????' , $interrests) ? 'selected' : '' ) }} value="???????? ????????????"> ???????? ???????????? </option>
                                                    <option {{ (in_array('?????????? ???????????????? ' , $interrests) ? 'selected' : '' ) }} value="?????????? ???????????????? "> ?????????? ????????????????  </option>
                                                    <option {{ (in_array('?????????? ??????????????' , $interrests) ? 'selected' : '' ) }} value="?????????? ??????????????"> ?????????? ?????????????? </option>
                                                    <option {{ (in_array('?????????? ????????????????' , $interrests) ? 'selected' : '' ) }} value="?????????? ????????????????"> ?????????? ???????????????? </option>
                                                    <option {{ (in_array('?????????? ?????????????? ' , $interrests) ? 'selected' : '' ) }} value="?????????? ?????????????? "> ?????????? ??????????????  </option>
                                                    <option {{ (in_array('?????????? ' , $interrests) ? 'selected' : '' ) }} value="?????????? "> ??????????  </option>
                                                    <option {{ (in_array('?????????? ???????? ' , $interrests) ? 'selected' : '' ) }} value="?????????? ???????? "> ?????????? ????????  </option>
                                                    <option {{ (in_array('?????????? ??????????????' , $interrests) ? 'selected' : '' ) }} value="?????????? ??????????????"> ?????????? ?????????????? </option>
                                                    <option {{ (in_array('???????????????? ' , $interrests) ? 'selected' : '' ) }} value="???????????????? "> ????????????????  </option>
                                                    <option {{ (in_array('?????????? ??????????' , $interrests) ? 'selected' : '' ) }} value="?????????? ??????????"> ?????????? ?????????? </option>
                                                    <option {{ (in_array('?????????????? ???? ?????????? ??????????????' , $interrests) ? 'selected' : '' ) }} value="?????????????? ???? ?????????? ??????????????"> ?????????????? ???? ?????????? ?????????????? </option>
                                                    <option {{ (in_array('?????????????? ???? ?????????????? ??????????????' , $interrests) ? 'selected' : '' ) }} value="?????????????? ???? ?????????????? ??????????????"> ?????????????? ???? ?????????????? ?????????????? </option>
                                                    <option {{ (in_array('?????????? ???????????? ???????????? ?????? (???????????? ????????????)' , $interrests) ? 'selected' : '' ) }} value="?????????? ???????????? ???????????? ?????? (???????????? ????????????)"> ?????????? ???????????? ???????????? ?????? (???????????? ????????????) </option>
                                                    <option {{ (in_array('?????????????? ???? ?????????????? ?????????????? ?????? ???????????????? ,,,' , $interrests) ? 'selected' : '' ) }} value="?????????????? ???? ?????????????? ?????????????? ?????? ???????????????? ,,,"> ?????????????? ???? ?????????????? ?????????????? ?????? ???????????????? ,,, </option>
                                                    <option {{ (in_array('?????????????? ???? ?????????? ?????????????? ' , $interrests) ? 'selected' : '' ) }} value="?????????????? ???? ?????????? ?????????????? "> ?????????????? ???? ?????????? ??????????????  </option>
                                                    <option {{ (in_array('?????????????? ???? ?????????? ???????????????? ' , $interrests) ? 'selected' : '' ) }} value="?????????????? ???? ?????????? ???????????????? "> ?????????????? ???? ?????????? ????????????????  </option>
                                                    <option {{ (in_array('?????? ???????? ???????????????? ' , $interrests) ? 'selected' : '' ) }} value="?????? ???????? ???????????????? "> ?????? ???????? ????????????????  </option>
                                                    <option {{ (in_array('?????????? ???????????????? ' , $interrests) ? 'selected' : '' ) }} value="?????????? ???????????????? "> ?????????? ????????????????  </option>
                                                    <option {{ (in_array('???????????? ???????????? ??????????????????' , $interrests) ? 'selected' : '' ) }} value="???????????? ???????????? ??????????????????"> ???????????? ???????????? ?????????????????? </option>
                                                    <option {{ (in_array('?????????? ?????????????? ????????????' , $interrests) ? 'selected' : '' ) }} value="?????????? ?????????????? ????????????"> ?????????? ?????????????? ???????????? </option>
                                                    <option {{ (in_array('?????????? ?????????????? ???????????? ??????????????' , $interrests) ? 'selected' : '' ) }} value="?????????? ?????????????? ???????????? ??????????????"> ?????????? ?????????????? ???????????? ?????????????? </option>
                                                    <option {{ (in_array('?????????? ?????????????? ???????????? ??????????' , $interrests) ? 'selected' : '' ) }} value="?????????? ?????????????? ???????????? ??????????"> ?????????? ?????????????? ???????????? ?????????? </option>
                                                    <option {{ (in_array('?????????????? ???? ?????????? ????????????' , $interrests) ? 'selected' : '' ) }} value="?????????????? ???? ?????????? ????????????"> ?????????????? ???? ?????????? ???????????? </option>
            
                                                </select>
                                            </div>
                                        </div>
            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Medical License Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" required value="{{ @$user->profile->medical_license_number }}" name="medical_license_number" id="medical_license_number" placeholder="universityMedical License Number"  >
                                            </div>
                                        </div>
            
                                        
                                        <div class="col-12 mb-3">
                                            <div class="form-group mb-0">
                                                <label>Training Program</label>
                                                <textarea class="form-control" rows="5" name="training_program" id="training_program" placeholder="???????? ???? ???????????? ????????????" >{{ @$user->profile->training_program }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- communication-channels-div -->
                            <div class="card" id="communication-channels-div" style="{{($doctor_type != 'Follow up of patients') ? 'display:none;' : '' }} ">
                                <div class="card-body">
                                    <h4 class="card-title">Communication channels</h4>

                                        @php
                                        $channels = ($user->channels && count($user->channels)) ? $user->channels : [] ;
                                        $communications = ($user->communications && count($user->communications)) ? $user->communications : [] ;
                                        @endphp
                                        @foreach ($channels as $channel)
                                        <div class="row form-row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Channel</label>
                                                    <select class="form-control select" name="channel_type[]">
                                                        <option disabled selected>Select</option>
                                                        <option value="Whatsapp" {{ ($channel->channel_type == 'Whatsapp') ? 'selected' : '' }} >????????????</option>
                                                        <option value="Telegram" {{ ($channel->channel_type == 'Telegram') ? 'selected' : '' }} >??????????????</option>
                                                        <option value="Facebook" {{ ($channel->channel_type == 'Facebook') ? 'selected' : '' }} >????????????</option>
                                                        <option value="Emo"      {{ ($channel->channel_type == 'Emo')      ? 'selected' : '' }} >??????????</option>
                                                        <option value="Line"     {{ ($channel->channel_type == 'Line')     ? 'selected' : '' }} >??????????</option>
                                                        <option value="Skype"    {{ ($channel->channel_type == 'Skype')    ? 'selected' : '' }} >??????????????</option>
                                                        <option value="WeChat"   {{ ($channel->channel_type == 'WeChat')   ? 'selected' : '' }} >WeChat</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Link</label>
                                                    <input type="text" value="{{ $channel->link }}" class="form-control" name="link[]" placeholder="Link Address">
                                                </div>
                                            </div>

                                            <div class="col-md-1 pt-4 text-center">
                                                <a href="javascript:void(0);" onclick="this.parentElement.parentElement.remove()" class="del-channel"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                        @endforeach
                                    <div id="channels-rows">
                                        <div class="row form-row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Channel</label>
                                                    <select class="form-control select" name="channel_type[]">
                                                        <option disabled selected>Select</option>
                                                        <option value="Whatsapp" >????????????</option>
                                                        <option value="Telegram" >??????????????</option>
                                                        <option value="Facebook" >????????????</option>
                                                        <option value="Emo" >??????????</option>
                                                        <option value="Line" >??????????</option>
                                                        <option value="Skype" >??????????????</option>
                                                        <option value="WeChat" >WeChat</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Link</label>
                                                    <input type="text" class="form-control" name="link[]" placeholder="Link Address">
                                                </div>
                                            </div>

                                            <div class="col-md-1 pt-4 text-center">
                                                <a href="javascript:void(0);" onclick="this.parentElement.parentElement.remove()" class="del-channel"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="add-more">
                                            <a href="javascript:void(0);" class="add-channel"><i class="fa fa-plus-circle"></i> Add More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /communication-channels-div -->

                            <!-- communication-times-div -->
                            <div class="card contact-card" id="communication-times-div" style="{{($doctor_type != 'Follow up of patients') ? 'display:none;' : '' }} ">
                                <div class="card-body">
                                    <h4 class="card-title">Communication times</h4>
                                    @foreach ($communications as $communication )
                                        <div class="row form-row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Day</label>
                                                    <select class="form-control select" name="day[]">
                                                        <option value=""></option>
                                                        <option value="Saturday" {{ ($communication->day == 'Saturday') ? 'selected' : '' }} >Saturday</option>
                                                        <option value="Sunday" {{ ($communication->day == 'Sunday') ? 'selected' : '' }} >Sunday</option>
                                                        <option value="Monday" {{ ($communication->day == 'Monday') ? 'selected' : '' }} >Monday</option>
                                                        <option value="Tuesday" {{ ($communication->day == 'Tuesday') ? 'selected' : '' }} >Tuesday</option>
                                                        <option value="Wednesday" {{ ($communication->day == 'Wednesday') ? 'selected' : '' }} >Wednesday</option>
                                                        <option value="Thursday" {{ ($communication->day == 'Thursday') ? 'selected' : '' }} >Thursday</option>
                                                        <option value="Friday" {{ ($communication->day == 'Friday') ? 'selected' : '' }} >Friday</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Start At</label>
                                                    <input type="time" class="form-control" name="start_at[]" {{ $communication->start_at }} >
                                                </div>
                                            </div>
        
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">End At</label>
                                                    <input type="time" class="form-control" name="end_at[]" {{ $communication->end_at }} >
                                                </div>
                                            </div>
                                            <div class="col-md-1 pt-4 text-center">
                                                <a href="javascript:void(0);" onclick="this.parentElement.parentElement.remove()" class="del-channel"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div id="communications-rows">
                                        <div class="row form-row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Day</label>
                                                    <select class="form-control select" name="day[]">
                                                        <option value="" ></option>
                                                        <option value="Saturday" >Saturday</option>
                                                        <option value="Sunday" >Sunday</option>
                                                        <option value="Monday" >Monday</option>
                                                        <option value="Tuesday" >Tuesday</option>
                                                        <option value="Wednesday" >Wednesday</option>
                                                        <option value="Thursday" >Thursday</option>
                                                        <option value="Friday" >Friday</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Start At</label>
                                                    <input type="time" class="form-control" name="start_at[]">
                                                </div>
                                            </div>
        
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">End At</label>
                                                    <input type="time" class="form-control" name="end_at[]">
                                                </div>
                                            </div>
                                            <div class="col-md-1 pt-4 text-center">
                                                <a href="javascript:void(0);" onclick="this.parentElement.parentElement.remove()" class="del-channel"><i class="fas fa-times"></i></a>
                                            </div>
                                        
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="add-more">
                                            <a href="javascript:void(0);" class="add-communication"><i class="fa fa-plus-circle"></i> Add More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /communication-times-div -->

                        
                            <!-- attachments	 -->
                            <div class="card services-card" id="attachments" style="{{($doctor_type != 'Follow up of patients') ? 'display:none;' : '' }} ">
                                <div class="card-body">
                                    <h4 class="card-title mb-2">Attachments</h4>
                                    <small>Please attach the following</small>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Professional Classification</span>
                                                    <input type="file" class="upload" name="classification_certificate" >
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Bank statements certificate </span>
                                                    <input type="file" class="upload" name="bank_statements_certificate">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> University qualification</span>
                                                    <input type="file" class="upload" name="university_qualification">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- /attachments -->

                            <div class="submit-section submit-btn-bottom">
                                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
        <!-- /Page Content -->

    @endsection
    @section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('.select2').select2({maximumSelectionLength: 3});
        function changeDocType(val)
        {
            if(val == 'Follow up of patients')
            {
                $('#Doctor-div').css('display', 'contents');
                $('#Doctor-div-2').css('display', 'contents');
                $('#university_qualification').prop('required', true);
                $('#specialty_certificate').prop('required', true);
                $('#university').prop('required', true);
                $('#about').prop('required', true);
                $('#interests').prop('required', true);
                $('#follow_up_fee').prop('required', true);
                $('#communication-channels-div').css('display', 'flex');
                $('#attachments').css('display', 'flex');
                $('#communication-times-div').css('display', 'flex');
                $('#trainer-div').css('display', 'flex');
                $('#training_fee-div').css('display', 'none');
                $('#training_fee').prop('required', false);
            }
            else if(val == 'Trainer')
            {

                $('#Doctor-div').css('display', 'none');
                $('#Doctor-div-2').css('display', 'none');
                $('#university_qualification').prop('required', false);
                $('#specialty_certificate').prop('required', false);
                $('#university').prop('required', false);
                $('#follow_up_fee').prop('required', false);
                $('#communication-channels-div').css('display', 'none');
                $('#attachments').css('display', 'none');
                $('#communication-times-div').css('display', 'none');
                ///////////////////////
                $('#trainer-div').css('display', 'flex');
                $('#trainer-div-2').css('display', 'flex');
                $('#about').prop('required', true);
                $('#interests').prop('required', true);
                $('#training_fee-div').css('display', 'block');
                $('#training_fee').prop('required', true);
            }
            else
            {
                $('#Doctor-div').css('display', 'none');
                $('#Doctor-div-2').css('display', 'none');
                $('#university_qualification').prop('required', false);
                $('#specialty_certificate').prop('required', false);
                $('#university').prop('required', false);
                $('#about').prop('required', false);
                $('#interests').prop('required', false);
                $('#follow_up_fee').prop('required', false);
                $('#communication-channels-div').css('display', 'none');
                $('#attachments').css('display', 'none');
                $('#communication-times-div').css('display', 'none');
                $('#trainer-div').css('display', 'none');
                $('#training_fee').prop('required', false);
                $('#training_fee-div').css('display', 'none');
            }
        }

        var channel_row = $('#channels-rows').html();
        var communication_row = $('#communications-rows').html();
        $('.add-channel').on('click', function () {
                $('#channels-rows').append(channel_row);
            }
        );
        $('.add-communication').on('click', function () {
                $('#communications-rows').append(communication_row);
            }
        );

        function uploade(ii)
        {
            $('#file_1').click();
        }

        function imageUploaded(input , ii)
        {
            var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];
            var oInput = input;
            if (oInput.type == "file") {
                var sFileName = oInput.value;
                if (sFileName.length > 0) {
                    var blnValid = false;
                    for (var j = 0; j < _validFileExtensions.length; j++) {
                        var sCurExtension = _validFileExtensions[j];
                        if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                            blnValid = true;
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('#profileImg_' + ii).attr('src', e.target.result);
                                };
                                reader.readAsDataURL(input.files[0]);
                            } else {
                                removeUpload();
                            }
                            break;
                        }
                    }
                    if (!blnValid) {
                        var err = $('#image_err_msg').val()
                        alert(err);
                        return false;
                    }
                }
            }
            return true;
        }

        function removeUpload() {
            var default_src = "{{ asset('assets/front/img/doctors/doctor-thumb-02.jpg') }}";
            $('#profileImg').attr('src', default_src);
        }

    </script>
    @endsection
