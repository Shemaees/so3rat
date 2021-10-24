@extends('layouts.dashboard')

@section('style')

    <link href="{{ asset('assets/dashboard/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}"
          rel="stylesheet"/>
    <link href="{{ asset('assets/dashboard/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}"
          rel="stylesheet"/>
    <link href="{{ asset('assets/dashboard/vendors/css/tables/datatable/select.dataTables.min.css') }}"
          rel="stylesheet"/>
    <link href="{{ asset('assets/front/css/style.css') }}"
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
                                        {{__('front/global.home')}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{__('dashboard/user.title')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                {{--                <button type="button" class="mr-3 ml-auto btn btn-outline-info btn-sm-width box-shadow-3 mb-1 "--}}
                {{--                        data-toggle="modal"--}}
                {{--                        data-target="#add-user">--}}
                {{--                    {{ __('global.add') }}--}}
                {{--                    <i class="ft-plus icon-left"></i>--}}
                {{--                </button>--}}
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        {{__('dashboard/user.active')}}
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

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class=" table table-bordered table-striped table-hover datatable datatable-user">
                                            <thead>
                                            <tr>
                                                <th width="10">
                                                </th>
                                                <th>
                                                    {{__('dashboard/user.name')}}
                                                </th>
                                                <th>
                                                    {{__('dashboard/user.email')}}
                                                </th>
                                                <th>
                                                    {{__('front/global.actions')}}
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($activeUsers as $active_user)
                                                <tr data-entry-id="{{ $active_user->id }}">
                                                    <td>

                                                    </td>
                                                    <td>
                                                        {{ $active_user->name ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $active_user->email ?? '' }}
                                                    </td>
                                                    <td>
                                                        <div class="table-action">
                                                           
                                                            <a href="{{route('dashboard.users.change_status',$active_user->id)}}"
                                                                class="btn btn-sm bg-info-light"
                                                                onclick="return confirm('{{__('user.change_status')}}');">
                                                                <i class="ft-unlock primary"></i>
                                                                {{__('front/global.deactivate')}}
                                                            </a>
                                                            <a href="{{route('dashboard.users.show',$active_user->id)}}"
                                                                class="btn btn-sm bg-info-light">
                                                                <i class="ft-eye "></i>
                                                                {{__('front/global.show')}}
                                                            </a>
                                                            <a href="{{route('dashboard.users.statusBlock',$active_user-> id)}}"
                                                                class="btn btn-sm bg-info-light brown"
                                                                onclick="return confirm('{{ __('front/global.block') }}')">
                                                                <i class="ft-slash primary"></i>
                                                                {{__('front/global.block')}}
                                                            </a>
                                                            
                                                            <a href="#"
                                                                    class="btn btn-primary  btn-sm">
                                                                    <i class="ft-settings"></i>
                                                            </a>
                                                        </div>

                                                        
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <div class="row mr-2 ml-2">
                                                        <button type="text"
                                                                class="btn btn-lg btn-block btn-outline-danger mb-2"
                                                                id="type-error">
                                                            No Data
                                                        </button>
                                                    </div>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                        {{--Pagination--}}
                                        <div class="d-flex justify-content-center">
                                            {{ $activeUsers->links('vendor.pagination.bootstrap-4') }}
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
    <script src="{{asset('assets/dashboard/js/scripts/forms/checkbox-radio.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/scripts/navs/navs.js') }}" type="text/javascript"></script>

@endsection
