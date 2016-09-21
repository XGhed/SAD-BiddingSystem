<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use App\Models\Admin;
use Session;

class adminDashboardController extends Controller
{
    public function addDetails(Request $request){
        $company = new App\Models\Admin\adminDashboard;

        $company->CompanyName = trim($request->input('add_name'));
        $company->ComapanyAddress = trim($request->input('add_address'));
        $company->CompanyEmail = trim($request->input('add_email'));
        $company->CellphoneNo = trim($request->input('add_telno'));

        if($request->hasFile('add_photo')){
            $filename = rand(1000,100000)."-".$request->file('add_photo')->getClientOriginalName();
            $filepath = "photos/";
            $request->file('add_photo')->move($filepath, $filename);
            $company->valid_id = $filepath.$filename;
        }


        $company->save();

        return redirect('/changeDetails');
    }

    public function latestCompanyDetails(Request $request){
        $company = App\Models\Admin\adminDashboard::all()->last();

        if($company != null){
            return $company;
        }
        else {
            return 'empty';
        }
    }   
   
}
