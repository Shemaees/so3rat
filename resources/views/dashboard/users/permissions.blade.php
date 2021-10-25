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
                                        {{__('dashboard/role.home')}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{__('dashboard/user.title')}}
                                </li>
                                <li class="breadcrumb-item active">
                                    {{__('dashboard/user.roles')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                   
                </div>
            </div>


            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{__('dashboard/user.Roles')}}</h4>
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
                                                        <th colspan="5" class="text-center"> {{ __('dashboard/role.title') }} </th>
                                                    </tr>
                                                <tr>
                                                    <th width="10">

                                                    </th>
                                                    <th>
                                                        {{__('dashboard/role.name')}}
                                                    </th>
                                                    <th>
                                                        {{__('dashboard/role.type')}}
                                                    </th>
                                                    <th>
                                                        {{__('dashboard/role.actions')}}
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($roles as $key => $role)
                                                    <tr data-entry-id="{{ $role->id}}">
                                                        <td>

                                                        </td>
                                                        <td>
                                                            {{ $role->name ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $role->guard_name ?? '' }}
                                                        </td>
                                                        <td>
                                                            <div class="btn-group mr-1 mb-1">
                                                                revoke
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <div class="row mr-2 ml-2">
                                                            <button type="text"
                                                                    class="btn btn-lg btn-block btn-outline-danger mb-2"
                                                                    id="type-error">
                                                                {{__('dashboard/role.no_data')}}
                                                            </button>
                                                        </div>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                            {{--Pagination--}}
                                            <div class="d-flex justify-content-center">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{__('dashboard/user.Permissions')}}</h4>
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
                                                        {{__('dashboard/role.name')}}
                                                    </th>
                                                    <th>
                                                        {{__('dashboard/role.type')}} - Guard
                                                    </th>
                                                    <th>
                                                        {{__('dashboard/role.Role')}}
                                                    </th>
                                                    <th>
                                                        {{__('dashboard/role.actions')}}
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($permissions as $key => $permission)
                                                    <tr data-entry-id="{{ $permission->id}}">
                                                        <td>

                                                        </td>
                                                        <td>
                                                            {{ $permission->name ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $permission->guard_name ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ @$permission->role ?? '' }}
                                                        </td>
                                                        <td>
                                                            <div class="btn-group mr-1 mb-1">
                                                                revoke
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <div class="row mr-2 ml-2">
                                                            <button type="text"
                                                                    class="btn btn-lg btn-block btn-outline-danger mb-2"
                                                                    id="type-error">
                                                                {{__('dashboard/role.no_data')}}
                                                            </button>
                                                        </div>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                            {{--Pagination--}}
                                            <div class="d-flex justify-content-center">
                                            </div>
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
    <!-- Modal -->
    <div class="modal fade text-left" id="add-role" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard/role.add_new') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="add-role-form">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">{{ __('dashboard/role.name') }}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="{{ __('dashboard/role.name') }}">
                            <label for="error-name"></label>
                        </div>
                        <div class="form-group">
                            <label for="permissions">{{ __('dashboard/role.role_permission') }}</label>
                            <div class="pb-2">
                                <span class="btn btn-info btn-sm" id="selectAll" onclick="selectAll()">
                                    {{__('dashboard/role.select_all')}}
                                </span>
                                <span class="btn btn-info btn-sm" onclick="deselectAll()">
                                    {{__('dashboard/role.deselect_all')}}
                                </span>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div id="accordionWrap5" role="tablist" aria-multiselectable="true">
                                        <div class="card collapse-icon accordion-icon-rotate">
                                            <div class="row">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="error-description"></label>
                        </div>
                    </div>
                    <div class="errorMessage"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning mr-1"
                                data-dismiss="modal">
                            <i class="ft-x"></i>
                            {{__('dashboard/role.close')}}
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i>
                            {{__('dashboard/role.save')}}
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
    <script src="{{ asset('assets/dashboard/js/scripts/forms/checkbox-radio.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/dashboard/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/scripts/navs/navs.js') }}" type="text/javascript"></script>

    <script>

        // function selectAll() {
        //     $("#permissions > option").prop("selected", true);
        //     $("#permissions").trigger("change");
        // }
        $(document).ready(function () {
            $('#selectAll').on('click', function () {
                if (this.checked) {
                    $('.checkbox').each(function () {
                        this.checked = true;
                    });
                } else {
                    $('.checkbox').each(function () {
                        this.checked = false;
                    });
                }
            });

            $('.checkbox').on('click', function () {
                if ($('.checkbox:checked').length == $('.checkbox').length) {
                    $('#selectAll').prop('checked', true);
                } else {
                    $('#selectAll').prop('checked', false);
                }
            });
        });


        function deselectAll() {
            $("#permissions > option").prop("selected", false);
            $("#permissions").trigger("change");
        }

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
            rules: {
                name: {
                    required: true,
                },
                permissions: {
                    required: true,
                }

            },
            submitHandler: function (form) {
                $("#add-role").addClass('loading')

                dashboardRequest.post('{{ route('dashboard.roles.add') }}', $("#add-role-form").serialize(), function (response) {
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



    </script>
@endsection
