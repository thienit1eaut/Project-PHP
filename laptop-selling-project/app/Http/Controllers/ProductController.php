<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function page(){
       $data = Category::get();
        return view('admin.product',compact('data'));
    }
    public function create(Request $request){
        $this->vali($request);
        $data = $this->dataArrange($request);
        if($request->hasFile('productImage')){
          $imageName = uniqid() . $request->file('productImage')->getClientOriginalName();
          $request->file('productImage')->storeAs('public/products',$imageName);
          $data['image'] = $imageName;
        }
        Product::create($data);
        return back()->with(['success' => 'Product Create Success']);
    }
    // list
    public function list(){
        $data = Product::select('products.*','categories.name as category_name')
        ->leftJoin('categories','categories.id','products.category_id')
        ->paginate(5);
        return view('admin.productList',compact('data'));
    }
    // detail
    public function detail($id){
        $data = Product::where('products.id',$id)
        ->select('products.*','categories.name as category_name')
        ->leftJoin('categories','categories.id','products.category_id')
        ->first();
        return view('admin.productDetail',compact('data'));
    }

    // edit page
    public function edit($id){
        $productData = Product::where('id',$id)->first();
        $categoryData = Category::get();
        return view('admin.productEdit',compact('productData','categoryData'));
    }

    // update page
    public function update($id , Request $request){
        $this->vali($request);
        $data = $this->dataArrange($request);
        if($request->hasFile('productImage')){
            $dbImage = Product::where('id',$id)->value('image');
         //delete old image
          if($dbImage != null){
             Storage::delete('public/products/'. $dbImage);
          }
          $imageName = uniqid() . $request->file('productImage')->getClientOriginalName();
          $request->file('productImage')->storeAs('public/products',$imageName);
          $data['image'] = $imageName;
         }
        Product::where('id',$id)->update($data);
        return back()->with(['success' => 'Product Update Success']);
    }
    public function delete($id){
        $image = Product::find($id)->image;
        if(!empty($image)){
          Storage::disk('public')->delete('products/' . $image);
        }
        Product::where('id',$id)->delete();
        return back()->with(['delete' => 'Product Delete Success']);
    }

    // data
    private function dataArrange($request){
        return [
          'category_id' => $request->categoryId,
          'name' => $request->productName,
          'series' => $request->productSeries,
          'description' => $request->productDescription,
          'price' => $request->productPrice,
        ];
    }
    // validation
    private function vali($request){
        $rules = [
            'productName' => 'required',
            'productSeries' => 'required',
            'categoryId' => 'required',
            'productDescription' => 'required',
            'productPrice' => 'required',
            'productImage' => 'image | mimes:jpg,jpeg,png,webp',
        ];
        Validator::make($request->all(),$rules)->validate();
    }
}
