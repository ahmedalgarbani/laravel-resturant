<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
      'order_status','currency_name','coupon_info','transaction_id','payment_approve_date',
      'payment_status','payment_method','product_qty','grand_total','subtotal','discount',
        'address','user_id','invoice_id','address_id','delivery_charge'
    ];

    protected $dispatchesEvents = [
        'created' => \App\Events\OrderPlacedNotificationEvent::class,
    ];

    function user(){
        return $this->belongsTo(User::class);
    }
    function area(){
        return $this->belongsTo(DeliveryArea::class);
    }
    function userAddress(){
        return $this->belongsTo(Address::class,'address_id','id');
    }
    function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

}
