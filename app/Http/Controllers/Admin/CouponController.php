<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CouponTableDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CouponTableDataTable $dataTable)
    {
        return $dataTable->render('Admin.coupon.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        Coupon::create([
            'name'=>$request->name,
            'code'=>$request->code,
            'quantity'=>$request->quantity,
            'min_purchase_amount'=>$request->min_purchase_amount,
            'expired_date'=>$request->expired_date,
            'discount_type'=>$request->discount_type,
            'discount'=>$request->discount,
            'status'=>$request->status,
        ]);

        return redirect('/admin/coupon');
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
    public function edit(Request $request,string $id)
    {
        $coupon= Coupon::findOrFail($id);
        return view('Admin.coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, string $id)
    {
        Coupon::findOrFail($id)->update([
            'name'=>$request->name,
            'code'=>$request->code,
            'quantity'=>$request->quantity,
            'min_purchase_amount'=>$request->min_purchase_amount,
            'expired_date'=>$request->expired_date,
            'discount_type'=>$request->discount_type,
            'discount'=>$request->discount,
            'status'=>$request->status,
        ]);

        return redirect('/admin/coupon');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        return $request;
    }

    public function delete(Request $request)
    {

        preg_match('/\d+/', $request->coupon_id, $matches);
        $number = $matches[0];

        Coupon::findOrFail($number)->delete();

        return redirect()->back();
    }



    public function applyCoupon(Request $request)  {
        preg_match('/\d+/', $request->subtotal, $matches);
        $subtotal = $matches[0];
        $code = $request->coupon;

        $discount = 0;
        $coupon = Coupon::where('code', $code)->where('status', 1)->first();
        if(!$coupon){
            return response()->json(['message'=>'Invalid Coupon Code.'], 422);
        }
        if ($coupon->quantity <= 0 ){
            return response()->json(['message'=>'Coupon has been fully redeemed.'], 422);
        }
        if($coupon->expired_date < now()){
            return response()->json(['message'=>'Coupon has Expired.'], 422);
        }
        if($coupon->discount_type === 'percent'){
            $discount = $subtotal * ($coupon->discount / 100);
        } elseif($coupon->discount_type === 'amount'){
            $discount = $coupon->discount;
        }

        $finalTotal = $subtotal - $discount;
        session()->put('coupon', [
            'finalTotal' => $finalTotal,
            'discount' => $discount,
            'coupon'=>$coupon->code
        ]);
        return response()->json(['message'=>'Coupon applied successfully.', 'finalTotal'=>$finalTotal, 'discount'=>$discount], 200);
    }





}
