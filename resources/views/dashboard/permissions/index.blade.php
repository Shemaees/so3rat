@extends('layouts.dashboard')

@section('style')

    {{--    <link href="{{ asset('assets/dashboard/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet"/>--}}
    {{--    <link href="{{ asset('assets/dashboard/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}" rel="stylesheet"/>--}}
    {{--    <link href="{{ asset('assets/dashboard/vendors/css/tables/datatable/select.dataTables.min.css') }}" rel="stylesheet"/>--}}

    <style>
        .privileges-ul
        {
            background-color: #f5f5f5;
            border-radius: 2px;
            font-size: 16px;
            font-weight: 600;
            color: black;
        }
        .privileges-ul li , .privileges-ul>.row
        {
            margin-bottom:1px;
            background-color: #f0f0f0;
        }
        a.btn.btn-info
        {
            height: 35px;
        }
        .ft-delete{
            color:brown;
            font-size:15px;
        }
        .ft-edit{
            color:green;
            font-size:15px;
        }
    </style>
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
                                        {{__('dashboard/permission.home')}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{__('dashboard/permission.title')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <button type="button" class="mr-3 ml-auto btn btn-outline-info btn-sm-width box-shadow-3 mb-1"
                        data-toggle="modal"
                        data-target="#add-permission">
                    {{ __('dashboard/permission.add') }}
                    <i class="ft-plus icon-left"></i>
                </button>
            </div>

            <div class="content-body">
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('dashboard/permission.title') }}</h4>
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
                                                                 class="card-collapse collapse @if($loop->first) show @endif "
                                                                 aria-expanded="true">
                                                                <div class="card-content">
                                                                    <div class="card-body privileges-ul pt-1 pb-1">
                                                                        @forelse($permissions as $permission)
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
                                                                         @empty
                                                                            <div class="row mr-2 ml-2">
                                                                                <button type="text"
                                                                                        class="btn btn-lg btn-block btn-outline-danger mb-2"
                                                                                        id="type-error">
                                                                                    No Data
                                                                                </button>
                                                                            </div>
                                                                        @endforelse
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <tr>
                                                            <div class="row mr-2 ml-2 col-12">
                                                                <button type="text"
                                                                        class="btn btn-lg btn-block btn-outline-danger mb-2"
                                                                        id="type-error">
                                                                    No Data
                                                                </button>
                                                            </div>
                                                        </tr>
                                                    @endforelse
                                                </div>
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
    <div class="modal fade text-left" id="add-permission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard/permission.add_new') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="add-permission-form">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">{{ __('dashboard/permission.name') }}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="{{ __('dashboard/permission.name') }}">
                            <label for="error-name"></label>
                        </div>
                        <div class="form-group">
                            <label for="guard_name">Guard Name</label>
                            <input type="text" class="form-control" id="guard_name" name="guard_name"
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


    <div class="modal fade text-left" id="edit-permission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard/permission.add_new') }}</h3>
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
@endsection

@section('vendor')
    {{--    <script src="{{asset('assets/dashboard/vendors/js/tables/datatable/datatables.min.js')}}"--}}
    {{--            type="text/javascript"></script>--}}
    {{--    <script src="{{asset('dashboard/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"--}}
    {{--            type="text/javascript"></script>--}}
@endsection

@section('script')
    <script src="{{asset('assets/dashboard/js/scripts/forms/checkbox-radio.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>
    {{--    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.flash.min.js') }}"></script>--}}
    {{--    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.html5.min.js') }}"></script>--}}
    {{--    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.print.min.js') }}"></script>--}}
    {{--    <script src="{{ asset('assets/dashboard/js/scripts/navs/navs.js') }}" type="text/javascript"></script>--}}
    <script>
        $('#add-permission-form').validate({
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
                }
            },
            submitHandler: function (form) {
                $("#add-permission").addClass('loading')

                dashboardRequest.post('{{ route('dashboard.permissions.add') }}', $("#add-permission-form").serialize(), function (response) {
                    $("#loginForm").removeClass('loading')
                    $("#loginForm .errorMessage").html(response.status ? dashboardRequest.getSuccessMessageHtml(response.message) : dashboardRequest.getErrorMessageHtml(response.message));
                    animateCSS('#add-permission .errorMessage', 'bounceIn');
                    setTimeout(function () {
                        animateCSS('#add-permission .errorMessage', 'flipOutX').then(() => $("#add-permission .errorMessage").html(''));
                        window.location.reload();
                    }, 5000)
                })
            }
        });

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

        function editPermission(idd , name , guard_name )
        {
            $('#id').val(idd);
            $('#name2').val(name);
            $('#guard_name2').val(guard_name);
        }
    </script>
@endsection
