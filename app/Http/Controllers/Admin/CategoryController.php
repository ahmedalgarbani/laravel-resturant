<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryCreateRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.product.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request)
    {
       $category = Category::create([
          'name'=>$request->name,
          'slug'=>Str::slug($request->name),
           'status'=>$request->status,
           'show_at_home'=>$request->show_at_home
       ]);

        toastr()->success('the category created successfully');

        return to_route('admin.category.index');


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
        $category = Category::findOrFail($id);

        return view('admin.product.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id)
    {

        $category = Category::findOrFail($id);
        $category->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'status'=>$request->status,
            'show_at_home'=>$request->show_at_home
        ]);

        toastr()->success('the category updated successfully');

        return to_route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $request;
    }
    public function delete(Request $request)
    {
        $id = intval(preg_replace('/[^0-9]/','',$request->category_id));

         Category::findOrFail($id)->delete();
        toastr()->success('the category deleted successfully');

        return to_route('admin.category.index');
    }
}
