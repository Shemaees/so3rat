@extends('layouts.dashboard')

@section('style')

    <link href="{{ asset('assets/dashboard/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}"
          rel="stylesheet"/>
    <link href="{{ asset('assets/dashboard/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}"
          rel="stylesheet"/>
    <link href="{{ asset('assets/dashboard/vendors/css/tables/datatable/select.dataTables.min.css') }}"
          rel="stylesheet"/>

@endsection

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
                            {{--                            <form--}}
                            {{--                                action=""--}}
                            {{--                                method="POST"--}}
                            {{--                                onsubmit="return confirm('{{ __('global.areYouSure') }}');"--}}
                            {{--                                style="display: inline-block;">--}}
                            {{--                                @csrf--}}
                            {{--                                <input type="hidden" name="_method" value="DELETE">--}}
                            {{--                                <a href="#" class="dropdown-item"--}}
                            {{--                                   onclick="$(this).parent().submit()">--}}
                            {{--                                    <i class="ft-trash-2"></i>--}}
                            {{--                                    {{__('global.delete')}}--}}
                            {{--                                </a>--}}
                            {{--                            </form>--}}

                            <a href=""
                               class="dropdown-item"
                               data-toggle="modal"
                               data-target="#add-subscription">
                                <i class="ft-plus"></i>
                                {{__('global.add')}}
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{__('dashboard/subscription.title')}}</h4>
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

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="">
                                            <table
                                                class=" table table-bordered table-striped table-hover datatable datatable-Role">
                                                <thead>
                                                <tr>
                                                    <th width="10">

                                                    </th>
                                                    <th>
                                                        {{__('user.name')}}
                                                    </th>
                                                    <th>
                                                        {{__('dashboard/subscription.name')}}
                                                    </th>
                                                    <th>
                                                        {{__('dashboard/order.visit_at')}}
                                                    </th>
                                                    <th>
                                                        {{__('global.status')}}
                                                    </th>
                                                    <th>
                                                        {{__('user.request_date')}}
                                                    </th>
                                                    <th>
                                                        {{__('global.actions')}}
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($userRequests as $request)
                                                    <tr>
                                                        <td>

                                                        </td>
                                                        <td>
                                                            @foreach($users as $user)
                                                                @if($request->user_id == $user->id)
                                                                    {{__($user->name)}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($subscriptions as $subscription)
                                                                @if($request->subscription_id == $subscription->id)
                                                                    {{__($subscription->name)}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td> {{$request->visited_at}} </td>
                                                        <td>
                                                            @if($request->user_request == '1' )
                                                                <span
                                                                    class="badge badge-default badge-success pt-1 pb-1"> {{__('global.active')}}</span>
                                                            @else
                                                                <span
                                                                    class="badge badge-default badge-danger pt-1 pb-1"> {{__('global.non_active')}}</span>
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
                                                                    <a href="{{route('dashboard.requests.show',$request->id)}}"
                                                                       class="dropdown-item">
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
                                                <tfoot>
                                                {{ $userRequests->links() }}
                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>



@endsection

@section('vendor')
    <script src="{{asset('assets/dashboard/vendors/js/tables/datatable/datatables.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"
            type="text/javascript"></script>
@endsection

@section('script')
    {{--    <script src="{{asset('assets/dashboard/js/scripts/forms/checkbox-radio.js')}}" type="text/javascript"></script>--}}
    <script src="{{asset('assets/dashboard/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/scripts/navs/navs.js') }}" type="text/javascript"></script>
@endsection
