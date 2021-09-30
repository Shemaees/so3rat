@extends('layouts.dashboard')

@section('style')

    <link href="{{ asset('assets/dashboard/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/dashboard/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/dashboard/vendors/css/tables/datatable/select.dataTables.min.css') }}" rel="stylesheet"/>
    <link href="{{asset('assets/dashboard/vendors/css/forms/toggle/switchery.min.css')}}"  rel="stylesheet" type="text/css">
    <link href="{{asset('assets/dashboard/css-rtl/core/colors/palette-switch.css')}}" rel="stylesheet" type="text/css">

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
                                    {{__('dashboard/category.title')}}
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
                               data-target="#add-category">
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
                                    <h4 class="card-title">{{__('dashboard/category.title')}}</h4>
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
                                                        {{__('dashboard/category.name')}}
                                                    </th>
                                                    <th>
                                                        {{__('global.status')}}
                                                    </th>
                                                    <th>
                                                        {{__('global.actions')}}
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($categories as $category)
                                                    <tr data-entry-id="{{ $category->id}}">
                                                        <td>

                                                        </td>
                                                        <td>
                                                            {{ $category->name ?? '' }}
                                                        </td>
                                                        <td>
                                                            @if($category->status === 1)
                                                                <span class="badge badge-default badge-success pt-1 pb-1"> {{__('global.active')}}</span>
                                                            @else
                                                                <span class="badge badge-default badge-danger pt-1 pb-1"> {{__('global.non_active')}}</span>
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
{{--                                                                    <a href="{{route('dashboard.categories.show',$category->id)}}" class="dropdown-item">--}}
{{--                                                                        <i class="ft-eye"></i>--}}
{{--                                                                        {{__('global.show')}}--}}
{{--                                                                    </a>--}}
                                                                    <a href="#" class="dropdown-item btn-edit"
                                                                       data-toggle="modal"
                                                                       data-edit-url='{{ route('dashboard.categories.edit', $category->id )}}'
                                                                       data-target="#edit-category"
                                                                       onclick="setUrl('{{ route('dashboard.categories.update', $category->id )}}')">
                                                                        <i class="ft-edit"></i>
                                                                        {{__('global.edit')}}
                                                                    </a>
                                                                    <a href="{{route('dashboard.categories.change_status',$category->id)}}"
                                                                       class="dropdown-item"
                                                                       onclick="return confirm('{{__('dashboard/category.change_status')}}');">
                                                                        @if($category->status == 0)
                                                                            <i class="ft-lock primary"></i>
                                                                            {{__('global.activate')}}
                                                                        @else
                                                                            <i class="ft-unlock primary"></i>
                                                                            {{__('global.deactivate')}}
                                                                        @endif
                                                                    </a>
                                                                    <form
                                                                        action="{{ route('dashboard.category.delete', $category->id) }}"
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
                                                                    <form
                                                                        action="{{ route('dashboard.categories.force', $category->id) }}"
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
{{--                                                {{ $categories->links() }}--}}
                                                </tfoot>
                                            </table>
                                            {{ $categories->links('vendor.pagination.bootstrap-4') }}
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


    <!--add category Modal -->
    <div class="modal fade text-left" id="add-category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard/category.add_new') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="add-category-form">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">{{ __('dashboard/category.name') }}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="{{ __('dashboard/category.name') }}">
                            <label for="error-name"></label>
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
                            {{__('global.save')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--edit category Modal -->
    <div class="modal fade text-left" id="edit-category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard/category.edit') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit-category-form">
                    <div class="modal-body">
                        <input type="hidden" id="edit-category-url">
                        <div class="form-group">
                            <label for="name">{{ __('dashboard/category.name') }}</label>
                            <input type="text" class="form-control" id="name-edit" name="name"
                                   placeholder="{{ __('dashboard/category.name') }}"
                                   value="">
                            <label for="error-name"></label>
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

@endsection

@section('vendor')
    <script src="{{ asset('assets/dashboard/vendors/js/tables/datatable/datatables.min.js')}}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/forms/toggle/bootstrap-switch.min.js')}}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>

@endsection

@section('script')
{{--    <script src="{{ asset('assets/dashboard/js/scripts/forms/checkbox-radio.js')}}" type="text/javascript"></script>--}}
    <script src="{{ asset('assets/dashboard/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/scripts/navs/navs.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/dashboard/js/scripts/forms/switch.js')}}" type="text/javascript"></script>

    <script>

        $('#add-category-form').validate({
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
                price: {
                    required: true,
                },
                visits_number: {
                    required: true,
                },
                period: {
                    required: true,
                },
                description: {
                    required: true,
                }

            },
            submitHandler: function (form) {
                $("#add-category").addClass('loading')

                dashboardRequest.post('{{ route('dashboard.categories.add') }}', $("#add-category-form").serialize(), function (response) {
                    $("#add-category").removeClass('loading')
                    $("#add-category-form .errorMessage").html(response.status ? dashboardRequest.getSuccessMessageHtml(response.message) : dashboardRequest.getErrorMessageHtml(response.message));
                    animateCSS('#add-category.errorMessage', 'bounceIn');
                    if (response.status){
                        setTimeout(function () {
                            animateCSS('#add-category .errorMessage', 'flipOutX').then(() => $("#add-category .errorMessage").html(''));
                            window.location.reload();
                        }, 5000)
                    }

                })
            }
        });

        $('#edit-category-form').validate({
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
                price: {
                    required: true,
                },
                visits_number: {
                    required: true,
                },
                period: {
                    required: true,
                },
                description: {
                    required: true,
                }

            },
            submitHandler: function (form) {
                $("#edit-category").addClass('loading')
                url = $('#edit-category-url').val()
                console.log(url)
                dashboardRequest.post(url, $("#edit-category-form").serialize(), function (response) {
                    $("#edit-category").removeClass('loading')
                    $("#edit-category-form .errorMessage").html(response.status ? dashboardRequest.getSuccessMessageHtml(response.message) : dashboardRequest.getErrorMessageHtml(response.message));
                    animateCSS('#edit-category .errorMessage', 'bounceIn');
                    if (response.status){
                        setTimeout(function () {
                            animateCSS('#edit-category .errorMessage', 'flipOutX').then(() => $("#edit-category .errorMessage").html(''));
                            window.location.reload();
                        }, 2000)
                    }

                })
            }
        });

        function setUrl(url) {
            $('#edit-category-url').val(url)
        }

        $('.btn-edit').on('click', function (e) {
            // e.preventDefault();
            // set
            url = $(this).data('edit-url')
            dashboardRequest.get(url, function (response) {
                if (response.status) {
                    $('#name-edit').val(response.data.name)
                    console.log(response)
                }
                console.log('outside')
            })
        })

    </script>
@endsection
