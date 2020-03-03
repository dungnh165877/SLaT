<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SLaT - ForgotPassword</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sign.css">
</head>
<body>
<div class="main">
    <section class="forgotPassword">
        <div class="container">
            <div class="forgot-password-content">
                <form method="POST" id="forgot-password-form" class="forgot-password-form">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <h2 class="form-title">Forgot Password</h2>
                    <div class="form-group">
                        <input type="text" class="form-input" name="email" id="email" placeholder="Email" />
                    </div>
                    <div class="form-group form-forgot-password">
                        <input type="submit" name="submit" id="submit" class="form-submit btn-send-mail" value="Send mail"/>
                    </div>
                    <a class="float-right" href="login"><i class="zmdi zmdi-caret-left-circle"></i> Login</a>
                </form>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="lib/js/jquery.js"></script>
<script type="text/javascript" src="lib/js/popper.min.js"></script>
<script type="text/javascript" src="lib/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/sign.js"></script>
<script type="text/javascript" src="js/forgotPassword.js"></script>
</body>
</html>
