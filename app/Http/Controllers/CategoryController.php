<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;

class CategoryController extends Controller
{
    public function manageCategory(){

       $results = App\Models\Admin\Category::all();
       $results2 = App\Models\Admin\SubCategory::all();

       return view('admin1.Maintenance.category')->with ('results', $results)->with ('results2', $results2);
    }

    public function confirmCategory(Request $request){

		if (isset($_POST['add'])) {
			Session::put('message', '1');
			return $this->insertCategory($request);
		}
		elseif (isset($_POST['edit'])) {
	        Session::put('message', '2');
	        return $this->updateCategory($request);
	    }
	    elseif (isset($_POST['delete'])) {
	        Session::put('message', '3');
	        return $this->deleteCategory($request);
	    }
    }

    public function insertCategory(Request $request){

		try {
		//check if existing
		$check = App\Models\Admin\Category::where('CategoryName', $request->input('add_name'))->get();
		if(count($check) > 0){
			Session::put('message', '-1');
			return redirect('category');
		}

		$category = new App\Models\Admin\Category;

		$category->CategoryName = trim($request->input('add_name'));
		$category->Description = trim($request->input('add_desc'));

			$category->save();
			return redirect('category');
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('category');
		}
	}

	public function updateCategory(Request $request){

		try {
		//check if existing
		$check = App\Models\Admin\Category::where('CategoryName', $request->input('edit_name'))->get();
		if(count($check) > 0){
			Session::put('message', '-1');
			return redirect('category');
		}

		$category = new App\Models\Admin\Category;
		$category = App\Models\Admin\Category::find($request->input('edit_ID'));

		$category->CategoryName = trim($request->input('edit_name'));
		$category->Description = trim($request->input('edit_desc'));

			$category->save();
			return redirect('category');
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('category');
		}
	}

	public function deleteCategory(Request $request){
		try {
		$category = new App\Models\Admin\Category;
		$category = App\Models\Admin\Category::find($request->input('del_ID'));
		
		if(count($category->subCategory) > 0){
			Session::put('message', '-1');
			return redirect('category');
		}

			$category->delete();
			return redirect('category');
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('category');
		}
	}
}
