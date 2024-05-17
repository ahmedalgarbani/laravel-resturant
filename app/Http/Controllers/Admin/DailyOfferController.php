<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DailyOfferDataTable;
use App\Http\Controllers\Controller;
use App\Models\DailyOffer;
use App\Models\Product;
use App\Models\SectionTitle;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class DailyOfferController extends Controller
{
    function index(DailyOfferDataTable $dataTable){
        $keys=['dailyoffer_top_title','dailyoffer_main_title','dailyoffer_sub_title'];
        $titles = SectionTitle::whereIn('key',$keys)->pluck('value','key');
        return $dataTable->render('Admin.dailyoffer.index',compact('titles'));
    }

    function create(){
        return view('Admin.dailyoffer.create');
    }

    function store(Request $request){
        $request->validate([
           'product_id'=>['required','integer'],
           'status'=>['required','boolean']
        ]);

        $offer = new DailyOffer();
        $offer->product_id = $request->product_id;
        $offer->status = $request->status;
        $offer->save();


        toastr()->success('created successfully!!');

        return to_route('admin.dailyoffer.index');

    }


    function productSearch(Request $request){
        $search = $request->search;
        $products = Product::select('id', 'name', 'thumb_image')
            ->where('name', 'LIKE', '%' . $search . '%')
            ->get();

        // Return the response
        return response()->json($products);
    }

    function destroy(Request $request){
        $pro_id = $request->id;
        preg_match('/\d+/', $pro_id, $matches);
        $id = (int)$matches[0]; // Convert the matched string to an integer
        DailyOffer::findOrFail($id)->delete();
        toastr()->success('item deleted successfully !!');
        return redirect()->back();
    }


    function updateTitle(Request $request){
        $request->validate([
            'top_title' => ['max:100'],
            'main_title' => ['max:200'],
            'sub_title' => ['max:500']
        ]);

        SectionTitle::updateOrCreate(
            ['key' => 'dailyoffer_top_title'],
            ['value' => $request->top_title]
        );

        SectionTitle::updateOrCreate(
            ['key' => 'dailyoffer_main_title'],
            ['value' => $request->main_title]
        );

        SectionTitle::updateOrCreate(
            ['key' => 'dailyoffer_sub_title'],
            ['value' => $request->sub_title]
        );

        toastr()->success('Updated successfully');

        return redirect()->back();
    }


}
