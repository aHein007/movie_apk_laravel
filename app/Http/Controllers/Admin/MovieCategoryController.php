<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\MovieCategories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MovieCategoryController extends Controller
{
     //Movies Categories
     public function categoryPage(){
        $data =Category::paginate(8);
        if(count($data) == 0){
            $emptyStatus=0;
        }else{
            $emptyStatus =1;
        }
        return view("admin.CategoryPage.category")->with(["dataCategorys"=>$data,"status"=>$emptyStatus]);
     }

     public function downloadCsv(){
        $categoryData = Category::get();

        $csvExporter = new \Laracsv\Export();

        $csvExporter->build($categoryData, [
            'category_id' => 'ID',
            'movie_category' => 'Category Name',
            'category_date' =>"Date"
        ]);

        $csvReader = $csvExporter->getReader();

        $csvReader->setOutputBOM(\League\Csv\Reader::BOM_UTF8);

        $filename = 'CategoryData.csv';

        return response((string) $csvReader)
            ->header('Content-Type', 'text/csv; charset=UTF-8')
            ->header('Content-Disposition', 'attachment; filename="'.$filename.'"');
     }

     //category Add Page
     public function categoryAddPage(){

        return view('admin.CategoryPage.categoryAdd');
     }

     //categoryAddProcess
     public function categoryAddProcess(Request $request){
        $validator = Validator::make($request->all(), [
            'category' => 'required|max:100',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $categoryData=[
            "movie_category"=>$request->category,
            "category_date"=>$request->date
        ];

        $data=Category::create($categoryData);
        return redirect()->route("admin#categoryPage")->with(["success"=>"Your category have been add!"]);
     }

     //category update Page
     public function categoryUpdatePage($id){
        $categoryData =Category::where("category_id",$id)->first();

        return view("admin.CategoryPage.categoryUpdatePage")->with(["data"=>$categoryData]);
     }

     ///category update Process
     public function categoryUpdate($id,Request $request){
       $categoryData=$this->updateData($request);
       $data =Category::where("category_id",$id)->update($categoryData);


       return redirect()->route("admin#categoryPage")->with(["success"=>"Your category had been updated!"]);
     }

     //category delete process
     public function deleteCategory($id){
        $data=Category::where("category_id",$id)->delete();

        return redirect()->route("admin#categoryPage")->with(["fail"=>"Your category had been delete!"]);
     }

     public function searchCategory(Request $request){
       $data =Category::where("movie_category","like","%".$request->table_search."%")->paginate(8);
       $data->append($request->all());
       if(count($data) == 0){
        $emptyStatus=0;
    }else{
        $emptyStatus =1;
    }
       return view("admin.CategoryPage.category")->with(["dataCategorys"=>$data,"status"=>$emptyStatus]);
     }

     private function updateData($request){
        return[
            'movie_category'=>$request->category,
            'category_date' =>$request->date
        ];
     }



}
