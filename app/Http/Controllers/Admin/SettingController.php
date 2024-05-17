<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\services\SettingService;
use App\Trails\UploadImageTrail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    use UploadImageTrail;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.settings.index');
    }

    public function globalSetting()
    {
        return view('admin.settings.global_setting');
    }

    public function logo()
    {
        return view('admin.settings.logo');
    }

     public function email()
    {
        return view('admin.settings.email');
    }

    public function appearance()
    {
        return view('admin.settings.appearance');
    }

    public function seo_Setting()
    {
        return view('admin.settings.seo_Setting');
    }



    public function updateSettings(Request $request)
    {
        $validateDate = $request->validate([
            'site_name'=>['required','max:255'],
            'default_currency'=>['required','max:4'],
            'currency_icon'=>['required','max:4'],
            'currency_Icon_position'=>['required','max:255'],
        ]);

        foreach ($validateDate as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        $settingCache = app(SettingService::class);
        $settingCache->clearCachedSettings();

        toastr()->success('Updated successfully');

        return redirect()->back();
    }


    public function updateMailSetting(Request $request){
        $validateDate = $request->validate([
            'mail_driver'=>['required'],
            'mail_host'=>['required'],
            'mail_port'=>['required'],
            'mail_username'=>['required'],
            'mail_password'=>['required'],
            'mail_encryption'=>['required'],
            'mail_form_address'=>['required'],
            'mail_receiver'=>['required'],
        ]);

        foreach ($validateDate as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingCache = app(SettingService::class);
        $settingCache->clearCachedSettings();
        Cache::forget('mail_settings');

        toastr()->success('Updated successfully');

        return redirect()->back();
    }

    public function logoSetting(Request $request){
        $validatedData = $request->validate([
            'logo' => ['nullable', 'image'],
            'footer_logo' => ['nullable', 'image'],
            'breadcrumb' => ['nullable', 'image'],
            'favicon' => ['nullable', 'image'],
        ]);

        foreach ($validatedData as $key => $value) {
            if (!empty($value)) {
                $newImagePath = $this->updateImage($request, $key);

                if (!empty($newImagePath)) {
                    $oldPath = config('settings.' . $key);
                    $this->removeImage($oldPath);
                    Setting::updateOrCreate(
                        ['key' => $key],
                        ['value' => $newImagePath]
                    );
                }
            }
        }

        $settingCache = app(SettingService::class);
        $settingCache->clearCachedSettings();

        toastr()->success('Settings updated successfully');

        return redirect()->back();
    }



    public function apperiance(Request $request){

        $request->validate([
            'color' => ['nullable','max:255'],
        ]);

                    Setting::updateOrCreate(
                        ['key' => 'color'],
                        ['value' => $request->color]
                    );

        $settingCache = app(SettingService::class);
        $settingCache->clearCachedSettings();

        toastr()->success('Settings updated successfully');

        return redirect()->back();
    }

    public function seoSetting(Request $request){

        $validateRequest = $request->validate([
            'seo_title' => ['nullable'],
            'seo_description' => ['nullable'],
            'seo_keywords' => ['nullable'],
        ]);

        foreach ($validateRequest as $key => $value){
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }



        $settingCache = app(SettingService::class);
        $settingCache->clearCachedSettings();

        toastr()->success('Settings updated successfully');

        return redirect()->back();
    }

}
