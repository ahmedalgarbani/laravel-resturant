<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>FoodPark </title>
    <link href=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css " rel="stylesheet">
    <link rel="icon" type="image/png" href="{{URL::asset('frontend/assets/images/favicon.png')}}">
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
<section class="fp__topbar">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-md-8">
                <ul class="fp__topbar_info d-flex flex-wrap">
                    <li><a href="mailto:example@gmail.com"><i class="fas fa-envelope"></i> Unifood@gmail.com</a>
                    </li>
                    <li><a href="callto:123456789"><i class="fas fa-phone-alt"></i> +96487452145214</a></li>
                </ul>
            </div>
            <div class="col-xl-6 col-md-4 d-none d-md-block">
                <ul class="topbar_icon d-flex flex-wrap">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a> </li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a> </li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a> </li>
                    <li><a href="#"><i class="fab fa-behance"></i></a> </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--=============================
    TOPBAR END
==============================-->


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
@stack('scripts')


</body>

</html>
