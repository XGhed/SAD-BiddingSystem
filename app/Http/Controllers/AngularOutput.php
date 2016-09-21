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

    public function problemTypesList(){
        $problemTypes = App\Models\Admin\ProblemType::all();
        return $problemTypes;
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

    public function itemsMissing(Request $request){
        $items = App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category', 'container', 
            'container.warehouse', 'container.warehouse.city', 'container.warehouse.city.province')
            ->where('status', -1)->whereHas('container', function($query){
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
            'pullRequest')->where('DefectDescription', '!=', '')->where('image_path', '!=', '')
            ->where('status', 1)->orWhere('status', 2)
            ->get();

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
            $items = App\Models\Admin\Item::where('ItemModelID', $itemModel->ItemModelID)->where('DefectDescription', '!=', '')->where('image_path', '!=', '')
            ->where('status', 1)->orWhere('status', 2)->get();
            $itemModel->stocksCount = $items->count();
            array_push($returnData, $itemModel);
        }

        return $returnData;

    }



    public function itemsMoveSelect(Request $request){
        $items = App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category', 'container', 
            'container.Supplier', 'container.warehouse', 'container.warehouse.city', 'container.warehouse.city.province', 'current_warehouse', 
            'current_warehouse.city', 'current_warehouse.city.province')
            ->where('CurrentWarehouse', $request->warehouseFrom)
            ->where('CurrentWarehouse', '!=', $request->warehouseTo)
            ->where('status', 2)
            ->where('RequestedWarehouse', null)->get();

        return $items;
    }

    public function itemsMoveApprovalRequests(Request $request){
        $requests = App\Models\Admin\MovingRequest::with('item_movingRequest.item.itemModel', 'item_movingRequest.item.itemModel.subCategory', 'item_movingRequest.item.itemModel.subCategory.category', 'item_movingRequest.item.container', 
            'item_movingRequest.item.container.Supplier', 'item_movingRequest.item.container.warehouse', 'item_movingRequest.item.container.warehouse.city', 'item_movingRequest.item.container.warehouse.city.province', 'item_movingRequest.item.current_warehouse', 
            'item_movingRequest.item.current_warehouse.city', 'item_movingRequest.item.current_warehouse.city.province', 'item_movingRequest.item.requested_warehouse', 'item_movingRequest.item.requested_warehouse.city', 'item_movingRequest.item.requested_warehouse.city.province')
            ->where('Status', 0)
            ->get();

        $returnData = $requests;

        //remove received items
        foreach($requests as $key => $request){
            $removed = 0;
            foreach($request->item_movingRequest as $key2 => $item_request){
                if($item_request->item->RequestedWarehouse == null){
                    $returnData[$key]->item_movingRequest->splice($key2-$removed, 1);
                    $removed++;
                }
            }
        }

        return $returnData;
    }

    public function allContainers(){

        $containers = App\Models\Admin\Container::orderBy('ActualArrival', 'asc')
        ->orderBy('Arrival', 'desc')
        ->with('Supplier', 'warehouse', 'warehouse.city', 'warehouse.city.province')
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

    public function accountsList(){
        $accounts = App\Models\Admin\Account::with('membership', 'membership.accounttype', 'membership.city', 'membership.city.province')->get();

        return $accounts;
    }

    public function shipmentFee(Request $request){
        $shipment = App\Models\Admin\Shipment::find($request->provinceID);

        return $shipment;
    }

    public function salesGraph(){
        $items = App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category', 'item_auction',
            'item_auction.auction.AuctionID', 'item_auction.auction.EndDateTime', 'item_auction.ItemID', 'item_auction.Points')
            ->where('status', 3)->whereHas('container', function($query){
                $query->whereNotNull('ActualArrival');
            })->get();
    }

    public function accountInfo(Request $request){
        $account = App\Models\Admin\Account::with('membership')->where('AccountID', $request->session()->get('accountID'))->first();

        return $account;
    }

    public function deliverList(){
        $shipment = App\Models\Admin\Shipment::with('province')->where('CompanyCourier', 1)->get();

        return $shipment;
    }

    public function customerStat(){
        $customer = App\Models\Admin\Account::with('membership')->orderBy('DateApproved')->get();

        return $customer;
    }

    public function supplierStat(){
        $supplier = App\Models\Admin\Container::with('item', 'supplier')->get();
        /*$supplier = App\Models\Admin\Item::with('container', 'container.supplier', 'supplier')->
        whereHas('item', function($query){
            $query->where()
        })->get();*/

        return $supplier;
    }
}
