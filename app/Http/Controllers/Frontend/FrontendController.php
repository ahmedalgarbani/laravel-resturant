<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\contactMail;
use App\Models\About;
use App\Models\ProductRating;
use Illuminate\Support\Facades\Auth;
use App\Models\AppDownload;
use App\Models\BannerSlider;
use App\Models\Category;
use App\Models\Chef;
use App\Models\Contact;
use App\Models\Counter;
use App\Models\DailyOffer;
use App\Models\DeliveryArea;
use App\Models\Order;
use App\Models\PrivacyPolicy;
use App\Models\Product;
use App\Models\SectionTitle;
use App\Models\Slider;
use App\Models\SocialLink;
use App\Models\Subscriber;
use App\Models\TermsCondition;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use function Termwind\render;

class FrontendController extends Controller
{
    function index(){

        $slider = Slider::where('status',1)->get();
        $whys = WhyChooseUs::where('status',1)->get();
        $keys=[
            'why_choose_us_top_title',
            'why_choose_us_main_title',
            'why_choose_us_sub_title',
             'dailyoffer_top_title',
            'dailyoffer_main_title',
            'dailyoffer_sub_title',
            'chef_top_title',
            'chef_main_title',
            'chef_sub_title',
            'Testimonial_top_title',
            'Testimonial_main_title',
            'Testimonial_sub_title'
        ];
        $titles = SectionTitle::whereIn('key',$keys)->pluck('value','key');
        $categories = Category::where(['status'=>1,'show_at_home'=>1])->get();
        $delivery_area = DeliveryArea::where('status',1)->get();
        $dailyOffer = DailyOffer::where('status',1)->get();
        $bannerSliders = BannerSlider::where('status',1)->take(5)->latest()->get();
        $chefs = Chef::where(['status'=>1,'show_at_home'=>1])->take(10)->get();
        $appDownload = AppDownload::findOrFail(1);
        $Testimonial = Testimonial::where(['status'=>1,'show_at_home'=>1])->take(6)->get();
        $counter = Counter::first();
        $socialLinks = SocialLink::where('status',1)->get();

        return view("frontend.home.index",
            compact(
                'slider',
                'whys',
                'titles',
                'categories',
                'delivery_area',
                'dailyOffer',
                'bannerSliders',
                'chefs',
                'appDownload',
                'Testimonial',
                'counter',
                'socialLinks'
            ));
    }


    public function termsCondition(){
        $terms = TermsCondition::first();
        return view('frontend.home.pages.termsCondition',compact('terms'));
    }


    public function about(){
        $whys = WhyChooseUs::where('status',1)->get();
        $keys=[
            'why_choose_us_top_title',
            'why_choose_us_main_title',
            'why_choose_us_sub_title',
            'chef_top_title',
            'chef_main_title',
            'chef_sub_title',
            'Testimonial_top_title',
            'Testimonial_main_title',
            'Testimonial_sub_title'
        ];
        $titles = SectionTitle::whereIn('key',$keys)->pluck('value','key');
        $chefs = Chef::where(['status'=>1,'show_at_home'=>1])->take(10)->get();
        $Testimonial = Testimonial::where(['status'=>1,'show_at_home'=>1])->take(6)->get();
        $counter = Counter::first();
        $about = About::first();

        return view('frontend.home.pages.about',compact(
            'whys',
            'titles',
            'chefs',
            'Testimonial',
            'counter',
            'about'
        ));
    }


    public function newsLetter(Request $request){
        $request->validate([
            'email'=>['required','email','max:255','unique:subscribers,email']
        ],['email.unique'=>'Email is already Subscribed']);
        Subscriber::create([
           'email'=>$request->email
        ]);

        return response(['status'=>'success','message'=>'Subscribed Successfully !!'],200);
    }




    public function privacyPolicy(){
        $privacy = PrivacyPolicy::first();
        return view('frontend.home.pages.privacyPolicy',compact('privacy'));
    }

