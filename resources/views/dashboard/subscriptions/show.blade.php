@extends('layouts.dashboard')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard.home')}}">
                                        {{__('global.home')}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{__('dashboard/subscription.title')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group"
                         aria-label="Button group with nested dropdown">
                        <button
                            class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2 mb-1"
                            id="btnGroupDrop1" type="button" data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"><i class="ft-settings icon-left"></i>
                            {{__('global.actions')}}</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <form
                                action="{{ route('dashboard.subscription.delete', $subscription->id) }}"
                                method="POST"
                                onsubmit="return confirm('{{ __('global.areYouSure') }}');"
                                style="display: inline-block;">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <a href="#" class="dropdown-item"
                                   onclick="$(this).parent().submit()">
                                    <i class="ft-trash-2"></i>
                                    {{__('global.delete')}}
                                </a>
                            </form>
                            <form
                                action="{{ route('dashboard.subscriptions.force', $subscription->id) }}"
                                method="POST"
                                onsubmit="return confirm('{{ __('global.areYouSure') }}');"
                                style="display: inline-block;">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <a href="#" class="dropdown-item"
                                   onclick="$(this).parent().submit()">
                                    <i class="ft-trash-2"></i>
                                    {{__('global.force_delete')}}
                                </a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">
                                        {{__('dashboard/subscription.show')}}
                                    </h4>
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
                                @include('dashboard.includes.alerts.success')
                                @include('dashboard.includes.alerts.errors')
                                <div class="card-body">
                                    <div class="mb-2">
                                        <div class="card-content collapse show">
                                            <div class="card-body card-dashboard">
                                                <div id="accordionWrap5" role="tablist"
                                                     aria-multiselectable="true">
                                                    <div class="card collapse-icon accordion-icon-rotate">
                                                        <div class="row">
                                                            <div class="card-content collapse show">
                                                                <div class="table-responsive">
                                                                    <table class="table table-borderless  mb-0">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>{{__('dashboard/subscription.name')}}:
                                                                            </td>
                                                                            <td>{{$subscription->name}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>{{__('dashboard/subscription.price')}}
                                                                                :
                                                                            </td>
                                                                            <td>{{$subscription->price}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>{{__('dashboard/subscription.visits_number')}}
                                                                                :
                                                                            </td>
                                                                            <td>{{$subscription->visits_number}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>{{__('dashboard/subscription.period')}}
                                                                                :
                                                                            </td>
                                                                            <td>{{$subscription->period}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>{{__('dashboard/subscription.description')}}
                                                                                :
                                                                            </td>
                                                                            <td>{{$subscription->description}}</td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <nav class="mb-3">
                                        <div class="nav nav-tabs">

                                        </div>
                                    </nav>
                                    <div class="tab-content">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection

@section('vendor')
    <script src="{{asset('assets/dashboard/vendors/js/forms/toggle/bootstrap-switch.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/vendors/js/forms/toggle/switchery.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/js/scripts/forms/switch.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/vendors/js/forms/select/select2.full.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>
@endsection


