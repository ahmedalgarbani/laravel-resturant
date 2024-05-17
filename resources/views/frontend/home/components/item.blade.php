<section class="fp__offer_item mt_100 xs_mt_70 pt_95 xs_pt_65 pb_150 xs_pb_120">
    <div class="container">
        <div class="row wow fadeInUp" data-wow-duration="1s">
            <div class="col-md-8 col-lg-7 col-xl-6 m-auto text-center">
                <div class="fp__section_heading mb_50">
                    <h4>{{@$titles['dailyoffer_top_title']}}</h4>
                    <h2>{{@$titles['dailyoffer_main_title']}}</h2>
                    <span>
                            <img src="{{asset('frotend/assets/images/heading_shapes.png')}}" alt="shapes" class="img-fluid w-100">
                        </span>
                    <p>{{@$titles['dailyoffer_sub_title']}}</p>
                </div>
            </div>
        </div>

        <div class="row offer_item_slider wow fadeInUp" data-wow-duration="1s">
            @foreach($dailyOffer as $offer)
                @php
                    $originalPrice = $offer->product->price;
                    $offerPrice = $offer->product->offer_price?$offer->product->offer_price:0;

                    $percentageDiscount = (($originalPrice - $offerPrice) / $originalPrice) * 100;

                    $precentage =  $percentageDiscount . '%';

                @endphp

            <div class="col-xl-4">
                <div class="fp__offer_item_single">
                    <div class="img">
                        <img src="{{asset($offer->product->thumb_image)}}" alt="offer" class="img-fluid w-100">
                    </div>
                    <div class="text">
                        <span>{{$precentage}} off</span>
                        <a class="title" href="{{route('product.showDetailes',['id'=>$offer->product->id,'slug'=>$offer->product->slug])}}">{{$offer->product->name}}</a>
                        <p>{{$offer->product->short_description}}</p>
                        <ul class="d-flex flex-wrap">
                            <li><a href="#" onclick="loadidpopup({{$offer->product->id}})" data-bs-toggle="modal" data-bs-target="#cartModal"><i
                                        class="fas fa-shopping-basket"></i></a></li>
                            <li  ><a href="#"><i class="fal fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-eye"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>
