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


class SupplierController extends Controller
{
    public function manageSupplier(){

       $results = App\Models\Admin\Supplier::all();
       $provinces = App\Models\Admin\Province::orderBy('ProvinceName')->get();
       $cities = App\Models\Admin\City::all();

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

       return view('admin1.Maintenance.supplier')->with ('results', $results)->with ('provinces', $provinces);
    }

    public function confirmSupplier(Request $request){

		if (isset($_POST['add'])) {
			Session::put('message', '1');
			return $this->insertSupplier($request);
		}
		elseif (isset($_POST['edit'])) {
        Session::put('message', '2');
        return $this->updateSupplier($request);
	    }
	    elseif (isset($_POST['delete'])) {
	        Session::put('message', '3');
	        return $this->deleteSupplier($request);
	    }
    }    

	public function insertSupplier(Request $request){

		try {
			//check if existing
			$check = App\Models\Admin\Supplier::where('SupplierName', $request->input('add_name'))->get();
			if(count($check) > 0){
				Session::put('message', '-1');
				return redirect('supplier');
			}


			$supplier = new App\Models\Admin\Supplier;

			$supplier->SupplierName = trim($request->input('add_name'));
			$supplier->CityID = trim($request->input('add_city'));
			$supplier->Barangay_Street_Address = trim($request->input('add_barangay_street'));
			$supplier->SupplierContactNo = trim($request->input('add_contactNo'));
			$supplier->SupplierEmail = trim($request->input('add_email'));

			$supplier->save();
			return redirect('supplier');
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('supplier');
		}
	}

	public function updateSupplier(Request $request){

		try {
			//check if existing
			$check = App\Models\Admin\Supplier::where('SupplierName', $request->input('edit_name'))->get();
			if(count($check) > 0){
				Session::put('message', '-1');
				return redirect('supplier');
			}

			$supplier = new App\Models\Admin\Supplier;
			$supplier = App\Models\Admin\Supplier::find($request->input('edit_ID'));

			$supplier->SupplierName = trim($request->input('edit_name'));
			$supplier->CityID = trim($request->input('edit_city'));
			$supplier->Barangay_Street_Address = trim($request->input('edit_barangaystreet'));
			$supplier->SupplierContactNo = trim($request->input('edit_contactNo'));
			$supplier->SupplierEmail = trim($request->input('edit_email'));

			$supplier->save();
			return redirect('supplier');
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('supplier');
		}
	}

	public function deleteSupplier(Request $request){
		try {
			$supplier = new App\Models\Admin\Supplier;
			$supplier = App\Models\Admin\Supplier::find($request->input('edit_ID'));
		
			$supplier->delete();
			return redirect('supplier');
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('supplier');
		}
	}

	public function tryLoad(){
		$user = App\Models\Admin\User::orderBy('AccountID', 'desc')->take(1)->get();

		return $user;
	}
}