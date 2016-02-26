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


class SupplierController extends Controller
{
    public function manageSupplier(){

       $results = App\Supplier::all();

       return view('supplier')->with ('results', $results);
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

		$supplier = new App\Supplier;

		$supplier->SupplierName = $request->input('add_name');
		$supplier->Province_Address = $request->input('add_province');
		$supplier->City_Address = $request->input('add_city');
		$supplier->Barangay_Address = $request->input('add_barangay');
		$supplier->Street_Address = $request->input('add_street');
		$supplier->SupplierContactNo = $request->input('add_contactNo');
		$supplier->SupplierEmail = $request->input('add_email');

		try {
			$supplier->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('supplier');
		}
	}

	public function updateSupplier(Request $request){

		$supplier = new App\Supplier;
		$supplier = App\Supplier::find($request->input('edit_ID'));

		$supplier->SupplierName = $request->input('edit_name');
		$supplier->Province_Address = $request->input('edit_province');
		$supplier->City_Address = $request->input('edit_city');
		$supplier->Barangay_Address = $request->input('edit_barangay');
		$supplier->Street_Address = $request->input('edit_street');
		$supplier->SupplierContactNo = $request->input('edit_contactNo');
		$supplier->SupplierEmail = $request->input('edit_email');

		try {
			$supplier->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('supplier');
		}
	}

	public function deleteSupplier(Request $request){
		$supplier = new App\Supplier;
		$supplier = App\Supplier::find($request->input('edit_ID'));
		
		try {
			$supplier->delete();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('supplier');
		}
	}
}