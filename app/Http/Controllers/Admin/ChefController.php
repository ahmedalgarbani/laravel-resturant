<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ChefDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChefRequest;
use App\Models\Chef;
use App\Models\SectionTitle;
use App\Trails\UploadImageTrail;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    use UploadImageTrail;
    /**
     * Display a listing of the resource.
     */
    public function index(ChefDataTable $dataTable)
    {
        $keys=[
            'chef_top_title',
            'chef_main_title',
            'chef_sub_title'
        ];
        $titles = SectionTitle::whereIn('key',$keys)->pluck('value','key');
        return $dataTable->render('Admin.chef.index',compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.chef.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChefRequest $request)
    {
        $imagePath = $this->updateImage($request,'image');
        Chef::create([
            'image'=>$imagePath,
            'title'=>$request->title,
            'name'=>$request->name,
            'fb'=>$request->fb,
            'in'=>$request->in,
            'x'=>$request->x,
            'web'=>$request->web,
            'show_at_home'=>$request->show_at_home,
            'status'=>$request->status,
        ]);

        toastr()->success('Created Successfully !!');


        return redirect(route('admin.chef.index'));


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
        $chef = Chef::findOrFail($id);
        return view('Admin.chef.edit',compact('chef'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $chef = Chef::findOrFail($id);
        $imagePath = $this->updateImage($request,'image',$request->old_image);
        $chef->update([
            'image'=>!empty($imagePath)?$imagePath:$chef->image,
            'title' => $request->title,
            'name' => $request->name,
            'fb' => $request->fb,
            'in' => $request->in,
            'x' => $request->x,
            'web' => $request->web,
            'show_at_home' => $request->show_at_home,
            'status' => $request->status,
        ]);

        toastr()->success('Updated Successfully !!');

        return redirect('/admin/chef');
    }


    public function updateTitle(Request $request){
        $request->validate([
            'top_title'=>['max:100'],
            'main_title'=>['max:200'],
            'sub_title'=>['max:500']
        ]);
        SectionTitle::updateOrCreate(
            ['key' => 'chef_top_title'],
            ['value' => $request->top_title]
        );

        SectionTitle::updateOrCreate(
            ['key' => 'chef_main_title'],
            ['value' => $request->main_title]
        );

        SectionTitle::updateOrCreate(
            ['key' => 'chef_sub_title'],
            ['value' => $request->sub_title]
        );

        toastr()->success('updated successfully');

        return redirect()->back();    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $id = (int) preg_replace('/[^0-9]/', '', $request->chef_id);
            $chef = Chef::findOrFail($id);
            $this->removeImage($chef->image);
            $chef->delete();
            toastr()->success('Deleted Successfully !!');
            return redirect(route('admin.chef.index'));
        }catch (\Exception $e){
            toastr()->error($e);
            return redirect(route('admin.chef.index'));
        }
    }
}
