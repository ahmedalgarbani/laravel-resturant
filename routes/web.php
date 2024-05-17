<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DailyOfferController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\whyChooseUsController;
use App\Http\Controllers\Frontend\AddressController;
use App\Http\Controllers\Frontend\CardController;
use App\Http\Controllers\frontend\ChatController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\Frontend\CustomPageController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\frontend\PaymentController;
use App\Http\Controllers\Frontend\WishListController;
use App\Http\Controllers\ProfileController;
use App\Models\DailyOffer;
use App\Models\DeliveryArea;
use App\Models\Order;
use Illuminate\Support\Facades\Route;



Route::get('/', [\App\Http\Controllers\Frontend\FrontendController::class,'index'])->name("home");
Route::get('/chef', [FrontendController::class,'chef'])->name("chef");
Route::get('/Testimonial', [FrontendController::class,'Testimonial'])->name("Testimonial");
Route::get('/terms-condition', [FrontendController::class,'termsCondition'])->name("terms-condition");
Route::get('/privacy-policy', [FrontendController::class,'privacyPolicy'])->name("privacy-policy");
Route::get('/about', [FrontendController::class,'about'])->name("about");

/** Contact */
 Route::get('/contact', [FrontendController::class,'contact'])->name("contact");
 Route::post('/contact-message', [FrontendController::class,'sendContectMessage'])->name("contact-send.message");
/** Contact */


/** NewsLetter */

Route::post('news-letter',[FrontendController::class,'newsLetter'])->name('news-letter');

/** NewsLetter */

/** Socail Link */
Route::get('social-link',[FrontendController::class,'socialLink'])->name('socialLink');
/** Socail Link */



/** Custom Page */
Route::get('/page/{slug}',CustomPageController::class);
/** Custom PAge */


/** Wish List Route */
Route::post('add-to-wishlist/{productId}', [WishListController::class,'addToWishList'])->name('add-to-wishlist');
Route::post('remove-to-wishlist/{productId}', [WishListController::class,'removeToWishList'])->name('remove-to-wishlist');
/** Wish List Route */


/** Wish List Route */

Route::post('/product-review',[FrontendController::class,'productReviewStore'])->name('product-review');

/** Wish List Route */

Route::get('/admin/login',[AdminAuthController::class,'index'])->name('admin.login');

Route::get('/dashboard', function () {
    $delivery_area = DeliveryArea::where('status',1)->get();
    $addresses = \App\Models\Address::where('user_id',auth()->user()->id)->get();
    $orders = Order::where('user_id',auth()->user()->id)->get();

    return view('frontend.dashboard.index',compact('delivery_area','addresses','orders'));
})->middleware(['auth', 'verified','user'])->name('dashboard');




    Route::put('/profile',[\App\Http\Controllers\frontend\ProfileController::class,'updateprofile'])->name('profile.update');
    Route::put('/profile/password',[\App\Http\Controllers\frontend\ProfileController::class,'updatepasswordprofile'])->name('profile.update.password');
    Route::post('/profile/avatar',[\App\Http\Controllers\frontend\ProfileController::class,'updateAvatar'])->name('profile.avatar');




Route::get('admin/dashboard', function () {
    return view('Admin.dashboard.index');
})->middleware(['auth', 'verified','role'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//    ----------------- chat ----------/
    Route::post('chat-send',[ChatController::class,'sendMessage'])->name('chat.send-message');
    Route::get('get-conversation/{userId}',[ChatController::class,'getConversation'])->name('chat.get-conversation');


//    ----------------- chat ----------/




//address

    Route::resource('address',AddressController::class);
    Route::get('address/delete/{id}',[AddressController::class,'destroy'])->name('address.destroy');


//address


    //address

    Route::get('checkout',[CheckoutController::class,'index'])->name('checkout.index');
    Route::get('checkout/{id}/delivery-cal',[CheckoutController::class,'calculateDeliveryCharge'])->name('checkout.delivery-cal');


//address

    //payment
    Route::post('checkout_redirct',[\App\Http\Controllers\frontend\CheckoutController::class,'redirct'])->name('checkout_redirct');
    Route::get('payment',[\App\Http\Controllers\frontend\PaymentController::class,'index'])->name('payment');
    Route::post('make-payment',[PaymentController::class,'makePayment'])->name('make-payment');


    Route::get('payment/paypal',[PaymentController::class,'payWithPaypal'])->name('paypal.payment');
    Route::get('payment/success',[PaymentController::class,'paypalSuccess'])->name('paypal.success');
    Route::get('payment/cancel',[PaymentController::class,'paypalCancel'])->name('paypal.cancel');



});





Route::post('slider/delete',[SliderController::class,'destroy'])->name('slider.delete');
Route::post('why-choose-us/delete',[whyChooseUsController::class,'delete'])->name('why-choose-us.delete');
Route::post('category',[CategoryController::class,'delete'])->name('category.delete');
Route::post('product',[ProductController::class,'destroy'])->name('product.delete');
Route::post('dailyoffer',[DailyOfferController::class,'destroy'])->name('dailyoffer.delete');



Route::get('load-product-modal/{productId}',[FrontendController::class,'loadProductModal'])->name('load.product');

//card

Route::post('/add-to-card',[CardController::class,'addtoCard'])->name('add-to-card');


Route::get('/add-to-cards',[CardController::class,'getSideBarItems'])->name('add-to-cards');

Route::get('remove-cart/{rowId}',[CardController::class,'removeCartItem'])->name('remove-cart');


Route::get('cart-destroy',[CardController::class,'destroy'])->name('cart.destroy');


Route::get('cart',[CardController::class,'index'])->name('cart');

Route::post('cart-update-quantity',[CardController::class,'updateQuantity'])->name('cart.update-quantity');

//------product detailes-----//
Route::get('/product/{id}-{slug}',[FrontendController::class,'showProductDetaile'])->name('product.showDetailes');
Route::get('/products',[FrontendController::class,'products'])->name('product.showAllProducts');
Route::get('/products-search',[FrontendController::class,'search'])->name('search_product');
//------product detailes-----//






require __DIR__.'/auth.php';







































