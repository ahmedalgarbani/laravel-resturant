<?php

namespace App\Http\Controllers;

use App\DataTables\BannerSliderDataTable;
use App\Http\Requests\Admin\BannerSliderRequest;
use App\Models\BannerSlider;
use App\Trails\UploadImageTrail;
use Illuminate\Http\Request;

class BannerSliderController extends Controller
{
    use UploadImageTrail;
    /**
     * Display a listing of the resource.
     */
    public function index(BannerSliderDataTable $dataTable)
    {
        return $dataTable->render('Admin.banner-slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.banner-slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerSliderRequest $request)
    {
        $imagePath = $this->updateImage($request,'image');
        BannerSlider::create([
            'image'=>$imagePath,
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            'status'=>$request->status
        ]);
        toastr()->success('Created Successfully !!');

        return redirect(route('admin.banner-slider.index'));
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
        $bannerSlider = BannerSlider::findOrFail($id);

        return view('Admin.banner-slider.edit',compact('bannerSlider'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerSliderRequest $request, string $id)
    {
        $imagePath = $this->updateImage($request,'image',$request->old_image);
        BannerSlider::findOrFail($id)->update([
            'image'=>!empty($imagePath)?$imagePath:$request->old_image,
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            'status'=>$request->status
        ]);
        toastr()->success('Updated Successfully !!');

        return redirect(route('admin.banner-slider.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $id = (int) preg_replace('/[^0-9]/', '', $request->bannerSlider_id);
            $bannerSlider = BannerSlider::findOrFail($id);
            $this->removeImage($bannerSlider->image);
            $bannerSlider->delete();
            toastr()->success('Deleted Successfully !!');
            return redirect(route('admin.banner-slider.index'));
        }catch (\Exception $e){
            toastr()->error($e);
            return redirect(route('admin.banner-slider.index'));
        }
    }
}
