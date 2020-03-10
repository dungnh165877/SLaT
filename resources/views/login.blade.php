<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/logo-icon.png') }}">
    <title>SLaT - Login</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('lib/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">

</head>
<body>
<div class="main">
    <section class="signin">
        <div class="container">
            <div class="signin-content">
                <form method="POST" id="signin-form" class="signin-form">
                    @csrf
                    <h1 class="title-website">Support Learning and Teaching</h1>
                    <h2 class="form-title">Login</h2>
                    @if (session('session-error'))
                        <div class="alert alert-danger">
                            {{ session('session-error') }}
                        </div>
                    @endif
                    @if (session('login-error'))
                        <div class="alert alert-danger">
                            {{ session('login-error') }}
                        </div>
                    @endif
                    @if (session('login-success'))
                        <div class="alert alert-success">
                            {{ session('login-success') }}
                        </div>
                    @endif
                    @if (session('reset-password-success'))
                        <div class="alert alert-success">
                            {{ session('reset-password-success') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <input type="text" class="form-input" name="username" id="username" placeholder="Username or MSSV" autocomplete="off" />
                    </div>
                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <input type="password" class="form-input" name="password" id="password" placeholder="Password" autocomplete="off"/>
                        <span toggle="#password" class="zmdi zmdi-eye-off field-icon toggle-password"></span>
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-inline form-group form-captcha">
                        <div class="row">
                            <div class="col-12 col-xl-6 mb-2">
                                <div id="divGenerateRandomValues"></div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="input-group mr-0 mb-0">
                                    <input type="text" class="form-control captcha" placeholder="captcha">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="form-submit btn-sign-in" value="Sign in"/>
                    </div>
                </form>
                <p class="loginhere">
                    Do you already have an account ? <a href="register" class="loginhere-link">Register here</a>
                    <br>
                    <a href="forgot-password" class="forgot-herer mb-2">Forgot password?</a>
                </p>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="{{ asset('lib/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/sign.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/captcha.js') }}"></script>
</body>
</html>
