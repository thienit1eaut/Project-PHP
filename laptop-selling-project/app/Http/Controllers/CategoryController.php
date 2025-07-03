<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //  category page
    public function page(){
        return view('admin.category');
    }
    public function create(Request $request){
       $this->vali($request);
       Category::create([
        'name' => $request->categoryName,
        'description' => $request->categoryDescription,
       ]);
       return back()->with(['success' => 'category create success']);
    }
    // list
    public function list(){
        $data = Category::paginate(3);
        return view('admin.categoryList',compact('data'));
    }

    // edit
    public function editPage($id){
        $data = Category::where('id',$id)->first();
        return view('admin.categoryEdit',compact('data'));
    }
    public function edit($id ,Request $request){
       $this->vali($request);
       Category::where('id',$id)->update([
        'name' => $request->categoryName,
        'description' => $request->categoryDescription,
       ]);
        return redirect()->route('category.list')->with(['success' => 'Category Update Success']);
    }
    public function delete($id){
        Category::where('id',$id)->delete();
        return back()->with(['delete' => 'Category Delete Success']);
    }
    // category validation
    private function vali($request){
        Validator::make($request->all(),[
        'categoryName' => 'required',
        'categoryDescription' => 'required'
        ])->validate();
    }
}
