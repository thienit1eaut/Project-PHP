<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // profile
    public function profile(){
        return view('profile.profile');
    }

    // profile update
    public function edit(Request $request){
        // validation
        $this->vali($request);
        // data
        $data = $this->dataArrange($request);
        // image file
        if($request->hasFile('image')){
           $dbImage = User::where('id',Auth::user()->id)->value('image');
        //delete old image
         if($dbImage != null){
            Storage::delete('public/profile/'. $dbImage);
         }
         $imageName = uniqid() . $request->file('image')->getClientOriginalName();
         $request->file('image')->storeAs('public/profile',$imageName);
         $data['image'] = $imageName;
        }
        User::where('id',Auth::user()->id)->update($data);
        return back()->with(['success' => 'profile update success']);
    }

    // change password
    public function password(Request $request){
      $this->passwordVali($request);
      $dbData = User::where('id',Auth::user()->id)->first();
      $dbPassword = $dbData->password;
      if(Hash::check($request->oldPassword, $dbPassword)){
       $newPassword = Hash::make($request->newPassword);
       User::where('id',Auth::user()->id)->update(['password' => $newPassword]);
       Auth::guard('web')->logout();
       return redirect()->route('login')->with(['success' => 'change password success']);
      }else{
        return back()->with(['error' => 'old password do not match']);
      }
    }


    // password
    private function passwordVali($request){
        $rules = [
         'oldPassword' => 'required',
         'newPassword' => 'required |min:6 | different:oldPassword',
         'confirmPassword' => 'required | same:newPassword',
        ];
        Validator::make($request->all(),$rules)->validate();
    }

    // data
    private function dataArrange($request){
        return [
          'name' => $request->name,
          'gender' => $request->gender,
          'age' => $request->age,
          'phone' => $request->phone,
          'address' => $request->address,
        ];
    }

    // validation
    private function vali($request){
        $rules = [
            'name' => 'required | string',
            'age' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'image' => 'image | mimes:jpg,jpeg,png,webp'

        ];
        Validator::make($request->all(),$rules)->validate();
    }
}
