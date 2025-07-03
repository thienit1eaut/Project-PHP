<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderDetailController extends Controller
{
    public function order(Request $request){
        $subtotal = 0;
        // order detail
        foreach($request->all() as $order){
           $data = OrderDetail::create([
                'user_id' => Auth::user()->id,
                'product_id' => $order['productId'],
                'order_number' => $order['orderNumber'],
                'qty' => $order['qty'],
                'total' => $order['total'],
              ]);
             $subtotal += $order['total'];
        }
        // order table
        Order::create([
          'order_number' => $data->order_number,
          'user_id' => Auth::user()->id,
          'total_amount' => $subtotal + 50
        ]);
        // order success and delete cart
        Cart::where('user_id',Auth::user()->id)->delete();

        return response(200);
    }
    // order detail
    public function detail($id){
       $data = OrderDetail::where('order_details.order_number',$id)
        ->select('order_details.*','products.name as product_name','products.price as product_price','products.image as product_image')
        ->leftJoin('products','products.id','order_details.product_id')
        ->get();
        $data2 = Order::where('orders.order_number',$id)
         ->select('orders.*','users.name as user_name')
        ->leftJoin('users','users.id','orders.user_id')
        ->first();
        return view('admin.orderDetail',compact('data','data2'));
    }
}
