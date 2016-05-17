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

class InventoryController extends Controller
{
    public function manageItem(){

       $results = App\Models\Admin\Item::all();
       $itemModels = App\Models\Admin\ItemModel::all();
       $warehouses = App\Models\Admin\Warehouse::all();

       return view('admin.inventory')->with ('results', $results)->with ('itemModels', $itemModels)->with ('warehouses', $warehouses);
    }

    public function confirmItem(Request $request){

        if (isset($_POST['add'])) {
            $this->insertItem($request);
            Session::put('message', '1');
            return redirect('inventory');
        }
        elseif (isset($_POST['edit'])) {
            $this->updateItem($request);
            Session::put('message', '2');
            return redirect('inventory');
        }
        elseif (isset($_POST['delete'])) {
            $this->deleteItem($request);
            Session::put('message', '3');
            return redirect('inventory');
        }
    }

    public function insertItem(Request $request){

        try {
            $filename = null;
            $filepath = null;

            if ($request->hasFile('add_photo')) {
                $filename = rand(1000,100000)."-".$request->file('add_photo')->getClientOriginalName();
                $filepath = "photos/";
                $request->file('add_photo')->move($filepath, $filename);
            }
            else {
                //error
                
            }

            for ($i=0; $i < $request->input('add_quantity'); $i++) { 
                $item = new App\Models\Admin\Item;
                $inventory = new App\Models\Admin\Inventory;

                $item->ItemModelID = trim($request->input('itemModel'));
                $item->size = trim($request->input('add_size'));
                $item->color = trim($request->input('add_color'));
                $item->image_path = $filepath.$filename;

                $item->save();

                $inventory->ItemID = $item->ItemID;
                $inventory->WarehouseNo = $request->input('warehouse');
                $inventory->MembershipID = null;

                if($request->input('defectDesc')){
                    $inventory->defect = $request->input('defectDesc');
                }
                else {
                    $inventory->defect = "No defects.";
                }

                $inventory->save();
                
            }
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('inventory');
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
            return redirect('inventory');
        }
    }

    public function deleteItem(Request $request){
        try {
            $item = new App\Models\Admin\ItemModel;
            $item = App\Models\Admin\ItemModel::find($request->input('del_ID'));
            
            $item->delete();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('inventory');
        }
    }
}
