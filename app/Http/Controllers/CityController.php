<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Session;

class CityController extends Controller
{
    public function confirmCity(Request $request){

        if (isset($_POST['add'])) {
            $this->insertCity($request);
            Session::put('message', '1');
            return redirect('places');
        }
        elseif (isset($_POST['edit'])) {
            $this->updateCity($request);
            Session::put('message', '2');
            return redirect('places');
        }
        elseif (isset($_POST['delete'])) {
            $this->deleteCity($request);
            Session::put('message', '3');
            return redirect('places');
        }
    }

    public function insertCity(Request $request){

        $city = new App\City;

        $city->ProvinceID = $request->input('add_ID');
        $city->CityName = $request->input('add_name');

        try {
            $city->save();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('places');
        }
    }

    public function updateCity(Request $request){

        $city = new App\City;
        $city = App\City::find($request->input('edit_ID'));

        $city->ProvinceID = $request->input('edit_ProvID');
        $city->CityName = $request->input('edit_name');

        try {
            $city->save();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('places');
        }
    }

    public function deleteCity(Request $request){
        $city = new App\City;
        $city = App\City::find($request->input('del_ID'));
        
        try {
            $city->delete();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('places');
        }
    }
}
