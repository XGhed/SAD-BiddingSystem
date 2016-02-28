<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Session;

class SubCategoryController extends Controller
{
    public function manageSubCategory(){

       $results = App\Category::all();
       return view('subcategory')->with ('results', $results);
    }

    public function confirmSubCategory(Request $request){

		if (isset($_POST['add'])) {
			$this->insertSubCategory($request);
			Session::put('message', '1');
			return redirect('subcategory');
		}
		elseif (isset($_POST['edit'])) {
	        $this->updateSubCategory($request);
	        Session::put('message', '2');
			return redirect('subcategory');
	    }
	    elseif (isset($_POST['delete'])) {
	        $this->deleteSubCategory($request);
	        Session::put('message', '3');
			return redirect('subcategory');
	    }
    }

    public function insertSubCategory(Request $request){

		$subCategory = new App\SubCategory;

		$subCategory->CategoryID = $request->input('add_ID');
		$subCategory->SubCategoryName = $request->input('add_name');

		try {
			$subCategory->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('subcategory');
		}
	}

	public function updateSubCategory(Request $request){

		$subcategory = new App\SubCategory;
		$subcategory = App\SubCategory::find($request->input('edit_ID'));

		$subcategory->SubCategoryName = $request->input('edit_name');

		try {
			$subcategory->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('subcategory');
		}
	}

	public function deleteSubCategory(Request $request){
		$subcategory = new App\SubCategory;
		$subcategory = App\SubCategory::find($request->input('edit_ID'));
		
		try {
			$subcategory->delete();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('subcategory');
		}
	}
}
