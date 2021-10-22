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
                                        <h3>Doctor Register <a href="register.html">Not a Doctor?</a></h3>
                                    </div>

                                    <!-- Register Form -->
                                    <form action="https://doccure-html.dreamguystech.com/template/doctor-dashboard.html">
                                        <div class="form-group form-focus">
                                            <input type="text" class="form-control floating">
                                            <label class="focus-label">Name</label>
                                        </div>
                                        <div class="form-group form-focus">
                                            <input type="text" class="form-control floating">
                                            <label class="focus-label">Mobile Number</label>
                                        </div>

                                        <div class="form-group form-focus">
                                            <input type="password" class="form-control floating">
                                            <label class="focus-label">Create Password</label>
                                        </div>

                                        <div class="input-group mb-3" style="direction: ltr;">
                                            <fieldset class="border p-2 w-100">
                                                <legend class="w-100"> <span class=""> : Type </span>
                                                </legend>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                Specialist
                                            </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                              Trainer
                                            </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                              Trainee
                                            </label>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="text-right">
                                            <a class="forgot-link" href="login.html">Already have an account?</a>
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
