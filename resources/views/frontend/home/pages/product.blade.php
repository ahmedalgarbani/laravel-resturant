@extends('frontend.layouts.master')

@section('content')

    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url({{config('settings.breadcrumb')}});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>search result</h1>
                    <ul>
                        <li><a href="/">home</a></li>
                        <li><a href="{{route('product.showAllProducts')}}">search result</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--=============================
        SEARCH MENU START
    ==============================-->
    <section class="fp__search_menu mt_120 xs_mt_90 mb_100 xs_mb_70">
        <div class="container">
            <form class="fp__search_menu_form" method="GET" action="{{route('search_product')}}">
                <div class="row">
                    <div class="col-xl-6 col-md-5">
                        <input type="text" placeholder="Search..." name="search" value="{{@request()->input('search')}}">
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <select id="select_js3" name="category">
                            <option value="">select country</option>
                        @foreach($categories as $cate)
                                <option @if(@request()->category == $cate->slug) selected @endif value="{{$cate->slug}}">{{$cate->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl-2 col-md-3">
                        <button type="submit" class="common_btn">search</button>
                    </div>
                </div>
            </form>

            <div class="row">
                @foreach($products as $product)
                    <div class="col-xl-3 col-sm-6 col-lg-4  wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__menu_item">
                            <div class="fp__menu_item_img">
                                <img src="{{asset($product->thumb_image)}}" alt="menu" class="img-fluid w-100">
                                <a class="category" href="#">{{@$product->category->name}}</a>
                            </div>
                            <div class="fp__menu_item_text">
                                <p class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <span>10</span>
                                </p>
                                <a class="title" href="{{ route('product.showDetailes', ['id' => $product->id, 'slug' => $product->slug]) }}">{{$product->name}}</a>
                                @if($product->offer_price>0)
                                    <h5 class="price">{{currencyPosition($product->offer_price)}}
                                        <del>{{currencyPosition($product->price)}}</del>
                                    </h5>
                                @else
                                    <h5 class="price">{{currencyPosition($product->price)}}</h5>
                                @endif

                                <ul class="d-flex flex-wrap justify-content-center">
                                    <li><a href="#" onclick="loadidpopup({{$product->id}})" data-bs-toggle="modal" data-bs-target="#cartModal"><i
                                                class="fas fa-shopping-basket"></i></a></li>
                                    <li onclick="addToWishList({{$product->id}})" ><a   href="javascript:;"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="{{ route('product.showDetailes', ['id' => $product->id, 'slug' => $product->slug]) }}"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
{{--            @if($products->hasPages())--}}
{{--                <div class="fb__pagination mt_60">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-12">--}}
{{--                            {{ $products->links() }}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}


        </div>
    </section>


@endsection
