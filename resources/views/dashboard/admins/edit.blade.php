@extends('layouts.dashboard')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('dashboard.index')}}">
                                        {{__('global.home')}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('users.index')}}">
                                        {{__('dashboard/user.title')}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{__('dashboard/user.edit')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <!-- Basic form layout section start -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">
                            {{__('dashboard/user.edit')}}
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
                    @include('admin.includes.alerts.success')
                    @include('admin.includes.alerts.errors')
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form action="{{ route("users.update", [$user->id]) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-row mb-2">
                                    <div class="col-md-5">
                                        <input type="file" class="custom-file-input" id="photo" name="photo"
                                               value="{{Request::old('photo', isset($user) ? $user->photo : '')}}">
                                        {{--                                        <img src="{{ storage_path().'/images/'.$article->image }}" alt="" title=""></a>--}}
                                        <label class="custom-file-label" for="photo">{{__('global.photo')}}</label>
                                        @error('photo')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-5 offset-1">
                                        <input type="file" class="custom-file-input" id="cv" name="cv"
                                               value="{{Request::old('cv')}}">
                                        <label class="custom-file-label" for="cv">{{__('global.cv')}}</label>
                                        @error('cv')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-body ">
                                    <h4 class="form-section"><i class="ft-home"></i>{{__('dashboard/user.user_data')}}
                                    </h4>
                                    <div class="form-row pt-2 {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <div class="col-md-6">
                                            <label for="firstname">{{__('dashboard/user.firstname')}}</label>
                                            <input type="text" id="firstname" name="firstname" class="form-control"
                                                   value="{{ old('firstname', isset($user) ? $user->firstname : '') }}"
                                                   required>
                                            @error('firstname')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lastname">{{__('dashboard/user.lastname')}}</label>
                                            <input type="text" id="lastname" name="lastname" class="form-control"
                                                   value="{{ old('lastname', isset($user) ? $user->lastname : '') }}"
                                                   required>
                                            @error('lastname')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row pt-2 {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <div class="col-md-6">
                                            <label for="email">{{__('dashboard/user.email')}}</label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                   value="{{ old('email', isset($user) ? $user->email : '') }}"
                                                   required>
                                            @error('email'))
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="name">{{__('dashboard/user.name')}}</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                   value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row pt-2">
                                        <div class="col-md-6">
                                            <label for="projectinput1">{{__('global.phone')}}</label>
                                            <input type="tel"
                                                   class="form-control"
                                                   placeholder=""
                                                   value="{{Request::old('phone', isset($user) ? $user->phone : '')}}"
                                                   name="phone">
                                            @error("phone")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="roles">
                                                {{__('dashboard/user.role')}}
                                            </label>
                                            <select name="roles[]" id="roles" class="form-control select2" required>
                                                @foreach($roles as $id => $roles)
                                                    <option
                                                        value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                                                @endforeach
                                            </select>
                                            @error("role")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-row pt-2">
                                        <div class="col-md-6">
                                            <label for="name">{{__('dashboard/user.birthdate')}}</label>
                                            <input type="date" id="date" name="birthdate" class="form-control"
                                                   value="{{ old('birthdate', isset($user) ? $user->birthdate : '') }}"
                                                   required>
                                            @error('birthdate')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 d-none" id="subjects">
                                            <label for="name">{{__('dashboard/subject.title')}}</label>
                                            <input type="date" id="subject" name="subject" class="form-control"
                                                   required>
                                            @error('subject')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row pt-2">
                                        <div class="col-md-6">
                                            <label for="projectinput1">{{__('global.gender')}}</label>

                                            <div class="custom-control custom-radio custom-control">
                                                <input type="radio" class="custom-control-input" id="customRadio"
                                                       name="gender"
                                                       value="{{ old('gender', isset($user) ? $user->gender : '') }}">
                                                <label class="custom-control-label"
                                                       for="customRadio">{{__('global.male')}}</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="customRadio2"
                                                       name="gender"
                                                       value="{{ old('gender', isset($user) ? $user->gender : '') }}">
                                                <label class="custom-control-label"
                                                       for="customRadio2">{{__('global.female')}}</label>
                                            </div>
                                            @error("gender")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="switcheryColor4"
                                                   class="card-title d-block ml-1">{{__('global.status')}}</label>
                                            <input type="checkbox" value="1"
                                                   name="active"
                                                   id="switcheryColor4"
                                                   class="switchery" data-color="success"
                                                   checked/>
                                            @error("active")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="button" class="btn btn-warning mr-1"
                                                onclick="history.back();">
                                            <i class="ft-x"></i>
                                            {{__('global.back')}}
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i>
                                            {{__('global.save')}}
                                        </button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor')
    <script src="{{asset('admin/vendors/js/forms/toggle/bootstrap-switch.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('admin/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('admin/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/js/scripts/forms/switch.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>
@endsection

@section('script')
    <script>
        $('#roles').on('change', function () {
            var role = $('#roles').val();
            console.log(role);
            if (role === 'مدرس') {
                $('#subjects').removeClass('d-none');
            } else {
                $('#subjects').addClass('d-none');
            }
        });
        })

        $(document).ready(function () {
            $('#roles').on('change', function () {
                var role = $('#roles').val();
                console.log(role);
                if (role === 'مدرس') {
                    $('#subjects').removeClass('d-none');
                } else {
                    $('#subjects').addClass('d-none');
                }
            });
        });
    </script>
@endsection
