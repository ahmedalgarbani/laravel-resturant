<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CounterRequest;
use App\Http\Requests\Admin\CouponRequest;
use App\Models\Counter;
use App\Trails\UploadImageTrail;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    use UploadImageTrail;
    public function index(){
        $counter = Counter::first();
        return view('Admin.counter.index',compact('counter'));
    }


    public function store(CounterRequest $request)
    {
        $imagePath = $this->updateImage($request, 'background');

        $data = [
            'background' => !empty($imagePath) ? $imagePath : '',
            'counter_icon_one' => $request->counter_icon_one,
            'counter_name_one' => $request->counter_name_one,
            'counter_count_one' => $request->counter_count_one,

            'counter_icon_two' => $request->counter_icon_two,
            'counter_name_two' => $request->counter_name_two,
            'counter_count_two' => $request->counter_count_two,

            'counter_icon_three' => 'fa fa-trush',
            'counter_name_three' => $request->counter_name_three,
            'counter_count_three' => $request->counter_count_three,

            'counter_icon_four' => $request->counter_icon_four,
            'counter_name_four' => $request->counter_name_four,
            'counter_count_four' => $request->counter_count_four,
        ];

        // Update or create the Counter instance
        Counter::updateOrCreate(['id' => 1], $data);

        // Show success message
        toastr()->success('Updated Successfully !!');

        // Redirect back
        return redirect()->back();
    }
}
