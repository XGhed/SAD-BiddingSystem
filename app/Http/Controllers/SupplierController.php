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

       return view('admin1.supplier')->with ('results', $results)->with ('provinces', $provinces);
    }

    public function confirmSupplier(Request $request){

		if (isset($_POST['add'])) {
			$this->insertSupplier($request);
			Session::put('message', '1');
			return redirect('supplier');
		}
		elseif (isset($_POST['edit'])) {
	        $this->updateSupplier($request);
	        Session::put('message', '2');
			return redirect('supplier');
	    }
	    elseif (isset($_POST['delete'])) {
	        $this->deleteSupplier($request);
	        Session::put('message', '3');
			return redirect('supplier');
	    }
    }    

	public function insertSupplier(Request $request){

		try {
			$supplier = new App\Models\Admin\Supplier;

			$supplier->SupplierName = trim($request->input('add_name'));
			$supplier->CityID = trim($request->input('add_city'));
			$supplier->Barangay_Street_Address = trim($request->input('add_barangay_street'));
			$supplier->SupplierContactNo = trim($request->input('add_contactNo'));
			$supplier->SupplierEmail = trim($request->input('add_email'));

			$supplier->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('supplier');
		}
	}

	public function updateSupplier(Request $request){

		try {
			$supplier = new App\Models\Admin\Supplier;
			$supplier = App\Models\Admin\Supplier::find($request->input('edit_ID'));

			$supplier->SupplierName = trim($request->input('edit_name'));
			$supplier->CityID = trim($request->input('edit_city'));
			$supplier->Barangay_Street_Address = trim($request->input('edit_barangaystreet'));
			$supplier->SupplierContactNo = trim($request->input('edit_contactNo'));
			$supplier->SupplierEmail = trim($request->input('edit_email'));

			$supplier->save();
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
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('supplier');
		}
	}
}