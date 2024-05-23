@extends('frontend.layouts.master')

@section('content')


    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url({{config('settings.breadcrumb')}});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>payment</h1>
                    <ul>
                        <li><a href="/">home</a></li>
                        <li><a href="#">payment</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        PAYMENT PAGE START
    ==============================-->
    <section class="fp__payment_page mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="fp__payment_area">
                        <div class="row">
                            @if(config('PaymentGetwaySetting.paypal_status'))
                            <div class="col-lg-3 col-6 col-sm-4 col-md-3 wow fadeInUp" >
                                <a class="fp__single_payment payment_card" data-name="paypal"
                                   href="javascrip:;">
                                    <img src="{{config('PaymentGetwaySetting.paypal_logo')}}" alt="payment method" class="img-fluid w-100">
                                </a>
                            </div>
                            @endif
                            @if(config('PaymentGetwaySetting.stripe_status'))
                                    <div class="col-lg-3 col-6 col-sm-4 col-md-3 wow fadeInUp" data-wow-duration="1s">
                                        <a class="fp__single_payment payment_card" data-name="stripe" href="javascrip:;">
                                            <img src="{{config('PaymentGetwaySetting.stripe_logo')}}" alt="payment method" class="img-fluid w-100">
                                        </a>
                                    </div>
                                @endif
                                @if(config('PaymentGetwaySetting.razorpay_status'))
                                    <div class="col-lg-3 col-6 col-sm-4 col-md-3 wow fadeInUp" data-wow-duration="1s">
                                        <a class="fp__single_payment payment_card" data-name="razorpay" href="javascrip:;">
                                            <img src="{{config('PaymentGetwaySetting.razorpay_logo')}}" alt="payment method" class="img-fluid w-100">
                                        </a>
                                       
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt_25 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__cart_list_footer_button">
                        <h6>total cart</h6>
                        <p>subtotal: <span>{{currencyPosition($subTotal)}}</span></p>
                        <p>delivery: <span>{{currencyPosition($delivery_fee)}}</span></p>
                        <p>discount: <span>{{currencyPosition($discount)}}</span></p>
                        <p class="total"><span>total:</span> <span>{{currencyPosition($finalTotal)}}</span></p>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--============================
        PAYMENT PAGE END
    ==============================-->


@endsection

@push('scripts')
    <script>
        $(document).ready(function (){
            $('.payment_card').on('click',function (e){
                e.preventDefault()
                let paymentGetway = $(this).data('name');


                $.ajax({
                    method:'POST',
                    url:'{{route('make-payment')}}',
                    data:{
                        payment_getway:paymentGetway,
                    },
                    beforeSend:function (){
                        showLoader()
                    },
                    success:function (response){
                        console.log(response)
                        window.location.href=response.redirect_url
                    },
                    error:function (xhr,status,errors){
                        console.log(xhr.responseJSON.errors)

                            toastr.error("shomething went wrong!")


                    },
                    complete:function (){
                        hideLoader()
                    }

                })

            })
        })
    </script>
@endpush
