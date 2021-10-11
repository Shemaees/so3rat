@extends('layouts.userLogin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 " style="margin-top: 100px">
            <div class="card">
                <div class="card-header text-center">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group form-focus">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <label class="focus-label">Name</label>
                        </div>
                        <div class="form-group form-focus">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <label class="focus-label">Email</label>
                        </div>
                        <div class="form-group form-focus">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <label class="focus-label">Create Password</label>
                        </div>
                        <div class="text-right">
                            <a class="forgot-link" href="{{route('login')}}">Already have an account?</a>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>
                        <div class="row form-row social-login">
                            <div class="col-6">
                                <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
