<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function addToWishList(string $productId){
        $productExist = Wishlist::where(['user_id'=>auth()->user()->id,'product_id'=>$productId])->exists();

        if ($productExist){
            throw ValidationException::withMessages(['Product is already add to wishlist']);
        }

        if(!auth()->check()){
            throw ValidationException::withMessages(['Please login first']);
        }

        $wishlist = new Wishlist();
        $wishlist->user_id = auth()->user()->id;
        $wishlist->product_id = $productId;
        $wishlist->save();

        return response(['status'=>'success','message'=>'the product added to wishlist !!']);

    }


    public function removeToWishList(string $productId){

        try {
        $productExist = Wishlist::where(['user_id'=>auth()->user()->id,'product_id'=>$productId])->exists();

        if(!auth()->check()){
            throw ValidationException::withMessages(['Please login first']);
        }


            if ($productExist && auth()->check()) {
                $productItem = Wishlist::where('user_id', auth()->user()->id)
                    ->where('product_id', $productId)
                    ->firstOrFail();
                $productItem->delete();
                return response(['status'=>'success','message'=>'the product Deleted Successfully !!']);
            }
        } catch (\Exception $exception) {
            // Handle the case where no wishlist item is found
            return response(['status'=>'error','message'=>'Wishlist item not found.']);
        }




    }
}
