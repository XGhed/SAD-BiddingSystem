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

       return view('admin.category')->with ('results', $results)->with ('results2', $results2);
    }

    public function confirmCategory(Request $request){

		if (isset($_POST['add'])) {
			$this->insertCategory($request);
			Session::put('message', '1');
			return redirect('category');
		}
		elseif (isset($_POST['edit'])) {
	        $this->updateCategory($request);
	        Session::put('message', '2');
			return redirect('category');
	    }
	    elseif (isset($_POST['delete'])) {
	        $this->deleteCategory($request);
	        Session::put('message', '3');
			return redirect('category');
	    }
    }

    public function insertCategory(Request $request){

		try {
		$category = new App\Models\Admin\Category;

		$category->CategoryName = trim($request->input('add_name'));
		$category->Description = trim($request->input('add_desc'));

			$category->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('category');
		}
	}

	public function updateCategory(Request $request){

		try {
		$category = new App\Models\Admin\Category;
		$category = App\Models\Admin\Category::find($request->input('edit_ID'));

		$category->CategoryName = trim($request->input('edit_name'));
		$category->Description = trim($request->input('edit_desc'));

			$category->save();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('category');
		}
	}

	public function deleteCategory(Request $request){
		try {
		$category = new App\Models\Admin\Category;
		$category = App\Models\Admin\Category::find($request->input('del_ID'));
		
			$category->delete();
		} catch (Exception $e) {
			Session::put('message', '-1');
			return redirect('category');
		}
	}
}
