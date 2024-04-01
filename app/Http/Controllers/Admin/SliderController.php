<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SLiderCreateRequest;
use App\Http\Requests\Admin\UpdateSliderRequest;
use App\Models\Slider;
use App\Trails\UploadImageTrail;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use UploadImageTrail;


    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SLiderCreateRequest $request)
    {
        $imagePath = $this->updateImage($request,'image');

        $slider = new Slider();
        $slider->image = $imagePath;
        $slider->offer = $request->offer;
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->short_description = $request->short_description;
        $slider->button_link = $request->button_link;
        $slider->status = $request->status;
            $slider->save();
            toastr()->success('the slider created successfully');

            return to_route('admin.slider.index');

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
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit',compact('slider'));



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderRequest $request, string $id)
    {
        $slider = Slider::findOrFail($id);

        $imagepath = $this->updateImage($request,'image',$slider->image);

        $slider->image = !empty($imagepath)? $imagepath : $slider->image;
        $slider->offer = $request->offer;
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->short_description = $request->short_description;
        $slider->button_link = $request->button_link;
        $slider->status = $request->status;
        $slider->save();
        toastr()->success('the slider updated successfully');

        return to_route('admin.slider.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = intval(preg_replace('/[^0-9]/','',$request->slider_id));

        $slider = Slider::findOrFail($id);
        $this->removeImage($slider->image);
        $slider->delete();
        toastr()->success('the slider deleted successfully');

        return to_route('admin.slider.index');
    }
}
