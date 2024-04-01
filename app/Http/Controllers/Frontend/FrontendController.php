<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SectionTitle;
use App\Models\Slider;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index(){
        $slider = Slider::where('status',1)->get();
        $whys = WhyChooseUs::where('status',1)->get();
        $keys=['why_choose_us_top_title','why_choose_us_main_title','why_choose_us_sub_title'];
        $titles = SectionTitle::whereIn('key',$keys)->pluck('value','key');
        $categories = Category::where(['status'=>1,'show_at_home'=>1])->get();
        return view("frontend.home.index",
            compact(
                'slider',
                'whys',
                'titles',
                'categories'
            ));
    }



    public function showProductDetaile($id){
        $product = Product::with(['category','productimage','size','option'])->where(['status'=>1,'id'=>$id])->first();
        $relatedProducts = Product::where(['category_id'=>$product->category->id])->
                                    where('id','!=',$product->id)->take(8)->latest()->get();
        return view('frontend.home.pages.product_details',compact('product','relatedProducts'));
    }



}
