<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ClearDatabaseController extends Controller
{
    public function index(){
        return view('Admin.clearDatabase.index');
    }

    public function clearDB(){
        try {
            Artisan::call('migrate:fresh');
            //Seeder
            Artisan::call('db:seed',['--class'=>'UserSeeder']);
            Artisan::call('db:seed',['--class'=>'SettingSeeder']);
            Artisan::call('db:seed',['--class'=>'SectionTitleSeeder']);
            Artisan::call('db:seed',['--class'=>'RoleSeeder']);
            Artisan::call('db:seed',['--class'=>'PaymentSeeder']);
            $this->removeUploadsFile();
            toastr()->success('The DataBase is Cleared !');
            return to_route('login');
        }catch (\Exception $e){
            throw $e;
        }
    }




    public function removeUploadsFile(){
        $path = public_path('uploads');
        $preservefile = ['media_664276b807944.png','media_664276b818716.png','media_664251f9394fc.jpg',
          'media_6646e17ee0d1b.jpg','media_6648748512cb7.png','media_6648da112612d.jpg','media_664251f93a9c1.jpg',
          'media_65f30b98c0f28.jpg'
        ];

        $allFiles = File::allFiles($path);

        foreach ($allFiles as $file){
            $fileName = $file->getFilename();

            if(!in_array($fileName,$preservefile)){
                File::delete($file->getPathname());
            }
        }



    }



}
