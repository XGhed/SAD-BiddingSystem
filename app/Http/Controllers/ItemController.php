<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Business\SupplierBusiness;
use App\Dal\SupplierDao;
use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Session;

class ItemController extends Controller
{
    public function manageItem(){

       $results = App\Item::all();
       $subCategories = App\SubCategory::all();

       return view('item')->with ('results', $results)->with ('subCategories', $subCategories);
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

        $item = new App\Item;

        $item->ItemName = $request->input('add_name');
        $item->SubCategoryID = $request->input('add_sub');

        try {
            $item->save();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('item');
        }
    }

    public function updateItem(Request $request){

        $item = new App\Item;
        $item = App\Item::find($request->input('edit_ID'));

        $item->ItemName = $request->input('edit_name');
        $item->SubCategoryID = $request->input('edit_sub');

        try {
            $item->save();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('item');
        }
    }

    public function deleteItem(Request $request){
        $item = new App\Item;
        $item = App\Item::find($request->input('del_ID'));
        
        try {
            $item->delete();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('item');
        }
    }
}
