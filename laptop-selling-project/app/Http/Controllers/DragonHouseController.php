<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DragonHouseController extends Controller
{
    public function home(){
       $productData = Product::get();
       $categoryData = Category::get();
       if(Auth::user()){
        $cartData = Cart::where('user_id',Auth::user()->id)->get();
       }else{
        $cartData = [];
       }
       return view('dragonHouse',compact('productData','categoryData','cartData'));
    }
    public function shop($id){
       $data =  Product::where('products.id',$id)
       ->select('products.*','categories.name as category_name')
       ->leftJoin('categories','categories.id','products.category_id')
       ->first();
        return view('shop',compact('data'));
    }
}
