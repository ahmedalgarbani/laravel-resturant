<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('Admin/assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/assets/modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('Admin/assets/modules/bootstrap-social/bootstrap-social.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('Admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/assets/css/components.css')}}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA --></head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="{{asset('admin/assets/img/stisla-fill.svg')}}" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><h4>Login</h4></div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                                @csrf
                                <div class="form-group">


                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input  placeholder="email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" class="form-control" name="email" tabindex="1" required autofocus />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />


                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">

                                    </div>

                                    <x-input-label for="password" :value="__('Password')" />

                                    <x-text-input id="password" class="block mt-1 w-full"
                                                  type="password"
                                                  name="password"
                                                  placeholder="Password"
                                                  required autocomplete="current-password"
                                                  class="form-control" tabindex="2" required/>

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                    <div class="float-right">
                                        <a href="{{route('password.request')}}" class="text-small">
                                            Forgot Password?
                                        </a>
                                    </div>
                                </div>
                                    <input name="Role" value="admin" hidden>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>



                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        Don't have an account? <a href="auth-register.html">Create One</a>
                    </div>
                    <div class="simple-footer">

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- General JS Scripts -->
<script src="{{asset('Admin/assets/modules/jquery.min.js')}}"></script>
<script src="{{asset('Admin/assets/modules/popper.js')}}"></script>
<script src="{{asset('Admin/assets/modules/tooltip.js')}}"></script>
<script src="{{asset('Admin/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('Admin/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('Admin/assets/modules/moment.min.js')}}"></script>
<script src="{{asset('Admin/assets/js/stisla.js')}}"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{asset('Admin/assets/js/scripts.js')}}"></script>
<script src="{{asset('Admin/assets/js/custom.js')}}"></script>
</body>
</html>
