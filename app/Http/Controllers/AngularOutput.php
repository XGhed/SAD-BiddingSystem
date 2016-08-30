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
use Carbon\Carbon;


class AngularOutput extends Controller
{
    public function colors(){
        $colors = App\Models\Admin\Color::all();

        return $colors;
    }

    public function suppliers(){
        $suppliers = App\Models\Admin\Supplier::all();
        return $suppliers;
    }

    public function itemModels(){
        $itemModels = App\Models\Admin\ItemModel::all();
        return $itemModels;
    }

    public function itemModelsOfSubcat(Request $request){
        $itemModels = App\Models\Admin\ItemModel::where('SubCategoryID', $request->subcatID)->get();
        return $itemModels;
    }

    public function itemModelsWithItems(){
        $itemModels = App\Models\Admin\ItemModel::with('items')->get();
        return $itemModels;
    }

    public function singleItem(Request $request){
        $item =  App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category', 'container', 
            'container.Supplier', 'container.warehouse', 'container.warehouse.city', 'container.warehouse.city.province', 'itemHistory', 'pullRequest')
            ->where('ItemID', $request->itemID)->first();

        return $item;
    }

    public function itemsInContainer(Request $request){
        $items = App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category', 'container', 
            'container.warehouse', 'container.warehouse.city', 'container.warehouse.city.province')
            ->where('ContainerID', $request->containerID)->get();

        return $items;
    }

    public function itemsInbound(Request $request){
        $items = App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category', 'container', 
            'container.warehouse', 'container.warehouse.city', 'container.warehouse.city.province')
            ->where('status', 0)->whereHas('container', function($query){
                $query->whereNotNull('ActualArrival');
            })->get();

        return $items;
    }

    public function unexpectedItems(Request $request){
        $items = App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category', 'container', 
            'container.warehouse', 'container.warehouse.city', 'container.warehouse.city.province')
            ->where('Unexpected', 1)->get();
 
        return $items;
    }

    public function itemsChecking(Request $request){
         $items = App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category',
            'container')->where('status', 1)->get();

        return $items;
    }

    public function itemsChecked(Request $request){
         $items = App\Models\Admin\Item::with('itemModel', 'container', 'container.warehouse.city',
            'container.warehouse.city.province')->where('status', 2)->get();

        return $items;
    }

    public function itemsInventory(Request $request){
        $items = App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category', 'container', 
            'container.Supplier', 'container.warehouse', 'container.warehouse.city', 'container.warehouse.city.province', 'itemHistory',
            'pullRequest')->where('status', 1)->orWhere('status', 2)->get();

        return $items;
    }

    public function itemsOfModelInventory(Request $request){
        $items = App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category', 'container', 
            'container.Supplier', 'container.warehouse', 'container.warehouse.city', 'container.warehouse.city.province', 'itemHistory')
            ->where('status', 2)
            ->where('ItemModelID', $request->itemID)
            ->get();

        return $items;
    }

    public function itemmodelsInventory(Request $request){
        $itemModels = App\Models\Admin\ItemModel::with('subCategory', 'subCategory.category', 'items')->get();
        $returnData = [];

        foreach ($itemModels as $key => $itemModel) {
            $items = App\Models\Admin\Item::where('ItemModelID', $itemModel->ItemModelID)->where('status', '>', 0)
            ->where('status', '<', 3)->get();
            $itemModel->stocksCount = $items->count();
            array_push($returnData, $itemModel);
        }

        return $returnData;

    }



    public function itemsMoveSelect(Request $request){
        $items = App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category', 'container', 
            'container.Supplier', 'container.warehouse', 'container.warehouse.city', 'container.warehouse.city.province', 'current_warehouse', 
            'current_warehouse.city', 'current_warehouse.city.province')
            ->where('status', 2)
            ->where('RequestedWarehouse', null)->get();

        return $items;
    }

    public function itemsMoveApproval(Request $request){
        $items = App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category', 'container', 
            'container.Supplier', 'container.warehouse', 'container.warehouse.city', 'container.warehouse.city.province', 'current_warehouse', 
            'current_warehouse.city', 'current_warehouse.city.province', 'requested_warehouse', 'requested_warehouse.city', 'requested_warehouse.city.province')
            ->where('status', 2)
            ->whereNotNull('RequestedWarehouse')->get();

        return $items;
    }

    public function allContainers(){

        $containers = App\Models\Admin\Container::with('Supplier', 'warehouse', 'warehouse.city', 'warehouse.city.province')
        ->get();

        return $containers;
    }

    public function containers(){

        $containers = App\Models\Admin\Container::with('Supplier', 'warehouse', 'warehouse.city', 'warehouse.city.province')
        ->where('ActualArrival', '!=', 'null')
        ->get();

        return $containers;
    }

    public function warehouses(){
        $warehouses = App\Models\Admin\Warehouse::with('city', 'city.province')->get();
        return $warehouses;
    }

    public function cityOptions(){
        $provID = Input::get('provID');
        $cities = App\Models\Admin\City::where('ProvinceID', $provID)->get();

        return \Response::json($cities);
    }

    public function categories(){
        $categories = App\Models\Admin\Category::with('subCategory')->get();

        return $categories;
    }

    public function subcatOptions(){
        $catID = Input::get('catID');
        $subCategories = App\Models\Admin\SubCategory::where('CategoryID', $catID)->get();

        return \Response::json($subCategories);
    }

    public function provinces(){
        $provinces = App\Models\Admin\Province::orderBy('ProvinceName')->get();
        return $provinces;
    }

    public function accountTypes(){
        $accountTypes = App\Models\Admin\AccountType::all();
        return $accountTypes;
    }

    public function currentTime(){
        return Carbon::now('Asia/Manila');
    }

    public function unactivatedAccounts(){
        $accounts = App\Models\Admin\Account::with('membership', 'membership.accounttype', 'membership.city', 'membership.city.province')->where('status', 0)->get();

        return $accounts;
    }
}
