<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // order admin
    public function orderList(){
       $data = Order::select('orders.*','users.name as user_name')
       ->leftJoin('users','users.id','orders.user_id')
       ->paginate(6);
        return view('admin.orderList',compact('data'));
    }
    // deli comfirn
    public function orderDeliver($id){
        Order::where('order_number',$id)->update(['order_delivered' => 1]);
        return back()->with(['success' => 'Order is delivered']);
    }
    // delete
    public function orderDelete($id){
        Order::where('order_number',$id)->delete();
        OrderDetail::where('order_number',$id)->delete();
        return back()->with(['delete' => 'Order is deleted']);
    }
}
