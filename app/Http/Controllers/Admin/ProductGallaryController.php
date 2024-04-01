<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductGallary;
use App\Trails\UploadImageTrail;
use Illuminate\Http\Request;

class ProductGallaryController extends Controller
{
    use UploadImageTrail;
    /**
     * Display a listing of the resource.
     */
    public function index(string $productId)
    {
        $images = ProductGallary::where('product_id',$productId)->get();

        return view('Admin.product.gallary.index',compact('productId','images'));
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
        'image'=>['required'],
        'productId'=>['required'],
        ]);
        $imagePath = $this->updateImage($request,'image');
        ProductGallary::create([
            'gallary_image'=>$imagePath,
            'product_id'=>$request->productId
        ]);
        toastr()->success('the product gallary added successfully');

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
        ProductGallary::findOrFail($request->img_id)->delete();
        toastr()->success('the product gallary deleted successfully');

        return redirect()->back();
    }
}
