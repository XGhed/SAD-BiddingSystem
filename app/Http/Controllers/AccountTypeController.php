<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\AccountType;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Session;

class AccountTypeController extends Controller
{
    public function manageAccountType(){

       $results = App\AccountType::all();

       return view('accountType')->with ('results', $results);
    }

    public function confirmAccountType(Request $request){

		if (isset($_POST['add'])) {
			$this->insertAccountType($request);
			Session::put('message', '1');
			return redirect('accountType');
		}
		elseif (isset($_POST['edit'])) {
	        $this->updateAccountType($request);
	        Session::put('message', '2');
			return redirect('accountType');
	    }
	    elseif (isset($_POST['delete'])) {
	        $this->deleteAccountType($request);
	        Session::put('message', '3');
			return redirect('accountType');
	    }
    }

    public function insertAccountType(Request $request){

		try {
		$accountType = new App\AccountType;

		$accountType->AccountTypeName = trim($request->input('add_name'));
		$accountType->Description = trim($request->input('add_desc'));
		$accountType->TaxRate = trim($request->input('add_tax'));
		$accountType->Discount = trim($request->input('add_disc'));
		$accountType->RequiredPoints = trim($request->input('add_points'));

			$accountType->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('accountType');
		}
	}

	public function updateAccountType(Request $request){

		try {
		$accountType = new App\AccountType;
		$accountType = App\AccountType::find($request->input('edit_ID'));

		$accountType->AccountTypeName = trim($request->input('edit_name'));
		$accountType->Description = trim($request->input('edit_desc'));
		$accountType->TaxRate = trim($request->input('edit_tax'));
		$accountType->Discount = trim($request->input('edit_disc'));
		$accountType->RequiredPoints = trim($request->input('edit_points'));

			$accountType->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('accountType');
		}
	}

	public function deleteAccountType(Request $request){
		try {
		$accountType = new App\AccountType;
		$accountType = App\AccountType::find($request->input('del_ID'));
		
			$accountType->delete();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('accountType');
		}
	}
}
