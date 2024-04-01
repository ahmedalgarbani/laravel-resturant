<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', [\App\Http\Controllers\Frontend\FrontendController::class,'index'])->name("home");

Route::get('/admin/login',[AdminAuthController::class,'index'])->name('admin.login');

Route::get('/dashboard', function () {

    return view('frontend.dashboard.index');
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
});





Route::post('slider/delete',[SliderController::class,'destroy'])->name('slider.delete');
Route::post('why-choose-us/delete',[\App\Http\Controllers\Admin\whyChooseUsController::class,'delete'])->name('why-choose-us.delete');
Route::post('category',[CategoryController::class,'delete'])->name('category.delete');
Route::post('product',[\App\Http\Controllers\Admin\ProductController::class,'destroy'])->name('product.delete');



//------product detailes-----//
Route::get('/product/{id}-{slug}',[FrontendController::class,'showProductDetaile'])->name('product.showDetailes');
//------product detailes-----//

require __DIR__.'/auth.php';







































