<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Keyword;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Session;

class KeywordController extends Controller
{
    public function manageKeyword(){

       $results = App\Keyword::all();

       return view('keyword')->with ('results', $results);
    }

    public function confirmKeyword(Request $request){

		if (isset($_POST['add'])) {
			$this->insertKeyword($request);
			Session::put('message', '1');
			return redirect('keyword');
		}
		elseif (isset($_POST['edit'])) {
	        $this->updateKeyword($request);
	        Session::put('message', '2');
			return redirect('keyword');
	    }
	    elseif (isset($_POST['delete'])) {
	        $this->deleteKeyword($request);
	        Session::put('message', '3');
			return redirect('keyword');
	    }
    }

    public function insertKeyword(Request $request){

		try {
		$keyword = new App\Keyword;

		$keyword->KeywordName = trim($request->input('add_name'));

			$keyword->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('keyword');
		}
	}

	public function updateKeyword(Request $request){

		try {
		$keyword = new App\Keyword;
		$keyword = App\Keyword::find($request->input('edit_ID'));

		$keyword->KeywordName = trim($request->input('edit_name'));

			$keyword->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('keyword');
		}
	}

	public function deleteKeyword(Request $request){
		try {
		$keyword = new App\Keyword;
		$keyword = App\Keyword::find($request->input('del_ID'));
		
			$keyword->delete();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('keyword');
		}
	}
}
