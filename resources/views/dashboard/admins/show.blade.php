@extends('layouts.dashboard')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">بيانات الطالب</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    بيانات الطالب
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="card">
                        {{--                        <div class="card-header"></div>--}}
                        <div class="card-header align-self-center">
                            @if($user->photo)
                                <img class="img-thumbnail" src="{{ $user->photo }}" alt="{{ $user->name }}">
                            @else
                                <img class="img-thumbnail" src="{{ asset('admin/images/avatar.jpg') }}"
                                     alt="{{ $user->name }}">
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <tbody>
                                            <tr>
                                                <th scope="row">{{ __('dashboard/user.name') }}</th>
                                                <td>{{ $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">البريد الإلكتروني</th>
                                                <td>{{ $user->email }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">رقم الهاتف</th>
                                                <td>{{ $user->phone }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">النوع</th>
                                                <td>{{ $gender }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">تاريخ الميلاد</th>
                                                <td>{{ $user->birthdate }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                @if(auth()->user()->hasRole('مدرس'))
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <th scope="row">المادة الدراسية</th>
                                                    <td>{{ $user->subject->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">الصف</th>
                                                    <td>{{ $user->grade }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">الشعبة</th>
                                                    <td>{{ $user->class }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">بيانات الطالب</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    بيانات الطالب
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="card">
                        <div class="card-header">
                            show title
                        </div>

                        <div class="card-body">
                            <div class="mb-2">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                    <tr>
                                        <th>
                                            id
                                        </th>
                                        <td>
                                            {{ $user->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            name
                                        </th>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            email
                                        </th>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Roles
                                        </th>
                                        <td>
                                            @foreach($user->roles()->pluck('name') as $role)
                                                <span class="label label-info label-many">{{ $role }}</span>
                                            @endforeach
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                                    back_to_list
                                </a>
                            </div>


                        </div>
                    </div>
                </section>
                <!-- DOM - jQuery events table -->

            </div>
        </div>
    </div>
@endsection
