<?php


use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AccountManagementSystemController;
use App\Http\Controllers\Admin\AppDownloadController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\CustomPageController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\MenuBuilderController;
use App\Http\Controllers\Admin\NewsLetterController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentGetwayController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGallaryController;
use App\Http\Controllers\Admin\ProductRatingController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\TermsConditionController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\whyChooseUsController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\BannerSliderController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'admin','as'=>'admin.'],function (){
    Route::get('dashboard',[\App\Http\Controllers\Admin\AdminController::class,'index'])->name('dashboard');
    Route::get('profile',[ProfileController::class,'index'])->name('profile');
    Route::put('profile',[ProfileController::class,'updateInformation'])->name('profile.update');
    Route::put('profile/password',[ProfileController::class,'updatePassword'])->name('profile.password.update');
    Route::resource('slider',\App\Http\Controllers\Admin\SliderController::class);
    Route::put('why-choose-us-updatetitle',[whyChooseUsController::class,'updatetitle'])->name('updatetitle');
    Route::resource('why-choose-us',whyChooseUsController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('product',ProductController::class);


    /** Product Reviews */
    Route::get('product-review',[ProductRatingController::class,'index'])->name('product-review.index');
    Route::post('product-review',[ProductRatingController::class,'updateReviewState'])->name('product-review.update');
    Route::post('product-delete/{id}',[ProductRatingController::class,'delete'])->name('product-review.delete');
    /** Product Reviews */


    /** Account Management System */
    Route::post('AccountManagement/{id}',[AccountManagementSystemController::class,'destroy'])->name('AccountManagementSystem.delete');

    Route::resource('AccountManagement',AccountManagementSystemController::class);
    /** Account Management System */

//    ---------gallary -------/
    Route::resource('gallary',ProductGallaryController::class);
    Route::get('product/gallary/{productId}',[ProductGallaryController::class,'index'])->name('product.gallary');
    //-------gallary--------/
    //-------product size-----//
    Route::resource('size',ProductSizeController::class);
    Route::get('product/size/{productId}',[ProductSizeController::class,'index'])->name('product.size');
    //-------product size-----//
    ////-------product option-----//
    Route::resource('option',ProductOptionController::class);
    Route::get('product/option/{productId}',[ProductOptionController::class,'index'])->name('product.option');
    //-------product option-----//


    //-------Banner Slider-----//

    Route::resource('banner-slider',BannerSliderController::class);

    //-------Banner Slider-----//

  //-------Chef-----//

    Route::post('chef-title',[ChefController::class,'updateTitle'])->name('chef.updateTitle');
    Route::resource('chef',ChefController::class);

    //-------Chef-----//


  //-------Testimonial-----//

    Route::post('Testimonial-title',[TestimonialController::class,'updateTitle'])->name('Testimonial.updateTitle');
    Route::resource('Testimonial',TestimonialController::class);

    //-------Testimonial-----//

    //-------PrivacyPolicy-----//

    Route::get('privacyPolicy',[PrivacyPolicyController::class,'index'])->name('privacyPolicy.index');
    Route::post('privacyPolicy',[PrivacyPolicyController::class,'store'])->name('privacyPolicy.store');

    //-------PrivacyPolicy-----//


    /**  Counter   */
    Route::get('Counter',[CounterController::class,'index'])->name('counter.index');
    Route::post('Counter',[CounterController::class,'store'])->name('counter.store');

    /**  Counter   */

    /** About */
    Route::get('about',[AboutController::class,'index'])->name('about.index');
    Route::post('about',[AboutController::class,'store'])->name('about.store');

    /** About */

    /** Contact */
    Route::get('contact',[ContactController::class,'index'])->name('contact.index');
    Route::post('contact',[ContactController::class,'store'])->name('contact.store');
    /** Contact */

    //-------TermsCondition-----//

    Route::get('termsCondition',[TermsConditionController::class,'index'])->name('termsCondition.index');
    Route::post('termsCondition',[TermsConditionController::class,'store'])->name('termsCondition.store');

    //-------TermsCondition-----//

    //-------Application Download Section-----//

    Route::get('appdownlaod',[AppDownloadController::class,'index'])->name('appdownlaod.index');
    Route::post('appdownlaod-create',[AppDownloadController::class,'store'])->name('appappdownlaod.store');
    //-------Application Download Section-----//







//    ------------dailyOffer--------//
    Route::get('dailyoffer/search-product',[\App\Http\Controllers\Admin\DailyOfferController::class,'productSearch'])
        ->name('daily-offer.search-product');
    Route::post('dailyoffer-edittitle',[\App\Http\Controllers\Admin\DailyOfferController::class,'updateTitle'])
        ->name('dailyoffer-edittitle');
    Route::put('dailyoffer-title-update',[\App\Http\Controllers\Admin\DailyOfferController::class,'updateTitle'])
        ->name('daily-offer-title-update');
    Route::resource('dailyoffer',\App\Http\Controllers\Admin\DailyOfferController::class);

//    ------------dailyOffer--------//

/** News Letter */
    Route::get('news-letter',[NewsLetterController::class,'index'])->name('news-letter.index');
    Route::post('news-letter-message',[NewsLetterController::class,'sendMessage'])->name('SendMessage.newsletter');
/** News Letter */

    /** Social Link */
    Route::resource('socail-link',SocialLinkController::class);
    /** Social Link */

    /** Menu Builder */
    Route::get('menu-builder',[MenuBuilderController::class,'index'])->name('menu-builder.index');
    /** Menu Builder */

    /** Social Link */
    Route::get('footer-info',[FooterInfoController::class,'index'])->name('footer-info.index');
    Route::post('footer-info-update',[FooterInfoController::class,'update'])->name('footer-info.update');
    /** Social Link */

    /** Custom Page Route */
    Route::resource('custom-page',CustomPageController::class);

    /** Custom Page Route */

    /** Chat System Route */
    Route::get('chat',[\App\Http\Controllers\Admin\ChatController::class,'index'])->name('chat.index');
    Route::get('get-conversation/{userId}',[ChatController::class,'getConversation'])->name('chat.get-conversation');
    Route::post('chat-send',[ChatController::class,'sendMessage'])->name('chat.send-message');

    /** Chat System Route */

    ////-------Global Settings-----//
     Route::get('setting-global_setting',[SettingController::class,'globalSetting'])->name('global_setting.index');
     Route::get('setting-email',[SettingController::class,'email'])->name('email.index');
     Route::get('setting-logo',[SettingController::class,'logo'])->name('logo.index');
     Route::get('setting-appearance',[SettingController::class,'appearance'])->name('appearance.index');
     Route::get('setting-seo_setting',[SettingController::class,'seo_Setting'])->name('seo_setting.index');

     Route::post('setting-update',[SettingController::class,'updateSettings'])->name('setting.update');
     Route::put('logo-setting',[SettingController::class,'logoSetting'])->name('logo-update');
     Route::put('colortheme-setting',[SettingController::class,'apperiance'])->name('apperiance-update');
     Route::put('seo_Setting-setting',[SettingController::class,'seoSetting'])->name('seoSetting-update');
    ////-------Global Settings-----//



    /** Mail Setting */

    Route::post('mail-update',[SettingController::class,'updateMailSetting'])->name('mail-pusher.setting');


     /** Mail Setting */




    /*
 |--------------------------------------------------------------------------
 | Coupon Route
 |--------------------------------------------------------------------------
 |
 |
 */
    Route::get('coupons',[CouponController::class,'index'])->name('coupon.index');
    Route::get('coupons-create',[CouponController::class,'create'])->name('coupon.create');
    Route::post('coupons-store',[CouponController::class,'store'])->name('coupon.store');
    Route::delete('coupons-delete',[CouponController::class,'delete'])->name('coupon.destroy');
    Route::resource('coupon',CouponController::class);

    /*
 |--------------------------------------------------------------------------
 | Coupon Route
 |--------------------------------------------------------------------------
 |
 |
 */

    Route::resource('delivery',\App\Http\Controllers\Admin\DeliveryAreaController::class);
    Route::delete('delivery-delete',[\App\Http\Controllers\Admin\DeliveryAreaController::class,'delete'])->name('delivery.destroy');

    /*
  |--------------------------------------------------------------------------
  | payment Route
  |--------------------------------------------------------------------------
  |
  |
  */

    Route::get('payment-getway',[PaymentGetwayController::class,'index'])->name('payment-getway.index');
    Route::put('payment-getway-update',[PaymentGetwayController::class,'paypalSettingUpdate'])->name('payment-getway.update');




    /*
|--------------------------------------------------------------------------
| payment Route
|--------------------------------------------------------------------------
|
|
*/

    /*
  |--------------------------------------------------------------------------
  | order Route
  |--------------------------------------------------------------------------
  |
  |
  */

    Route::get('orders',[OrderController::class,'index'])->name('order.index');
    Route::get('pending-order',[OrderController::class,'pendingOrder'])->name('pending-order.index');
    Route::get('declined-order',[OrderController::class,'declinedOrder'])->name('declined-order.index');
    Route::get('delivered-order',[OrderController::class,'deliveredOrder'])->name('delivered-order.index');
    Route::get('in_proccess-order',[OrderController::class,'inProccessOrder'])->name('in_proccess-order.index');




    Route::get('order/{id}',[OrderController::class,'show'])->name('order.show');
    Route::get('order/get-order-status/{id}',[OrderController::class,'getOrderStatus'])->name('order.getorder');
    Route::post('order/update/{id}',[OrderController::class,'updateStatus'])->name('order.update');
    Route::post('order/delete',[OrderController::class,'destroy'])->name('order.delete');




    /*
|--------------------------------------------------------------------------
| Order Route
|--------------------------------------------------------------------------
|
|
*/

    Route::post('category',[CategoryController::class,'store'])->name('category.store');
});
Route::post('getCoupon',[CouponController::class,'getCoupon'])->name('admin.getCoupon');




