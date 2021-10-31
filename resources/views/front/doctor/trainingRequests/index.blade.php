<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@extends('layouts.doctorDashboard')
@section('col-7')
    <style>
        .select2>span{
            width: 100%;
        }
        span.select2.select2-container.select2-container--default.select2-container--focus.select2-container--below.select2-container--open , span.select2.select2-container.select2-container--default{
            width: 100% !important;
        }
        .fa-times{
            color:brown;
            font-size: 34px;
        }
        input#accept_promotions {
            width: 20px;
            height: 20px;
        }
        i.fa.fa-check, i.fa.fa-times {
            font-size: 20px;
            margin-left: 10px;
        }
    </style>
        @php
        $user = Auth::user();
        @endphp
        <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-10"><h4 class="card-title text-right">{{__('front/request.TrainingRequests')}}</h4></div>
                                        <div class="col-2">
                                            <button data-toggle="modal" data-target="#addNew" ><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    
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
                                                        ID
                                                    </th>
                                                    <th>
                                                        {{__('front/request.Trainee')}} ( {{__('front/request.Owner')}} )
                                                    </th>
                                                    <th>
                                                        {{__('front/request.Trainer')}}
                                                    </th>
                                                    <th>
                                                        {{__('front/request.Cost')}}
                                                    </th>
                                                    <th>
                                                        {{__('front/request.requested_at')}}
                                                    </th>
                                                    <th>
                                                        {{__('front/request.Status')}}
                                                    </th>
                                                    <th>
                                                        {{__('front/global.actions')}}
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($userRequests as $r=> $request)
                                                    <tr>
                                                        <td>{{ $request->id }}</td>
                                                        <td>
                                                            {{ __(@$request->trainee->name) }}
                                                        </td>
                                                        <td>
                                                            {{ __(@$request->trainer->name) }}
                                                        </td>
                                                        <td>
                                                            {{ __(@$request->cost) }} {{__('front/request.SR')}}
                                                        </td>
                                                        <td> {{$request->created_at->format('Y-m-d')}} </td>
                                                        <td>
                                                            @if($request->status == 'Accepted' || $request->status == 'Pending' )
                                                                <span class="badge badge-default badge-success p-1 pb-1 bg-info-light "> {{__('front/request.'.$request->status)}}</span>
                                                                @else
                                                                <span class="badge badge-default badge-danger  p-1 pb-1 bg-danger-light"> {{__('front/request.'.$request->status)}}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="btn-group mr-1 mb-1 w-100 text-center">
                                                                @if ($user->id == $request->trainer_id)
                                                                <button type="button"
                                                                        class="btn btn-primary dropdown-toggle btn-sm w-100"
                                                                        data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fa fa-cog"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a href="{{route('doctor.trainingRequests.change_status',[$request->id , 'Accepted'])}}"
                                                                       class="dropdown-item" {{ ($request->status == 'Accepted') ? 'disabled' : '' }} >
                                                                        <i class="fa fa-check"></i>
                                                                        {{__('front/request.Accept')}}
                                                                    </a>

                                                                    <a href="{{route('doctor.trainingRequests.change_status',[$request->id , 'Rejected'])}}"
                                                                       class="dropdown-item" {{ ($request->status == 'Rejected') ? 'disabled' : '' }}
                                                                       onclick="return confirm('{{__('dashboard/user.request_change_status')}}');">
                                                                       <i class="fa fa-times"></i>
                                                                       {{__('front/request.Reject')}}
                                                                    </a>
                                                                </div>
                                                                @else 
                                                                -
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <div class="row mr-2 ml-2">
                                                            <button type="text"
                                                                    class="btn btn-lg btn-block btn-outline-danger mb-2"
                                                                    id="type-error">
                                                                {{__('front/global.no_data')}}
                                                            </button>
                                                        </div>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                                <tfoot>
                                                {{ $userRequests->links() }}
                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>



    @endsection
    
