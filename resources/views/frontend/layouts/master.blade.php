<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>{{config('settings.seo_title')}}</title>

    <meta name="title" content="{{config('settings.seo_title')}}">
    <meta name="description" content="{{config('settings.seo_description')}}">
    <meta name="keywords" content="{{config('settings.seo_keywords')}}">


    <link href=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css " rel="stylesheet">
    <link rel="icon" type="image/png" href="{{URL::asset(config('settings.favicon'))}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/bootstrap-iconpicker.min.css')}}">

    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/spacing.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/jquery.exzoom.css')}}">

    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/toastr.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/splide.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/custom.css')}}">

    <style>
        :root{
            --colorPrimary: {{config('settings.color')}} !important;
        }
    </style>
<style>

    .offer_item_slider .slick-dots,
    .fp__blog_det_slider .slick-dots,
    .fp__banner .slick-dots,
    .testi_slider .slick-dots,
    .fp__team .slick-dots {
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        bottom: 5px;
        width: auto;
        left: 50%;
        transform: translateX(-50%);
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
    }

    .offer_item_slider .slick-dots li button,
    .fp__blog_det_slider .slick-dots li button,
    .fp__banner .slick-dots li button,
    .testi_slider .slick-dots li button,
    .fp__team .slick-dots li button {
        font-size: 0;
        width: 25px;
        height: 7px;
        border-radius: 40px;
        background: var(--colorPrimary);
        margin: 0px 3px;
        padding: 0;
        opacity: .2;
        transition: all linear .2s;
        -webkit-transition: all linear .2s;
        -moz-transition: all linear .2s;
        -ms-transition: all linear .2s;
        -o-transition: all linear .2s;
        position: relative;
    }

    .offer_item_slider .slick-dots li.slick-active button,
    .fp__blog_det_slider .slick-dots li.slick-active button,
    .fp__banner .slick-dots li.slick-active button,
    .testi_slider .slick-dots li.slick-active button,
    .fp__team .slick-dots li.slick-active button {
        opacity: 1;
    }

    .fp__banner .slick-dots {
        bottom: 50px;
    }
</style>
<meta name="csrf-token" content="{{csrf_token()}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">







    <style>



        .image-preview{
            {{--background-image: url("{{ asset(auth()->user()->avatar) }}");--}}
            background-size:cover;
            background-position:center center;
        }






    </style>
    <!-- <link rel="stylesheet" href="css/rtl.css"> -->
</head>

<body>
<!--=============================
    TOPBAR START
==============================-->
@php
    $footerInfo = \App\Models\FooterInfo::first();
    $socialLinks = \App\Models\SocialLink::where('status',1)->get();

@endphp

<section class="fp__topbar">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-md-8">
                <ul class="fp__topbar_info d-flex flex-wrap">
                    @if($footerInfo && $footerInfo->email)
                        <li><a href="mailto:{{$footerInfo->email}}"><i class="fas fa-envelope"></i>{{$footerInfo->email}}</a></li>
                    @endif
                    @if($footerInfo && $footerInfo->phone)
                        <li><a href="tel:{{$footerInfo->phone}}"><i class="fas fa-phone-alt"></i> +{{$footerInfo->phone}}</a></li>
                    @endif
                </ul>
            </div>
            @if($socialLinks->isNotEmpty())
                <div class="col-xl-6 col-md-4 d-none d-md-block">
                    <ul class="topbar_icon d-flex flex-wrap">
                        @foreach($socialLinks as $link)
                            <li><a href="{{$link->link}}" title="{{$link->name}}"><i class="{{$link->icon}}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</section>

<!--=============================
    TOPBAR END
==============================-->

<!--=============================
    CART POPUP START
==============================-->
<div class="fp__cart_popup">
    <div class="modal fade" id="cartModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body load_product_modal_body">

                </div>
            </div>
        </div>
    </div>
</div>

<!--=============================
    CART POPUP END
==============================-->


<div class="overlay-container d-none">
    <div class="overlay ">
        <span class="loader"></span>
    </div>
</div>
<!--=============================
    MENU START
==============================-->
@include('frontend.layouts.menu')
<!--=============================
    MENU END
==============================-->


