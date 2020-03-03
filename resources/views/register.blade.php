<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SLaT - Register</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sign.css">
</head>
<body>
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="register">
                        @csrf
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="name" placeholder="MSSV" />
                        </div>
                        @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password" autocomplete="off"/>
                            <span toggle="#password" class="zmdi zmdi-eye-off field-icon toggle-password"></span>
                        </div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password"/>
                        </div>
                        @error('re_password')
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
                            <input type="submit" name="submit" id="submit" class="form-submit btn-sign-up" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="login" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript" src="lib/js/jquery.js"></script>
    <script type="text/javascript" src="lib/js/popper.min.js"></script>
    <script type="text/javascript" src="lib/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/sign.js"></script>
    <script type="text/javascript" src="js/captcha.js"></script>
</body>
</html>
