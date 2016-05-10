<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;

class RegisterContainerController extends Controller
{
    public function manageRegContainer(){

       $suppliers = App\Models\Admin\Supplier::all();

       return view('admin.regContainer')->with ('suppliers', $suppliers);
    }

    public function confirmCategory(Request $request){

		if (isset($_POST['add'])) {
			$this->insertCategory($request);
			Session::put('message', '1');
			return redirect('regContainer');
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
}
