@extends('layout.login')

@section('title', 'Login')

@section('content')
<form id="form_login">
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
                            <input type="password" id="password" class="form-control password" name="password" placeholder="Password">
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
                                <button type="button" id="signin" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </div>
                    </div>
                    <p class="ml-3">
                        <a href="#" class="text-center link">Register a new user</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('path_page_js', 'resources/js/login.js' )