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

		$accountType = new App\AccountType;

		$accountType->AccountTypeName = $request->input('add_name');
		$accountType->Description = $request->input('add_desc');
		$accountType->TaxRate = $request->input('add_tax');
		$accountType->Discount = $request->input('add_disc');

		try {
			$accountType->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('accountType');
		}
	}

	public function updateAccountType(Request $request){

		$accountType = new App\AccountType;
		$accountType = App\AccountType::find($request->input('edit_ID'));

		$accountType->AccountTypeName = $request->input('edit_name');
		$accountType->Description = $request->input('edit_desc');
		$accountType->TaxRate = $request->input('edit_tax');
		$accountType->Discount = $request->input('edit_disc');

		try {
			$accountType->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('accountType');
		}
	}

	public function deleteAccountType(Request $request){
		$accountType = new App\AccountType;
		$accountType = App\AccountType::find($request->input('del_ID'));
		
		try {
			$accountType->delete();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('accountType');
		}
	}
}
