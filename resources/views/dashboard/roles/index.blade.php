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
                                    {{__('dashboard/role.title')}}
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
                            {{__('dashboard/role.actions')}}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a href=""
                               class="dropdown-item"
                               data-toggle="modal"
                               data-target="#add-role">
                                <i class="ft-plus"></i>
                                {{__('dashboard/role.add')}}
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
                                    <h4 class="card-title">{{__('dashboard/role.title')}}</h4>
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
                                                        {{__('dashboard/role.type')}}
                                                    </th>
                                                    <th>
                                                        {{__('dashboard/role.role_permission')}}
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
                                                            @foreach($role->permissions()->pluck('name') as $permission)
                                                                <span class="badge badge-info">{{ $permission }}</span>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            <div class="btn-group mr-1 mb-1">

                                                           
                                                            <a href="{{route('dashboard.roles.show',$role->id)}}"
                                                                class="btn btn-sm bg-info-light">
                                                                <i class="ft-eye "></i>
                                                                {{__('front/global.show')}}
                                                            </a>

                                                            <form action="{{ route('dashboard.role.delete', $role->id) }}"  method="POST"
                                                                onsubmit="return confirm('{{ __('dashboard/role.areYouSure') }}');" style="display: inline-block;">
                                                                @csrf

                                                                <input type="hidden" name="_method"
                                                                        value="DELETE">
                                                                <a href="#" class="btn btn-sm bg-info-light" onclick="$(this).parent().submit();">
                                                                    <i class="ft-trash-2"></i>
                                                                    {{__('dashboard/role.delete')}}
                                                                </a>
                                                            </form>
                                                                

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
                                                {{ $roles->links('vendor.pagination.bootstrap-4') }}
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
                                                @forelse($permissionGroups as $group => $permissions)
                                                    <div class="col-md-6">
                                                        <div id="heading51" class="card-header border-success mt-1">
                                                            <a data-toggle="collapse"
                                                               data-parent="#{{ toSlug($group) }}"
                                                               href="#accordion-{{ toSlug($group) }}"
                                                               aria-expanded="true"
                                                               aria-controls="accordion-{{ toSlug($group) }}"
                                                               class="card-title lead success">
                                                                {{ $group }}
                                                            </a>
                                                        </div>
                                                        <div id="accordion-{{ toSlug($group) }}" role="tabpanel"
                                                             aria-labelledby="heading-{{ toSlug($group) }}"
                                                             class="card-collapse collapse show"
                                                             aria-expanded="true">
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <ul>
                                                                        @forelse($permissions as $permission)
                                                                            {{--                                                                            <li>{{ $permission->name }}</li>--}}
                                                                            <label><input type="checkbox"
                                                                                          name="permissions[]"
                                                                                          id="permissions"
                                                                                          value="{{$permission->id}}">
                                                                                {{$permission->name}}</label>
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


        {{--        $(function () {--}}
        {{--            let excelButtonTrans = '{{ __('dashboard/role.datatables.excel') }}'--}}
        {{--            let pdfButtonTrans = '{{ __('dashboard/role.datatables.pdf') }}'--}}
        {{--            let printButtonTrans = '{{ __('dashboard/role.datatables.print') }}'--}}

        {{--            let languages = {--}}
        {{--                'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json',--}}
        {{--                'ar': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json',--}}
        {{--            };--}}

        {{--            $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {className: 'btn'})--}}
        {{--            $.extend(true, $.fn.dataTable.defaults, {--}}
        {{--                language: {--}}
        {{--                    url: languages['{{ app()->getLocale() }}']--}}
        {{--                },--}}
        {{--                columnDefs: [{--}}
        {{--                    orderable: false,--}}
        {{--                    className: 'select-checkbox',--}}
        {{--                    targets: 0--}}
        {{--                }, {--}}
        {{--                    orderable: false,--}}
        {{--                    searchable: false,--}}
        {{--                    targets: -1--}}
        {{--                }],--}}
        {{--                select: {--}}
        {{--                    style: 'multi+shift',--}}
        {{--                    selector: 'td:first-child'--}}
        {{--                },--}}
        {{--                order: [],--}}
        {{--                scrollX: true,--}}
        {{--                pageLength: 10,--}}
        {{--                dom: 'lBfrtip<"actions">',--}}
        {{--                buttons: [--}}
        {{--                    {--}}
        {{--                        extend: 'excel',--}}
        {{--                        className: 'btn btn-outline-success btn-sm-width box-shadow-3 mb-1',--}}
        {{--                        text: excelButtonTrans,--}}
        {{--                        exportOptions: {--}}
        {{--                            columns: ':visible'--}}
        {{--                        }--}}
        {{--                    },--}}
        {{--                    {--}}
        {{--                        extend: 'pdf',--}}
        {{--                        className: 'btn btn-outline-success btn-sm-width box-shadow-3 mb-1',--}}
        {{--                        text: pdfButtonTrans,--}}
        {{--                        exportOptions: {--}}
        {{--                            columns: ':visible'--}}
        {{--                        }--}}
        {{--                    },--}}
        {{--                    {--}}
        {{--                        extend: 'print',--}}
        {{--                        className: 'btn btn-outline-success btn-sm-width box-shadow-3 mb-1',--}}
        {{--                        text: printButtonTrans,--}}
        {{--                        exportOptions: {--}}
        {{--                            columns: ':visible'--}}
        {{--                        }--}}
        {{--                    }--}}
        {{--                ]--}}
        {{--            });--}}

        {{--            $.fn.dataTable.ext.classes.sPageButton = '';--}}
        {{--        });--}}
        {{--        $(function () {--}}
        {{--            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)--}}
        {{--            let addButtonTrans = '{{__('dashboard/role.add')}}'--}}
        {{--            let addButton = {--}}
        {{--                text: addButtonTrans,--}}

        {{--                className: 'btn btn-outline-info btn-sm-width box-shadow-3 mb-1',--}}
        {{--                action: function () {--}}
        {{--                    window.location = "{{ route('role.create') }}"--}}
        {{--                }--}}
        {{--            }--}}
        {{--            dtButtons.push(addButton)--}}

        {{--            let deleteButtonTrans = '{{__('dashboard/role.datatables.delete')}}'--}}
        {{--            let deleteButton = {--}}
        {{--                text: deleteButtonTrans,--}}
        {{--                url: "{{ route('role.mass_destroy') }}",--}}
        {{--                className: 'btn btn-outline-danger btn-sm-width box-shadow-3 mb-1',--}}
        {{--                action: function (e, dt, node, config) {--}}
        {{--                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {--}}
        {{--                        return $(entry).data('entry-id')--}}
        {{--                    });--}}

        {{--                    if (ids.length === 0) {--}}
        {{--                        alert('{{ __('dashboard/role.datatables.zero_selected') }}')--}}

        {{--                        return--}}
        {{--                    }--}}

        {{--                    if (confirm(' {{__('dashboard/role.areYouSure')}} ')) {--}}
        {{--                        $.ajax({--}}
        {{--                            headers: {--}}
        {{--                                'x-csrf-token': $('input[name="_token"]').attr('content')--}}
        {{--                            },--}}
        {{--                            method: 'POST',--}}
        {{--                            url: config.url,--}}
        {{--                            data: { ids: ids, _method: 'DELETE', _token:'{{csrf_token()}}' }})--}}
        {{--                            .done(function () { location.reload() })--}}
        {{--                    }--}}
        {{--                }--}}
        {{--            }--}}
        {{--            dtButtons.push(deleteButton)--}}

        {{--            $.extend(true, $.fn.dataTable.defaults, {--}}
        {{--                order: [[ 1, 'desc' ]],--}}
        {{--                pageLength: 10,--}}
        {{--            });--}}
        {{--            $('.datatable-Role:not(.ajaxTable)').DataTable({ buttons: dtButtons })--}}
        {{--            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){--}}
        {{--                $($.fn.dataTable.tables(true)).DataTable()--}}
        {{--                    .columns.adjust();--}}
        {{--            });--}}
        {{--        })--}}

    </script>
@endsection
