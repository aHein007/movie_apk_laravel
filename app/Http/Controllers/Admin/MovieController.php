<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    //movie page
    function moivePage(){
        $allmovie =Movie::paginate(5);
        if(count($allmovie)== 0){
            $emptyStatus =0;
        }else{
            $emptyStatus =1;
        }
        return view("admin.moviePage.moviePage")->with(["movieData"=>$allmovie,"status"=>$emptyStatus]);
    }

    //moive category Page
    function movieAddPage(){
        $data =Category::get();
        return view("admin.moviePage.movieAddPage")->with(["categoryData"=>$data]);
    }
    //movie add proces
    function movieAddProcess(Request $request){
         //put image code

         $file =$request->file("image");//get image from input type - file

         $fileName =uniqid()."_".$file->getClientOriginalName();//create random image name.

         $file->move(public_path()."/uploadImage/",$fileName);//put public(vsCode apk)


        $dataMovie =$this->movieData($request,$fileName);
        Movie::create($dataMovie);

        return redirect()->route('admin#moviePage')->with(["success"=>"Your movie have been added!"]);
    }

    //movie delete
    function movieDelete($id,Request $request){

        $deleteImage =Pizza::select('pizza_image')->where("pizza_id",$id)->first();
        $imageFile =$deleteImage["pizza_image"];

        if(File::exists(public_path()."/uploadImage/".$imageFile)){
            File::delete(public_path()."/uploadImage/".$imageFile);
        }

       Movie::where("movie_id",$id)->delete();
       return redirect()->route('admin#moviePage')->with(["fail"=>"Your movie delete Successfully!"]);
    }

    //movie searchProcess
    function movieSearch(Request $request){
        $dataSearch =$request->searchData;
        $searchMoive =Movie::where("movie_name","like","%".$dataSearch."%")->paginate(5);
        if(count($searchMoive)== 0){
            $emptyStatus =0;
        }else{
            $emptyStatus =1;
        }

        return view("admin.moviePage.moviePage")->with(["movieData"=>$searchMoive,"status"=>$emptyStatus]);
    }

    //movie Update Page
    function movieUpdate($id,Request $request){
        $data =Movie::where("movie_id",$id)->first();
        $dataCategory =Category::get();
        return view("admin.moviePage.movieUpdate")->with(["movie_data"=>$data,"categoryData"=>$dataCategory]);
    }


    //movie Update Process
    function movieUpdateProcess(Request $request,$id){
        $data =Movie::where("movie_id",$id)->first();

        //get old Image
        $oldImage = $data->movie_image;

        //get old Image delete
        if(File::exists(public_path()."/uploadImage/".$oldImage)){
            File::delete(public_path()."/uploadImage/".$oldImage);
        }

        //get new Iamge
       $file =$request->file("image");
       $fileName =uniqid()."_".$file->getClientOriginalName();
       $file->move(public_path()."/uploadImage/",$fileName);

        $update =$this->movieData($request,$fileName);
        $updateData =Movie::where("movie_id",$id)->update($update);

        return redirect()->route("admin#moviePage")->with(["success"=>"Your movies update success!"]);

    }

    function movieDetail($id){
        $data =Movie::where("movie_id",$id)->first();
       return view("admin.moviePage.MovieDetail")->with(["movieData"=>$data]);
    }

    function movieData($request,$fileName){
        return [
            'movie_name'=>$request->name,
            'category_id'=>$request->category,
            'movie_image'=>$fileName,
            'movie_rating'=>$request->rating,
            'publish_status'=>$request->publish,
            'description'=>$request->description
        ];
    }

}
