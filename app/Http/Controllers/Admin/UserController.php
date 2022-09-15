<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function userPage(){
        $data =User::where("role","admin")->paginate(13);
        return view("admin.UserPage.userPage")->with(["userData"=>$data]);
    }

    //admin Site
    function adminSite(){
        $data =User::where("role","admin")->paginate(13);

        return view("admin.UserPage.adminSite")->with(["userData"=>$data]);
    }

    //user site
    function userSite(){
        $data =User::where("role","user")->paginate(13);
        return view("admin.UserPage.userSite")->with(["userData"=>$data]);
    }

    //admin Site Search
    function adminSiteSearch(Request $request){
        $data =$this->mainSearch($request->searchData,"admin");
        $dataUser =User::where("role","admin")->paginate(13);

        return view("admin.UserPage.adminSite")->with(["userData"=>$data]);
    }

    function userSiteSearch(Request $request){
        $data =$this->mainSearch($request->searchData,"user");
        return view("admin.UserPage.userSite")->with(["userData"=>$data]);
    }

    function userSiteDelete($id){
        $data =User::where("id",$id)->delete();
        return redirect()->route("admin#userSite")->with(["fail"=>"User account have been deleted!"]);
    }

    function userFeedBack(){
        $data =Contact::paginate(13);
        return view("admin.customerFeedBackPage.customerFeedBack")->with(["contactData"=>$data]);
    }

    function csvDownload(){
        $users = Contact::get();

        $csvExporter = new \Laracsv\Export();

        $csvExporter->build($users, [
            'contact_id' =>'Id' ,
            'user_name' => "Name",
            'user_email'=>"Email",
            'message'=>"Message"
        ]);

        $csvReader = $csvExporter->getReader();

        $csvReader->setOutputBOM(\League\Csv\Reader::BOM_UTF8);

        $filename = 'contact.csv';

        return response((string) $csvReader)
            ->header('Content-Type', 'text/csv; charset=UTF-8')
            ->header('Content-Disposition', 'attachment; filename="'.$filename.'"');
    }

    function searchCustomer(Request $request){
        $search =$request->table_search;
       $data =Contact::where("user_name","like","%".$search."%")->paginate(13);

       return view("admin.customerFeedBackPage.customerFeedBack")->with(["contactData"=>$data]);
    }


    private function mainSearch($search,$role){
        $data =User::where("role",$role)
                    ->where(function($query) use ($search){
                    $query->orwhere("name","like","%".$search."%")
                          ->orwhere("address","like","%".$search."%")
                          ->orwhere("phone","like","%".$search."%");
                    })->paginate(13);

                    return $data;
    }


}
