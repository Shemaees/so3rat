@extends('layouts.dashboard')
@section('content')

    <div class="card">
        <div class="card-header">
            edit permission_title
        </div>

        <div class="card-body">
            <form action="{{ route("permission.update", [$permission->id]) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">permission title</label>
                    <input type="text" id="name" name="name" class="form-control"
                           value="{{ old('name', isset($permission) ? $permission->name : '') }}" required>
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        permission fields title helper
                    </p>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="save">
                </div>
            </form>


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
