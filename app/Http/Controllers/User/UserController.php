<?php

namespace App\Http\Controllers\User;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function userLogout(){
        return view("user.userLogout");
    }



    function userPage(){
        $data =Movie::get();
        $categoryData =Category::paginate(8);

        return view("user.userPage")->with(["movieData"=>$data,"category"=>$categoryData]);
    }



}
