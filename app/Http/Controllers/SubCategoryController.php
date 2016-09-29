<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;

class SubCategoryController extends Controller
{
    public function confirmSubCategory(Request $request){

		if (isset($_POST['add'])) {
			Session::put('message', '1');
			return $this->insertSubCategory($request);
		}
		elseif (isset($_POST['edit'])) {
	        Session::put('message', '2');
	        return $this->updateSubCategory($request);
	    }
	    elseif (isset($_POST['delete'])) {
	        Session::put('message', '3');
	        return $this->deleteSubCategory($request);
	    }
    }

    public function insertSubCategory(Request $request){

		try {
		//check if existing
		$check = App\Models\Admin\SubCategory::where('SubCategoryName', $request->input('add_name'))->get();
		if(count($check) > 0){
			Session::put('message', '-1');
			return redirect('category');
		}

		$subCategory = new App\Models\Admin\SubCategory;

		$subCategory->CategoryID = trim($request->input('add_ID'));
		$subCategory->SubCategoryName = trim($request->input('add_name'));
		$subCategory->Description = trim($request->input('add_desc'));

			$subCategory->save();
			return redirect('category');
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('category');
		}
	}

	public function updateSubCategory(Request $request){

		try {
		//check if existing
		$check = App\Models\Admin\SubCategory::where('SubCategoryName', $request->input('edit_name'))->get();
		if(count($check) > 0){
			Session::put('message', '-1');
			return redirect('category');
		}

		$subCategory = new App\Models\Admin\SubCategory;
		$subCategory = App\Models\Admin\SubCategory::find($request->input('edit_ID'));

		$subCategory->SubCategoryName = trim($request->input('edit_name'));
		$subCategory->CategoryID = trim($request->input('edit_CatID'));
		$subCategory->Description = trim($request->input('edit_desc'));

			$subCategory->save();
			return redirect('category');
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('category');
		}
	}

	public function deleteSubCategory(Request $request){
		try {
		$subCategory = new App\Models\Admin\SubCategory;
		$subCategory = App\Models\Admin\SubCategory::find($request->input('del_ID'));
		
			$subCategory->delete();
			return redirect('category');
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('category');
		}
	}
}
