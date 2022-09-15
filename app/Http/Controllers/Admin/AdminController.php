<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
   function adminLogout(){
        return view("admin.adminLogout");
    }

    function loginPage(){
        $id =auth()->user()->id;
        $dataUser = User::where("id",$id)->first();
        return view("admin.LoginPage.loginPage")->with(["userData"=>$dataUser]);

    }

    //admin login Process
    function loginProcess($id,Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:20',
            'address' =>'required'
        ],[
            'name.required' =>"Please enter your name",
            'email.required' =>"Please enter your email",
            'address.required' =>"Please enter your address"
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

      $dataUser = User::where("id",$id)->get();
      $updateData=$this->userData($request);

      $updateUser =User::where("id",$id)->update($updateData);

      return back()->with(["success"=>"Your Profile change Successfully!"]);
    }

    //admin Password Page
    function passwordPage(){
        return view("admin.LoginPage.passwordPage");
    }

    //admin passwordProcess
    function passwordProcess($id,Request $request){
       $old =$request->oldPassword;
       $new =$request->newPassword;
       $comfirm =$request->comfirmPassword;
       $dataUser =User::where("id",$id)->first();
       $hashedValue=$dataUser['password'];


       if(Hash::check($old, $hashedValue)){
           if($new ==$comfirm){
                if(strlen($new) >= 8 && strlen($comfirm) >= 8){
                    if(preg_match("/[^a-z0-9 ]/",$new)){
                        $hash =Hash::make($comfirm);
                        $updatePassword =User::where('id',$id)->update([
                            "password"=>$hash

                        ]);
                        return redirect()->route("admin#LoginPage")->with(["success"=>"Your Password change successfully!"]);
                    }else{
                        return back()->with(["fail"=>"Your need to fill with special charactor eg.(A-Z,a-z,0-9)!"]);
                    }
                }else{
                    return back()->with(["fail"=>"Your password 8 need to fill charactor more than!"]);
                }
           }else{
                return back()->with(["fail"=>"Your password need to same each eg.(new Password & confirm Password)!"]);
           }
       }else{
           return back()->with(["fail"=>"Your old Password is wrong!"]);
       }
    }


    private function userData($request){
       return [
        "name"=>$request->name,
        "email"=>$request->email,
        "address"=>$request->address
       ];
    }
}
