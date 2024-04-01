<section class="splide fp__banner" aria-labelledby="carousel-heading" style="background: url({{URL::asset('frontend/assets/images/banner_bg.jpg')}});">

    <div class="splide__track fp__banner_overlay">
        <ul class="splide__list">
            @foreach($slider as $slid)
            <li class="splide__slide" >
                <div class="col-12 " >
                    <div class="fp__banner_slider">
                        <div class=" container">
                            <div class="row">
                                <div class="col-xl-5 col-md-5 col-lg-5">
                                    <div class="fp__banner_img wow fadeInLeft" data-wow-duration="1s">
                                        <div class="img">
                                            <img src="{{$slid->image}}" alt="food item" class="img-fluid w-100">
                                            @if($slid->offer)
                                                <span> {{$slid->offer}} </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-7 col-lg-6">
                                    <div class="fp__banner_text wow fadeInRight" data-wow-duration="1s">
                                        <h1>{{$slid->title}}</h1>
                                        <h3>{{$slid->sub_title}}</h3>
                                        <p>{{$slid->short_description}}.</p>
                                        <ul class="d-flex flex-wrap">
                                            @if($slid->button_link)
                                            <li><a class="common_btn" href="{{$slid->button_link}}">shop now</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach

        </ul>
    </div>
</section>
