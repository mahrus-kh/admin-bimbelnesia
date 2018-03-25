<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }} | Login </title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('assets/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/build/css/custom.min.css') }}" rel="stylesheet">
</head>
<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="{{ route('auth.postLogin') }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <h1>Login Administrator</h1>
                    <div>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                               placeholder="Email" required>
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-success" value="Log In">
                        <a class="reset_pass pull-right" href="#signup">Lost your password ?</a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <div>
                            <h1><i class="fa fa-trophy"></i> <b>Bimbel</b>Nesia</h1>
                            <p>©2018 All Rights Reserved.
                                <br>
                                BimbelNesia as "Bimbel Indonesia". Malang City, Indonesia
                            </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form>
                    <h1>Reset Password</h1>
                    <div>
                        <input type="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-success" value="Reset Password">
                        <a class="reset_pass pull-right" href="#signin">Ready for Log In ?</a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <div>
                            <h1><i class="fa fa-trophy"></i> <b>Bimbel</b>Nesia</h1>
                            <p>©2018 All Rights Reserved.
                                <br>
                                BimbelNesia as "Bimbel Indonesia". Malang City, Indonesia
                            </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
</body>
</html>