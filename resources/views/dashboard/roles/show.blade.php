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
                                    {{__('dashboard/role.title')}}
                                </li>
                            </ol>
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
                                        {{__('dashboard/role.show')}}
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
                                    <div class="card-body">
                                        <div class="card m-0">
                                            <div class="row">
                                                <div class="card-header col-6">
                                                    <h1>{{$role->name}}</h1>
                                                </div>
                                                <div class="content-header-right col-md-6 col-12">
                                                    <div class="btn-group float-md-right" role="group"
                                                         aria-label="Button group with nested dropdown">
                                                        <button
                                                            class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2 mt-2"
                                                            id="btnGroupDrop1" type="button" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false"><i class="ft-settings icon-left"></i>
                                                            {{__('global.actions')}}</button>
                                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                            <form
                                                                action="{{ route('dashboard.role.delete', $role->id) }}"
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

                                                            <a href="{{ route('dashboard.role.edit', $role->id) }}"
                                                               class="dropdown-item"
                                                                {{--                                                               data-toggle="modal"--}}
                                                                {{--                                                               data-target="#role-edit"--}}
                                                            >
                                                                <i class="ft-edit"></i>
                                                                {{__('global.edit')}}
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="mb-2">
                                                <div class="card-content collapse show">
                                                    <div class="card-body card-dashboard">
                                                        <div id="accordionWrap5" role="tablist"
                                                             aria-multiselectable="true">
                                                            <div class="card collapse-icon accordion-icon-rotate">
                                                                <div class="row">
                                                                    @forelse($permissionGroups as $group => $permissions)
                                                                        <div class="col-md-6">
                                                                            <div id="heading51"
                                                                                 class="card-header border-success mt-1">
                                                                                <a data-toggle="collapse"
                                                                                   data-parent="#{{ toSlug($group) }}"
                                                                                   href="#accordion-{{ toSlug($group) }}"
                                                                                   aria-expanded="true"
                                                                                   aria-controls="accordion-{{ toSlug($group) }}"
                                                                                   class="card-title lead success">
                                                                                    {{ $group }}
                                                                                </a>
                                                                            </div>
                                                                            <div id="accordion-{{ toSlug($group) }}"
                                                                                 role="tabpanel"
                                                                                 aria-labelledby="heading-{{ toSlug($group) }}"
                                                                                 class="card-collapse collapse @if($loop->first) show @endif "
                                                                                 aria-expanded="true">
                                                                                <div class="card-content">
                                                                                    <div class="card-body">
                                                                                        <ul>
                                                                                            @foreach($permissions as $permission)
                                                                                                @if(in_array($permission->id, $role->permissions->pluck('id')->toArray()))
                                                                                                    <li style="list-style-type: none">
                                                                                                        <i class="ft-check">{{ $permission->name}}</i>
                                                                                                    </li>
                                                                                                @else
                                                                                                    <li style="list-style-type: none">
                                                                                                        <i class="ft-x ">{{$permission->name}}</i>
                                                                                                    </li>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @empty

                                                                    @endforelse
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
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
    {{--    <!-- Modal edit role -->--}}
    {{--    <div class="modal fade text-left" id="role-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"--}}
    {{--         aria-hidden="true">--}}
    {{--        <div class="modal-dialog" role="document">--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-header">--}}
    {{--                    <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard/role.edit') }}</h3>--}}
    {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
    {{--                        <span aria-hidden="true">&times;</span>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--                <form id="role-edit">--}}
    {{--                    <div class="modal-body">--}}
    {{--                        <div class="form-group ">--}}
    {{--                            <label for="name">{{ __('dashboard/role.name') }}</label>--}}
    {{--                            <input type="text" class="form-control" id="name" name="name"--}}
    {{--                                   placeholder="{{ __('dashboard/role.name') }}"--}}
    {{--                                   value="{{ old('name', isset($role) ? $role->name : '') }}">--}}
    {{--                            <label for="error-name"></label>--}}
    {{--                        </div>--}}
    {{--                        <div class="modal-body">--}}
    {{--                            <div class="form-group">--}}
    {{--                                <label for="permissions">{{ __('dashboard/role.role_permission') }}</label>--}}
    {{--                                <div class="pb-2">--}}
    {{--                                        <span class="btn btn-info btn-sm" id="selectAll" onclick="selectAll()">--}}
    {{--                                            {{__('global.select_all')}}--}}
    {{--                                        </span>--}}
    {{--                                    <span class="btn btn-info btn-sm" onclick="deselectAll()">--}}
    {{--                                            {{__('global.deselect_all')}}--}}
    {{--                                        </span>--}}
    {{--                                </div>--}}
    {{--                                <div class="card-content collapse show">--}}
    {{--                                    <div class="card-body card-dashboard">--}}
    {{--                                        <div id="accordionWrap5" role="tablist" aria-multiselectable="true">--}}
    {{--                                            <div class="card collapse-icon accordion-icon-rotate">--}}
    {{--                                                <div class="row">--}}
    {{--                                                    @forelse($permissionGroups as $group => $permissions)--}}
    {{--                                                        <div class="col-md-6">--}}
    {{--                                                            <div id="heading51" class="card-header border-success mt-1">--}}
    {{--                                                                <a data-toggle="collapse"--}}
    {{--                                                                   data-parent="#{{ toSlug($group) }}"--}}
    {{--                                                                   href="#accordion-{{ toSlug($group) }}"--}}
    {{--                                                                   aria-expanded="true"--}}
    {{--                                                                   aria-controls="accordion-{{ toSlug($group) }}"--}}
    {{--                                                                   class="card-title lead success">--}}
    {{--                                                                    {{ $group }}--}}
    {{--                                                                </a>--}}
    {{--                                                            </div>--}}
    {{--                                                            <div id="accordion-{{ toSlug($group) }}" role="tabpanel"--}}
    {{--                                                                 aria-labelledby="heading-{{ toSlug($group) }}"--}}
    {{--                                                                 class="card-collapse collapse show"--}}
    {{--                                                                 aria-expanded="true">--}}
    {{--                                                                <div class="card-content">--}}
    {{--                                                                    <div class="card-body">--}}
    {{--                                                                        <ul>--}}
    {{--                                                                            @forelse($permissions as $permission)--}}
    {{--                                                                                --}}{{--                                                                            <li>{{ $permission->name }}</li>--}}
    {{--                                                                                <label>--}}
    {{--                                                                                    <input type="checkbox"--}}
    {{--                                                                                              name="permissions[]"--}}
    {{--                                                                                              id="permissions"--}}
    {{--                                                                                              value="{{ $permission->id }}"--}}
    {{--                                                                                              {{ $permission->roles->contains($permission->id) ? 'checked' : '' }}--}}
    {{--                                                                                              @if(in_array($permission->id,old('permission',[]))) checked  @endif>--}}
    {{--                                                                                    {{$permission->name}}--}}
    {{--                                                                                </label>--}}
    {{--                                                                            @empty--}}

    {{--                                                                            @endforelse--}}
    {{--                                                                        </ul>--}}
    {{--                                                                    </div>--}}
    {{--                                                                </div>--}}
    {{--                                                            </div>--}}
    {{--                                                        </div>--}}
    {{--                                                    @empty--}}
    {{--                                                    @endforelse--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <label for="error-description"></label>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="errorMessage"></div>--}}
    {{--                    <div class="modal-footer">--}}
    {{--                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"--}}
    {{--                               value="close">--}}
    {{--                        <input type="submit" class="btn btn-outline-primary btn-lg" value="{{ __('global.add') }}">--}}
    {{--                    </div>--}}
    {{--                </form>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

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

@section('script')
    <script>
        function selectAll() {
            $("#permission > option").prop("selected", true);
            $("#permission").trigger("change");
        }

        function deselectAll() {
            $("#permission > option").prop("selected", false);
            $("#permission").trigger("change");
        }
    </script>


    <script>

        {{--$('#role-edit').validate({--}}
        {{--    errorPlacement: function (error, element) {--}}
        {{--        console.log('error')--}}
        {{--        console.log(error)--}}
        {{--        console.log(element)--}}
        {{--        console.log(element.attr("id"))--}}

        {{--        $(element)--}}
        {{--            .closest("form")--}}
        {{--            .find("label[for='error-" + element.attr("id") + "']")--}}
        {{--            .append(error);--}}
        {{--    },--}}
        {{--    errorElement: "span",--}}
        {{--    // rules: {--}}
        {{--    //     name: {--}}
        {{--    //         required: true,--}}
        {{--    //     },--}}
        {{--    //     permissions: {--}}
        {{--    //         required: true,--}}
        {{--    //     }--}}

        {{--    // },--}}
        {{--    submitHandler: function (form) {--}}
        {{--        $("#role-edit").addClass('loading')--}}

        {{--        dashboardRequest.post('{{ route('dashboard.roles.add') }}', $("#role-edit-form").serialize(), function (response) {--}}
        {{--            $("#role-edit").removeClass('loading')--}}
        {{--            $("#role-edit-form .errorMessage").html(response.status ? dashboardRequest.getSuccessMessageHtml(response.message) : dashboardRequest.getErrorMessageHtml(response.message));--}}
        {{--            animateCSS('#add-role .errorMessage', 'bounceIn');--}}
        {{--            if (response.status){--}}
        {{--                setTimeout(function () {--}}
        {{--                    animateCSS('#role-edit .errorMessage', 'flipOutX').then(() => $("#role-edit .errorMessage").html(''));--}}
        {{--                    window.location.reload();--}}
        {{--                }, 5000)--}}
        {{--            }--}}

        {{--        })--}}
        {{--    }--}}
        {{--});--}}
    </script>
@endsection
