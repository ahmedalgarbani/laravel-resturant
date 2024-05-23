<?php


namespace App\Trails;


use App\Models\Order;

trait isBuyTrait
{

    function userOrdersComplete(){
        $userId = auth()->user()->id;
        $orders = Order::with('orderItems')
            ->where('user_id', $userId)
            ->where(function ($query) {
                $query->where('payment_status', 'complete')
                    ->orWhere('payment_status', 'COMPLETED');
            })
            ->get();

        $orderItems = $orders->flatMap(function ($order) {
            return $order->orderItems;
        });

        $productId = $orderItems->pluck('product_id')->unique();

        return $productId;
    }

    public function isUserBuy($productid)
    {
        $productId = $this->userOrdersComplete();

        return $productId->contains($productid);
    }



}
