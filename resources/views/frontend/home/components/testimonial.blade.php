<section class="fp__testimonial pt_95 xs_pt_66 mb_150 xs_mb_120">
    <div class="container">
        <div class="row wow fadeInUp" data-wow-duration="1s">
            <div class="col-md-8 col-lg-7 col-xl-6 m-auto text-center">
                <div class="fp__section_heading mb_40">
                    <h4>{{@$titles['Testimonial_top_title']}}</h4>
                    <h2>{{@$titles['Testimonial_main_title']}}</h2>
                    <span>
                            <img src="{{asset('frontend/assets/images/heading_shapes.png')}}" alt="shapes" class="img-fluid w-100">
                        </span>
                    <p>{{@$titles['Testimonial_sub_title']}}</p>
                </div>
            </div>
        </div>

        <div class="row testi_slider">
            @foreach($Testimonial as $test)
            <div class="col-xl-4 wow fadeInUp" data-wow-duration="1s">
                <div class="fp__single_testimonial">
                    <div class="fp__testimonial_header d-flex flex-wrap align-items-center">
                        <div class="img">
                            <img src="{{asset($test->image)}}" alt="clients" class="img-fluid w-100">
                        </div>
                        <div class="text">
                            <h4>{{$test->name}}</h4>
                            <p>{{$test->title}}</p>
                        </div>
                    </div>
                    <div class="fp__single_testimonial_body">
                        <p class="feedback">{{$test->review}}</p>
                        <span class="rating">
                        @for($i = 1; $i <= 5; $i++)
                                @if($i <= $test->rating)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="fas fa-star-half-alt"></i>
                                @endif

                            @endfor

                        </span>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
