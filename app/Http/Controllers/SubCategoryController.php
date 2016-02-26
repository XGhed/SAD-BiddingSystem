<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;

class SubCategoryController extends Controller
{
    public function manageSubCategory(){

       $results = App\Category::all();
       return view('subcategory')->with ('results', $results);
    }

    public function confirmSubCategory(Request $request){

		if (isset($_POST['add'])) {
			$this->insertSubCategory($request);
			$results = App\Category::all();
			return view('subcategory')->with ('results', $results)->with ('message', '1');
		}
		elseif (isset($_POST['edit'])) {
	        $this->updateSubCategory($request);
	        $results = App\Category::all();
			return view('subcategory')->with ('results', $results)->with ('message', '2');
	    }
	    elseif (isset($_POST['delete'])) {
	        $this->deleteSubCategory($request);
	        $results = App\Category::all();
			return view('subcategory')->with ('results', $results)->with ('message', '3');
	    }
    }

    public function insertSubCategory(Request $request){

		$subCategory = new App\SubCategory;

		$subCategory->CategoryID = $request->input('add_ID');
		$subCategory->SubCategoryName = $request->input('add_name');

		try {
			$subCategory->save();
		} catch (Exception $e) {
			return view('subCategory')->with ('results', $results)->with ('message', '-1');
		}
	}

	public function updateSubCategory(Request $request){

		$subcategory = new App\SubCategory;
		$subcategory = App\SubCategory::find($request->input('edit_old_subcat'));

		$subcategory->SubCategoryName = $request->input('edit_new_subcat');

		try {
			$subcategory->save();
		} catch (Exception $e) {
			return view('subcategory')->with ('results', $results)->with ('message', '-1');
		}
	}

	public function deleteSubCategory(Request $request){
		$subcategory = new App\SubCategory;
		$subcategory = App\SubCategory::find($request->input('edit_old_subcat'));
		
		try {
			$subcategory->delete();
		} catch (Exception $e) {
			return view('subcategory')->with ('results', $results)->with ('message', '-1');
		}
	}
}
