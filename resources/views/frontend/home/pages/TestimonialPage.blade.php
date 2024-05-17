@extends('frontend.layouts.master')

@section('content')

    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url({{config('settings.breadcrumb')}});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>Our Customar Feedbacks</h1>
                    <ul>
                        <li><a href="/">home</a></li>
                        <li><a href="{{route('Testimonial')}}">Testimonial</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--=============================
        TESTIMONIAL PAGE START
    ==============================-->
    <section class="fp__testimonial_page mt_95 xs_mt_65 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                @foreach($Testimonials as $Testimonial)
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__single_testimonial">
                        <div class="fp__testimonial_header d-flex flex-wrap align-items-center">
                            <div class="img">
                                <img src="{{asset($Testimonial->image)}}" alt="clients" class="img-fluid w-100">
                            </div>
                            <div class="text">
                                <h4>{{$Testimonial->name}}</h4>
                                <p>{{$Testimonial->title}}</p>
                            </div>
                        </div>
                        <div class="fp__single_testimonial_body">
                            <p class="feedback">{{$Testimonial->review}}</p>
                            <span class="rating">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $Testimonial->rating)
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
{{$Testimonial->hasPages()}}
            <div class="fp__pagination mt_60">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-long-arrow-alt-left"></i></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        TESTIMONIAL PAGE END
    ==============================-->





@endsection
