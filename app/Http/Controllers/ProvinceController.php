<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Session;

class ProvinceController extends Controller
{
   public function manageProvince(){

       $results = App\Province::orderBy('ProvinceName')->get();
       $results2 = App\City::orderBy('CityName')->get();

       return view('admin.places')->with ('results', $results)->with ('results2', $results2);
    }

    public function confirmProvince(Request $request){

        if (isset($_POST['add'])) {
            $this->insertProvince($request);
            Session::put('message', '1');
            return redirect('places');
        }
        elseif (isset($_POST['edit'])) {
            $this->updateProvince($request);
            Session::put('message', '2');
            return redirect('places');
        }
        elseif (isset($_POST['delete'])) {
            $this->deleteProvince($request);
            Session::put('message', '3');
            return redirect('places');
        }
    }

    public function insertProvince(Request $request){

        $province = new App\Province;

        $province->ProvinceName = trim($request->input('add_name'));

        try {
            $province->save();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('places');
        }
    }

    public function updateProvince(Request $request){

        $province = new App\Province;
        $province = App\Province::find($request->input('edit_ID'));

        $province->ProvinceName = trim($request->input('edit_name'));

        try {
            $province->save();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('places');
        }
    }

    public function deleteProvince(Request $request){
        $province = new App\Province;
        $province = App\Province::find($request->input('del_ID'));
        
        try {
            $province->delete();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('places');
        }
    }
}
