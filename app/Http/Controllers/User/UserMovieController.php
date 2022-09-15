<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Movie;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserMovieController extends Controller
{
    public function userMovieController($id){

        $data =Movie::where("movie_id",$id)->first();

        return view("user.userMovieDetail")->with(["dataMovie" =>$data]);
    }

    public function postMessage(Request $request,$id){
        $dataUser =User::where("id",$id)->first();
        $getId =$dataUser->id;
        $data=$this->update($request,$getId);

        $postMessage =Contact::create($data);

        return redirect()->route("user#userPage")->with(["success"=>"Your suggestion is posted success!"]);

    }

    


    private function update($request,$data){
        $updateData =[
            "user_id"=>$data,
            "user_name"=>$request->name,
            "user_email"=>$request->email,
            "message"=>$request->message

        ];
        return $updateData;
    }


}