@yield('content')

<!--=============================
    FOOTER START
==============================-->
@include('frontend.layouts.footer')
<!--=============================
    FOOTER END
==============================-->


<!--=============================
    SCROLL BUTTON START
==============================-->
<div class="fp__scroll_btn">
    go to top
</div>
<!--=============================
    SCROLL BUTTON END
==============================-->
<script src="{{URL::asset('frontend/assets/js/bootstrap-iconpicker.bundle.min.js')}}"></script>


<!--jquery library js-->
<script src="{{URL::asset('frontend/assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{URL::asset('frontend/assets/js/splide.min.js')}}"></script>
<!--bootstrap js-->
<script src="{{URL::asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
<!--font-awesome js-->
<script src="{{URL::asset('frontend/assets/js/Font-Awesome.js')}}"></script>
<!-- slick slider -->
<script src="{{URL::asset('frontend/assets/s/slick.min.js')}}"></script>
<!-- isotop js -->
<script src="{{URL::asset('frontend/assets/js/isotope.pkgd.min.js')}}"></script>
<!-- simplyCountdownjs -->
<script src="{{URL::asset('frontend/assets/js/simplyCountdown.js')}}"></script>
<!-- counter up js -->
<script src="{{URL::asset('frontend/assets/js/jquery.waypoints.min.js')}}"></script>
<script src="{{URL::asset('frontend/assets/js/jquery.countup.min.js')}}"></script>
<!-- nice select js -->
<script src="{{URL::asset('frontend/assets/js/jquery.nice-select.min.js')}}"></script>
<!-- venobox js -->
<script src="{{URL::asset('frontend/assets/js/venobox.min.js')}}"></script>
<!-- sticky sidebar js -->
<script src="{{URL::asset('frontend/assets/js/sticky_sidebar.js')}}"></script>
<!-- wow js -->
<script src="{{URL::asset('frontend/assets/js/wow.min.js')}}"></script>
<!-- ex zoom js -->
<script src="{{URL::asset('frontend/assets/js/jquery.exzoom.js')}}"></script>

<!--main/custom js-->
<script src="{{URL::asset('frontend/assets/js/main.js')}}"></script>
<script src="{{URL::asset('frontend/assets/js/toastr.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!--main/custom js-->
<script src="{{URL::asset('frontend/assets/js/main.js')}}"></script>
<script src="{{URL::asset('frontend/assets/js/toastr.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script src=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js "></script>
<script>
    document.addEventListener( 'DOMContentLoaded', function() {
        var splide = new Splide( '.splide' );
        splide.mount();
    } );
</script>
<script>
    //=======PRODUCT DETAILS SLIDER======
    if ($("#exzoom").length > 0) {
        $("#exzoom").exzoom({
            autoPlay: true,
        });
    }
</script>
<script>
    //=======OFFER ITEM SLIDER======
    $('.related_product_slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: false,
        arrows: true,
        nextArrow: '<i class="far fa-long-arrow-right nextArrow"></i>',
        prevArrow: '<i class="far fa-long-arrow-left prevArrow"></i>',

        responsive: [
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

</script>
<script src=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js "></script>
<script>
    document.addEventListener( 'DOMContentLoaded', function() {
        var splide = new Splide( '.splide' );
        splide.mount();
    } );
</script>

<script>



    toastr.options.progressBar = true;
    @if ($errors->any())

        @foreach ($errors->all() as $error)
        toastr.error("{{ $error }}")
        @endforeach

    @endif

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })
</script>
<script>
    //*==========ISOTOPE==============
    var $grid = $('.grid').isotope({});

    $('.menu_filter').on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({
            filter: filterValue
        });
    });

    //active class
    $('.menu_filter button').on("click", function (event) {

        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        event.preventDefault();

    });


    //*=======simplyCountdown========
</script>

@include('frontend.layouts.global-script')
@stack('scripts')

@push('scripts')
    <script>
        function showLoader(){
            $(".overlay-container").removeClass("d-none");

            $(".overlay").addClass("active");
        }
        function hideLoader(){
            $(".overlay-container").addClass("d-none");
            $(".overlay").removeClass("active");
        }
    </script>
@endpush
</body>

</html>
