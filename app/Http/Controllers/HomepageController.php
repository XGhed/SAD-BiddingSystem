<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;

class HomepageController extends Controller
{
    public function displayHomepage(Request $request){

       $categories = App\Models\Admin\Category::all();

       /*foreach ($results as $key => $result) {
        foreach ($cities as $key => $city) {
            if($city->CityID == $result->CityID){
                $result['ProvinceID'] = $city->province->ProvinceID;
                $result['ProvinceName'] = $city->province->ProvinceName;
                $result['CityID'] = $city->CityID;
                $result['CityName'] = $city->CityName;
            }
        }
       }*/

      if ($request->session()->has('accountID')){
        $isLoggedIn = 'true';
      }
      else {
        $isLoggedIn = 'false';
      }

       return view('customer.homepageContent')->with ('categories', $categories)->with('isLoggedIn', $isLoggedIn);
    }
}
