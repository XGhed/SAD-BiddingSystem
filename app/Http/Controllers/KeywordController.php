<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Keyword;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;

class KeywordController extends Controller
{
    public function manageKeyword(){

       $results = App\Keyword::all();

       return view('keyword')->with ('results', $results);
    }

    public function confirmKeyword(Request $request){

		if (isset($_POST['add'])) {
			$this->insertKeyword($request);
			$results = App\Keyword::all();
			return view('keyword')->with ('results', $results)->with ('message', '1');
		}
		elseif (isset($_POST['edit'])) {
	        $this->updateKeyword($request);
	        $results = App\Keyword::all();
			return view('keyword')->with ('results', $results)->with ('message', '2');
	    }
	    elseif (isset($_POST['delete'])) {
	        $this->deleteKeyword($request);
	        $results = App\Keyword::all();
			return view('keyword')->with ('results', $results)->with ('message', '3');
	    }
    }

    public function insertKeyword(Request $request){

		$keyword = new App\Keyword;

		$keyword->KeywordName = $request->input('add_name');

		try {
			$keyword->save();
		} catch (Exception $e) {
			return view('keyword')->with ('results', $results)->with ('message', '-1');
		}
	}

	public function updateKeyword(Request $request){

		$keyword = new App\Keyword;
		$keyword = App\Keyword::find($request->input('edit_ID'));

		$keyword->KeywordName = $request->input('edit_name');

		try {
			$keyword->save();
		} catch (Exception $e) {
			return view('keyword')->with ('results', $results)->with ('message', '-1');
		}
	}

	public function deleteKeyword(Request $request){
		$keyword = new App\Keyword;
		$keyword = App\Keyword::find($request->input('edit_ID'));
		
		try {
			$keyword->delete();
		} catch (Exception $e) {
			return view('keyword')->with ('results', $results)->with ('message', '-1');
		}
	}
}
