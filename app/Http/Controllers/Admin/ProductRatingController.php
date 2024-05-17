<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductRatingDataTable;
use App\Http\Controllers\Controller;
use App\Models\ProductRating;
use Illuminate\Http\Request;

class ProductRatingController extends Controller
{
    public function index(ProductRatingDataTable $dataTable){
        return $dataTable->render('Admin.product.product-rating.index');
    }

    public function updateReviewState(Request $request){
        try {
            $review = ProductRating::findOrFail($request->id);
            $review->status = $request->status;
            $review->save();

            toastr()->success('The Status Updated Successfully!');
            return response(['status'=>'success','message'=>'The Status Updated Successfully!'],200);
        }catch (\Exception $e){
            toastr()->error('SomeThing Went Wrong!');
            return response(['status'=>'success','error'=>'SomeThing Went Wrong!'],400);

        }
    }



    public function delete(Request $request){
        $id = (int) preg_replace('/[^0-9]/', '', $request->rating_id);
        ProductRating::findOrFail($id)->delete();
        toastr()->success('The Reveiw deleted Successfully!');
        return redirect()->back();
    }
}
