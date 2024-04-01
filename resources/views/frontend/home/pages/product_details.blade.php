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



        @keyframes zoom {
            from {
                transform: scale(1);
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -ms-transform: scale(1);
                -o-transform: scale(1);
            }

            to {
                transform: scale(1.5);
                -webkit-transform: scale(1.5);
                -moz-transform: scale(1.5);
                -ms-transform: scale(1.5);
                -o-transform: scale(1.5);
            }
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
<nav class="navbar navbar-expand-lg main_menu">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="FoodPark" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="far fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.html">Home <i
                            class="far fa-angle-down"></i></a>
                    <ul class="droap_menu">
                        <li><a class="active" href="index.html">home style 1</a></li>
                        <li><a href="index2.html">home style 2</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">about</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.html">menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="chefs.html">chefs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">pages <i class="far fa-angle-down"></i></a>
                    <ul class="droap_menu">
                        <li><a href="menu_details.html">menu details</a></li>
                        <li><a href="blog_details.html">blog details</a></li>
                        <li><a href="cart_view.html">cart view</a></li>
                        <li><a href="check_out.html">checkout</a></li>
                        <li><a href="payment.html">payment</a></li>
                        <li><a href="testimonial.html">testimonial</a></li>
                        <li><a href="search_menu.html">search result</a></li>
                        <li><a href="404.html">404/Error</a></li>
                        <li><a href="faq.html">FAQs</a></li>
                        <li><a href="sign_in.html">sign in</a></li>
                        <li><a href="sign_up.html">sign up</a></li>
                        <li><a href="forgot_password.html">forgot password</a></li>
                        <li><a href="privacy_policy.html">privacy policy</a></li>
                        <li><a href="terms_condition.html">terms and condition</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blogs.html">blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">contact</a>
                </li>
            </ul>
            <ul class="menu_icon d-flex flex-wrap">
                <li>
                    <a href="#" class="menu_search"><i class="far fa-search"></i></a>
                    <div class="fp__search_form">
                        <form>
                            <span class="close_search"><i class="far fa-times"></i></span>
                            <input type="text" placeholder="Search . . .">
                            <button type="submit">search</button>
                        </form>
                    </div>
                </li>
                <li>
                    <a class="cart_icon"><i class="fas fa-shopping-basket"></i> <span>5</span></a>
                </li>
                <li>
                    <a href="dashboard.html"><i class="fas fa-user"></i></a>
                </li>
                <li>
                    <a class="common_btn" href="#" data-bs-toggle="modal"
                       data-bs-target="#staticBackdrop">reservation</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="fp__menu_cart_area">
    <div class="fp__menu_cart_boody">
        <div class="fp__menu_cart_header">
            <h5>total item (05)</h5>
            <span class="close_cart"><i class="fal fa-times"></i></span>
        </div>
        <ul>
            <li>
                <div class="menu_cart_img">
                    <img src="images/menu8.png" alt="menu" class="img-fluid w-100">
                </div>
                <div class="menu_cart_text">
                    <a class="title" href="#">Hyderabadi Biryani </a>
                    <p class="size">small</p>
                    <span class="extra">coca-cola</span>
                    <span class="extra">7up</span>
                    <p class="price">$99.00 <del>$110.00</del></p>
                </div>
                <span class="del_icon"><i class="fal fa-times"></i></span>
            </li>
            <li>
                <div class="menu_cart_img">
                    <img src="images/menu4.png" alt="menu" class="img-fluid w-100">
                </div>
                <div class="menu_cart_text">
                    <a class="title" href="#">Chicken Masalas</a>
                    <p class="size">medium</p>
                    <span class="extra">7up</span>
                    <p class="price">$70.00</p>
                </div>
                <span class="del_icon"><i class="fal fa-times"></i></span>
            </li>
            <li>
                <div class="menu_cart_img">
                    <img src="images/menu5.png" alt="menu" class="img-fluid w-100">
                </div>
                <div class="menu_cart_text">
                    <a class="title" href="#">Competently Supply Customized Initiatives</a>
                    <p class="size">large</p>
                    <span class="extra">coca-cola</span>
                    <span class="extra">7up</span>
                    <p class="price">$120.00 <del>$150.00</del></p>
                </div>
                <span class="del_icon"><i class="fal fa-times"></i></span>
            </li>
            <li>
                <div class="menu_cart_img">
                    <img src="images/menu6.png" alt="menu" class="img-fluid w-100">
                </div>
                <div class="menu_cart_text">
                    <a class="title" href="#">Hyderabadi Biryani</a>
                    <p class="size">small</p>
                    <span class="extra">7up</span>
                    <p class="price">$59.00</p>
                </div>
                <span class="del_icon"><i class="fal fa-times"></i></span>
            </li>
            <li>
                <div class="menu_cart_img">
                    <img src="images/menu1.png" alt="menu" class="img-fluid w-100">
                </div>
                <div class="menu_cart_text">
                    <a class="title" href="#">Competently Supply</a>
                    <p class="size">medium</p>
                    <span class="extra">coca-cola</span>
                    <span class="extra">7up</span>
                    <p class="price">$99.00 <del>$110.00</del></p>
                </div>
                <span class="del_icon"><i class="fal fa-times"></i></span>
            </li>
        </ul>
        <p class="subtotal">sub total <span>$1220.00</span></p>
        <a class="cart_view" href="cart_view.html"> view cart</a>
        <a class="checkout" href="check_out.html">checkout</a>
    </div>
</div>

<div class="fp__reservation">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Book a Table</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="fp__reservation_form">
                        <input class="reservation_input" type="text" placeholder="Name">
                        <input class="reservation_input" type="text" placeholder="Phone">
                        <input class="reservation_input" type="date">
                        <select class="reservation_input" id="select_js">
                            <option value="">select time</option>
                            <option value="">08.00 am to 09.00 am</option>
                            <option value="">10.00 am to 11.00 am</option>
                            <option value="">12.00 pm to 01.00 pm</option>
                            <option value="">02.00 pm to 03.00 pm</option>
                            <option value="">04.00 pm to 05.00 pm</option>
                        </select>
                        <select class="reservation_input" id="select_js2">
                            <option value="">select person</option>
                            <option value="">1 person</option>
                            <option value="">2 person</option>
                            <option value="">3 person</option>
                            <option value="">4 person</option>
                            <option value="">5 person</option>
                        </select>
                        <button type="submit">book table</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=============================
    MENU END
==============================-->


<!--=============================
    BREADCRUMB START
==============================-->
<section class="fp__breadcrumb" style="background: url(images/counter_bg.jpg);">
    <div class="fp__breadcrumb_overlay">
        <div class="container">
            <div class="fp__breadcrumb_text">
                <h1>menu Details</h1>
                <ul>
                    <li><a href="{{url('/')}}">home</a></li>
                    <li><a href="javascript:;">menu Details</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--=============================
    BREADCRUMB END
==============================-->


<!--=============================
    MENU DETAILS START
==============================-->
<section class="fp__menu_details mt_115 xs_mt_85 mb_95 xs_mb_65">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-9 wow fadeInUp" data-wow-duration="1s">
                <div class="exzoom hidden" id="exzoom">
                    <div class="exzoom_img_box fp__menu_details_images">
                        <ul class='exzoom_img_ul'>
                            <li><img class="zoom ing-fluid w-100" src="{{asset($product->thumb_image)}}" alt="{{$product->name}}"></li>
                       @foreach($product->productimage as $img)
                                <li><img class="zoom ing-fluid w-100" src="{{asset($img->gallary_image)}}" alt="{{$product->name}}"></li>

                            @endforeach
                        </ul>
                    </div>
                    <div class="exzoom_nav"></div>
                    <p class="exzoom_btn">
                        <a href="javascript:void(0);" class="exzoom_prev_btn"> <i class="far fa-chevron-left"></i>
                        </a>
                        <a href="javascript:void(0);" class="exzoom_next_btn"> <i class="far fa-chevron-right"></i>
                        </a>
                    </p>
                </div>
            </div>
            <div class="col-lg-7 wow fadeInUp" data-wow-duration="1s">
                <div class="fp__menu_details_text">
                    <h2>{{$product->name}}</h2>
                    <p class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                        <span>(201)</span>
                    </p>
                    @if($product->offer_price>0)
                    <h3 class="price">${{$product->offer_price}} <del>${{$product->price}}</del> </h3>
                    @else
                        <h3 class="price">${{$product->price}} </h3>
                    @endif
                    <p class="short_description">{!! $product->short_description !!} .</p>


                    @if($product->size()->exists())
                     <div class="details_size">
                        <h5>select size</h5>
                            @foreach($product->size as $siz)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="{{$siz->name}}" checked>
                            <label class="form-check-label" for="{{$siz->name}}">
                                {{$siz->name}} <span>+ ${{$siz->price}}</span>
                            </label>
                        </div>
                         @endforeach
                    </div>

                    @endif
                    @if($product->option()->exists())
                    <div class="details_extra_item">
                        <h5>select option <span>(optional)</span></h5>
                        @foreach($product->option as $opt)

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="{{$opt->name}}">
                            <label class="form-check-label" for="{{$opt->name}}">
                                {{$opt->name}} <span>+ ${{$opt->price}}</span>
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <div class="details_quentity">
                        <h5>select quentity</h5>
                        <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                            <div class="quentity_btn">
                                <button class="btn btn-danger"><i class="fal fa-minus"></i></button>
                                <input type="text" placeholder="1">
                                <button class="btn btn-success"><i class="fal fa-plus"></i></button>
                            </div>
                            <h3>$320.00</h3>
                        </div>
                    </div>
                    <ul class="details_button_area d-flex flex-wrap">
                        <li><a class="common_btn" href="#">add to cart</a></li>
                        <li><a class="wishlist" href="#"><i class="far fa-heart"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 wow fadeInUp" data-wow-duration="1s">
                <div class="fp__menu_description_area mt_100 xs_mt_70">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">Reviews</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                             aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="menu_det_description">
                            {!! $product->long_description !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                             aria-labelledby="pills-contact-tab" tabindex="0">
                            <div class="fp__review_area">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h4>04 reviews</h4>
                                        <div class="fp__comment pt-0 mt_20">
                                            <div class="fp__single_comment m-0 border-0">
                                                <img src="images/comment_img_1.png" alt="review" class="img-fluid">
                                                <div class="fp__single_comm_text">
                                                    <h3>Michel Holder <span>29 oct 2022 </span></h3>
                                                    <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                    <p>Sure there isn't anything embarrassing hiidden in the
                                                        middles of text. All erators on the Internet
                                                        tend to repeat predefined chunks</p>
                                                </div>
                                            </div>
                                            <div class="fp__single_comment">
                                                <img src="images/chef_1.jpg" alt="review" class="img-fluid">
                                                <div class="fp__single_comm_text">
                                                    <h3>salina khan <span>29 oct 2022 </span></h3>
                                                    <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                    <p>Sure there isn't anything embarrassing hiidden in the
                                                        middles of text. All erators on the Internet
                                                        tend to repeat predefined chunks</p>
                                                </div>
                                            </div>
                                            <div class="fp__single_comment">
                                                <img src="images/comment_img_2.png" alt="review" class="img-fluid">
                                                <div class="fp__single_comm_text">
                                                    <h3>Mouna Sthesia <span>29 oct 2022 </span></h3>
                                                    <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                    <p>Sure there isn't anything embarrassing hiidden in the
                                                        middles of text. All erators on the Internet
                                                        tend to repeat predefined chunks</p>
                                                </div>
                                            </div>
                                            <div class="fp__single_comment">
                                                <img src="images/chef_3.jpg" alt="review" class="img-fluid">
                                                <div class="fp__single_comm_text">
                                                    <h3>marjan janifar <span>29 oct 2022 </span></h3>
                                                    <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                    <p>Sure there isn't anything embarrassing hiidden in the
                                                        middles of text. All erators on the Internet
                                                        tend to repeat predefined chunks</p>
                                                </div>
                                            </div>
                                            <a href="#" class="load_more">load More</a>
                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fp__post_review">
                                            <h4>write a Review</h4>
                                            <form>
                                                <p class="rating">
                                                    <span>select your rating : </span>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </p>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <input type="text" placeholder="Name">
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <input type="email" placeholder="Email">
                                                    </div>
                                                    <div class="col-xl-12">
                                                            <textarea rows="3"
                                                                      placeholder="Write your review"></textarea>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="common_btn" type="submit">submit
                                                            review</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($relatedProducts)
        <div class="fp__related_menu mt_90 xs_mt_60">
            <h2>related item</h2>
            <div class="row related_product_slider">
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__menu_item">
                        <div class="fp__menu_item_img">
                            <img src="images/menu2_img_1.jpg" alt="menu" class="img-fluid w-100">
                            <a class="category" href="#">chicken</a>
                        </div>
                        <div class="fp__menu_item_text">
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                                <span>74</span>
                            </p>
                            <a class="title" href="menu_details.html">chicken Masala</a>
                            <h5 class="price">$80.00 <del>90.00</del></h5>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#cartModal"><i
                                            class="fas fa-shopping-basket"></i></a></li>
                                <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                <li><a href="#"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- CART POPUT START -->
<div class="fp__cart_popup">
    <div class="modal fade" id="cartModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fal fa-times"></i></button>
                    <div class="fp__cart_popup_img">
                        <img src="images/menu1.png" alt="menu" class="img-fluid w-100">
                    </div>
                    <div class="fp__cart_popup_text">
                        <a href="#" class="title">Maxican Pizza Test Better</a>
                        <p class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <span>(201)</span>
                        </p>
                        <h4 class="price">$320.00 <del>$350.00</del> </h4>

                        <div class="details_size">
                            <h5>select size</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="large01"
                                       checked>
                                <label class="form-check-label" for="large01">
                                    large <span>+ $350</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="medium01">
                                <label class="form-check-label" for="medium01">
                                    medium <span>+ $250</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="small01">
                                <label class="form-check-label" for="small01">
                                    small <span>+ $150</span>
                                </label>
                            </div>
                        </div>

                        <div class="details_extra_item">
                            <h5>select option <span>(optional)</span></h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="coca-cola01">
                                <label class="form-check-label" for="coca-cola01">
                                    coca-cola <span>+ $10</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="7up01">
                                <label class="form-check-label" for="7up01">
                                    7up <span>+ $15</span>
                                </label>
                            </div>
                        </div>

                        <div class="details_quentity">
                            <h5>select quentity</h5>
                            <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                                <div class="quentity_btn">
                                    <button class="btn btn-danger"><i class="fal fa-minus"></i></button>
                                    <input type="text" placeholder="1">
                                    <button class="btn btn-success"><i class="fal fa-plus"></i></button>
                                </div>
                                <h3>$320.00</h3>
                            </div>
                        </div>
                        <ul class="details_button_area d-flex flex-wrap">
                            <li><a class="common_btn" href="#">add to cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CART POPUT END -->

<!--=============================
    MENU DETAILS END
==============================-->


<!--=============================
    FOOTER START
==============================-->
<footer>
    <div class="footer_overlay pt_100 xs_pt_70 pb_100 xs_pb_70">
        <div class="container wow fadeInUp" data-wow-duration="1s">
            <div class="row justify-content-between">
                <div class="col-lg-4 col-sm-8 col-md-6">
                    <div class="fp__footer_content">
                        <a class="footer_logo" href="index.html">
                            <img src="images/footer_logo.png" alt="FoodPark" class="img-fluid w-100">
                        </a>
                        <span>There are many variations of Lorem Ipsum available, but the majority have
                                suffered.</span>
                        <p class="info"><i class="far fa-map-marker-alt"></i> 7232 Broadway Suite 308, Jackson
                            Heights, 11372, NY, United States</p>
                        <a class="info" href="callto:1234567890123"><i class="fas fa-phone-alt"></i>
                            +1347-430-9510</a>
                        <a class="info" href="mailto:websolutionus1@gmail.com"><i class="fas fa-envelope"></i>
                            websolutionus1@gmail.com</a>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-md-6">
                    <div class="fp__footer_content">
                        <h3>Short Link</h3>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Our Service</a></li>
                            <li><a href="#">gallery</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-md-6 order-sm-4 order-lg-3">
                    <div class="fp__footer_content">
                        <h3>Help Link</h3>
                        <ul>
                            <li><a href="#">Terms And Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-8 col-md-6 order-lg-4">
                    <div class="fp__footer_content">
                        <h3>subscribe</h3>
                        <form>
                            <input type="text" placeholder="Subscribe">
                            <button>Subscribe</button>
                        </form>
                        <div class="fp__footer_social_link">
                            <h5>follow us:</h5>
                            <ul class="d-flex flex-wrap">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fp__footer_bottom d-flex flex-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="fp__footer_bottom_text d-flex flex-wrap justify-content-between">
                        <p>Copyright 2022 <b>FoodPark</b> All Rights Reserved.</p>
                        <ul class="d-flex flex-wrap">
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">payment</a></li>
                            <li><a href="#">settings</a></li>
                            <li><a href="#">privacy policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
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
</body>

</html>
