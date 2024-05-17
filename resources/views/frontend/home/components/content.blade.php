<section class="fp__counter" style="background: url({{$counter->background}});">
    <div class="fp__counter_overlay pt_100 xs_pt_70 pb_100 xs_pb_70">
        <div class="container">
            <div class="row">
                @if($counter->counter_icon_one && $counter->counter_name_one && $counter->counter_count_one)
                <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__single_counter">
                        <i class="{{$counter->counter_icon_one}}"></i>
                        <div class="text">
                            <h2 class="counter">{{round($counter->counter_count_one)}}</h2>
                            <p>{{$counter->counter_name_one}}</p>
                        </div>
                    </div>
                </div>
                @endif
                    @if($counter->counter_icon_two && $counter->counter_name_two && $counter->counter_count_two)
                        <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                            <div class="fp__single_counter">
                                <i class="{{$counter->counter_icon_two}}"></i>
                                <div class="text">
                                    <h2 class="counter">{{round($counter->counter_count_two)}}</h2>
                                    <p>{{$counter->counter_name_two}}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($counter->counter_icon_three && $counter->counter_name_three && $counter->counter_count_three)
                        <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                            <div class="fp__single_counter">
                                <i class="{{$counter->counter_icon_three}}"></i>
                                <div class="text">
                                    <h2 class="counter">{{round($counter->counter_count_three)}}</h2>
                                    <p>{{$counter->counter_name_three}}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($counter->counter_icon_four && $counter->counter_name_four && $counter->counter_count_four)
                        <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                            <div class="fp__single_counter">
                                <i class="{{$counter->counter_icon_four}}"></i>
                                <div class="text">
                                    <h2 class="counter">{{round($counter->counter_count_four)}}</h2>
                                    <p>{{$counter->counter_name_four}}</p>
                                </div>
                            </div>
                        </div>
                    @endif
            </div>
        </div>
    </div>
</section>
