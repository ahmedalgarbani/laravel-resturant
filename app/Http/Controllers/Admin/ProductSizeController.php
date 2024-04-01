<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductGallary;
use App\Models\ProductSize;
use App\Models\ProductOption;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $productId)
    {
        $options = ProductOption::where('product_id',$productId)->get();
        $sizes = ProductSize::where('product_id',$productId)->get();
        return view('Admin.product.product-size.index',compact('productId','options','sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>['required'],
            'price'=>['required'],
            'product_id'=>['required'],
        ]);
        ProductSize::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'product_id'=>$request->product_id
        ]);
        toastr()->success('the product size added successfully');

        return redirect()->back();
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
    public function destroy(Request $request)
    {
        ProductSize::findOrFail($request->size_id)->delete();
        toastr()->success('the product size deleted successfully');

        return redirect()->back();
    }
}
