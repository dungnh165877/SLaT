<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/logo-icon.png">
    <title>SLaT - Reset Password</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sign.css">
</head>
<body>
<div class="main">
    <section class="new-pass">
        <div class="container">
            <div class="new-pass-content">
                <form method="POST" id="new-pass-form" class="new-pass-form" action="new-pass">
                    @csrf
                    <h2 class="form-title">Reset Password</h2>
                    <input type="hidden" value="{{ $info }}" name="token">
                    <div class="form-group">
                        <input type="password" class="form-input" name="password" id="password" placeholder="Password" autocomplete="off" />
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Confirm password" autocomplete="off"/>
                    </div>
                    @error('re_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="form-submit btn-reset-password" value="Reset password"/>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="lib/js/jquery.js"></script>
<script type="text/javascript" src="lib/js/popper.min.js"></script>
<script type="text/javascript" src="lib/js/bootstrap.min.js"></script>
</body>
</html>
