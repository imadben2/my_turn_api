<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/hyper_2/saas/pages-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Apr 2023 19:00:41 GMT -->
<head>
    <meta charset="utf-8"/>
    <title>My Turn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

    <!-- Theme Config Js -->
    <script src="{{ asset('backend/assets/js/hyper-config.js') }}"></script>

    <!-- App css -->
    <link href="{{ asset('backend/assets/css/app-saas.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>

    <!-- Icons css -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
</head>

<body class="authentication-bg pb-0">

<div class="auth-fluid">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box">
        <div class="card-body d-flex flex-column h gap-3">

            <!-- Logo -->
            <div class="auth-brand text-center text-lg-start">
                <a href="index.html" class="logo-dark">
                    <span><img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="dark logo" height="22"></span>
                </a>
                <a href="index.html" class="logo-light">
                    <span><img src="{{ asset('backend/assets/images/logo.png') }}" alt="logo" height="22"></span>
                </a>
            </div>

            <div class="my-auto">
                <!-- title-->
                <h4 class="mt-0">Sign In</h4>
                <p class="text-muted mb-4">Enter your email address and password to access account.</p>

                <!-- form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="emailaddress" class="form-label">Email address</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" id="emailaddress"
                               required
                               value="{{ old('email') }}" placeholder="Enter your email" name="email">
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                    <div class="mb-3">
                        <a href="pages-recoverpw-2.html" class="text-muted float-end"><small>Forgot your
                                password?</small></a>
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" type="password"
                               name="password" id="password"
                               placeholder="Enter your password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkbox-signin">
                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                        </div>
                    </div>
                    <div class="d-grid mb-0 text-center">
                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> Log In</button>
                    </div>
                    <!-- social-->
                </form>
                <!-- end form-->
            </div>

            <!-- Footer-->
            <footer class="footer footer-alt">

            </footer>

        </div> <!-- end .card-body -->
    </div>
    <!-- end auth-fluid-form-box-->

    <!-- Auth fluid right content -->

    <!-- end Auth fluid right content -->
</div>
<!-- end auth-fluid-->
<!-- Vendor js -->
<script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('backend/assets/js/app.min.js') }}"></script>

</body>


<!-- Mirrored from coderthemes.com/hyper_2/saas/pages-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Apr 2023 19:00:41 GMT -->
</html>
