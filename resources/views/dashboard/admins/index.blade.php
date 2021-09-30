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
                                    {{__('dashboard/admin.title')}}
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
                            <a href=""
                               class="dropdown-item"
                               data-toggle="modal"
                               data-target="#add-admin">
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
                                    <h4 class="card-title">
                                        {{__('dashboard/admin.all')}}
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
                                            class=" table table-bordered table-striped table-hover datatable datatable-admin">
                                            <thead>
                                            <tr>
                                                <th width="10">
                                                </th>
                                                <th>
                                                    {{__('dashboard/admin.name')}}
                                                </th>
                                                <th>
                                                    {{__('dashboard/admin.email')}}
                                                </th>
                                                <th>
                                                    {{__('dashboard/admin.role')}}
                                                </th>
                                                <th>
                                                    {{__('dashboard/admin.permission')}}
                                                </th>
                                                <th>
                                                    {{__('global.actions')}}
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($admins as $admin)
                                                <tr data-entry-id="{{ $admin->id }}">
                                                    <td>

                                                    </td>
                                                    <td>
                                                        {{ $admin->name ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $admin->email ?? '' }}
                                                    </td>
                                                    <td>
                                                        @foreach($admin->permissions()->pluck('name') as $permission)
                                                            <span class="badge badge-info">{{ $permission }}</span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($admin->roles()->pluck('name') as $role)
                                                            <span class="badge badge-info">{{ $role }}</span>
                                                        @endforeach
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
                                                                <a href="#" class="dropdown-item"
                                                                   data-toggle="modal"
                                                                   data-target="#add-permission"
                                                                   onclick="setUrl('{{ route('dashboard.admins.add_permission', $admin->id) }}', 'permission')">
                                                                    <i class="ft-plus-square"></i>
                                                                    {{__('global.add_permission')}}
                                                                </a>
                                                                <a href="#" class="dropdown-item"
                                                                   data-toggle="modal"
                                                                   data-target="#add-role"
                                                                   onclick="setUrl('{{ route('dashboard.admins.add_role', $admin->id) }}', 'role')">
                                                                    <i class="ft-plus-square">

                                                                    </i>
                                                                    {{__('global.add_role')}}
                                                                </a>
                                                                <a href="{{route('admins.change_status',$admin-> id)}}"
                                                                   class="dropdown-item"
                                                                   onclick="return confirm('{{__('dashboard/admin.change_status')}}');">
                                                                    @if($admin->status == 0)
                                                                        <i class="ft-lock primary"></i>
                                                                        {{__('global.activate')}}
                                                                    @else
                                                                        <i class="ft-unlock primary"></i>
                                                                        {{__('global.deactivate')}}
                                                                    @endif
                                                                </a>
                                                                <form
                                                                    action="{{ route('dashboard.admins.delete', $admin->id) }}"
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
                                                            No Data
                                                        </button>
                                                    </div>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                            <tfoot>
                                            {{ $admins->links() }}
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    {{-- Modal crate admin --}}
    <div class="modal fade text-left" id="add-admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard/admin.add_new') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="add-admin-form">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">{{ __('dashboard/admin.name') }}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="{{ __('dashboard/admin.name') }}">
                            <label for="error-name"></label>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('dashboard/admin.email') }}</label>
                            <input type="text" class="form-control" id="email" name="email"
                                   placeholder="{{ __('dashboard/admin.email') }}">
                            <label for="error-email"></label>
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('dashboard/admin.password') }}</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="{{ __('dashboard/admin.password') }}">
                            <label for="error-password"></label>
                        </div>

                        <div class="form-group">
                            <label for="roles">{{ __('dashboard/role.name') }}</label>
                            <div class="pb-2">
                            <span class="btn btn-info btn-sm" onclick="selectAll()">
                                {{__('global.select_all')}}
                            </span>
                                <span class="btn btn-info btn-sm" onclick="deselectAll()">
                                {{__('global.deselect_all')}}
                            </span>
                            </div>
                            <select name="roles[]" id="roles" class="form-control" multiple="multiple">
                                @foreach($roles as $id => $role)
                                    <option
                                        value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($admin) && $admin->roles->contains($id)) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <label for="error-roles"></label>
                        </div>
                    </div>
                    <div class="errorMessage"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning mr-1"
                                data-dismiss="modal">
                            <i class="ft-x"></i>
                            {{__('global.close')}}
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i>
                            {{__('global.update')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal add permission --}}
    <div class="modal fade text-left" id="add-permission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard/admin.add_permission') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="add-permission-form">
                    @csrf
                    <div class="row">
                        <input type="hidden" id="add-permission-url">
                        @forelse($permissionGroups as $group => $permissions)
                            <div class="col-md-6">
                                <div id="heading51" class="card-header mt-1">
                                    <a data-toggle="collapse" data-parent="#{{ toSlug($group) }}"
                                       href="#accordion-{{ toSlug($group) }}" aria-expanded="true"
                                       aria-controls="accordion-{{ toSlug($group) }}" class="card-title lead success">
                                        {{ $group }}
                                    </a>
                                </div>
                                <div id="accordion-{{ toSlug($group) }}" role="tabpanel"
                                     aria-labelledby="heading-{{ toSlug($group) }}"
                                     class="card-collapse collapse show"
                                     aria-expanded="true">
                                    <div class="card-content">
                                        <div class="card-body" style="padding:0">
                                            <ul>
                                                @forelse($permissions as $permission)
                                                    <li style="list-style-type: none">
                                                        <label><input type="checkbox" name="permissions[]"
                                                                      id="permissions" value="{{$permission->id}}">
                                                            {{$permission->name}}</label>
                                                    </li>
                                                @empty

                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <div class="errorMessage"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning mr-1"
                                data-dismiss="modal">
                            <i class="ft-x"></i>
                            {{__('global.close')}}
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i>
                            {{__('global.update')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Modal add role --}}
    <div class="modal fade text-left" id="add-role" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard/admin.add_role') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="add-role-form">
                    @csrf
                    <div class="form-group mt-3">
                        <div class="pb-2">
                            <span class="btn btn-info btn-sm" onclick="selectAll()">
                                {{__('global.select_all')}}
                            </span>
                            <span class="btn btn-info btn-sm" onclick="deselectAll()">
                                {{__('global.deselect_all')}}
                            </span>
                        </div>
                        <select name="roles[]" id="roles" class="form-control" multiple>
                            @foreach($roles as $id => $role)
                                <option
                                    value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($admin) && $admin->roles->contains($id)) ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <label for="error-roles"></label>
                    </div>
                    <div class="errorMessage"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning mr-1"
                                data-dismiss="modal">
                            <i class="ft-x"></i>
                            {{__('global.close')}}
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i>
                            {{__('global.update')}}
                        </button>
                    </div>
                </form>
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
    <script>
        function selectAll() {
            $("#roles > option").prop("selected", true);
            $("#roles").trigger("change");
        }

        function deselectAll() {
            $("#roles > option").prop("selected", false);
            $("#roles").trigger("change");
        }

        $('#add-admin-form').validate({
            errorPlacement: function (error, element) {
                console.log('error')
                console.log(error)
                console.log(element)
                console.log(element.attr("id"))

                $(element)
                    .closest("form")
                    .find("label[for='error-" + element.attr("id") + "']")
                    .append(error);
            },
            errorElement: "span",
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                },
                password: {
                    required: true,
                }

            },
            submitHandler: function (form) {
                $("#add-admin").addClass('loading')

                dashboardRequest.post('{{ route('dashboard.admins.add') }}', $("#add-admin-form").serialize(), function (response) {
                    $("#add-admin").removeClass('loading')
                    $("#add-admin-form .errorMessage").html(response.status ? dashboardRequest.getSuccessMessageHtml(response.message) : dashboardRequest.getErrorMessageHtml(response.message));
                    animateCSS('#add-admin .errorMessage', 'bounceIn');
                    setTimeout(function () {
                        animateCSS('#add-admin .errorMessage', 'flipOutX').then(() => $("#add-admin .errorMessage").html(''));
                        window.location.reload();
                    }, 5000)
                })
            }
        });

        $('#add-permission-form').validate({
            errorPlacement: function (error, element) {
                console.log('error')
                console.log(error)
                console.log(element)
                console.log(element.attr("id"))

                $(element)
                    .closest("form")
                    .find("label[for='error-" + element.attr("id") + "']")
                    .append(error);
            },
            errorElement: "span",

            submitHandler: function (form) {
                $("#add-permission").addClass('loading')
                url = $('#add-permission-url').val()
                dashboardRequest.post(url, $("#add-permission-form").serialize(), function (response) {
                    $("#add-permission").removeClass('loading')
                    $("#add-permission-form .errorMessage").html(response.status ? dashboardRequest.getSuccessMessageHtml(response.message) : dashboardRequest.getErrorMessageHtml(response.message));
                    animateCSS('#add-permission .errorMessage', 'bounceIn');
                    if (response.status) {
                        setTimeout(function () {
                            animateCSS('#add-permission .errorMessage', 'flipOutX').then(() => $("#add-permission .errorMessage").html(''));
                            // window.location.reload();
                        }, 5000)
                    }
                })
            }
        });

        $('#add-role-form').validate({
            errorPlacement: function (error, element) {
                console.log('error')
                console.log(error)
                console.log(element)
                console.log(element.attr("id"))

                $(element)
                    .closest("form")
                    .find("label[for='error-" + element.attr("id") + "']")
                    .append(error);
            },
            errorElement: "span",

            submitHandler: function (form) {
                $("#add-role").addClass('loading')
                url = $('#add-role-url').val()
                console.log(url)
                dashboardRequest.post(url, $("#add-role-form").serialize(), function (response) {
                    $("#add-role").removeClass('loading')
                    $("#add-role-form .errorMessage").html(response.status ? dashboardRequest.getSuccessMessageHtml(response.message) : dashboardRequest.getErrorMessageHtml(response.message));
                    animateCSS('#add-role .errorMessage', 'bounceIn');
                    if (response.status) {
                        setTimeout(function () {
                            animateCSS('#add-role .errorMessage', 'flipOutX').then(() => $("#add-role .errorMessage").html(''));
                            window.location.reload();
                        }, 5000)
                    }
                })
            }
        });


        function setUrl(url, type) {
            switch (type) {
                case 'permission':
                    $('#add-permission-url').val(url)
                    break;
                case 'role':
                    $('#add-role-url').val(url)
                    break;
                default:
                    $('#url').val(url)
            }
        }

    </script>
@endsection
