<?php


namespace App\services;


use App\Models\OrderItem;
use Cart;
use App\Models\Order;

class OrderService
{
public function createOrder()
{

    try {
        $order = Order::create([
            'invoice_id' => createInvoiceId(),
            'user_id' => auth()->user()->id,
            'address' => session()->get('address'),
//       'discount'=>session()->get('coupon')['discount']
            'discount' => 0,
            'subtotal' => GlobalTotal(),
            'delivery_charge' => session()->get('delivery_fee'),
            'grand_total' =>  GlobalTotal(session()->get('delivery_fee')),
            'product_qty' => \Cart::content()->count(),
            'payment_method' => NULL,
            'payment_status' => 'pending',
            'payment_approve_date' => NULL,
            'transaction_id' => NULL,
//        'coupon_info'=>json_encode(['coupon'=>'111','discount'=>'111']),
            'coupon_info' => NULL,
            'currency_name' => NULL,
            'order_status' => 'pending',
            'address_id' => session()->get('address_id')
        ]);

        foreach (\Cart::content() as $product) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_name' => $product->name,
                'product_id' => $product->id,
                'unit_price' => $product->price,
                'qty' => $product->qty,
                'product_size' => json_encode($product->options->product_size),
                'product_option' => json_encode($product->options->product_option),
            ]);
        }

        session()->put('grant_total',$order->grand_total);
        session()->put('order_id',$order->id);

        return true;
    }catch (\Exception $e){
        throw $e;
    }
}

    function clearSession(){

    }




}
