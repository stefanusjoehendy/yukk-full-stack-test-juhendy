@extends('layout.login')

@section('title', 'Register')

@section('content')
<form id="form_register">
    <div class="login-page" >
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="login-logo">
                    <div class="img_logo"></div>
                </div>
                <div class="card">
                    <div class="card-body login-card-body">
                        <div class="form-group input-group mb-3">
                            <input type="text" id="username" class="form-control username" name="username" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group input-group mb-3">
                            <input type="text" id="fullname" class="form-control fullname" name="fullname" placeholder="fullname">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group input-group mb-3">
                            <input type="email" id="email" class="form-control email" name="email" placeholder="email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group input-group mb-3">
                            <input type="password" id="mainpassword" class="form-control password" name="password" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group input-group mb-3">
                            <input type="password" id="confirm_password" class="form-control confirm_password" name="confirm_password" placeholder="Confirm Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-danger alert-dismissible alert-box" hidden>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" id="register" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </div>
                    </div>
                    <p class="ml-3">
                        <a href="#" class="text-center link">I already have a user account</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('path_page_js', 'resources/js/register.js' )