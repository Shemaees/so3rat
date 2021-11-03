@extends('layouts.app')
@section('content')
        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12 offset-md-2">

                        <!-- Register Content -->
                        <div class="account-content">
                            <div class="row align-items-center justify-content-center">

                                <div class="col-md-12 col-lg-6 login-right">
                                    <div class="login-header text-center">
                                        <h3> تسجيل حساب جديد</h3>
                                    </div>

                                    <!-- Register Form -->
                                    <form id="register-form" enctype="multipart/form-data" action="{{ route('register') }}" method="post">
                                        @csrf
                                        <div class="form-group d-flex flex-row">
                                            <div class="upload-img col-6">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload pl-2"></i>تحميل صورة</span>
                                                    <input type="file" class="upload  @error('photo') error @enderror"
                                                           id="photo" onchange="readFileURL(this);"
                                                           name="photo">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                            </div>
                                            <div class="profile-img col-6">
                                                <img id="output" class="pb-3" alt="" src="">
                                            </div>
                                        </div>
                                        @error('photo')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="error-photo"></label>
                                        <div class="form-group form-focus">
                                            <select class="form-control floating  @error('type') error @enderror" name="type" id="type">
                                                <option value="" disabled selected></option>
                                                <option value="Patient"> {{__('front/patient.title')}} </option>
                                                <option value="Doctor"> {{__('front/doctor.title')}} </option>
                                            </select>
                                            <label for="type" class="focus-label">اختر نوع المستخدم</label>
                                        </div>
                                        @error('type')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="error-type"></label>
                                        <div class="form-group form-focus">
                                            <select class="form-control @error('gender') error @enderror" name="gender" id="gender">
                                                <option value="" disabled selected></option>
                                                <option value="Male"> {{__('front/global.male')}} </option>
                                                <option value="Female"> {{__('front/global.female')}} </option>
                                            </select>
                                            <label for="gender" class="focus-label">{{__('front/global.gender')}}</label>
                                        </div>
                                        @error('gender')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="error-gender"></label>
                                        <div class="form-group form-focus">
                                            <input type="text" id="name" class="form-control floating @error('name') error @enderror"
                                                   value="{{ old('name') }}" required autocomplete="name" autofocus name="name">
                                            <label for="name" class="focus-label">اسم المستخدم</label>
                                        </div>
                                        @error('name')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="error-name"></label>
                                        <div class="form-group form-focus">
                                            <input type="text" id="email" class="form-control floating @error('email') error @enderror"
                                                   value="{{ old('email') }}" required autocomplete="email" autofocus name="email">
                                            <label for="email" class="focus-label">البريد الإلكتروني</label>
                                        </div>
                                        @error('email')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="error-email"></label>
                                        <div class="form-group form-focus">
                                            <input id="password" type="password" name="password" class="form-control floating @error('password') error @enderror">
                                            <label for="password" class="focus-label">كلمة المرور</label>
                                        </div>
                                        @error('password')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="error-password"></label>
                                        <div class="form-group form-focus">
                                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control floating @error('password_confirmation') error @enderror">
                                            <label for="password_confirmation" class="focus-label">نأكيد كلمة المرور</label>
                                        </div>
                                        @error('password_confirmation')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="error-password_confirmation"></label>
                                        <div class="form-group form-focus">
                                            <input  name="phone" id="phone" type="tel" value="{{ old('phone') }}" required
                                                    autocomplete="phone" autofocus class="form-control floating @error('phone') error @enderror">
                                            <label for="phone" class="focus-label">رقم التليفون</label>
                                            <span id="valid-msg" class="hide">✓ Valid</span>
                                            <span id="error-msg" class="hide"></span>
                                        </div>
                                        @error('phone')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="error-phone"></label>
                                        <div class="errorMessage"></div>
                                        <div class="text-right">
                                            <a class="forgot-link" href="{{ route('login') }}">لديك حساب بالفعل؟</a>
                                        </div>
                                        <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">تسجيل الحساب</button>
                                        <div class="login-or">
                                            <span class="or-line"></span>
                                            <span class="span-or">أو</span>
                                        </div>
                                        <div class="row form-row social-login">
                                            <div class="col-6">
                                                <a href="#" class="btn btn-facebook btn-block">
                                                    Login
                                                    <i class="fab fa-facebook-f mr-1"></i>
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a href="#" class="btn btn-google btn-block">
                                                    Login
                                                    <i class="fab fa-google mr-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /Register Form -->

                                </div>
                            </div>
                        </div>
                        <!-- /Register Content -->

                    </div>
                </div>

            </div>

        </div>
        <!-- /Page Content -->

    @endsection

@section('scripts')
    <script>
        function readFileURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#output')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#register-form").validate({
            errorPlacement: function(error, element) {
                console.log('error')
                console.log(error)
                console.log(element)
                console.log(element.attr( "id" ))
                $( element )
                    .closest( "form" )
                    .find( "label[for='error-" + element.attr( "id" ) + "']" )
                    .append( error );
            },
            errorElement: "span",
            rules : {
                name : {
                    required:true,
                },
                email : {
                    required:true,
                    email:true,
                },
                password : {
                    required:true,
                },
                confirm_password : {
                    required:true,
                },
                phone : {
                    required:true,
                },
                photo : {
                    required:true,
                },
                type : {
                    required:true,
                },
                gender : {
                    required:true,
                },
            },
            {{--submitHandler: function (form) {--}}
            {{--    // $("#register-form").addClass('loading')--}}
            {{--    // data = new FormData(form)--}}
            {{--    // data.append('photo', $('#photo')[0].files[0])--}}
            {{--    // console.log(data)--}}
            {{--    --}}{{--frontRequest.post('{{ route('register') }}', data ,function(response){--}}
            {{--    --}}{{--    $("#notification-form").removeClass('loading')--}}
            {{--    --}}{{--    $("#notification-form .errorMessage").html(response.status?frontRequest.getSuccessMessageHtml(response.message):frontRequest.getErrorMessageHtml(response.message));--}}
            {{--    --}}{{--    animateCSS('#register-form .errorMessage','bounceIn');--}}
            {{--    --}}{{--    setTimeout(function(){--}}
            {{--    --}}{{--        animateCSS('#register-form .errorMessage','flipOutX').then(()=>$("#register-form .errorMessage").html(''));--}}
            {{--    --}}{{--    },5000)--}}
            {{--    --}}{{--})--}}
            {{--}--}}
        });

    </script>
@endsection
