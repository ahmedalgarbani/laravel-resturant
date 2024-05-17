<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CustomPageDataTable;
use App\Http\Controllers\Controller;
use App\Models\CustomPage;
use Illuminate\Http\Request;

class CustomPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CustomPageDataTable $dataTable)
    {
        return $dataTable->render('Admin.custom-page.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.custom-page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name'=>['required','max:200','unique:custom_pages,name'],
           'customcontent'=>['required'],
           'status'=>['boolean','required']
        ]);
        CustomPage::create([
           'name'=>$request->name,
           'content'=>$request->customcontent,
           'slug'=>\Str::slug($request->name),
           'status'=>$request->status
        ]);

        toastr()->success('Created Successfully !!');

        return redirect(route('admin.custom-page.index'));


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
        $page = CustomPage::findOrFail($id);
        return view('Admin.custom-page.edit',compact('page'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $page = CustomPage::findOrFail($id);

        $request->validate([
            'name'=>['required','max:200','unique:custom_pages,name,'.$id],
            'customcontent'=>['required'],
            'status'=>['boolean','required']
        ]);
        $page->update([
            'name'=>$request->name,
            'content'=>$request->customcontent,
            'slug'=>\Str::slug($request->name),
            'status'=>$request->status
        ]);

        toastr()->success('Updated Successfully !!');

        return redirect(route('admin.custom-page.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        $id = (int) preg_replace('/[^0-9]/', '', $request->custom_id);
        CustomPage::findOrFail($id)->delete();

        toastr()->success('Deleted Successfully !!');

        return redirect(route('admin.custom-page.index'));

    }
}
