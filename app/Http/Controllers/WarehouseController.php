<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Business\WarehouseBusiness;
use App\Dal\WarehouseDao;
use App\Warehouse;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;


class WarehouseController extends Controller
{

	public function manageWarehouse(){

       $results = App\Models\Admin\warehouse::all();
       $provinces = App\Models\Admin\Province::orderBy('ProvinceName')->get();
       $cities = App\Models\Admin\City::all();

       foreach ($results as $key => $result) {
       	foreach ($cities as $key => $city) {
       		if($city->CityID == $result->CityID){
       			$result['ProvinceID'] = $city->province->ProvinceID;
		       	$result['ProvinceName'] = $city->province->ProvinceName;
		       	$result['CityID'] = $city->CityID;
		       	$result['CityName'] = $city->CityName;
       		}
       	}
       }

       return view('admin1.warehouse')->with ('results', $results)->with ('provinces', $provinces)->with ('cities', $cities);
    }

    public function confirmWarehouse(Request $request){

		if (isset($_POST['add'])) {
			$this->insertwarehouse($request);
			Session::put('message', '1');
			return redirect('warehouse');
		}
		elseif (isset($_POST['edit'])) {
	        $this->updatewarehouse($request);
	        Session::put('message', '2');
			return redirect('warehouse');
	    }
	    elseif (isset($_POST['delete'])) {
	        $this->deletewarehouse($request);
	        Session::put('message', '3');
			return redirect('warehouse');
	    }
    }    

	public function insertWarehouse(Request $request){

		try {
			$warehouse = new App\Models\Admin\Warehouse;

			$warehouse->CityID = trim($request->input('add_city'));
			$warehouse->Barangay_Street_Address = trim($request->input('add_barangay_street'));

			$warehouse->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('warehouse');
		}
	}

	public function updateWarehouse(Request $request){

		try {
			$warehouse = new App\Models\Admin\Warehouse;
			$warehouse = App\Models\Admin\Warehouse::find($request->input('edit_ID'));

			$warehouse->CityID = trim($request->input('edit_city'));
			$warehouse->Barangay_Street_Address = trim($request->input('edit_barangaystreet'));

			$warehouse->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('warehouse');
		}
	}

	public function deleteWarehouse(Request $request){
		try {
			$warehouse = new App\Models\Admin\Warehouse;
			$warehouse = App\Models\Admin\Warehouse::find($request->input('edit_ID'));
		
			$warehouse->delete();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('warehouse');
		}
	}
}