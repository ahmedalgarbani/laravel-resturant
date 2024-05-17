<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CardController extends Controller
{

    public function index(){
        return view('frontend.layouts.cart_view');
    }


    public function addtoCard(Request $request){
        try {

            $product = Product::with(['size','option','productimage'])->findOrFail($request->productId);
            $productSize = $product->size->where('id',$request->product_size)->first();
            $productOption = $product->option->whereIn('id',$request->product_option);

            $option = [
                'product_size'=>[
                    'id'=>$productSize->id,
                    'name'=>$productSize->name,
                    'price'=>$productSize->price
                ],
                'product_option'=>[],
                'product_info'=>[
                    'product_image'=>$product->thumb_image,
                    'product_id'=>$product->id,
                    'product_slug'=>$product->slug,
                    'product_total'=>$request->total,
                ]

            ];

            foreach ($productOption as $opt){
                $option['product_option'][]=[
                    'id'=>$opt->id,
                    'name'=>$opt->name,
                    'price'=>$opt->price,

                ];
            }
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->qtr,
                'price' => $request->base_price,
                'weight'=>0,
                'options' => $option
            ]);



            return response()->json(['status'=>'success','message'=>"the product added successflly"],200);
        }catch (\Exception $e){
            return response()->json(['status'=>'error','message'=>"something went wronge"],500);
        }

    }


public function getSideBarItems(){
        return view('frontend.layouts.ajax-file.sidebar-cards')->render();
}


public function removeCartItem($rowId){
    try {
        Cart::remove($rowId);
        return redirect()->back();
    }catch (\Exception $e){
        return response()->json(['status'=>'success','message'=>'something went wrong'],500);
    }
}


public function updateQuantity(Request $request)
{
    $pro = Cart::get($request->rowId);
    $product = Product::findOrFail($pro->id);
    try {
        $globalTotal = GlobalTotal();

        if ($product->quantity < $request->qty){
            return response()->json(['status'=>'errors','message'=>"the quantity is more than what we have",'total'=>sumOneProduct($request->rowId),'quantity'=>$product->quantity,'global_total'=>$globalTotal],200);

        }else{
            Cart::update($request->rowId, $request->qty);
            return response()->json(['status'=>'success','total'=>sumOneProduct($request->rowId),'global_total'=>$globalTotal],200);
        }

    }catch (\Exception $e){
        return response()->json(['status'=>'error','message'=>"sumthing went wrong"],500);
    }
}



public function destroy()
{ try {
    Cart::destroy();
    return redirect()->back();
}catch (\Exception $e){
    return response()->json(['status'=>'success','message'=>'something went wrong'],500);
}
}



}
