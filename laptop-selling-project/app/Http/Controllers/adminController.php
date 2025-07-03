<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    // user acc
    public function userList(){
       $data = User::where('role','user')->paginate(5);
       return view('admin.userList',compact('data'));
    }

    // admin acc
    public function adminList(){
        $data = User::where('role','admin')->paginate(5);
        return view('admin.adminList',compact('data'));
     }
    //  user detail
    public function userDetail($id){
       $data = User::where('id',$id)->first();
       return view('admin.userDetail',compact('data'));
    }
    // userPromote
    public function userPromote($id){
        User::where('id',$id)->update(['role' => 'admin']);
        return redirect()->route('user.list')->with(['success' => 'User role has been change to admin']);
    }

    // admin detail
    public function adminDetail($id){
        $data = User::where('id',$id)->first();
        return view('admin.adminDetail',compact('data'));
     }
    // admin to user Change
    public function userChange($id){
        User::where('id',$id)->update(['role' => 'user']);
        return redirect()->route('admin.list')->with(['success' => 'Admin role has been change to user']);
    }
    // delete user
    public function userDelete($id){
        $image = User::find($id)->image;
        if(!empty($image)){
          Storage::disk('public')->delete('profile/' . $image);
        }
        User::where('id',$id)->delete();
        return redirect()->route('user.list')->with(['delete' => 'User account delete success']);
    }
    // delete admin
    public function adminDelete($id){
        $image = User::find($id)->image;
        if(!empty($image)){
          Storage::disk('public')->delete('profile/' . $image);
        }
        User::where('id',$id)->delete();
        return redirect()->route('admin.list')->with(['delete' => 'Admin account delete success']);
    }
}
