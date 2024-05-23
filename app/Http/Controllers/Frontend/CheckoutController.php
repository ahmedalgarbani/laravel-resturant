<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\DeliveryArea;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = Address::where(['user_id'=>auth()->user()->id])->get();
        $delivery_area = DeliveryArea::where('status',1)->get();

        return view('frontend.home.pages.checkout',compact('addresses','delivery_area'));
    }

    public function redirct(Request $request){
        $request->validate([
            'id'=>['required','integer']
        ]);

        $address = Address::with('Area')->findOrFail($request->id);

        $selectedAddress = $address->address.', Aria'. $address->area?->area_name;

        session()->put('address',$selectedAddress);
        session()->put('address_id',$address->id);
        session()->put('delivery_area_id',$address->area->id);

        session()->put('delivery_fee',$address->area->delivery_fee);


        return response(['redirct_url'=>route('payment')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function calculateDeliveryCharge($id)
    {
        try {
            $address = Address::findOrFail($id);
            $deliveryAmount = $address->area->delivery_fee;

            if(session()->get('coupon')){
                $grandTotal = session()->get('coupon')['finalTotal']+$deliveryAmount;
                return response(['delivery_fee'=>$deliveryAmount,'grand_total'=>$grandTotal],200);

            }else{
                $grandTotal = GlobalTotal()+$deliveryAmount;
                return response(['delivery_fee'=>$deliveryAmount,'grand_total'=>$grandTotal],200);

            }
        }catch (\Exception $e){
            logger($e);
            return response(['message'=>'something went wronge!'],422);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
