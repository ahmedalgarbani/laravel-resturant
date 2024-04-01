{{--<x-guest-layout>--}}
{{--    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">--}}
{{--        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}--}}
{{--    </div>--}}

{{--    <!-- Session Status -->--}}
{{--    <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--    <form method="POST" action="{{ route('password.email') }}">--}}
{{--        @csrf--}}

{{--        <!-- Email Address -->--}}
{{--        <div>--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            <x-primary-button>--}}
{{--                {{ __('Email Password Reset Link') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</x-guest-layout>--}}

@extends('frontend.layouts.master')

@section('content')

<!--=============================
        BREADCRUMB START
    ==============================-->
<section class="fp__breadcrumb" style="background: url({{asset('frontend/assets/images/counter_bg.jpg')}});">
    <div class="fp__breadcrumb_overlay">
        <div class="container">
            <div class="fp__breadcrumb_text">
                <h1>forgot password</h1>
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><a href="#">forgot password</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--=============================
    BREADCRUMB END
==============================-->


<!--=========================
    FORGOT PASSWORD START
==========================-->
<section class="fp__signin" style="background: url({{asset('frontend/assets/images/login_bg.jpg')}});">
    <div class="fp__signin_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1s">
                <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                    <div class="fp__login_area">
                        <h2>Welcome back!</h2>
                        <p>forgot password</p>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="fp__login_imput">
                                                    <x-input-label for="email" :value="__('Email')" />
                                                    <x-text-input id="email" placeholder="Email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="fp__login_imput">
                                        <button type="submit" class="common_btn">verify mail</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="create_account d-flex justify-content-between">
                            <a href="{{route('login')}}">login</a>
                            <a href="{{route('register')}}">Create Account</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=========================
    FORGOT PASSWORD END
==========================-->

@endsection
