@extends('frontend.layouts.master')

@section('content')

    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url({{config('settings.breadcrumb')}});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>{{$customPage->name}}</h1>
                    <ul>
                        <li><a href="/">home</a></li>
                        <li><a href="/page/{{$customPage->slug}}">{{$customPage->name}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--================================
        TERMS AND CONDITION START
    =================================-->
    <section class="fp__terms_condition mt_120 xs_mt_90 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__career_det_text">
                        {!! $customPage->content !!}
                        <a href="/" class="common_btn">go home</a>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!--================================
        TERMS AND CONDITION END
    =================================-->


@endsection
