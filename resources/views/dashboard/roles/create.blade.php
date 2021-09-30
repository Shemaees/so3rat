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
                                <li class="breadcrumb-item active">
                                    {{__('dashboard/role/role.title')}}
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
                                        {{__('dashboard/role/role.add_new')}}
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
                                        <form action="{{ route("role.store") }}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                                <label for="name">
                                                    {{__('dashboard/role/role.name')}}
                                                </label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                       value="{{ old('name', isset($role) ? $role->name : '') }}">
                                                @error("name")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div
                                                class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                                                <label for="permission">
                                                    {{__('dashboard/role/role.role_permission')}}
                                                </label>
                                                <div class="pb-2">
                                                    <span class="btn btn-info btn-sm" onclick="selectAll()">
                                                        {{__('global.select_all')}}
                                                    </span>
                                                    <span class="btn btn-info btn-sm" onclick="deselectAll()">
                                                        {{__('global.deselect_all')}}
                                                    </span>
                                                </div>
                                                <select name="permission[]" id="permission"
                                                        class="form-control select2 text-right" multiple="multiple">
                                                    @foreach($permissions as $id => $permissions)
                                                        <option
                                                            value="{{ $id }}" {{ (in_array($id, old('permission', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                                                    @endforeach
                                                </select>
                                                @error('permission[]')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
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
                                        </form>
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
        function selectAll() {
            $("#permission > option").prop("selected", true);
            $("#permission").trigger("change");
        }

        function deselectAll() {
            $("#permission > option").prop("selected", false);
            $("#permission").trigger("change");
        }
    </script>
@endsection
