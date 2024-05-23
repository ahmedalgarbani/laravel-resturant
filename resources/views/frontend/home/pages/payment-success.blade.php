@extends('frontend.layouts.master')

@section('content')


    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url({{config('settings.breadcrumb')}});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>Success Page</h1>
                    <ul>
                        <li><a href="/">home</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--=============================
        ABOUT PAGE START
    ==============================-->
    <section class="fp__about_us mt_120 xs_mt_90">
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <div class="mb-4">
                        <i class="fa fa-check" style="font-size:70px;
background: green;
padding: 20px;
border-radius: 50%;
color: #fff;"></i>
                    </div>
                    <h4>Order Placed Successfully!</h4>
                    <a class="common_btn mt-4" href="{{route('dashboard')}}">Go to Dashboard</a>
                </div>
            </div>
        </div>
    </section>

    <!--=============================
        ABOUT PAGE END
    ==============================-->


@endsection
