@extends('frontend.layouts.master')

@section('content')

    <!--=============================
    MENU START
==============================-->

    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url({{config('settings.breadcrumb')}});">
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
            <form id="v_to_card_modal" action="">
                <input type="hidden" name="productId" value="{{$product->id}}">

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
                            @if($product->reviews_avg_rating>0)
                                <p class="rating">
                                    @for($i=1;$i<= $product->reviews_avg_rating;$i++)
                                        <i class="fas fa-star"></i>
                                    @endfor

                                    <span>{{$product->reviews_count}}</span>
                                </p>
                            @endif
                            @if($product->offer_price>0)
                                <h3 class="price">{{currencyPosition($product->offer_price)}} <del>{{currencyPosition($product->price)}}</del> </h3>
                                <input type="hidden" name="base_price" value="{{$product->offer_price}}">

                            @else
                                <h3 class="price">{{currencyPosition($product->price)}} </h3>
                                <input type="hidden" name="base_price" value="{{$product->price}}">

                            @endif
                            <p class="short_description">{!! currencyPosition($product->short_description) !!} .</p>
                            <input type="hidden" id="base_total" name="total" value="">


                            @if($product->size()->exists())
                                <div class="details_size">
                                    <h5>select size</h5>
                                    @foreach($product->size as $siz)
                                        <div class="form-check">
                                            <input class="form-check-input" data-price="{{$siz->price}}" type="radio" value="{{$siz->id}}" name="product_size" id="{{$siz->name}}" checked>
                                            <label class="form-check-label" for="{{$siz->name}}">
                                                {{$siz->name}} <span>+ {{currencyPosition($siz->price)}}</span>
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
                                            <input class="form-check-input" data-price="{{$opt->price}}" name="product_option[]" type="checkbox" value="{{$opt->id}}" id="{{$opt->name}}">
                                            <label class="form-check-label" for="{{$opt->name}}">
                                                {{$opt->name}} <span>+ {{currencyPosition($opt->price)}}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <div class="details_quentity">
                                <h5>select quentity</h5>
                                <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                                    <div class="quentity_btn">
                                        <button class="btn btn-danger decrement"><i class="fal fa-minus"></i></button>
                                        <input type="text" placeholder="1" value="1" id="qtr" name="qtr" readonly>
                                        <button class="btn btn-success increment"><i class="fal fa-plus"></i></button>
                                    </div>
                                    <h3 class="total" id="total">{{$product->offer_price >0 ? $product->offer_price:$product->price}}</h3>
                                    <input type="hidden" id="ahmed" name="total">

                                </div>
                            </div>
                            <ul class="details_button_area d-flex flex-wrap">
                                <li>
                                    @if($product->quantity >0)
                                        <button class="common_btn add_card_button_modal" type="submit">
                                            add to card
                                        </button>
                                    @else
                                        <button class="common_btn btn-danger" type="button">
                                            sold out
                                        </button>
                                    @endif
                                </li>
                            </form>
                                <li  onclick="addToWishList({{$product->id}})"><a class="wishlist" href="javascript:;"><i class="far fa-heart"></i></a></li>
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
                                            @if(@$productReviews)
                                            <div class="col-lg-8">
                                                <h4>{{count($productReviews)}} reviews</h4>
                                                <div class="fp__comment pt-0 mt_20">
                                                    @foreach(@$productReviews as $review)
                                                    <div class="fp__single_comment">
                                                        <img src="{{asset($review->user->avatar)}}" alt="review" class="img-fluid">
                                                        @if($review->isBuy == 1)
                                                        <span class="comment-badge"><i class="fa fa-check-circle" aria-hidden="true"></i> قام بالشراء</span>
                                                        @endif
                                                        <div class="fp__single_comm_text">
                                                            <h3>{{$review->user->name}} <span>{{date('d M Y', strtotime($review->created_at))}}</span></h3>
                                                            <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                            <p>{{$review->review}}</p>
                                                        </div>
                                                    </div>
                                                    @endforeach
{{--                                                    <a href="#" class="load_more">load More</a>--}}
                                                </div>

                                            </div>
                                            @endif
                                            <div class="col-lg-4">
                                                <div class="fp__post_review">
                                                    <h4>write a Review</h4>
                                                    @auth
                                                        <form action="{{route('product-review')}}" method="post">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <select name="rating" class="rating_input">
                                                                        <option value="5" >5</option>
                                                                        <option value="4" >4</option>
                                                                        <option value="3" >3</option>
                                                                        <option value="2" >2</option>
                                                                        <option value="1" >1</option>
                                                                    </select>
                                                                </div>

                                                                <input type="hidden" name="product_id" value="{{$product->id}}">

                                                                <div class="col-xl-12">
                                                                    <label>Review</label>
                                                                    <textarea rows="3" placeholder="Write your review" name="review"></textarea>
                                                                </div>
                                                                <div class="col-12">
                                                                    <button  class="common_btn" type="submit">submit
                                                                        review</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        @else
                                                        <div class="fp__post_review">
                                                            <h4 class="alert alert-warning">Please Login First to write a Review</h4>
                                                        </div>
                                                    @endauth
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @if(count($relatedProducts)>0)
                <div class="fp__related_menu mt_90 xs_mt_60">
                    <h2>related item</h2>
                    <div class="row related_product_slider">
                        @foreach($relatedProducts as $rProduct)
                            <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                                <div class="fp__menu_item">
                                    <div class="fp__menu_item_img">
                                        <img src="{{asset($rProduct->thumb_image)}}" alt="menu" class="img-fluid w-100">
                                        <a class="category" href="#">{{$rProduct->category->name}}</a>
                                    </div>
                                    <div class="fp__menu_item_text">
                                        @if($rProduct->reviews_avg_rating>0)
                                            <p class="rating">
                                                @for($i=1;$i<= $rProduct->reviews_avg_rating;$i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor

                                                <span>{{$rProduct->reviews_count}}</span>
                                            </p>
                                        @endif
                                        <a class="title" href="{{ route('product.showDetailes', ['id' => $rProduct->id, 'slug' => $rProduct->slug]) }}">{{$rProduct->name}}</a>
                                        @if($product->offer_price>0)
                                            <h5 class="price">{{currencyPosition($product->offer_price)}}
                                                <del>{{currencyPosition($product->price)}}</del>
                                            </h5>
                                        @else
                                            <h5 class="price">{{currencyPosition($product->price)}}</h5>
                                        @endif
                                        <ul class="d-flex flex-wrap justify-content-center">
                                            <li><a href="javascript:;" onclick="loadidpopup({{$rProduct->id}})" data-bs-toggle="modal" data-bs-target="#cartModal"><i
                                                        class="fas fa-shopping-basket"></i></a></li>
                                            <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                            <li><a href="#"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

@endsection


<script>

</script>
{{--<span class="comment-badge"><i class="fa fa-check-circle" aria-hidden="true"></i> قام بالشراء</span>--}}
