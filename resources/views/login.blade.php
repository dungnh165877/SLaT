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
                <form method="POST" id="signup-form" class="signup-form">
                    <h2 class="form-title">Login</h2>
                    <div class="form-group">
                        <input type="text" class="form-input" name="name" id="name" placeholder="Username or MSSV" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="password" id="password" placeholder="Password" autocomplete="off"/>
                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                    </div>
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
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                    </div>
                </form>
                <p class="loginhere">
                    Do you already have an account ? <a href="register" class="loginhere-link">Register here</a>
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
