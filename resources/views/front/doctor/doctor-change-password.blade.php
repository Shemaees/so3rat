@extends('layouts.app')
@section('content')
    @include('front.includes.header')
        <!-- Breadcrumb -->
        <div class="breadcrumb-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12 col-12">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('front/global.home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('front/auth.change_password')}}</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title float-right pr-5">{{__('front/auth.change_password')}}</h2>
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
                        <div class="card">
                            <div class="card-body">
{{--                                <div class="row">--}}
                                    <div class="col-md-12  align-content-center">

                                        <!-- Change Password Form -->
                                        <form>
                                            <div class="form-group col-6" style="margin-right: 15rem!important">
                                                <label class="float-right">{{__('front/auth.old_password')}}</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <div class="form-group col-6" style="margin-right: 15rem!important">
                                                <label class="float-right">{{__('front/auth.new_password')}}</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <div class="form-group col-6" style="margin-right: 15rem!important">
                                                <label class="float-right">{{__('front/auth.confirm_password')}}</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <div class="submit-section">
                                                <button type="submit" class="btn btn-primary submit-btn">{{__('front/auth.save_changes')}}</button>
                                            </div>
                                        </form>
                                        <!-- /Change Password Form -->

                                    </div>
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Content -->

    @endsection
