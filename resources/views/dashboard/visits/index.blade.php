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
                                    {{__('dashboard/visit.title')}}
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
                               data-target="#add-visit">
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
                                    <h4 class="card-title">{{__('dashboard/visit.title')}}</h4>
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
                                                class="table table-striped table-bordered dom-jQuery-events">
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
                                                @forelse($visits as $visit)
                                                    <tr data-entry-id="{{ $visit->id}}">
                                                        <td>

                                                        </td>
                                                        <td>
                                                            {{ $visit->name ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $visit->price }}
                                                        </td>
                                                        <td>
                                                            {{ $visit->description }}
                                                        </td>
                                                        <td>
                                                            @foreach($categories as $category)
                                                                @if($category->id === $visit->category_id)
                                                                    {{ $category->name }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @if($visit->status == '1' )
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
                                                                    <a href="{{route('dashboard.visits.show',$visit->id)}}" class="dropdown-item">
                                                                        <i class="ft-eye"></i>
                                                                        {{__('global.show')}}
                                                                    </a>
                                                                    <a href="#" class="dropdown-item btn-edit"
                                                                       data-toggle="modal"
                                                                       data-edit-url='{{ route('dashboard.visits.edit', $visit->id )}}'
                                                                       data-target="#edit-visit"
                                                                       onclick="setUrl('{{ route('dashboard.visits.update', $visit->id) }}')">
                                                                        <i class="ft-edit"></i>
                                                                        {{__('global.edit')}}
                                                                    </a>
                                                                    <a href="{{route('dashboard.visits.change_status',$visit->id)}}"
                                                                       class="dropdown-item"
                                                                       onclick="return confirm('{{__('dashboard/visit.change_status')}}');">
                                                                        @if($visit->status == 0)
                                                                            <i class="ft-lock primary"></i>
                                                                            {{__('global.activate')}}
                                                                        @else
                                                                            <i class="ft-unlock primary"></i>
                                                                            {{__('global.deactivate')}}
                                                                        @endif
                                                                    </a>
                                                                    <form
                                                                        action="{{ route('dashboard.visit.delete', $visit->id) }}"
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
{{--                                                <tfoot>--}}
{{--                                                {{ $visits->links() }}--}}
{{--                                                </tfoot>--}}
                                            </table>
{{--                                             Pagination--}}
                                            <div class="d-flex justify-content-center">
                                                {{ $visits->links('vendor.pagination.bootstrap-4') }}
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

    <!--add visit Modal -->
    <div class="modal fade text-left" id="add-visit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard/visit.add_new') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="add-visit-form">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">{{ __('dashboard/visit.name') }}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="{{ __('dashboard/visit.name') }}">
                            <label for="error-name"></label>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="price">{{ __('dashboard/visit.price') }}</label>
                                <input type="number" class="form-control" id="price" name="price"
                                       placeholder="{{ __('dashboard/visit.price') }}">
                                <label for="error-price"></label>
                            </div>
                            <div class="form-group col-6">
                                <label for="categories">{{ __('dashboard/visit.category') }}</label>
                                <select name="categories" id="categories" class="form-control">
                                    @foreach($categories as $category)
                                        <option
                                            value="{{ $category->id }}" >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <label for="error-roles"></label>
                            </div>

                        </div>
                        <div class="form-group ">
                            <label for="description">{{ __('dashboard/visit.description') }}</label>
                            <textarea type="text" class="form-control" id="description" name="description"
                                   placeholder="{{ __('dashboard/visit.description') }}">
                            </textarea>
                            <label for="error-period"></label>
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

    <!--edit visit Modal -->
    <div class="modal fade text-left" id="edit-visit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard/visit.edit') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit-visit-form">
                    <div class="modal-body">
                        <input type="hidden" id="edit-visit-url">
                        <div class="form-group">
                            <label for="name">{{ __('dashboard/visit.name') }}</label>
                            <input type="text" class="form-control" id="name-edit" name="name"
                                   placeholder="{{ __('dashboard/visit.name') }}"
                                   value="" >
                            <label for="error-name"></label>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="price">{{ __('dashboard/visit.price') }}</label>
                                <input type="number" class="form-control" id="price-edit" name="price"
                                       placeholder="{{ __('dashboard/visit.price') }}"
                                       value="">
                                <label for="error-price"></label>
                            </div>
                            <div class="form-group col-6">
                                <label for="categories">{{ __('dashboard/visit.category') }}</label>
                                <select name="categories" id="categories-edit" class="form-control">
                                    @foreach($categories as $category)
                                        <option
                                            value="{{ $category->id }}" >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <label for="error-roles"></label>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="description">{{ __('dashboard/visit.description') }}</label>
                            <textarea type="text" class="form-control" id="description-edit" name="description"
                                      placeholder="{{ __('dashboard/visit.description') }}">
                            </textarea>
                            <label for="error-period"></label>
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

    <script>

        $('#add-visit-form').validate({
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
                $("#add-visit").addClass('loading')

                dashboardRequest.post('{{ route('dashboard.visits.add') }}', $("#add-visit-form").serialize(), function (response) {
                    $("#add-visit").removeClass('loading')
                    $("#add-visit-form .errorMessage").html(response.status ? dashboardRequest.getSuccessMessageHtml(response.message) : dashboardRequest.getErrorMessageHtml(response.message));
                    animateCSS('#add-visit.errorMessage', 'bounceIn');
                    if (response.status){
                        setTimeout(function () {
                            animateCSS('#add-visit .errorMessage', 'flipOutX').then(() => $("#add-visit .errorMessage").html(''));
                            window.location.reload();
                        }, 5000)
                    }

                })
            }
        });

        $('#edit-visit-form').validate({
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
                $("#edit-visit").addClass('loading')
                url = $('#edit-visit-url').val()
                console.log(url)
                dashboardRequest.post(url, $("#edit-visit-form").serialize(), function (response) {
                    $("#edit-visit").removeClass('loading')
                    $("#edit-visit-form.errorMessage").html(response.status ? dashboardRequest.getSuccessMessageHtml(response.message) : dashboardRequest.getErrorMessageHtml(response.message));
                    animateCSS('#edit-visit .errorMessage', 'bounceIn');
                    if (response.status){
                        setTimeout(function () {
                            animateCSS('#edit-visit .errorMessage', 'flipOutX').then(() => $("#edit-visit .errorMessage").html(''));
                            window.location.reload();
                        }, 5000)
                    }

                })
            }
        });

        function setUrl(url) {
             $('#edit-visit-url').val(url)
        }

        $('.btn-edit').on('click', function (e) {
            // e.preventDefault();
            // set
            url = $(this).data('edit-url')
            dashboardRequest.get(url, function (response) {
                if (response.status) {
                    $('#name-edit').val(response.data.name)
                    $('#price-edit').val(response.data.price)
                    $('#categories-edit').val(response.data.categories)
                    $('#description-edit').val(response.data.description)

                    console.log(response)
                }
                console.log('outside')
            })
        })

    </script>
@endsection
