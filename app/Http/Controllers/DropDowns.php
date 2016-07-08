<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Business\SupplierBusiness;
use App\Dal\SupplierDao;
use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Input;
use Response;


class DropDowns extends Controller
{
    public function suppliers(){
        $suppliers = App\Models\Admin\Supplier::all();
        return $suppliers;
    }

    public function cityOptions(){
        $provID = Input::get('provID');
        $cities = App\Models\Admin\City::where('ProvinceID', $provID)->get();

        return \Response::json($cities);
    }

    public function subcatOptions(){
        $catID = Input::get('catID');
        $subCategories = App\Models\Admin\SubCategory::where('CategoryID', $catID)->get();

        return \Response::json($subCategories);
    }

    public function provinces(){
        $provinces = App\Models\Admin\Province::orderBy('ProvinceName')->get();
        return $provinces;
    }

    public function accountTypes(){
        $accountTypes = App\Models\Admin\AccountType::all();
        return $accountTypes;
    }
}
