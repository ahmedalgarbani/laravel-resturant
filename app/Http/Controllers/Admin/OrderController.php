<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DeclinedOrderDataTable;
use App\DataTables\DeliveredOrderDataTable;
use App\DataTables\InProccessOrderDataTable;
use App\DataTables\OrderDataTable;
use App\DataTables\PendingOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(OrderDataTable $dataTable){
        return $dataTable->render('Admin.order.index');
    }


    public function show(string $id){
        $order = Order::findOrFail($id);
            return view('Admin.order.show',compact('order'));
    }


    public function destroy(Request $request){
        $idd = (int) preg_replace('/[^0-9]/', '', $request->Order_id);
        Order::findOrFail($idd)->delete();
       toastr()->success('the order deleted successfully !');
       return redirect()->back();
    }


    public function getOrderStatus(string $id){

        $idd = (int) preg_replace('/[^0-9]/', '', $id);
        $order = Order::select(['order_status','payment_status'])->findOrFail($idd);

        return response($order);
    }




    public function updateStatus(Request $request,string $id){
        $idd = (int) preg_replace('/[^0-9]/', '', $id);

        $request->validate([
           'payment_status'=>['required','in:pending,completed'],
           'order_status'=>['required','in:pending,in_proccess,delivered,declined']
        ]);

        Order::findOrFail($idd)->update([
                'payment_status'=>$request->payment_status,
                'order_status'=>$request->order_status
            ]);



        return response(['message'=>'updated successfully !'],200);

    }



    public function pendingOrder(PendingOrderDataTable $dataTable){
        return $dataTable->render('Admin.order.Pending-index');
    }


     public function declinedOrder(DeclinedOrderDataTable $dataTable){
            return $dataTable->render('Admin.order.declined-index');
        }


     public function deliveredOrder(DeliveredOrderDataTable $dataTable){
            return $dataTable->render('Admin.order.delivered-index');
        }


     public function inProccessOrder(InProccessOrderDataTable $dataTable){
            return $dataTable->render('Admin.order.in_proccess-index');
        }








}
