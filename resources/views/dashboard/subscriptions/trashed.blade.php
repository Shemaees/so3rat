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
                            {{--                            <a href=""--}}
                            {{--                               class="dropdown-item"--}}
                            {{--                               data-toggle="modal"--}}
                            {{--                               data-target="#add-subscription">--}}
                            {{--                                <i class="ft-plus"></i>--}}
                            {{--                                {{__('global.add')}}--}}
                            {{--                            </a>--}}
                        </div>
                    </div>
                </div>
            </div>

            {{--        trash   subscription   --}}
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        {{__('dashboard/subscription.trashed')}}
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

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class=" table table-bordered table-striped table-hover datatable datatable-subscription">
                                            <thead>
                                            <tr>
                                                <th width="10">
                                                </th>
                                                <th>
                                                    {{__('dashboard/subscription.name')}}
                                                </th>
                                                <th>
                                                    {{__('dashboard/subscription.price')}}
                                                </th>
                                                <th>
                                                    {{__('dashboard/subscription.visits_number')}}
                                                </th>
                                                <th>
                                                    {{__('dashboard/subscription.period')}}
                                                </th>
                                                <th>
                                                    {{__('global.actions')}}
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($trashSubscriptions as  $trash_subscription)
                                                <tr data-entry-id="{{ $trash_subscription->id }}">
                                                    <td>

                                                    </td>
                                                    <td>
                                                        {{ $trash_subscription->name ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $trash_subscription->price }}
                                                    </td>
                                                    <td>
                                                        {{ $trash_subscription->visits_number }}
                                                    </td>
                                                    <td>
                                                        {{ $trash_subscription->period }}
                                                    </td>
                                                    <td>
                                                        <div class="btn-group mr-1 mb-1">
                                                            <button type="button"
                                                                    class="btn btn-primary dropdown-toggle btn-sm"
                                                                    data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                <i class="ft-settings"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a href="{{route('dashboard.subscriptions.show_trashed',$trash_subscription->id)}}"
                                                                   class="dropdown-item">
                                                                    <i class="ft-eye">
                                                                    </i>
                                                                    {{__('global.show')}}
                                                                </a>
                                                                <a href="{{ route('dashboard.subscriptions.restore', $trash_subscription->id) }}"
                                                                   class="dropdown-item">
                                                                    <i class="ft-refresh-ccw"></i>
                                                                    {{__('global.restore')}}
                                                                </a>
                                                                <form
                                                                    action="{{ route('dashboard.subscriptions.force_delete', $trash_subscription->id) }}"
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
                                                                {{--                                                            <a href="{{ route('dashboard.subscriptions.force_delete', $subscription->id) }}" class="dropdown-item">--}}
                                                                {{--                                                                <i class="ft-alert-octagon"></i>--}}
                                                                {{--                                                                {{__('global.force_delete')}}--}}
                                                                {{--                                                            </a>--}}
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
                                        {{ $trashSubscriptions->links('vendor.pagination.bootstrap-4') }}
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
