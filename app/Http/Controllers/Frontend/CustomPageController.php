<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CustomPage;
use Illuminate\Http\Request;

class CustomPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $slug)
    {
        $customPage = CustomPage::where(['status'=>1,'slug'=>$slug])->firstOrFail();
        return view('frontend.home.pages.custom-page',compact('customPage'));
    }
}
