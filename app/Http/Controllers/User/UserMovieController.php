<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Movie;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserMovieController extends Controller
{
    public function userMoviedetail($id){

        $data =Movie::where("movie_id",$id)->first();

        return view("user.userMovieDetail")->with(["dataMovie" =>$data]);
    }

    public function postMessage(Request $request,$id){
        $dataUser =User::where("id",$id)->paginate(8);
        $getId =$dataUser->id;
        $data=$this->update($request,$getId);

        $postMessage =Contact::create($data);

        return redirect()->route("user#userPage")->with(["success"=>"Your suggestion is posted success!"]);

    }

    public function userSearch(Request $request){
        $categoryData =Category::get();
        $input =$request->search_movie;
        $data =Movie::where("movie_name","like","%".$input."%")->paginate(8);

        return view("user.userPage")->with(["dataMovie" =>$data,"category"=>$categoryData,"movieData"=>$data]);


    }

    public function userSearchCategory($id){
        $data =Movie::where("category_id",$id)->get();
        $categoryData =Category::get();
        return view("user.userPage")->with(["dataMovie" =>$data,"category"=>$categoryData,"movieData"=>$data]);
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
