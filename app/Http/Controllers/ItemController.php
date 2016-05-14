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

       $results = App\Models\Admin\ItemModel::all();
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
            $item = new App\Models\Admin\ItemModel;

            $item->ItemName = trim($request->input('add_name'));
            $item->SubCategoryID = trim($request->input('add_sub'));
            $item->size = trim($request->input('add_size'));
            $item->color = trim($request->input('add_color'));

            if ($request->hasFile('add_photo')) {
                $filename = rand(1000,100000)."-".$request->file('add_photo')->getClientOriginalName();
                $filepath = "photos/";
                $request->file('add_photo')->move($filepath, $filename);
                $item->image_path = $filepath.$filename;
            }
            else {
                //error
                
            }

            $item->save();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('item');
        }
    }

    public function updateItem(Request $request){

        try {
            $item = new App\Models\Admin\ItemModel;
            $item = App\Models\Admin\ItemModel::find($request->input('edit_ID'));

            $item->ItemName = trim($request->input('edit_name'));
            $item->SubCategoryID = trim($request->input('edit_sub'));
            $item->size = trim($request->input('edit_size'));
            $item->color = trim($request->input('edit_color'));

            if ($request->input('currentPhoto')){
                
            }
            else {
                if ($request->hasFile('edit_photo')) {
                $filename = rand(1000,100000)."-".$request->file('edit_photo')->getClientOriginalName();
                $filepath = "photos/";
                $request->file('edit_photo')->move($filepath, $filename);
                $item->image_path = $filepath.$filename;
                    
                }
            }

            $item->save();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('item');
        }
    }

    public function deleteItem(Request $request){
        try {
            $item = new App\Models\Admin\ItemModel;
            $item = App\Models\Admin\ItemModel::find($request->input('del_ID'));
            
            $item->delete();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('item');
        }
    }
}
