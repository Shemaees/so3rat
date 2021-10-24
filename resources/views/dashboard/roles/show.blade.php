@extends('layouts.dashboard')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/roles.css') }}">
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
                                                            {{__('dashboard/role.actions')}}</button>
                                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                            <form
                                                                action="{{ route('dashboard.role.delete', $role->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('{{ __('dashboard/role.areYouSure') }}');"
                                                                style="display: inline-block;">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <a href="#" class="dropdown-item"
                                                                   onclick="$(this).parent().submit()">
                                                                    <i class="ft-trash-2"></i>
                                                                    {{__('dashboard/role.delete')}}
                                                                </a>
                                                            </form>

                                                            <a href="{{ route('dashboard.role.edit', $role->id) }}"
                                                               class="dropdown-item"
                                                                {{--                                                               data-toggle="modal"--}}
                                                                {{--                                                               data-target="#role-edit"--}}
                                                            >
                                                                <i class="ft-edit"></i>
                                                                {{__('dashboard/role.edit')}}
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
                                                                        <div class="col-md-12">
                                                                            <div id="heading51"
                                                                                 class="card-header border-success mt-1">
                                                                                <a data-toggle="collapse"
                                                                                   data-parent="#{{ toSlug($role->guard_name) }}"
                                                                                   href="#accordion-{{ toSlug($role->guard_name) }}"
                                                                                   aria-expanded="true"
                                                                                   aria-controls="accordion-{{ toSlug($role->guard_name) }}"
                                                                                   class="card-title lead success">
                                                                                    {{ $role->name }} - {{ $role->guard_name }}
                                                                                    <a class="btn btn-info mb-0 edit_role" href="#" onclick="editRole({{ $role->id }} , '{{ $role->name }}' , '{{ $role->guard_name }}')"
                                                                                        data-toggle="modal" data-target="#edit-role">
                                                                                        <i class="ft-edit"></i>
                                                                                    </a>
                                                                                </a>
                                                                            </div>
                                                                            <div id="accordion-{{ toSlug($role->guard_name) }}"
                                                                                 role="tabpanel"
                                                                                 aria-labelledby="heading-{{ toSlug($role->guard_name) }}"
                                                                                 class="card-collapse collapse show"
                                                                                 aria-expanded="true">
                                                                                <div class="card-content">
                                                                                    <div class="card-body privileges-ul pt-1 pb-1">
                                                                                        @foreach($rolePermissions as $permission)
                                                                                        <div class="row">
                                                                                            <div class="col-8">{{ $permission->name }}</div>
                                                                                            <div class="col-2">
                                                                                                <a class="btn btn-info mb-0" href="#" onclick="editPermission({{ $permission->id }} , '{{ $permission->name }}' , '{{ $permission->guard_name }}')"
                                                                                                    data-toggle="modal" data-target="#edit-permission">
                                                                                                    <i class="ft-edit"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="col-2">
                                                                                                <a class="btn btn-info mb-0" href="{{ route('dashboard.permissions.delete',$permission->id) }}"
                                                                                                    onClick="if (!confirm('{{ __('dashboard/permission.Do you want to delete this Permission !') }}')) return false;" >
                                                                                                    <i class="ft-delete"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>   
                                                                                        @endforeach

                                                                                    </div>
                                                                                </div>
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
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
    

    <div class="modal fade text-left" id="edit-permission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard/permission.editPermission') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit-permission-form">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id" value="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">{{ __('dashboard/permission.name') }}</label>
                            <input type="text" class="form-control" id="name2" name="name"
                                   placeholder="{{ __('dashboard/permission.name') }}">
                            <label for="error-name"></label>
                        </div>
                        <div class="form-group">
                            <label for="guard_name">Guard Name</label>
                            <input type="text" class="form-control" id="guard_name2" name="guard_name"
                                   placeholder="Ex. web">
                            <label for="error-guard_name"></label>
                        </div> 
                    </div>
                    <div class="errorMessage"></div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                               value="{{ __('front/global.close')}}">
                        <input type="submit" class="btn btn-outline-primary btn-lg" value="{{ __('front/global.add') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="edit-role" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard/role.editrole') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit-role-form">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="idRole" value="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">{{ __('dashboard/role.name') }}</label>
                            <input type="text" class="form-control" id="nameRole" name="name"
                                   placeholder="{{ __('dashboard/role.name') }}">
                            <label for="error-name"></label>
                        </div>
                        <div class="form-group">
                            <label for="guard_name">Guard Name</label>
                            <input type="text" class="form-control" id="guard_nameRole" name="guard_name"
                                   placeholder="Ex. web">
                            <label for="error-guard_name"></label>
                        </div> 
                    </div>
                    <div class="errorMessage"></div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                               value="{{ __('front/global.close')}}">
                        <input type="submit" class="btn btn-outline-primary btn-lg" value="{{ __('front/global.add') }}">
                    </div>
                </form>
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

        $('#edit-permission-form').validate({
            errorPlacement: function (error, element) {
                //console.log('error')
                //console.log(error)
                //console.log(element)
                //console.log(element.attr("id"))

                $(element)
                    .closest("form")
                    .find("label[for='error-" + element.attr("id") + "']")
                    .append(error);
            },
            errorElement: "span",
            rules: {
                guard_name: {
                    required: true,
                },
                name: {
                    required: true,
                },
                id: {
                    required: true,
                }
            },
            submitHandler: function (form) {
                $("#edit-permission").addClass('loading')

                dashboardRequest.post('{{ route('dashboard.permissions.update') }}', $("#edit-permission-form").serialize(), function (response) {
                    $("#loginForm").removeClass('loading')
                    $("#loginForm .errorMessage").html(response.status ? dashboardRequest.getSuccessMessageHtml(response.message) : dashboardRequest.getErrorMessageHtml(response.message));
                    animateCSS('#edit-permission .errorMessage', 'bounceIn');
                    setTimeout(function () {
                        animateCSS('#edit-permission .errorMessage', 'flipOutX').then(() => $("#edit-permission .errorMessage").html(''));
                        window.location.reload();
                    }, 5000)
                })
            }
        });

        $('#edit-role-form').validate({
            errorPlacement: function (error, element) {
                $(element)
                    .closest("form")
                    .find("label[for='error-" + element.attr("id") + "']")
                    .append(error);
            },
            errorElement: "span",
            rules: {
                guard_name: {
                    required: true,
                },
                name: {
                    required: true,
                },
                id: {
                    required: true,
                }
            },
            submitHandler: function (form) {
                $("#edit-role").addClass('loading')

                dashboardRequest.post('{{ route('dashboard.role.update',0) }}', $("#edit-role-form").serialize(), function (response) {
                    $("#loginForm").removeClass('loading')
                    $("#loginForm .errorMessage").html(response.status ? dashboardRequest.getSuccessMessageHtml(response.message) : dashboardRequest.getErrorMessageHtml(response.message));
                    animateCSS('#edit-role .errorMessage', 'bounceIn');
                    setTimeout(function () {
                        animateCSS('#edit-role .errorMessage', 'flipOutX').then(() => $("#edit-role .errorMessage").html(''));
                        window.location.reload();
                    }, 5000)
                })
            }
        });

        function editPermission(idd , name , guard_name )
        {
            $('#id').val(idd);
            $('#name2').val(name);
            $('#guard_name2').val(guard_name);
        }

        function editRole(idd , name , guard_name )
        {
            $('#idRole').val(idd);
            $('#nameRole').val(name);
            $('#guard_nameRole').val(guard_name);
        }
    </script>
@endsection
