<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AccountManagementSystemDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;

class AccountManagementSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AccountManagementSystemDataTable $dataTable)
    {
        return $dataTable->render('Admin.AccountManagement.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get();
        return view('Admin.AccountManagement.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name'=>['required','max:255'],
           'email'=>['required','email','unique:users,email'],
           'password'=>['required'],
        ]);

        $user = User::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'role'=>$request->role,
           'password'=>bcrypt($request->role),
        ]);

        $currentUser = User::where('Role','Admin')->get();
        $lastUser = User::latest()->first();
        $message = "Add New Account By ".auth()->user()->name;
        $route = 'admin.AccountManagement.index';

        foreach ($currentUser as $users) {
            $users->notify(new OrderNotification($lastUser,$message,$route));
        }

//        $currentUser->notify(new OrderNotification($lastUser,$message,$route));
//        Notification::send($currentUser,new OffersNotification($lastUser));


        $user->assignRole($request->role);
        toastr()->success('the user created successfully !!');
        return to_route('admin.AccountManagement.index');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $account = User::findOrFail($id);
        $roles = Role::get();

        return view('Admin.AccountManagement.edit',compact('account','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name'=>['required','max:255'],
                'email'=>['required','email','unique:users,email,'.$id],

            ]);

            $account = User::findOrFail($id);
            $account->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'Role'=>$request->role,
                'password'=>bcrypt($request->password),
            ]);


            $currentUser = User::where('Role','Admin')->get();
            $lastUser = User::latest()->first();
            $message = "Update ".$account->name." Account By ".auth()->user()->name;
            $route = 'admin.AccountManagement.index';

            foreach ($currentUser as $users) {
                $users->notify(new OrderNotification($lastUser,$message,$route));
            }



            $account->assignRole($request->role);
            toastr()->success('the user Updated successfully !!');
            return to_route('admin.AccountManagement.index');
        }catch (\Exception $e){
            toastr()->error($e);
            return to_route('admin.AccountManagement.index');

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request){
        $id = (int) preg_replace('/[^0-9]/', '', $request->user_id);
        $user = User::findOrFail($id);


        $currentUser = User::where('Role','Admin')->get();
        $lastUser = User::latest()->first();
        $message = "Deleted ".$user->name." Account By ".auth()->user()->name;
        $route = 'admin.AccountManagement.index';

        foreach ($currentUser as $users) {
            $users->notify(new OrderNotification($lastUser,$message,$route));
        }

        $user->delete();





        toastr()->success('The Account deleted Successfully!');
        return redirect()->back();
    }
}
