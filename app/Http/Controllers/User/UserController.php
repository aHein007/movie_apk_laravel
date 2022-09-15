<?php

namespace App\Http\Controllers\User;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function userLogout(){
        return view("user.userLogout");
    }



    function userPage(){
        $data =Movie::get();

        return view("user.userPage")->with(["movieData"=>$data]);
    }
}
