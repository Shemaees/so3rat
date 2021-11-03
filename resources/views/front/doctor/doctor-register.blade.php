@extends('layouts.app')
@section('content')
        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 offset-md-2">

                        <!-- Account Content -->
                        <div class="account-content">
                            <div class="row align-items-center justify-content-center">

                                <div class="col-md-12 col-lg-6 login-right mb-5">
                                    <div class="login-header">
                                    <div class="row">
                                            <div class="col-6 text-right">
                                                <h3> أنشئ حساب طبيب</h3>
                                            </div>
                                            <div class="col-6 text-left">
                                                <h5>
                                                <a href="{{ route('register') }}"  style="color:#27ddab;">لست  طبيب؟ </a></h5>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Register Form -->
                                    <form id="register-form" enctype="multipart/form-data" action="{{ route('register') }}" method="post">
                                        @csrf

                                        <div class="form-group form-focus d-none">
                                            <select class="form-control floating  @error('type') error @enderror" name="type" id="type">
                                                <option value="" disabled selected></option>
                                                <option value="Patient" > {{__('front/patient.title')}} </option>
                                                <option value="Doctor" selected> {{__('front/doctor.title')}} </option>
                                            </select>
                                            <label for="type" class="focus-label">اختر نوع المستخدم</label>
                                        </div>


                                        <div class="form-group form-focus">
                                            <input type="text" id="name" class="form-control floating @error('name') error @enderror "
                                                   value="{{ old('name') }}" required autofocus  name="name" placeholder="الإسم" />
                                            <label for="name" class="focus-label">الإسـم </label>
                                        </div>
                                        @error('name')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group form-focus">
                                            <input  name="phone" id="phone" type="tel" value="{{ old('phone') }}" required
                                                    autocomplete="phone"  class="form-control floating @error('phone') error @enderror">
                                            <label for="phone" class="focus-label">رقم التليفون</label>
                                            <span id="valid-msg" class="hide">✓ Valid</span>
                                            <span id="error-msg" class="hide"></span>
                                        </div>
                                        @error('phone')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            <label for="error-phone"></label>
                                        @enderror

                                        <div class="form-group form-focus">
                                            <input type="email" id="email" class="form-control floating @error('email') error @enderror"
                                                   value="{{ old('email') }}" required autocomplete="email"  name="email">
                                            <label for="email" class="focus-label">البريد الإلكتروني</label>
                                        </div>
                                        @error('email')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            <label for="error-email"></label>
                                        @enderror




                                        <div class="input-group mb-3" >
                                            <h3 class="text-right text-bold w-100  br-3"><b>النـوع</b></h3>
                                            <div class="form-check w-100 m-2">
                                                <input class="form-check-input" type="radio" name="doctor_type" value="Follow up of patients" id="doctor_type1">
                                                <label class="form-check-label" for="doctor_type1"> أخصائي</label>
                                                <br>
                                                <small class="mr-3 mt-2">
                                                    أخصائي تغذية يستقبل المرضي ويقدم لهم الرعاية التغذوية.
                                                </small>
                                            </div>

                                            <div class="form-check w-100 m-2">
                                                <input class="form-check-input" type="radio" name="doctor_type" value="Trainee" id="doctor_type3">
                                                <label class="form-check-label" for="doctor_type3"> متـدرب</label>
                                                <br>
                                                <small class="mr-3 mt-2">
                                                    أخصائي متدرب يبحث عن برامج تدريبية.
                                                </small>
                                            </div>

                                            <div class="form-check w-100 m-2">
                                                <input class="form-check-input" type="radio" name="doctor_type" value="Trainer" id="doctor_type2">
                                                <label class="form-check-label" for="doctor_type2"> مـدرب</label>
                                                <br>
                                                <small class="mr-3 mt-2">
                                                    أخصائي يقدم برامج تدريبية لأخصائيين التغذية.
                                                </small>
                                            </div>

                                        </div>


                                        <div class="form-group form-focus mb-5">
                                            <label>التخصص</label>
                                            <select class="form-control" name="category_id" id="category_id">
                                                <option value="" disabled>إختر التخصص</option>
                                                @foreach (\App\Models\doctor_category::get() as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group ">
                                            <input type="text" id="qualification" class="form-control floating @error('qualification') error @enderror"
                                                   value="{{ old('qualification') }}" required autocomplete="qualification"  name="qualification" placeholder="الدرجة العلمية">
                                        </div>
                                        @error('qualification')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group ">
                                            <input type="text" id="medical_license_number" class="form-control floating @error('medical_license_number') error @enderror"
                                                value="{{ old('medical_license_number') }}" required autocomplete="medical_license_number"  name="medical_license_number" placeholder="رقـم الرخـصة الطـبية" >
                                        </div>
                                        @error('medical_license_number')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                        <div class="form-group form-focus">
                                            <input id="password" type="password" name="password" class="form-control floating @error('password') error @enderror" value="">
                                            <label for="password" class="focus-label">كلمة المرور</label>
                                        </div>
                                        @error('password')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            <label for="error-password"></label>
                                        @enderror


                                        <div class="form-group form-focus">
                                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control floating @error('password_confirmation') error @enderror">
                                            <label for="password_confirmation" class="focus-label">نأكيد كلمة المرور</label>
                                        </div>
                                        @error('password_confirmation')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            <label for="error-password_confirmation"></label>
                                        @enderror


                                        <div class="text-left">
                                            <a class="forgot-link" href="{{ route('login') }}">لـديك حسـاب بالفعـل ؟</a>
                                        </div>
                                        <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">تسجيـل الدخـول</button>

                                        <br>
                                        <span class="or-line"></span>
                                        <div class="login-or d-none">
                                            <span class="or-line"></span>
                                            <span class="span-or">or</span>
                                        </div>
                                        <div class="row form-row social-login d-none">
                                            <div class="col-6">
                                                <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /Register Form -->

                                </div>
                            </div>
                        </div>
                        <!-- /Account Content -->

                    </div>
                </div>

            </div>

        </div>
        <!-- /Page Content -->
@endsection
@section('scripts')

@endsection