    public function contact(){
        $contact = Contact::first();
        return view('frontend.home.pages.contact',compact('contact'));
    }

    public function sendContectMessage(Request $request){
        $request->validate([
           'name'=>['required','max:255'],
           'email'=>['required','max:255'],
           'subject'=>['required','max:255'],
           'message'=>['required'],
        ]);
        Mail::send(new contactMail($request->name,$request->email,$request->subject,$request->message));
        return response(['status'=>'success','message'=>'message send successfully!!'],200);
    }

    public function showProductDetaile($id){
        $product = Product::with(['category','productimage','size','option'])
            ->withAvg('reviews','rating')
            ->withCount('reviews')
            ->where(['status'=>1,'id'=>$id])->first();
        $relatedProducts = Product::where(['category_id'=>$product->category->id])->
                                    where('id','!=',$product->id)
            ->withAvg('reviews','rating')
            ->withCount('reviews')
                                    ->take(8)->latest()->get();
        $productReviews = ProductRating::where(['product_id'=>$product->id,'status'=>1])
            ->paginate(30);
        return view('frontend.home.pages.product_details',compact('product','relatedProducts','productReviews'));
    }



    public function productReviewStore(Request $request)
    {
        $request->validate([
            'rating' => ['required', 'min:1', 'max:5', 'integer'],
            'review' => ['required', 'max:500'],
            'product_id' => ['required', 'integer']
        ]);

        if (Auth::check()) {
            $user = Auth::user();

            $hasPurchased = $user->orders()
                ->whereHas('orderItems', function ($query) use ($request) {
                    $query->where('product_id', $request->product_id);
                })
                ->where('order_status', 'delivered')
                ->get();


            if(count($hasPurchased) == 0){
                $review = new ProductRating();
                $review->user_id = $user->id;
                $review->product_id = $request->product_id;
                $review->rating = $request->rating;
                $review->review = $request->review;
                $review->status = 0;
                $review->isBuy = 0;
                $review->save();
                toastr()->success('The comment  is added successfully.');
                return redirect()->back();
            }else{
                $review = new ProductRating();
                $review->user_id = $user->id;
                $review->product_id = $request->product_id;
                $review->rating = $request->rating;
                $review->review = $request->review;
                $review->status = 0;
                $review->isBuy = 1;
                $review->save();
                toastr()->success('The comment  is added successfully.');
                return redirect()->back();
            }


            $alreadyReviewed = ProductRating::where(['user_id'=>$user->id,'product_id'=>$request->product_id])->exists();
            if($alreadyReviewed){
                toastr()->success('You are already Reviewd this Product');
                return redirect()->back();
            }

        } else {
            toastr()->error('Please login to continue.');
            return redirect()->back();
        }
    }



    public function products(){
        $products = Product::where('status',1)
            ->orderBy('id','DESC')
            ->take(8)
            //->withAvg('reviews','rating')
            //->withCount('reciews')
            ->get();
        $categories = Category::where('status',1)->get();
        return view('frontend.home.pages.product',compact('products','categories'));
    }

    public function search(Request $request){



        $products = Product::where('status',1)->get();

        if ($request->has('search')) {
            $products = Product::where('name', 'like', '%' . $request->search . '%')->get();
        }

            $categories = Category::where('status',1)->get();

            return view('frontend.home.pages.product', compact('products','categories'));
        }



    public function chef(){
        $chefs = Chef::where(['status'=>1])->paginate(8);
        return view('frontend.home.pages.chefPage',compact('chefs'));
    }
    public function Testimonial(){
        $Testimonials = Testimonial::where(['status'=>1])->paginate(8);
        return view('frontend.home.pages.TestimonialPage',compact('Testimonials'));
    }



    public function loadProductModal($productId){
        $product = Product::findOrFail($productId);
    return view('frontend.layouts.ajax-file.product-card-popup-modal',compact('product'))->render();

    }

}
