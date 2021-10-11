@extends('layouts.dashboard')

@section('style')

    {{--    <link href="{{ asset('assets/dashboard/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet"/>--}}
    {{--    <link href="{{ asset('assets/dashboard/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}" rel="stylesheet"/>--}}
    {{--    <link href="{{ asset('assets/dashboard/vendors/css/tables/datatable/select.dataTables.min.css') }}" rel="stylesheet"/>--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/css-rtl/core/menu/menu-types/vertical-menu.css')}}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/css-rtl/core/colors/palette-gradient.css')}}">--}}
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
                                    {{__('dashboard/visit.trashed')}}
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
                            {{--                               data-target="#add-visit">--}}
                            {{--                                <i class="ft-plus"></i>--}}
                            {{--                                {{__('global.add')}}--}}
                            {{--                            </a>--}}

                        </div>
                    </div>
                </div>
            </div>

            {{--        trash   visit   --}}
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        {{__('dashboard/visit.trashed')}}
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
                                            class=" table table-bordered table-striped table-hover datatable datatable-visit">
                                            <thead>
                                            <tr>
                                                <th width="10">
                                                </th>
                                                <th>
                                                    {{__('dashboard/visit.name')}}
                                                </th>
                                                <th>
                                                    {{__('dashboard/visit.price')}}
                                                </th>
                                                <th>
                                                    {{__('dashboard/visit.description')}}
                                                </th>
                                                <th>
                                                    {{__('dashboard/visit.category')}}
                                                </th>
                                                <th>
                                                    {{__('dashboard/visit.status')}}
                                                </th>
                                                <th>
                                                    {{__('global.actions')}}
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($trashVisits as  $trash_visit)
                                                <tr data-entry-id="{{ $trash_visit->id }}">
                                                    <td>

                                                    </td>
                                                    <td>
                                                        {{ $trash_visit->name ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $trash_visit->price }}
                                                    </td>
                                                    <td>
                                                        {{ $trash_visit->description }}
                                                    </td>
                                                    <td>
                                                        @foreach($categories as $category)
                                                            @if($category->id === $trash_visit->category_id)
                                                                {{ $category->name }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if($trash_visit->status == '1' )
                                                            <span
                                                                class="badge badge-default badge-success pt-1 pb-1"> {{__('global.active')}}</span>
                                                        @else
                                                            <span
                                                                class="badge badge-default badge-danger pt-1 pb-1">{{__('global.non_active')}}</span>
                                                        @endif
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
                                                                <a href="{{route('dashboard.visits.show_trashed',$trash_visit->id)}}"
                                                                   class="dropdown-item">
                                                                    <i class="ft-eye">
                                                                    </i>
                                                                    {{__('global.show')}}
                                                                </a>
                                                                <a href="{{ route('dashboard.visits.restore', $trash_visit->id) }}"
                                                                   class="dropdown-item">
                                                                    <i class="ft-refresh-ccw"></i>
                                                                    {{__('global.restore')}}
                                                                </a>
                                                                <form
                                                                    action="{{ route('dashboard.visits.force_delete', $trash_visit->id) }}"
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
                                                                {{--                                                            <a href="{{ route('dashboard.visits.force_delete', $visit->id) }}" class="dropdown-item">--}}
                                                                {{--                                                                <i class="ft-alert-octagon"></i>--}}
                                                                {{--                                                                {{__('global.force_delete')}}--}}
                                                                {{--                                                            </a>--}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="d-flex justify-content-center">
                                            {{ $trashVisits->links('vendor.pagination.bootstrap-4') }}
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
    {{--    <script src="{{asset('assets/dashboard/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>--}}
    {{--    <script src="{{asset('assets/dashboard/vendors/js/tables/datatable/dataTables.buttons.min.js')}}" type="text/javascript"></script>--}}
@endsection

@section('script')
    {{--    <script src="{{asset('assets/dashboard/js/scripts/forms/checkbox-radio.js')}}" type="text/javascript"></script>--}}
    <script src="{{asset('assets/dashboard/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>
    {{--    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.flash.min.js') }}"></script>--}}
    {{--    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.html5.min.js') }}"></script>--}}
    {{--    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.print.min.js') }}"></script>--}}
    {{--    <script src="{{ asset('assets/dashboard/js/scripts/navs/navs.js') }}" type="text/javascript"></script>--}}
    {{--    <script src="{{ asset('assets/dashboard/js/scripts/tables/datatables/datatable-advanced.js')}}" type="text/javascript"></script>--}}

@endsection
