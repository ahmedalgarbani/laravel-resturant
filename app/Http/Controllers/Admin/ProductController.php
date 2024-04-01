<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCreateRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Trails\UploadImageTrail;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use Psy\Util\Str;

class ProductController extends Controller
{
    use UploadImageTrail;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {
        $imagePath = $this->updateImage($request,'image');

        $product = new Product();
        $product->thumb_image =$imagePath;
        $product->name =$request->name;
        $product->price =$request->price;
        $product->offer_price =$request->offer_price;
        $product->category_id =$request->category;
        $product->long_description =$request->long_description;
        $product->short_description =$request->short_description;
        $product->seo_title =$request->seo_title;
        $product->seo_description =$request->seo_description;
        $product->sku =$request->sku;
        $product->slug =generateUniqueSlug('Product',$request->name);
        $product->status =$request->status;
        $product->show_at_home =$request->show_at_home;
        $product->save();


        toastr()->success('the product created successfully');

        return to_route('admin.product.index');
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
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {        $product = Product::findOrFail($id);

        $imagePath = $this->updateImage($request,'image',$product->thumb_image);

        $product->thumb_image =!empty($imagePath)?$imagePath:$product->thumb_image;
        $product->name =$request->name;
        $product->price =$request->price;
        $product->offer_price =$request->offer_price;
        $product->category_id =$request->category;
        $product->long_description =$request->long_description;
        $product->short_description =$request->short_description;
        $product->seo_title =$request->seo_title;
        $product->seo_description =$request->seo_description;
        $product->sku =$request->sku;
        $product->slug =generateUniqueSlug('Product',$request->name);
        $product->status =$request->status;
        $product->show_at_home =$request->show_at_home;
        $product->save();


        toastr()->success('the product updated successfully');

        return to_route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = intval(preg_replace('/[^0-9]/','',$request->product_id));

        $product = Product::findOrFail($id);
        $this->removeImage($product->thumb_image);
        $product->delete();
        toastr()->success('the product deleted successfully');

        return to_route('admin.product.index');
    }

}
