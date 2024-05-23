<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TodayOrdersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    function index(TodayOrdersDataTable $dataTable){
        $id = auth()->user()->id;
        $role = auth()->user()->Role;
        $user = User::findOrFail($id);
        $user->assignRole($role);
        $user->getAllPermissions();



        $todayOrders = Order::whereDate('created_at',now()->format('Y-m-d'))->count();
        $todayEarnings = Order::whereDate('created_at',now()->format('Y-m-d'))->where('order_status','delivered')
            ->sum('grand_total');

        $monthOrders = Order::whereMonth('created_at',now()->month)->count();
        $monthEarnings = Order::whereMonth('created_at',now()->month)->where('order_status','delivered')
            ->sum('grand_total');

        $yearOrders = Order::whereYear('created_at',now()->year)->count();
        $yearEarnings = Order::whereYear('created_at',now()->year)->where('order_status','delivered')
            ->sum('grand_total');

        $totalOrders = Order::count();
        $totalEarnings = Order::where('order_status','delivered')->sum('grand_total');

        $totalUsers = User::where('Role','user')->count();
        $totalAdmins = User::where('Role','Admin')->count();

        $totalProducts = Product::where('status',1)->count();


        return $dataTable->render('Admin.dashboard.index',compact(
            'todayOrders',
            'todayEarnings',
            'monthOrders',
            'monthEarnings',
            'yearOrders',
            'yearEarnings',
            'totalUsers',
            'totalAdmins',
            'totalEarnings',
            'totalProducts',
            'totalOrders'
        ));
    }


    public function markAsRead(){
        $userUnReadNotification = auth()->user()->unreadNotifications;

        if($userUnReadNotification){
            $userUnReadNotification->markAsRead();
            return back();
        }


    }



}
