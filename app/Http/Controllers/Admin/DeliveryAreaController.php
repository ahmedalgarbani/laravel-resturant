<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DeliveryAreaDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeliveryRequest;
use App\Models\DeliveryArea;
use Illuminate\Http\Request;

class DeliveryAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DeliveryAreaDataTable $dataTable)
    {
        return $dataTable->render('Admin.delivery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.delivery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeliveryRequest $request)
    {
        DeliveryArea::create([
                'area_name'=>$request->area_name,
                'min_delivery_time'=>$request->min_delivery_time,
                'max_delivery_time'=>$request->max_delivery_time,
                'delivery_fee'=>$request->delivery_fee,
                'status'=>$request->status,
        ]);

        toastr()->success('the create successfully');
        return redirect('/admin/delivery');
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
        $delivery=DeliveryArea::findOrFail($id);
        return view('Admin.delivery.edit',compact('delivery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeliveryRequest $request, string $id)
    {
        $delivery=DeliveryArea::findOrFail($id)->update([
            'area_name'=>$request->area_name,
            'min_delivery_time'=>$request->min_delivery_time,
            'max_delivery_time'=>$request->max_delivery_time,
            'delivery_fee'=>$request->delivery_fee,
            'status'=>$request->status,
        ]);

        toastr()->success('the update successfully');
        return redirect('/admin/delivery');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DeliveryArea::findOrFail($id)->delete();
        toastr()->success('the delete successfully');
        return redirect('/admin/delivery');
    }
    public function delete(Request $request)
    {
        preg_match('/\d+/', $request->delivery_id, $matches);
        $number = $matches[0];

        DeliveryArea::findOrFail($number)->delete();

        toastr()->success('the delete successfully');
        return redirect()->back();
    }
}
