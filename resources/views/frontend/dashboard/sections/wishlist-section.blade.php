@php
    $wishlist = \App\Models\Wishlist::where('user_id', auth()->user()->id)->take(16)->get();
@endphp

<div class="tab-pane fade " id="v-pills-messages2" role="tabpanel"
     aria-labelledby="v-pills-messages-tab2">
    <div class="fp_dashboard_body">
        <h3>wishlist</h3>
        <div class="fp__dashoard_wishlist">
        @if($wishlist)
            <div class="row">
                @foreach($wishlist as $wish)
                    @php

                    @endphp
                <div class="col-xl-4 col-sm-6 col-lg-6">
                    <div class="fp__menu_item">
                        <div class="fp__menu_item_img">
                            <img src="{{asset($wish->product->thumb_image)}}" alt="menu"
                                 class="img-fluid w-100">
                            <a class="category" href="#">{{$wish->product->category->slug}}</a>
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
                            <a class="title" href="{{route('product.showDetailes',['id'=>$wish->product_id,'slug'=>$wish->product->slug])}}">{{$wish->product->name}}</a>
                           @if($wish->product->offer_price)
                                <h5 class="price">{{currencyPosition($wish->product->offer_price)}}
                                    <del>{{currencyPosition($wish->product->offer_price)}}</del>
                                </h5>
                            @else
                                <h5 class="price">{{currencyPosition($wish->product->price)}}</h5>
                               @endif

                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="#" onclick="loadidpopup({{$wish->product_id}})" data-bs-toggle="modal" data-bs-target="#cartModal"><i
                                            class="fas fa-shopping-basket"></i></a></li>
                                <li onclick="removeWishlist({{$wish->product_id}})" ><a   href="javascript:;"><i class="fal fa-heart"></i></a></li>
                                <li><a href="{{ route('product.showDetailes', ['id' => $wish->product_id, 'slug' => $wish->product->slug]) }}"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
