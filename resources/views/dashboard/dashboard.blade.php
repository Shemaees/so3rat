@extends('layouts.dashboard')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/css-rtl/core/colors/palette-gradient.css')}}">
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div id="crypto-stats-3" class="row">
                <div class="col-xl-4 col-lg-6 col-4">
                    <div class="card bg-gradient-directional-blue crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <a href="{{ route('dashboard.users.index') }}" class="media d-flex">
                                    <div class="media-body text-white text-left">
                                        <h3 class="text-white">{{\App\Models\User::count()}}</h3>
                                        <span>{{__('dashboard/user.title')}}</span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-users text-white font-large-2 float-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-4">
                    <div class="card bg-gradient-directional-blue crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <a href="{{ route('dashboard.admins.index') }}" class="media d-flex">
                                    <div class="media-body text-white text-left">
                                        <h3 class="text-white">{{\App\Models\Admin::count()}}</h3>
                                        <span>{{__('dashboard/admin.title')}}</span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-users text-white font-large-2 float-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-4">
                    <div class="card bg-gradient-directional-blue crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <a href="#" class="media d-flex">
                                    <div class="media-body text-white text-left">
                                        <h3 class="text-white"> الطلبات : {{\App\Models\Order::count()}}</h3>
                                        <span class="float-left">الطلبات الحاليه : {{$upcomingOrdersCount}}</span>
                                        <span class="float-right">الطلبات السابقه : {{$archivedOrdersCount}}</span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-users text-white font-large-2 float-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-4">
                    <div class="card bg-gradient-directional-blue crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <a href="{{ route('dashboard.subscriptions.index') }}" class="media d-flex">
                                    <div class="media-body text-white text-left">
                                        <h3 class="text-white">{{\App\Models\Subscription::count()}}</h3>
                                        <span>{{__('dashboard/subscription.title')}}</span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-users text-white font-large-2 float-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-4">
                    <div class="card bg-gradient-directional-blue crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <a href="{{ route('dashboard.visits.index') }}" class="media d-flex">
                                    <div class="media-body text-white text-left">
                                        <h3 class="text-white">{{\App\Models\Visit::count()}}</h3>
                                        <span>{{__('dashboard/visit.title')}}</span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-users text-white font-large-2 float-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-4">
                    <div class="card bg-gradient-directional-blue crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <a href="{{ route('dashboard.categories.index') }}" class="media d-flex">
                                    <div class="media-body text-white text-left">
                                        <h3 class="text-white">{{\App\Models\Category::count()}}</h3>
                                        <span>{{__('dashboard/category.title')}}</span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-users text-white font-large-2 float-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- Candlestick Multi Level Control Chart -->

                <!-- Sell Orders & Buy Order -->
                <div class="row match-height">
                    <div class="col-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title float-left mt-1">{{__('dashboard/order.upcoming')}}</h4>
                                <a class="btn btn-outline-info btn-sm-width box-shadow-3 mb-1 float-right" href="{{route('dashboard.orders.index')}}">
                                    {{__('global.show_all')}}
                                </a>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                        <tr>
                                            <th>{{__('dashboard/order.code')}}</th>
                                            <th>{{__('dashboard/order.address')}}</th>
                                            <th>{{__('global.actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($upcomingOrders as $up_order)
                                        <tr class=" bg-lighten-5">
                                            <td>{{$up_order->code}}</td>
                                            <td><i class="cc BTC-alt"></i> {{$up_order->address}}</td>
                                            <td>
                                                <a class="btn btn-outline-info btn-sm-width box-shadow-3 mb-1" href="{{route('dashboard.orders.show', $up_order->id)}}">
                                                    {{__('global.show')}}
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <div class="row mr-2 ml-2">
                                                    <button type="text"
                                                            class="btn btn-lg btn-block btn-outline-danger mb-2"
                                                            id="type-error">
                                                        {{__('global.no_data')}}
                                                    </button>
                                                </div>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title float-left mt-1">{{__('dashboard/order.archived')}}</h4>
                                <a class="btn btn-outline-info btn-sm-width box-shadow-3 mb-1 float-right" href="{{route('dashboard.orders.archived')}}">
                                    {{__('global.show_all')}}
                                </a>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
{{--                                    <p class="text-muted">Total USD available: 9065930.43</p>--}}
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                        <tr>
                                            <th>{{__('dashboard/order.code')}}</th>
                                            <th>{{__('dashboard/order.address')}}</th>
{{--                                            <th>{{__('dashboard/order.description')}}</th>--}}
                                            <th>{{__('global.actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($archivedOrders as $ar_order)
                                            <tr class=" bg-lighten-5">
                                                <td>{{$ar_order->code}}</td>
                                                <td><i class="cc BTC-alt"></i> {{$ar_order->address}}</td>
{{--                                                <td>{{$ar_order->description}}</td>--}}
                                                <td>
                                                    <a class="btn btn-outline-info btn-sm-width box-shadow-3 mb-1" href="{{route('dashboard.orders.show', $ar_order->id)}}">
                                                        {{__('global.show')}}
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <div class="row mr-2 ml-2">
                                                    <button type="text"
                                                            class="btn btn-lg btn-block btn-outline-danger mb-2"
                                                            id="type-error">
                                                        {{__('global.no_data')}}
                                                    </button>
                                                </div>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Sell Orders & Buy Order -->
                <!-- Active Orders -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title float-left mt-1">{{__('user.requests')}}</h4>
                                <a class="btn btn-outline-info btn-sm-width box-shadow-3 mb-1 float-right" href="{{route('dashboard.requests.index')}}">
                                    {{__('global.show_all')}}
                                </a>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                        <tr>
                                            <th>{{__('user.name')}}</th>
                                            <th>{{__('dashboard/subscription.name')}}</th>
                                            <th>{{__('dashboard/order.visit_at')}}</th>
                                            <th>{{__('global.status')}}</th>
                                            <th>{{__('user.request_date')}}</th>
                                            <th>{{__('global.actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($userRequests as $request)
                                        <tr>
                                            <td>
                                                @foreach($users as $user)
                                                    @if($request->user_id == $user->id)
                                                        {{__($user->name)}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td >
                                                @foreach($subscriptions as $subscription)
                                                    @if($request->subscription_id == $subscription->id)
                                                        {{__($subscription->name)}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td> {{$request->visited_at}} </td>
                                            <td>
                                                @if($request->user_request == '1' )
                                                    <span class="badge badge-default badge-success pt-1 pb-1"> {{__('global.active')}}</span>
                                                @else
                                                    <span class="badge badge-default badge-danger pt-1 pb-1"> {{__('global.non_active')}}</span>
                                                @endif
                                            </td>
                                            <td>{{$request->user_request_date}}</td>
                                            <td>
                                                <div class="btn-group mr-1 mb-1">
                                                    <button type="button"
                                                            class="btn btn-primary dropdown-toggle btn-sm"
                                                            data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                        <i class="ft-settings"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="{{route('dashboard.requests.show',$request->id)}}" class="dropdown-item">
                                                            <i class="ft-eye"></i>
                                                            {{__('global.show')}}
                                                        </a>
                                                        <a href="{{route('dashboard.requests.change_status',$request->id)}}"
                                                           class="dropdown-item"
                                                           onclick="return confirm('{{__('dashboard/user.request_change_status')}}');">
                                                            @if($request->user_request == 0)
                                                                <i class="ft-lock primary"></i>
                                                                {{__('global.activate')}}
                                                            @else
                                                                <i class="ft-unlock primary"></i>
                                                                {{__('global.deactivate')}}
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <div class="row mr-2 ml-2">
                                                    <button type="text"
                                                            class="btn btn-lg btn-block btn-outline-danger mb-2"
                                                            id="type-error">
                                                        {{__('global.no_data')}}
                                                    </button>
                                                </div>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Active Orders -->
            </div>
        </div>
    </div>
@endsection
@section('vendor')

    <script src="{{asset('assets/dashboard/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/vendors/js/charts/echarts/echarts.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/dashboard/vendors/js/extensions/datedropper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/vendors/js/extensions/timedropper.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/dashboard/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/js/scripts/pages/chat-application.js')}}" type="text/javascript"></script>
@endsection

@section('script')
    <script src="{{asset('assets/dashboard/js/scripts/extensions/date-time-dropper.js')}}" type="text/javascript"></script>
@endsection
