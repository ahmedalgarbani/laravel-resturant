<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SocialLinkDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SocialLinkRequest;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SocialLinkDataTable $dataTable)
    {
        return $dataTable->render('Admin.sociallink.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.sociallink.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SocialLinkRequest $request)
    {
        SocialLink::create([
           'name'=>$request->name,
           'icon'=>$request->icon,
           'link'=>$request->link,
           'status'=>$request->status
        ]);

        toastr()->success('Created Successfully !!');

        return redirect(route('admin.socail-link.index'));


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
        $sociallink = SocialLink::findOrFail($id);
        return view('Admin.sociallink.edit',compact('sociallink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SocialLinkRequest $request, string $id)
    {
        $sociallink = SocialLink::findOrFail($id);
        $sociallink->update([
            'name'=>$request->name,
            'icon'=>$request->icon,
            'link'=>$request->link,
            'status'=>$request->status
        ]);


        toastr()->success('Updated Successfully !!');

        return redirect(route('admin.socail-link.index'));


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        $id = (int) preg_replace('/[^0-9]/', '', $request->sociallink_id);
        SocialLink::findOrFail($id)->delete();

        toastr()->success('Deleted Successfully !!');

        return redirect(route('admin.socail-link.index'));

    }
}
