<input type="hidden" value="{{currencyPosition(GlobalTotal())}}" id="sub_total">
<input type="hidden" value="{{count(Cart::content())}}" id="item_count">
    @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $cart)
        <li>
            <div class="menu_cart_img">
                <img src="{{asset($cart->options['product_info']["product_image"])}}" alt="menu" class="img-fluid w-100">
            </div>
            <div class="menu_cart_text">
                <a class="title" href="{{ route('product.showDetailes', ['id' => $cart->id, 'slug' => $cart->options['product_info']["product_slug"]]) }}">{{$cart->name}} </a>

                <p class="size">Quantity : {{$cart->qty}}</p>
                <p class="size">{{$cart->options['product_size']["name"]}} ({{currencyPosition($cart->options['product_size']["price"])}})</p>
                @foreach($cart->options['product_option'] as $opt)
                    <span class="extra">{{$opt['name']}} ({{currencyPosition($opt["price"])}} )</span>
                @endforeach
                <p class="price">{{currencyPosition($cart->options->product_info['product_total'])}}</p>
            </div>
            <span class="del_icon" ><i class="fal fa-times" onclick="removeCartItem('{{$cart->rowId}}')"></i></span>
        </li>
    @endforeach

