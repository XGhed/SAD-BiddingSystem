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

		$subCategory = new App\SubCategory;

		$subCategory->CategoryID = $request->input('add_ID');
		$subCategory->SubCategoryName = $request->input('add_name');
		$subCategory->Description = $request->input('add_desc');

		try {
			$subCategory->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('category');
		}
	}

	public function updateSubCategory(Request $request){

		$subCategory = new App\SubCategory;
		$subCategory = App\SubCategory::find($request->input('edit_ID'));

		$subCategory->SubCategoryName = $request->input('edit_name');
		$subCategory->Description = $request->input('edit_desc');

		try {
			$subCategory->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('category');
		}
	}

	public function deleteSubCategory(Request $request){
		$subCategory = new App\SubCategory;
		$subCategory = App\SubCategory::find($request->input('del_ID'));
		
		try {
			$subCategory->delete();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('category');
		}
	}
}
