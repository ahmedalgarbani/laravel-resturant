<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TestimonialDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TestimonialRequest;
use App\Models\SectionTitle;
use App\Models\Testimonial;
use App\Trails\UploadImageTrail;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    use UploadImageTrail;
    /**
     * Display a listing of the resource.
     */
    public function index(TestimonialDataTable $dataTable)
    {
        $keys=[
            'Testimonial_top_title',
            'Testimonial_main_title',
            'Testimonial_sub_title'
        ];
        $titles = SectionTitle::whereIn('key',$keys)->pluck('value','key');
        return $dataTable->render('Admin.Testimonial.index',compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialRequest $request)
    {
        $imagePath = $this->updateImage($request,'image');
        Testimonial::create([
            'image'=>$imagePath,
            'title'=>$request->title,
            'name'=>$request->name,
            'rating'=>$request->rating,
            'review'=>$request->review,
            'show_at_home'=>$request->show_at_home,
            'status'=>$request->status,
        ]);

        toastr()->success('Created Successfully !!');


        return redirect(route('admin.Testimonial.index'));
    }
    public function updateTitle(Request $request){
        $request->validate([
            'top_title'=>['max:100'],
            'main_title'=>['max:200'],
            'sub_title'=>['max:500']
        ]);
        SectionTitle::updateOrCreate(
            ['key' => 'Testimonial_top_title'],
            ['value' => $request->top_title]
        );

        SectionTitle::updateOrCreate(
            ['key' => 'Testimonial_main_title'],
            ['value' => $request->main_title]
        );

        SectionTitle::updateOrCreate(
            ['key' => 'Testimonial_sub_title'],
            ['value' => $request->sub_title]
        );

        toastr()->success('updated successfully');

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
        $Testimonial = Testimonial::findOrFail($id);
        return view('Admin.Testimonial.edit',compact('Testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestimonialRequest $request, string $id)
    {
        $Testimonial = Testimonial::findOrFail($id);
        $imagePath = $this->updateImage($request,'image',$request->old_image);
        $Testimonial->update([
            'image'=>!empty($imagePath)?$imagePath:$request->old_image,
            'title'=>$request->title,
            'name'=>$request->name,
            'rating'=>$request->rating,
            'review'=>$request->review,
            'show_at_home'=>$request->show_at_home,
            'status'=>$request->status,
        ]);

        toastr()->success('Updated Successfully !!');

        return redirect('/admin/Testimonial');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $id = (int) preg_replace('/[^0-9]/', '', $request->Testimonial_id);
            $Testimonial = Testimonial::findOrFail($id);
            $this->removeImage($Testimonial->image);
            $Testimonial->delete();
            toastr()->success('Deleted Successfully !!');
            return redirect(route('admin.Testimonial.index'));
        }catch (\Exception $e){
            toastr()->error($e);
            return redirect(route('admin.Testimonial.index'));
        }
    }
}
