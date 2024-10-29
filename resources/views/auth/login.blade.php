<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>Medi Care</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/feather.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>

    <div class="main-wrapper login-body">
        <div class="px-0 container-fluid">
            <div class="row">

                <div class="col-lg-6 login-wrap">
                    <div class="login-sec">
                        <div class="log-img">
                            <img class="img-fluid" src="assets/img/login-02.png" alt="Logo">
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 login-wrap-bg">
                    <div class="login-wrapper">
                        <div class="loginbox">
                            <div class="login-right">
                                <div class="login-right-wrap">
                                    <div class="account-logo">
                                        <a href="/" class="logo">
                                            <img src="{{ asset('assets/img/logo.png') }}" width="35" height="35" alt=""> <span style="font-weight: 600; font-size: 24px">Medi Care</span>
                                        </a>
                                    </div>

                                    <h2>Login</h2>

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="input-block">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="email">
                                        </div>
                                        <div class="input-block">
                                            <label>Password <span class="login-danger">*</span></label>
                                            <input class="form-control pass-input" type="password" name="password">
                                            <span class="profile-views feather-eye-off toggle-password"></span>
                                        </div>
                                        <div class="forgotpass">
                                            <div class="remember-me">
                                                <label class="mb-0 mr-2 custom_check d-inline-flex remember-me">
                                                    Remember me
                                                    <input type="checkbox" name="radio">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            {{-- <a href="forgot-password.html">Forgot Password?</a> --}}
                                        </div>
                                        <div class="input-block login-btn">
                                            <button class="btn btn-primary btn-block" type="submit">Login</button>
                                        </div>
                                    </form>

                                    {{-- <div class="next-sign">
                                        <p class="account-subtitle">Need an account? <a href="register.html">Sign Up</a>
                                        </p>

                                        <div class="social-login">
                                            <a href="javascript:;"><img src="assets/img/icons/login-icon-01.svg"
                                                    alt=""></a>
                                            <a href="javascript:;"><img src="assets/img/icons/login-icon-02.svg"
                                                    alt=""></a>
                                            <a href="javascript:;"><img src="assets/img/icons/login-icon-03.svg"
                                                    alt=""></a>
                                        </div>

                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.7.1.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/app.js"></script>
</body>

</html>
