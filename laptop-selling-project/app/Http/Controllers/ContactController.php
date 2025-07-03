<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    // contact
    public function contact(Request $request){
       $this->vali($request);
       Contact::create([
         'name' => $request->name,
         'email' => $request->email,
         'phone' => $request->phone,
         'message' => $request->message,
       ]);
       return back()->with(['success' => 'Thank for sending contact message and we will reply soon with email or phone']);
    }
    // list
    public function list(){
       $data = Contact::paginate(10);
       return view('admin.contactList',compact('data'));
    }
    // detail
    public function detail($id){
        $data = Contact::where('id',$id)->first();
        return view('admin.contactDetail',compact('data'));
    }
    // delete
    public function delete($id){
        Contact::where('id',$id)->delete();
        return back()->with(['delete' => 'Message Delete Success']);
    }
    // validation
    private function vali($request){
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ];
        Validator::make($request->all(),$rules)->validate();
    }
}
