<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\Admin\DeliveryRequest;
use App\Models\Address;
use App\Models\DeliveryArea;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $delivery_area = DeliveryArea::where('status',1)->get();
        return view('frontend.dashboard.index',compact('delivery_area'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest $request)
    {
        Address::create([
            'user_id'=>auth()->user()->id,
            'delivery_area_id'=>$request->area,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
            'type'=>$request->type,
        ]);
        toastr()->success('the create is done successfuly');
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
    public function update(AddressRequest $request, string $id)
    {
        $address = Address::find($id);
        if ($address && $address->user_id == auth()->user()->id){
            $address->update([
                'delivery_area_id'=>$request->area,
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'address'=>$request->address,
                'type'=>$request->type,
            ]);
            toastr()->success('the updated  successfuly');
            return redirect()->back();
        }
        toastr()->error('something went wrong');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Address::findOrFail($id)->delete();
        toastr()->success('the item is deleted successfully');
        return redirect()->back();
    }
}
