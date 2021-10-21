@extends('layouts.userLogin')

@section('content')

    <div class="account-content">
        <div class="row align-items-center justify-content-center">

            <div class="col-md-12 col-lg-6 login-right " style="margin-top: 100px;">
                <div class="login-header">
                    <h3 class="text-center">{{ __('Login') }} </h3>
                </div>
                @include('dashboard.includes.alerts.errors')
                @include('dashboard.includes.alerts.success')
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group form-focus">
                        <input id="email" type="email" class="form-control @error('email') error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label class="focus-label">{{ __('E-Mail Address') }}</label>


                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group form-focus">
                        <input id="password" type="password" class="form-control @error('password') error @enderror" name="password" required autocomplete="current-password">
                        <label class="focus-label">{{ __('Password') }}</label>


                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="text-right">
                        <a class="forgot-link" href="">Forgot Password ?</a>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
                    <div class="login-or">
                        <span class="or-line"></span>
                        <span class="span-or">or</span>
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
                    <div class="text-center dont-have">Don’t have an account? <a href="{{route('register')}}">Register</a></div>
                </form>
            </div>
        </div>
    </div>
@endsection

