@extends('layouts.doctorDashboard')
@section('col-7')
    
        <!-- Page Content -->
        <div class="content success-page-cont">
            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-lg-9">

                        <!-- Success Card -->
                        <div class="card success-card">
                            <div class="card-body">
                                <div class="success-cont">
                                    <i class="fas fa-check"></i>
                                    <h3>{{ __('front/request.request_send') }}</h3>
                                    <a href="{{ route('doctor.trainingRequests.index') }}" class="btn btn-primary view-inv-btn">{{__('front/request.ShowMyRequests')}}</a>
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
