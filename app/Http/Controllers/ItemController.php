<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Business\SupplierBusiness;
use App\Dal\SupplierDao;
use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;

class ItemController extends Controller
{
    public function manageItem(){

       $results = App\Models\Admin\Item::all();
       $categories = App\Models\Admin\Category::all();
       $subCategories = App\Models\Admin\SubCategory::all();

       return view('admin.item')->with ('results', $results)->with ('subCategories', $subCategories)->with ('categories', $categories);
    }

    public function confirmItem(Request $request){

        if (isset($_POST['add'])) {
            $this->insertItem($request);
            Session::put('message', '1');
            return redirect('item');
        }
        elseif (isset($_POST['edit'])) {
            $this->updateItem($request);
            Session::put('message', '2');
            return redirect('item');
        }
        elseif (isset($_POST['delete'])) {
            $this->deleteItem($request);
            Session::put('message', '3');
            return redirect('item');
        }
    }

    public function insertItem(Request $request){

        try {
        $item = new App\Models\Admin\Item;

        $item->ItemName = trim($request->input('add_name'));
        $item->SubCategoryID = trim($request->input('add_sub'));

            $item->save();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('item');
        }
    }

    public function updateItem(Request $request){

        try {
        $item = new App\Models\Admin\Item;
        $item = App\Models\Admin\Item::find($request->input('edit_ID'));

        $item->ItemName = trim($request->input('edit_name'));
        $item->SubCategoryID = trim($request->input('edit_sub'));

            $item->save();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('item');
        }
    }

    public function deleteItem(Request $request){
        try {
        $item = new App\Models\Admin\Item;
        $item = App\Models\Admin\Item::find($request->input('del_ID'));
        
            $item->delete();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('item');
        }
    }
}
