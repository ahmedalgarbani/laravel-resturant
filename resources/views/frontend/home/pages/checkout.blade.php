@extends('frontend.layouts.master')

@section('content')
    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url({{config('settings.breadcrumb')}});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>checkout</h1>
                    <ul>
                        <li><a href="/">home</a></li>
                        <li><a href="#">checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        CHECK OUT PAGE START
    ==============================-->
    <section class="fp__cart_view mt_125 xs_mt_95 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__checkout_form">
                        <div class="fp__check_form">
                            <h5>select address <a href="#" data-bs-toggle="modal" data-bs-target="#address_modal"><i
                                        class="far fa-plus"></i> add address</a></h5>

                            <div class="fp__address_modal">
                                <div class="modal fade" id="address_modal" data-bs-backdrop="static"
                                     data-bs-keyboard="false" tabindex="-1" aria-labelledby="address_modalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="address_modalLabel">add new address
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('address.store')}}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h4>add new address</h4>
                                                        </div>
                                                        <div class="col-md-12 col-lg-12 col-xl-12">
                                                            <div class="fp__check_single_form">
                                                                <select name="area" id="select_js3">
                                                                    <option value="">select Area</option>
                                                                    @foreach($delivery_area as $delivery)
                                                                        <option value="{{$delivery->id}}">{{$delivery->area_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-12 col-xl-6">
                                                            <div class="fp__check_single_form">
                                                                <input type="text" value="{{old('first_name')}}" name="first_name"  placeholder="First Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-12 col-xl-6">
                                                            <div class="fp__check_single_form">
                                                                <input type="text" value="{{old('last_name')}}" name="last_name" placeholder="Last Name">
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6 col-lg-12 col-xl-6">
                                                            <div class="fp__check_single_form">
                                                                <input type="email" value="{{old('email')}}" name="email" placeholder="email">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-lg-12 col-xl-6">
                                                            <div class="fp__check_single_form">
                                                                <input type="text" value="{{old('phone')}}" name="phone"
                                                                       placeholder="phone">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-lg-12 col-xl-12">
                                                            <div class="fp__check_single_form">
                                                                <textarea cols="3" rows="4" name="address"
                                                                          placeholder="Address"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="fp__check_single_form check_area">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                           value="home"
                                                                           name="type" id="flexRadioDefault1">
                                                                    <label class="form-check-label"
                                                                           for="flexRadioDefault1">
                                                                        home
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="type" value="office"
                                                                           id="flexRadioDefault2">
                                                                    <label class="form-check-label"
                                                                           for="flexRadioDefault2">
                                                                        office
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button type="button"
                                                                    class="common_btn cancel_new_address">cancel</button>
                                                            <button type="submit" class="common_btn">save
                                                                address</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @foreach($addresses as $address)
                                    <div class="col-md-6">
                                        <div class="fp__checkout_single_address">
                                            <div class="form-check">
                                                <input class="v_address form-check-input" value="{{$address->id}}" type="radio" name="Address" id="{{$address->type}}">
                                                <label class="form-check-label">
                                                    @if($address->type == "home")
                                                        <span class="icon"><i class="fas fa-home"></i>
                                                                        @else
                                                                <span class="icon"><i class="fas fa-building"></i>
                                                                        @endif
                                                                        </span>
                                                                <span class="address">{{$address->type}} | {{$address->address}} , {{$address->area->area_name}}</span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                @endforeach
                            </div>



                        </div>
                    </div>
                </div>

                <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div id="sticky_sidebar" class="fp__cart_list_footer_button">
                        <h6>total cart</h6>
                        <p>subtotal: <span>{{currencyPosition(GlobalTotal())}}</span></p>
                        <p>delivery: <span id="delivery_fee" data-price="0">$00.00</span></p>
                        <p>discount: <span>{{@currencyPosition(0.0)}}</span></p>
                        <p class="total"><span>total:</span> <span id="grand_total">{{@currencyPosition(GlobalTotal())}}</span></p>
                        @if(session()->get('coupon'))
                            <p>discount: <span>{{@currencyPosition(session()->get('coupon')['discount'])}}</span></p>

                            <p class="total"><span>total:</span> <span id="grand_total">{{@currencyPosition(session()->get('coupon')['finalTotal'])}}</span></p>

                        @endif
                        <a class="common_btn" id="proccess_to_payment" href=" #">proccess to Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        CHECK OUT PAGE END
    ==============================-->

@endsection

@push('scripts')
    <script>
        $(document).ready(function (){
            $('.v_address').prop('checked',false)
            $('.v_address').on('click',function (){
                let address = $(this).val()
                let deliveryFee = $('#delivery_fee')
                let grandTotal = $('#grand_total')
                $.ajax({
                    method:'GET',
                    url:'{{route('checkout.delivery-cal',':id')}}'.replace(':id',address),
                    beforeSend:function (){
                    showLoader()
                    },
                    success:function (response){
                        console.log(response)
                    deliveryFee.text("{{currencyPosition(':amount')}}"
                        .replace(":amount",response.delivery_fee))

                        grandTotal.text("{{currencyPosition(':amount')}}"
                            .replace(":amount",response.grand_total))
                        hideLoader()

                    },
                    error:function (xhr,status,error){
                        let errorMessage = xhr.responseJSON.message
                        toastr.success(errorMessage)
                        hideLoader()

                    },
                    complement:function (){
                    hideLoader()
                    }
                })
            })
        $('#proccess_to_payment').on('click',function (e){
            e.preventDefault()
            let id = $('.v_address:checked').val()
            if (id.length ==0){
                toastr.error('plz choose address')
            return;
            }
            $.ajax({
                method: 'POST',
                url: '{{ route('checkout_redirct') }}',
                data: {
                    'id': id,
                },
                beforeSend: function() {
                    showLoader();
                },
                success: function(response) {

                    window.location.href = response.redirct_url;

                },
                error: function(xhr, status, error) {
                    let errorMessage = xhr.responseJSON.message;
                    toastr.error(errorMessage); // Changed to error from success for consistency
                },
                complete: function() {
                    hideLoader();
                }
            });


        })
        })
    </script>
@endpush
