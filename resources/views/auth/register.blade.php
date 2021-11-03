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
                                    <div class="login-header text-right">
                                        <div class="row">
                                            <div class="col-6">
                                                <h3> أنشئ حساب</h3>
                                            </div>
                                            <div class="col-6 text-left">
                                                <h5>
                                                <a href="{{ route('doctor-register') }}"  style="color:#27ddab;"> هل أنت طبيب؟ </a></h5>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Register Form -->
                                    <form id="register-form" enctype="multipart/form-data" action="{{ route('register') }}" method="post">
                                        @csrf
                                        <div class="form-group form-focus d-none">
                                            <select class="form-control floating  @error('type') error @enderror" name="type" id="type">
                                                <option value="" disabled selected></option>
                                                <option value="Patient" selected> {{__('front/patient.title')}} </option>
                                                <option value="Doctor"> {{__('front/doctor.title')}} </option>
                                            </select>
                                            <label for="type" class="focus-label">اختر نوع المستخدم</label>
                                        </div>

                                        <div class="form-group form-focus">
                                            <input type="text" id="name" class="form-control floating @error('name') error @enderror"
                                                   value="{{ old('name') }}" required autocomplete="name" autofocus name="name" placeholder="الإسم">
                                        </div>
                                        @error('name')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="error-name"></label>

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


                                        <div class="form-group form-focus">
                                            <input type="email" id="email" class="form-control floating @error('email') error @enderror"
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
                                            <input id="password" type="password" name="password" class="form-control floating @error('password') error @enderror" value="">
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



                                        <div class="errorMessage"></div>
                                        <div class="text-left">
                                            <a class="forgot-link" href="{{ route('login') }}" style=" color: #27ddab;">لديك حساب بالفعل؟</a>
                                        </div>
                                        <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">تسجيل الحساب</button>

                                        <br>
                                        <span class="or-line"></span>
                                        <div class="login-or d-none">
                                            <span class="span-or">أو</span>
                                        </div>
                                        <div class="row form-row social-login  d-none">
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
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
