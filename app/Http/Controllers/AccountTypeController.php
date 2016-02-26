<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\AccountType;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;

class AccountTypeController extends Controller
{
    public function manageAccountType(){

       $results = App\AccountType::all();

       return view('accountType')->with ('results', $results);
    }

    public function confirmAccountType(Request $request){

		if (isset($_POST['add'])) {
			$this->insertAccountType($request);
			$results = App\AccountType::all();
			return view('accountType')->with ('results', $results)->with ('message', '1');
		}
		elseif (isset($_POST['edit'])) {
	        $this->updateAccountType($request);
	        $results = App\AccountType::all();
			return view('accountType')->with ('results', $results)->with ('message', '2');
	    }
	    elseif (isset($_POST['delete'])) {
	        $this->deleteAccountType($request);
	        $results = App\AccountType::all();
			return view('accountType')->with ('results', $results)->with ('message', '3');
	    }
    }

    public function insertAccountType(Request $request){

		$accountType = new App\AccountType;

		$accountType->AccountTypeName = $request->input('add_name');

		try {
			$accountType->save();
		} catch (Exception $e) {
			return view('accountType')->with ('results', $results)->with ('message', '-1');
		}
	}

	public function updateAccountType(Request $request){

		$accountType = new App\AccountType;
		$accountType = App\AccountType::find($request->input('edit_ID'));

		$accountType->AccountTypeName = $request->input('edit_name');

		try {
			$accountType->save();
		} catch (Exception $e) {
			return view('accountType')->with ('results', $results)->with ('message', '-1');
		}
	}

	public function deleteAccountType(Request $request){
		$accountType = new App\AccountType;
		$accountType = App\AccountType::find($request->input('edit_ID'));
		
		try {
			$accountType->delete();
		} catch (Exception $e) {
			return view('accountType')->with ('results', $results)->with ('message', '-1');
		}
	}
}
