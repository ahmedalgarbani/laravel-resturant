<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
        class="fal fa-times"></i></button>
<div class="fp__cart_popup_img">
    <img src="{{asset($product->thumb_image)}}" alt="menu" class="img-fluid w-100">
</div>
<form action="" id="add_to_card_modal" >
<input type="hidden" name="productId" value="{{$product->id}}">
<div class="fp__cart_popup_text">
    <a href="{{ route('product.showDetailes', ['id' => $product->id, 'slug' => $product->slug]) }}" class="title">{{$product->name}}</a>
    <p class="rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
        <i class="far fa-star"></i>
        <span>(201)</span>
    </p>

        @if($product->offer_price >0)
            <input type="hidden" name="base_price" value="{{$product->offer_price}}">
            <h4 class="price">{{currencyPosition($product->offer_price)}}<del>{{currencyPosition($product->price)}}</del> </h4>
        @else
            <h4 class="price">{{currencyPosition($product->price)}}</h4>
        <input type="hidden" name="base_price" value="{{$product->price}}">

    @endif

        @if($product->size()->exists())
            <div class="details_size">
                <h5>select size</h5>
                @foreach($product->size as $size)
                    <div class="form-check">
                        <input class="form-check-input" data-price="{{$size->price}}" checked value="{{$size->id}}" type="radio" name="product_size" id="{{$size->name}}"
                               >
                        <label class="form-check-label" for="{{$size->name}}">
                            {{$size->name}} <span>+ {{currencyPosition($size->price)}}</span>
                        </label>
                    </div>
                @endforeach
            </div>
        @endif
        @if($product->option()->exists())
            <div class="details_extra_item">
                <h5>select option <span>(optional)</span></h5>
                @foreach($product->option as $option)
                    <div class="form-check">
                        <input class="form-check-input" data-price="{{$option->price}}" value="{{$option->id}}" name="product_option[]" type="checkbox"  id="{{$option->name}}">
                        <label class="form-check-label"  for="{{$option->name}}">
                            {{$option->name}} <span>+          {{currencyPosition($option->price)}}</span>
                        </label>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="details_quentity">
            <h5>select quentity</h5>
            <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                <div class="quentity_btn">
                    <button class="btn btn-danger decrement"><i class="fal fa-minus"></i></button>
                    <input type="text" placeholder="1" value="1" id="qtr" name="qtr" readonly>
                    <button class="btn btn-success increment"><i class="fal fa-plus"></i></button>
                </div>
                <h3 id="total" >{{$product->offer_price >0 ? $product->offer_price:$product->price}}</h3>
                <input type="hidden" id="base_total" name="total">
            </div>
        </div>
        <ul class="details_button_area d-flex flex-wrap">
            <li>
                @if($product->quantity >0)
                    <button class="common_btn add_card_button_modal" type="submit">
                        add to card
                    </button>
                @else
                    <button class="common_btn btn-danger" type="button">
                       sold out
                    </button>
                @endif

            </li>
        </ul>
</div>

</form>


<script>
    $(document).ready(function (){
        toastr.options.preventDuplicates = true;
        $('input[name="product_size"]').on("change",function (){
            updateTotalPrice();
        })

        $('input[name="product_option[]"]').on("change",function (){
            updateTotalPrice();
        })

        $('.increment').on("click",function (e){
            e.preventDefault()
            let Quantity = $('#qtr')
            let currentQuantity = parseFloat(Quantity.val())
            Quantity.val(currentQuantity+1)
            updateTotalPrice()
        })

        $('.decrement').on("click",function (e){
            e.preventDefault()
            let Quantity = $('#qtr')
            let currentQuantity = parseFloat(Quantity.val())
            if(currentQuantity>1){
                Quantity.val(currentQuantity-1)
                updateTotalPrice()
            }
        })

        function updateTotalPrice(){
            let basePrice=parseFloat($('input[name="base_price"]').val())
            let selectedSizePrice = 0
            let selectedOptionPrice = 0
            let Quantity = $('#qtr')
            let currentQuantity = parseFloat(Quantity.val())


            let selectedSize = $('input[name="product_size"]:checked')
            if(selectedSize.length >0){
                selectedSizePrice = parseFloat(selectedSize.data("price"))
            }


            let selectedOptions = $('input[name="product_option[]"]:checked');

            selectedOptions.each(function() {
                selectedOptionPrice += parseFloat($(this).data("price"));
            });


            let total = (basePrice+selectedSizePrice + selectedOptionPrice)*currentQuantity


            $('#total').text(`{{config('settings.currency_icon')}}`+total)
            $('#base_total').val(total)
        }


        /*
        *
        * add to card ajax
        * */



        $("#add_to_card_modal").on("submit",function (e){
            e.preventDefault()
            let formatDate = $(this).serialize()
            $.ajax({
                method:'POST',
                url:'{{route('add-to-card')}}',
                data:formatDate,
                beforeSend:function (){
                    $('.add_card_button_modal').html(` <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`)
                    $('.add_card_button_modal').attr('disabled',true)
                },
                success:function (response){
                    updateSideBarItems()

                    toastr.success(response.message)
                },
                error:function (xhr,status,error){
                    let errormessage = xhr.responseJSON.message
                    toastr.error(errormessage)
                },
                complete:function (){
                    $('.add_card_button_modal').html(`add to card`)
                    $('.add_card_button_modal').attr('disabled',false)

                }
            })
        })


    })
</script>
