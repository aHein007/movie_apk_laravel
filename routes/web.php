<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(["prefix"=>"admin","namespace"=>"Admin"],function(){
    ///adminLogout
    Route::get("adminLogout","AdminController@adminLogout")->name("admin#Logout");

    //Admin LoginPage
    Route::get("LoginPage","AdminController@loginPage")->name("admin#LoginPage");

    //Admin LoginProcess
    Route::post("loginProcess/{id}","AdminController@loginProcess")->name("admin#loginProcess");

    //Admin PasswordPage
    Route::get("passwordPage","AdminController@passwordPage")->name("admin#passwordPage");

    //Admin PasswordProcess
    Route::post("passwordProcess/{id}","AdminController@passwordProcess")->name('admin#passwordProcess');

    //Movies Categories
    Route::get("movieCategory","MovieCategoryController@categoryPage")->name("admin#categoryPage");

    //download csv category
    Route::get("movieCategory/download","MovieCategoryController@downloadCsv")->name("admin#downloadCsv");


    //Movies category Add Page
    Route::get("categoryAddPage","MovieCategoryController@categoryAddPage")->name("admin#categoryAddPage");

    //Movies categroy process
    Route::post("categoryAddProcess","MovieCategoryController@categoryAddProcess")->name("admin#categoryAddProcess");

    //Movies category update page
    Route::get("categoryUpdatePage/{id}","MovieCategoryController@categoryUpdatePage")->name("admin#categoryUpdatePage");

    //category update process
    Route::post("categoryUpdate/{id}","MovieCategoryController@categoryUpdate")->name("admin#categoryUpdate");

    //delete category
    Route::get("deleteCategory/{id}","MovieCategoryController@deleteCategory")->name("admin#deleteCategory");

    //category searching
    Route::get("movieCategory/search","MovieCategoryController@searchCategory")->name("admin#searchCategory");

    //movie Page
    Route::get("moviePage","MovieController@moivePage")->name("admin#moviePage");

    //movie detail
    Route::get("movieDetail/{id}","MovieController@movieDetail")->name("admin#movieDetail");

    //movie Add Page
    Route::get("movieAddPage","MovieController@movieAddPage")->name("admin#movieAddPage");

    //movie Add Process
    Route::post("movieAddProcess","MovieController@movieAddProcess")->name("admin#movieAddProcess");

    //movie delete
    Route::get("movieDelete/{id}","MovieController@movieDelete")->name("admin#movieDelete");

    //movie Search
    Route::get("moviePage/search","MovieController@movieSearch")->name("admin#movieSearch");

    //movie add Page
    Route::get("movieUpdate/{id}","MovieController@movieUpdate")->name("admin#movieUpdate");

    //movie Update process
    Route::post("movieUpdateProcess/{id}","MovieController@movieUpdateProcess")->name("admin#movieUpdateProcess");

    Route::get("userPage","UserController@userPage")->name("admin#userPage");

    Route::get("adminSite","UserController@adminSite")->name("admin#adminSite");

    Route::get("userSite","UserController@userSite")->name("admin#userSite");

    Route::get("adminSite/search","UserController@adminSiteSearch")->name("admin#adminSiteSearch");

    Route::get("userSite/search","UserController@userSiteSearch")->name("admin#userSiteSearch");

    Route::get("userSiteDelete/{id}","UserController@userSiteDelete")->name("admin#userSiteDelete");

    Route::get("userFeedBack","UserController@userFeedBack")->name("admin#userFeedBack");

    Route::get("userFeedBack/downCSV","UserController@csvDownload")->name("admin#csvDownload");

    Route::get("userFeedBack/search","UserController@searchCustomer")->name("admin#searchCustomer");

});

Route::group(["prefix"=>"user","namespace"=>"User"],function(){

Route::get("userPage","UserController@userPage")->name("user#userPage");

Route::get("userLogout","UserController@userLogout")->name("user#Logout");

Route::get("movieDetail/{id}","UserMovieController@userMoviedetail")->name("user#userMoviedetail");

Route::post("postMessage/{id}","UserMovieController@postMessage")->name("user#postMessage");

//search bar movie
Route::get("userPage/search","UserMovieController@userSearch")->name("user#userSearch");

// search category movie
Route::get("userPage/{id}","UserMovieController@userSearchCategory")->name("user#userSearchCategory");

Route::get("searchDate","UserMovieController@searchDate")->name("user#searchDate");



});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        if(Auth::check()){
            if(auth::user()->role == "admin"){
               return redirect()->route("admin#LoginPage");
            }if(auth::user()->role =="user"){
               return redirect()->route("user#userPage");
            }
        }
    })->name('dashboard');
});
