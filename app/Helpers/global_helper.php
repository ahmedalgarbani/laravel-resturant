<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;


if(!function_exists('generateUniqueSlug')){
    function generateUniqueSlug($model,$name){

        $modelClass = "App\\Models\\$model";

        if(!class_exists($modelClass)){
            throw new \InvalidArgumentException("Model $model not found.");

        }
        $slug = \Str::slug($name);
        $count = 2;

        while ($modelClass::where('slug',$slug)->exists()){
            $slug = \Str::slug($name).'-'.$count;
            $count++;
        }

        return $slug;

    }





    if(!function_exists('currencyPosition')){
        function currencyPosition($price){
            if(config('settings.currency_Icon_position')==='left'){
                return config('settings.currency_icon') . $price;
            }else{
                return $price . config('settings.currency_icon');

            }
        }
    }

    if(!function_exists('GlobalTotal')){
        function GlobalTotal($delivery_fee =0){
            $total = 0;
            foreach (Cart::content() as $cart){
                $productPice = $cart->price;
                $productSize = $cart->options->product_size['price'];
                $productOption = 0;
                foreach ($cart->options->product_option as $option){
                    $productOption += $option['price'];
                }
                $total += ($productPice + $productSize + $productOption ) * $cart->qty;

            }
            return $total+$delivery_fee;
        }
    }

    if(!function_exists('sumOneProduct')){
        function sumOneProduct($rowId){
            $total = 0;
            $product = Cart::get($rowId);
                $productPice = $product->price;
                $productSize = $product->options->product_size['price'];
                $productOption = 0;
                foreach ($product->options->product_option as $option){
                    $productOption += $option['price'];
                }
                $total += ($productPice + $productSize + $productOption) * $product->qty;


            return $total;
        }
    }

    if(!function_exists('createInvoiceId')){
        function createInvoiceId(){
            $randomNumber = rand(1,9999);
            $currentDateTime = now();

            $invoiceId = $randomNumber.$currentDateTime->format('yd').$currentDateTime->format('s');

            return $invoiceId;
        }
    }
/** Youtube Helper FUnction*/
    if (!function_exists('getYtThumbnail')) {
        function getYtThumbnail($video_link, $size = 'default') {
            $videoId = explode("?v=", $video_link)[1];
            $finalSize = '';

            switch ($size) {
                case 'low':
                    $finalSize = 'sddefault';
                    break;
                case 'medium':
                    $finalSize = 'mqdefault';
                    break;
                case 'high':
                    $finalSize = 'hqdefault';
                    break;
                case 'max':
                    $finalSize = 'maxresdefault';
                    break;
                default:
                    $finalSize = 'default'; // or whatever default size you want
                    break;
            }

            return "https://img.youtube.com/vi/$videoId/$finalSize.jpg";
        }
    }



}
