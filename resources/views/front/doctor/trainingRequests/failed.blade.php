@extends('layouts.doctorDashboard')
@section('col-7')
    <style>
        .fa-times {
            background-color: #e9ab2e !important;
            border: 1px solid #e9ab2e !important;
        }
    </style>
        <!-- Page Content -->
        <div class="content success-page-cont">
            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-lg-9">

                        <!-- Success Card -->
                        <div class="card success-card">
                            <div class="card-body">
                                <div class="success-cont">
                                    <i class="fas fa-times"></i>
                                    <h3>{{ __('front/request.request_failed') }}</h3>
                                    <a href="{{ route('doctor.trainingRequests.index') }}" class="btn btn-warning view-inv-btn">{{__('front/request.BackMyRequests')}}</a>
                                </div>
                            </div>
                        </div>
                        <!-- /Success Card -->

                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Content -->
@endsection
