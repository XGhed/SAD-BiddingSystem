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
use Input;
use Response;

class StatusUpdate extends Controller
{
    public function Supplier(){
        $supplier = new App\Models\Admin\Supplier;
        $supplier = App\Models\Admin\Supplier::find(Input::get('supplierID'));

        if ($supplier->Status == 1){
            $supplier->Status = 0;
        }
        elseif ($supplier->Status == 0){
            $supplier->Status = 1;
        }
        $supplier->save();
    }

    public function Item(){
        $item = new App\Models\Admin\ItemModel;
        $item = App\Models\Admin\ItemModel::find(Input::get('itemID'));

        if ($item->Status == 1){
            $item->Status = 0;
        }
        elseif ($item->Status == 0){
            $item->Status = 1;
        }
        $item->save();
    }

    public function AccountType(){
        $accountType = new App\Models\Admin\AccountType;
        $accountType = App\Models\Admin\AccountType::find(Input::get('accounttypeID'));

        if ($accountType->Status == 1){
            $accountType->Status = 0;
        }
        elseif ($accountType->Status == 0){
            $accountType->Status = 1;
        }
        $accountType->save();
    }

    public function Category(){
        $category = new App\Models\Admin\Category;
        $category = App\Models\Admin\Category::find(Input::get('categoryID'));

        if ($category->Status == 1){
            $category->Status = 0;
        }
        elseif ($category->Status == 0){
            $category->Status = 1;
        }
        $category->save();

        foreach ($category->subCategory as $key => $sub) {
            $sub->Status = $category->Status;
            $sub->save();
        }
    }

    public function SubCategory(){
        $subCategory = new App\Models\Admin\SubCategory;
        $subCategory = App\Models\Admin\SubCategory::find(Input::get('subcategoryID'));

        if ($subCategory->Status == 1){
            $subCategory->Status = 0;
            $subCategory->save();
            return 1;
        }
        elseif ($subCategory->Status == 0 && $subCategory->category->Status == 1){
            $subCategory->Status = 1;
            $subCategory->save();
            return 1;
        }
        else {
            return 0;
        }
    }

    public function ItemDefect(){
        $itemDefect = new App\Models\Admin\ItemDefect;
        $itemDefect = App\Models\Admin\ItemDefect::find(Input::get('defectID'));

        if ($itemDefect->Status == 1){
            $itemDefect->Status = 0;
        }
        elseif ($itemDefect->Status == 0){
            $itemDefect->Status = 1;
        }
        $itemDefect->save();
    }

    public function Warehouse(){
        $warehouse = new App\Models\Admin\Warehouse;
        $warehouse = App\Models\Admin\Warehouse::find(Input::get('WarehouseNo'));

        if ($warehouse->Status == 1){
            $warehouse->Status = 0;
        }
        elseif ($warehouse->Status == 0){
            $warehouse->Status = 1;
        }
        $warehouse->save();
    }

    public function ProblemType(){
        $problemType = new App\Models\Admin\ProblemType;
        $problemType = App\Models\Admin\ProblemType::find(Input::get('problemtypeID'));

        if ($problemType->Status == 1){
            $problemType->Status = 0;
        }
        elseif ($problemType->Status == 0){
            $problemType->Status = 1;
        }
        $problemType->save();
    }
}
