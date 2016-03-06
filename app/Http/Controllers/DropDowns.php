<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Business\SupplierBusiness;
use App\Dal\SupplierDao;
use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Session;
use Input;
use Response;


class DropDowns extends Controller
{
    public function cityOptions(){
        $provID = Input::get('provID');
        $cities = App\City::where('ProvinceID', $provID)->get();

        return \Response::json($cities);
    }
}
