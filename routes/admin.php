<?php


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGallaryController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\whyChooseUsController;
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
//    ---------gallary -------/
    Route::resource('gallary',ProductGallaryController::class);
    Route::get('product/gallary/{productId}',[ProductGallaryController::class,'index'])->name('product.gallary');
    //-------gallary--------/
    //-------product size-----//
    Route::resource('size',ProductSizeController::class);
    Route::get('product/size/{productId}',[ProductSizeController::class,'index'])->name('product.size');
    //-------product size-----//
    ////-------product size-----//
    Route::resource('option',ProductOptionController::class);
    Route::get('product/option/{productId}',[ProductOptionController::class,'index'])->name('product.option');
    //-------product size-----//

    Route::post('category',[CategoryController::class,'store'])->name('category.store');
});


