<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AccountManagementSystemDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('Admin.AccountManagement.create');
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
            'role'=>['required','in:admin,user,super admin']
        ]);

        User::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'role'=>$request->role,
           'password'=>bcrypt($request->role),
        ]);
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
        return view('Admin.AccountManagement.edit',compact('account'));
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
                'role'=>['required','in:admin,user,super admin']
            ]);

            $account = User::findOrFail($id);
            $account->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'Role'=>$request->role,
                'password'=>bcrypt($request->password),
            ]);
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
        User::findOrFail($id)->delete();
        toastr()->success('The Reveiw deleted Successfully!');
        return redirect()->back();
    }
}
