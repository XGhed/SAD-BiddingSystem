<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Business\SupplierBusiness;
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
       $colors = App\Models\Admin\Color::all()->sortBy('ColorName');

       return view('admin1.Maintenance.item')->with ('results', $results)->with ('subCategories', $subCategories)->with ('categories', $categories)->with('colors', $colors);
    }

    public function confirmItem(Request $request){

        if (isset($_POST['add'])) {
            Session::put('message', '1');
            return $this->insertItem($request);
        }
        elseif (isset($_POST['edit'])) {
            Session::put('message', '2');
            return $this->updateItem($request);
        }
        elseif (isset($_POST['delete'])) {
            Session::put('message', '3');
            return $this->deleteItem($request);
        }
    }

    public function insertItem(Request $request){

        try {
            //check if existing
            $check = App\Models\Admin\ItemModel::where('ItemName', $request->input('add_name'))->get();
            if(count($check) > 0){
                Session::put('message', '-1');
                return redirect('item');
            }

            $request->add_color = $this->colorDatabase($request->add_color);

            $item = new App\Models\Admin\ItemModel;

            $item->ItemName = trim($request->input('add_name'));
            $item->SubCategoryID = trim($request->input('add_sub'));
            $item->size = trim($request->input('add_size'));
            $item->color = trim($request->input('add_color'));

            $item->save();
            return redirect('item');
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('item');
        }
    }

    public function updateItem(Request $request){

        try {
            //check if existing
            $check = App\Models\Admin\ItemModel::where('ItemName', $request->input('edit_name'))->get();
            if(count($check) > 0){
                Session::put('message', '-1');
                return redirect('item');
            }

            $request->add_color = $this->colorDatabase($request->add_color);
            
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
            return redirect('item');
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
            return redirect('item');
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('item');
        }
    }
}
