@extends('frontend.layouts.master')

@section('content')

    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url({{asset('frontend/assets/images/counter_bg.jpg')}});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>cart view</h1>
                    <ul>
                        <li><a href="{{url('/')}}">home</a></li>
                        <li><a href="{{route('cart')}}">cart view</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        CART VIEW START
    ==============================-->
    <section class="fp__cart_view mt_125 xs_mt_95 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__cart_list">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                <tr>
                                    <th class="fp__pro_img">
                                        Image
                                    </th>

                                    <th class="fp__pro_name">
                                        details
                                    </th>

                                    <th class="fp__pro_status">
                                        price
                                    </th>

                                    <th class="fp__pro_select">
                                        quantity
                                    </th>

                                    <th class="fp__pro_tk">
                                        total
                                    </th>

                                    <th class="fp__pro_icon">
                                        <a class="clear_all" href="{{route('cart.destroy')}}">clear all</a>
                                    </th>
                                </tr>
                                @foreach(Cart::content() as $product)
                                <tr>
                                    <td class="fp__pro_img"><img src="{{$product->options->product_info['product_image']}}" alt="product"
                                                                 class="img-fluid w-100">
                                    </td>

                                    <td class="fp__pro_name">
                                        <a href="{{route('product.showDetailes',[$product->id,$product->options->product_info['product_slug']])}}">{{$product->name}}</a>
                                        <span>{{$product->options->product_size['name']}} ({{currencyPosition($product->options->product_size['price'])}})</span>
                                       @foreach(@$product->options->product_option as $option)
                                        <p>{{$option['name']}} ({{currencyPosition($option['price'])}}) </p>
                                        @endforeach
                                    </td>

                                    <td class="fp__pro_status">
                                        <h6>{{currencyPosition($product->price)}}</h6>
                                    </td>

                                    <td class="fp__pro_select">
                                        <div class="quentity_btn">
                                            <button class="btn btn-danger increment"><i class="fal fa-minus"></i></button>
                                            <input type="text" placeholder="1" data-id="{{$product->rowId}}" readonly class="quantity" value="{{$product->qty}}">
                                            <button class="btn btn-success decrement"><i class="fal fa-plus"></i></button>
                                        </div>
                                    </td>

                                    <td class="fp__pro_tk">
                                        <h6 class="total">{{currencyPosition(sumOneProduct($product->rowId))}}</h6>
                                    </td>

                                    <td class="fp__pro_icon">
                                        <a href="{{route('remove-cart',$product->rowId)}}"><i class="far fa-times"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__cart_list_footer_button">
                        <h6>total cart</h6>
                        <p>subtotal: <span id="subtotal_coupon">{{currencyPosition(GlobalTotal())}}</span></p>
                        <p>delivery: <span>$00.00</span></p>
                        <p>discount: <span id="Discount_total">$00.00</span></p>
                        <p class="total"><span>total:</span> <span id="total_coupon">{{currencyPosition(GlobalTotal())}}</span></p>
                        <form id="coupon_form">
                            <input type="text" name="coupon_code" id="coupon_code" placeholder="Coupon Code">
                            <button type="submit" id="coupon_button">apply</button>
                        </form>
                        <a class="common_btn" href="{{route('checkout.index')}}">checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        CART VIEW END
    ==============================-->



@endsection





@push('scripts')
    <script>
        $(document).ready(function (){
            $('.decrement').on('click',function (e){
                e.preventDefault()
                let Quantity = $(this).siblings('.quantity')
                let currentQuantity = parseFloat(Quantity.val())
                let rowId = Quantity.data("id")
                Quantity.val(currentQuantity+1)
                let QuanValue = Quantity.val()
                updateTotal(rowId,QuanValue,function (response){
                    if(response.status == "errors"){
                        Quantity.val(response.quantity)
                        toastr.error(response.message)
                    }
                    let productTotal = response.total;
                    console.log(response.global_total)
                    let formatedTotal = '{{currencyPosition(":productTotal")}}'.replace(':productTotal',productTotal)
                    Quantity.closest("tr")
                        .find(".total")
                        .text(`${formatedTotal}`)
                    let subtotal_coupon = $('#subtotal_coupon');
                    subtotal_coupon.text(`${formatedTotal}`);
                    let total_coupon = $('#total_coupon');
                    total_coupon.text(`${formatedTotal}`);
                })


            })
            $('.increment').on('click',function (e){
                e.preventDefault()
                let Quantity = $(this).siblings('.quantity')
                let currentQuantity = parseFloat(Quantity.val())
                let rowId = Quantity.data("id")
                if (currentQuantity>1){
                    Quantity.val(currentQuantity-1)
                    let QuanValue = Quantity.val()
                    updateTotal(rowId,QuanValue,function (response){
                        let productTotal = response.total;
                        console.log(response.global_total)

                        let formatedTotal = '{{currencyPosition(":productTotal")}}'.replace(':productTotal',productTotal)
                        Quantity.closest("tr")
                            .find(".total")
                            .text(`${formatedTotal}`)
                        let subtotal_coupon = $('#subtotal_coupon');
                        subtotal_coupon.text(`${formatedTotal}`);
                        let total_coupon = $('#total_coupon');
                        total_coupon.text(`${formatedTotal}`);


                    })

                }
            })
        })


        function updateTotal(id,qty,callback){
            $.ajax({
                method:'POST',
                url:'{{route("cart.update-quantity")}}',
                data:{
                    'rowId':id,
                    'qty':qty
                },
                beforeSend:function (){
                    showLoader()
                },
                success:function (response){
                    hideLoader()

                    if(callback && typeof callback ==='function'){
                    callback(response)
                }

                },
                error:function (){

                },
                complete:function (){
                  hideLoader()
                }

            })
        }


        $('#coupon_form').on('submit', function (e) {
            e.preventDefault();
            let coupon = $('#coupon_code').val();
            let subtotal = $('#total_coupon').text();
            coupon_form(coupon, subtotal);
        });

        function coupon_form(coupon, subtotal) {
            $.ajax({
                method: "POST",
                url: "{{ route('admin.getCoupon') }}",
                data: {
                    'coupon': coupon,
                    'subtotal': subtotal
                },
                beforeSend: function () {

                },
                success: function (response) {
                    let total_coupon = $('#total_coupon');
                    let Discount_Total = $('#Discount_total');
                    let formatedTotal = currencyPosition(response.finalTotal);
                    let DiscountTotal = currencyPosition(response.discount);
                    total_coupon.text(formatedTotal);
                    Discount_Total.text(DiscountTotal);
                },
                complete: function () {
                    // Actions to take regardless of success or failure
                },
                error: function (xhr, status, error) {
                    // Actions to take if AJAX request encounters an error
                }
            });
        }


    </script>


@endpush
