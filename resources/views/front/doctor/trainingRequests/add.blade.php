<?php $trainingRequests = 1; ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@extends('layouts.doctorDashboard')
@section('col-7') 
    <style>
        .col-30 {
            width: 30%;
            margin-left: 1%;
            margin-right: 1%;
        }
        a.phone {
            color: #0b10b9e0;
            font-size: 14px;
            font-weight: 500;
            font-family: cursive;
            padding-right:15px;
        }
        .btn-blue {
            background-color: #98f123e0 !important;
            color: #101010eb !important;
            font-size: 15px;
            font-weight: 600;
            font-family: cursive;
            padding-right:15px;
        }
    </style>
   
        <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-10"><h4 class="card-title text-right">{{__('front/request.TrainingRequests')}}</h4></div>
                                        <div class="col-2">
                                            <a href="{{route('doctor.trainingRequests.index')}}" class="btn btn-primary" >{{__('front/request.ShowAll')}}</i></a>
                                        </div>
                                    </div>
                                    
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                        
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard row">
                                    @foreach ($doctors as $doctor)
                                        <div class="col-30 card widget-profile pat-widget-profile">
                                            <div class="card-body">
                                                <div class="pro-widget-content">
                                                    <div class="profile-info-widget">
                                                        <a href="{{route('doctor-profile')}}" class="booking-doc-img ">
                                                            <img src="{{ ($doctor->photo) ?  asset($doctor->photo) : asset('assets/front/img/doctors/doctor-thumb-02.jpg') }}" alt="User Image">
                                                        </a>
                                                    </div>
                                                    Dr / {{ $doctor->name }}
                                                    <br>
                                                   {{ Str::limit(@$doctor->profile->about , 60 ,'...') }}
                                                </div>
                                                <div class="patient-info d-flex">
                                                    <ul>
                                                        <div>
                                                            <li class="float-right">
                                                                <span> {{__('front/doctor.phone')}} : </span> 
                                                                <a href="tel:{{$doctor->phone}}" class="phone">{{$doctor->phone}}</a>
                                                            </li>

                                                            <li class="float-right">
                                                                <span> {{__('front/doctor.TrainingCost')}} :   </span>  &nbsp; &nbsp;
                                                                <span>{{ ($doctor->profile) ? $doctor->profile->training_fee : ' -  ' }} &nbsp; {{__('front/request.SR')}}</span>
                                                            </li>

                                                            <li class="float-right mr-5">
                                                                @if (Auth::user()->hasRequestTo($doctor->id , 'Pending'))
                                                                    <span class="btn btn-blue phone">{{__('front/request.RequestPending')}}</span>
                                                                @else
                                                                <a class="btn btn-primary" href="{{ route('doctor.trainingRequests.SendRequest',$doctor->id) }}">{{__('front/request.SendTrainingRequest')}}</a>
                                                                @endif
                                                            </li>

                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>



    @endsection
    
