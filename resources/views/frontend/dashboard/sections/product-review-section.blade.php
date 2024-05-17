@php

 $reviews = \App\Models\ProductRating::where('user_id',auth()->user()->id)->get();
@endphp
<div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
     aria-labelledby="v-pills-messages-tab">
    <div class="fp_dashboard_body dashboard_review">
        <h3>review</h3>
        <div class="fp__review_area">
            <div class="fp__comment pt-0 mt_20">
                @foreach($reviews as $rev)
                <div class="fp__single_comment m-0 border-0">
                    <img src="{{asset($rev->user->avatar)}}" alt="review" class="img-fluid">
                    <div class="fp__single_comm_text">
                        <h3><a href="#">{{$rev->product->name}}</a> <span>{{date('y-M-d',strtotime($rev->created_at))}}</span>
                        </h3>
                        <span class="rating">
                            @for($i=0;$i<$rev->rating ;$i++)
                                                            <i class="fas fa-star"></i>
                            @endfor
                                                            <b>(120)</b>
                                                        </span>
                        <p>{{$rev->review}}</p>
                        @if($rev->status == 1)
                        <span class="status active">active</span>
                        @else
                            <span class="status inactive">Inactive</span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
