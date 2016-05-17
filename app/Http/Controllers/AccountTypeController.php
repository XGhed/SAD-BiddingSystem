<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\AccountType;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;

class AccountTypeController extends Controller
{
    public function manageAccountType(){

       $results = App\Models\Admin\AccountType::all();

       return view('admin.accountType')->with ('results', $results);
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
		$accountType = new App\Models\Admin\AccountType;

		$accountType->AccountTypeName = trim($request->input('add_name'));
		$accountType->Description = trim($request->input('add_desc'));
		$accountType->ServiceFee = trim($request->input('add_tax'));

			$accountType->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('accountType');
		}
	}

	public function updateAccountType(Request $request){

		try {
		$accountType = new App\Models\Admin\AccountType;
		$accountType = App\Models\Admin\AccountType::find($request->input('edit_ID'));

		$accountType->AccountTypeName = trim($request->input('edit_name'));
		$accountType->Description = trim($request->input('edit_desc'));
		$accountType->ServiceFee = trim($request->input('edit_tax'));

			$accountType->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('accountType');
		}
	}

	public function deleteAccountType(Request $request){
		try {
		$accountType = new App\Models\Admin\AccountType;
		$accountType = App\Models\Admin\AccountType::find($request->input('del_ID'));
		
			$accountType->delete();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('accountType');
		}
	}
}
