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
                                    {{__('dashboard/subscription.title')}}
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
                               data-target="#add-subscription">
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
                                    <h4 class="card-title">{{__('dashboard/subscription.title')}}</h4>
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
                                                        {{__('dashboard/subscription.name')}}
                                                    </th>
                                                    <th>
                                                        {{__('dashboard/subscription.price')}}
                                                    </th>
                                                    <th>
                                                        {{__('dashboard/subscription.visits_number')}}
                                                    </th>
                                                    <th>
                                                        {{__('dashboard/subscription.period')}}
                                                    </th>
                                                    <th>
                                                        {{__('global.actions')}}
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($subscriptions as $subscription)
                                                    <tr data-entry-id="{{ $subscription->id}}">
                                                        <td>

                                                        </td>
                                                        <td>
                                                            {{ $subscription->name ?? '' }}
                                                        </td>
                                                        <td>
                                                            {{ $subscription->price }}
                                                        </td>
                                                        <td>
                                                            {{ $subscription->visits_number }}
                                                        </td>
                                                        <td>
                                                            {{ $subscription->period }}
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
                                                                    <a href="{{route('dashboard.subscriptions.show',$subscription->id)}}"
                                                                       class="dropdown-item">
                                                                        <i class="ft-eye"></i>
                                                                        {{__('global.show')}}
                                                                    </a>
                                                                    <a href="#" class="dropdown-item btn-edit"
                                                                       data-toggle="modal"
                                                                       data-edit-url='{{ route('dashboard.subscriptions.edit', $subscription->id )}}'
                                                                       data-target="#edit-subscription"
                                                                       onclick="setUrl('{{ route('dashboard.subscriptions.update', $subscription->id) }}')">
                                                                        <i class="ft-edit"></i>
                                                                        {{__('global.edit')}}
                                                                    </a>
                                                                    <a href="{{route('dashboard.subscriptions.change_status',$subscription->id)}}"
                                                                       class="dropdown-item"
                                                                       onclick="return confirm('{{__('dashboard/subscription.change_status')}}');">
                                                                        @if($subscription->status == 0)
                                                                            <i class="ft-lock primary"></i>
                                                                            {{__('global.activate')}}
                                                                        @else
                                                                            <i class="ft-unlock primary"></i>
                                                                            {{__('global.deactivate')}}
                                                                        @endif
                                                                    </a>
                                                                    <form
                                                                        action="{{ route('dashboard.subscription.delete', $subscription->id) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('{{ __('global.areYouSure') }}');"
                                                                        style="display: inline-block;">
                                                                        @csrf
                                                                        <input type="hidden" name="_method"
                                                                               value="DELETE">
                                                                        <a href="#" class="dropdown-item"
                                                                           onclick="$(this).parent().submit()">
                                                                            <i class="ft-trash-2"></i>
                                                                            {{__('global.delete')}}
                                                                        </a>
                                                                    </form>
                                                                    <form
                                                                        action="{{ route('dashboard.subscriptions.force', $subscription->id) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('{{ __('global.areYouSure') }}');"
                                                                        style="display: inline-block;">
                                                                        @csrf
                                                                        <input type="hidden" name="_method"
                                                                               value="DELETE">
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
                                                {{ $subscriptions->links() }}
                                                </tfoot>
                                            </table>
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

    <!--add subscription Modal -->
    <div class="modal fade text-left" id="add-subscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard/subscription.add_new') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="add-subscription-form">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">{{ __('dashboard/subscription.name') }}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="{{ __('dashboard/subscription.name') }}">
                            <label for="error-name"></label>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="price">{{ __('dashboard/subscription.price') }}</label>
                                <input type="number" class="form-control" id="price" name="price"
                                       placeholder="{{ __('dashboard/subscription.price') }}">
                                <label for="error-price"></label>
                            </div>
                            <div class="form-group col-4">
                                <label for="visits_number">{{ __('dashboard/subscription.visits_number') }}</label>
                                <input type="number" class="form-control" id="visits_number" name="visits_number"
                                       placeholder="{{ __('dashboard/subscription.visits_number') }}">
                                <label for="error-visits_number"></label>
                            </div>
                            <div class="form-group col-4">
                                <label for="period">{{ __('dashboard/subscription.period') }}</label>
                                <input type="number" class="form-control" id="period" name="period"
                                       placeholder="{{ __('dashboard/subscription.period') }}">
                                <label for="error-period"></label>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="description">{{ __('dashboard/subscription.description') }}</label>
                            <textarea type="text" class="form-control" id="description" name="description"
                                      placeholder="{{ __('dashboard/subscription.description') }}">
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

    <!--edit subscription Modal -->
    <div class="modal fade text-left" id="edit-subscription" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel35"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard/subscription.edit') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit-subscription-form">
                    <div class="modal-body">
                        <input type="hidden" id="edit-subscription-url">
                        <div class="form-group">
                            <label for="name">{{ __('dashboard/subscription.name') }}</label>
                            <input type="text" class="form-control" id="name-edit" name="name"
                                   placeholder="{{ __('dashboard/subscription.name') }}"
                                   value="">
                            <label for="error-name"></label>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="price">{{ __('dashboard/subscription.price') }}</label>
                                <input type="number" class="form-control" id="price-edit" name="price"
                                       placeholder="{{ __('dashboard/subscription.price') }}"
                                       value="">
                                <label for="error-price"></label>
                            </div>
                            <div class="form-group col-4">
                                <label for="visits_number">{{ __('dashboard/subscription.visits_number') }}</label>
                                <input type="number" class="form-control" id="visits_number-edit" name="visits_number"
                                       placeholder="{{ __('dashboard/subscription.visits_number') }}"
                                       value="">
                                <label for="error-visits_number"></label>
                            </div>
                            <div class="form-group col-4">
                                <label for="period">{{ __('dashboard/subscription.period') }}</label>
                                <input type="number" class="form-control" id="period-edit" name="period"
                                       placeholder="{{ __('dashboard/subscription.period') }}"
                                       value="">
                                <label for="error-period"></label>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="description">{{ __('dashboard/subscription.description') }}</label>
                            <textarea type="text" class="form-control" id="description-edit" name="description"
                                      placeholder="{{ __('dashboard/subscription.description') }}">
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
    {{--    <script src="{{asset('assets/dashboard/js/scripts/forms/checkbox-radio.js')}}" type="text/javascript"></script>--}}
    <script src="{{asset('assets/dashboard/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendors/js/tables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/scripts/navs/navs.js') }}" type="text/javascript"></script>
    <script>


        $('#add-subscription-form').validate({
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
                $("#add-subscription").addClass('loading')

                dashboardRequest.post('{{ route('dashboard.subscriptions.add') }}', $("#add-subscription-form").serialize(), function (response) {
                    $("#add-subscription").removeClass('loading')
                    $("#add-subscription-form .errorMessage").html(response.status ? dashboardRequest.getSuccessMessageHtml(response.message) : dashboardRequest.getErrorMessageHtml(response.message));
                    animateCSS('#add-subscription.errorMessage', 'bounceIn');
                    if (response.status) {
                        setTimeout(function () {
                            animateCSS('#add-subscription .errorMessage', 'flipOutX').then(() => $("#add-subscription .errorMessage").html(''));
                            window.location.reload();
                        }, 5000)
                    }

                })
            }
        });

        $('#edit-subscription-form').validate({
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
                $("#edit-subscription").addClass('loading')
                url = $('#edit-subscription-url').val()
                console.log(url)
                dashboardRequest.post(url, $("#edit-subscription-form").serialize(), function (response) {
                    $("#edit-subscription").removeClass('loading')
                    $("#edit-subscription-form.errorMessage").html(response.status ? dashboardRequest.getSuccessMessageHtml(response.message) : dashboardRequest.getErrorMessageHtml(response.message));
                    animateCSS('#edit-subscription .errorMessage', 'bounceIn');
                    if (response.status) {
                        setTimeout(function () {
                            animateCSS('#edit-subscription .errorMessage', 'flipOutX').then(() => $("#edit-subscription .errorMessage").html(''));
                            window.location.reload();
                        }, 5000)
                    }

                })
            }


        });

        function setUrl(url) {
            $('#edit-subscription-url').val(url)
        }


        $('.btn-edit').on('click', function (e) {
            // e.preventDefault();
            // set
            url = $(this).data('edit-url')
            dashboardRequest.get(url, function (response) {
                if (response.status) {
                    $('#name-edit').val(response.data.name)
                    $('#price-edit').val(response.data.price)
                    $('#visits_number-edit').val(response.data.visits_number)
                    $('#period-edit').val(response.data.period)
                    $('#description-edit').val(response.data.description)

                    console.log(response)
                }
                console.log('outside')
            })
        })

    </script>
@endsection
