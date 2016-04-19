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
    public function confirmSubCategory(Request $request){

		if (isset($_POST['add'])) {
			$this->insertSubCategory($request);
			Session::put('message', '1');
			return redirect('category');
		}
		elseif (isset($_POST['edit'])) {
	        $this->updateSubCategory($request);
	        Session::put('message', '2');
			return redirect('category');
	    }
	    elseif (isset($_POST['delete'])) {
	        $this->deleteSubCategory($request);
	        Session::put('message', '3');
			return redirect('category');
	    }
    }

    public function insertSubCategory(Request $request){

		try {
		$subCategory = new App\SubCategory;

		$subCategory->CategoryID = trim($request->input('add_ID'));
		$subCategory->SubCategoryName = trim($request->input('add_name'));
		$subCategory->Description = trim($request->input('add_desc'));

			$subCategory->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('category');
		}
	}

	public function updateSubCategory(Request $request){

		try {
		$subCategory = new App\SubCategory;
		$subCategory = App\SubCategory::find($request->input('edit_ID'));

		$subCategory->SubCategoryName = trim($request->input('edit_name'));
		$subCategory->CategoryID = trim($request->input('edit_CatID'));
		$subCategory->Description = trim($request->input('edit_desc'));

			$subCategory->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('category');
		}
	}

	public function deleteSubCategory(Request $request){
		try {
		$subCategory = new App\SubCategory;
		$subCategory = App\SubCategory::find($request->input('del_ID'));
		
			$subCategory->delete();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('category');
		}
	}
}
