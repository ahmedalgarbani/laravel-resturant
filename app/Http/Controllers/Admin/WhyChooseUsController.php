<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\WhyChooseUsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateWhyChooseRequest;
use App\Http\Requests\Admin\WhyChooseUsCreateRequest;
use App\Models\SectionTitle;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use function Termwind\render;
use Validator;

class whyChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keys=['why_choose_us_top_title','why_choose_us_main_title','why_choose_us_sub_title'];
        $titles = SectionTitle::whereIn('key',$keys)->pluck('value','key');
        $whys = WhyChooseUs::all();
        return view('admin.why-choose-us.index',compact('titles','whys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.why-choose-us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WhyChooseUsCreateRequest $request)
    {

        WhyChooseUs::create([
           'icon'=>$request->icon,
           'title'=>$request->title,
           'description'=>$request->description,
           'status'=>$request->status,
        ]);

        toastr()->success('the created was successfully');

        return redirect('admin/why-choose-us');
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
        $why = WhyChooseUs::findOrFail($id);
        return view('admin.why-choose-us.edit',compact('why'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWhyChooseRequest $request, string $id)
    {
        $why = WhyChooseUs::findOrFail($id);
            $why->update([
        'icon'=>!empty($request->icon)? $request->icon : $why->icon ,
        'title'=>$request->title,
        'description'=>$request->description,
        'status'=>$request->status,
    ]);
            toastr()->success('the updated seccessfully');
            return to_route('admin.why-choose-us.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    /**
     * update the title of sections.
     */
    public function updatetitle(Request $request)
    {
        $request->validate([
           'why_choose_us_top_title'=>['max:100'],
           'why_choose_us_main_title'=>['max:200'],
           'why_choose_us_sub_title'=>['max:500']
        ]);
        SectionTitle::where('key','why_choose_us_top_title')->update([
           'key'=>'why_choose_us_top_title',
           'value'=>$request->top_title
        ]);
       SectionTitle::where('key','why_choose_us_main_title')->update([
           'key'=>'why_choose_us_main_title',
           'value'=>$request->main_title
        ]);
       SectionTitle::where('key','why_choose_us_sub_title')->update([
           'key'=>'why_choose_us_sub_title',
           'value'=>$request->sub_title
        ]);
       toastr()->success('updated successfully');

        return redirect()->back();
    }


    public function delete(Request $request){

        WhyChooseUs::findOrFail($request->id)->delete();

        return redirect()->back();

    }



}
