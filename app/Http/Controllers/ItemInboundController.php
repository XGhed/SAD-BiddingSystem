<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;

class ItemInboundController extends Controller
{
    public function view(){
        $colors = App\Models\Admin\Color::all();

        return view('admin1.Transaction.itemInbound')->with('colors', $colors);
    }

    public function itemInbound(Request $request){
        if($request->inbound == "true"){
            $this->itemDelivered($request);
        }
        else if ($request->missing == "true"){
            $this->itemMissing($request);
        }
        else if ($request->inboundAll == "true"){

            $this->inboundAll($request);
        }

        return redirect('/itemInbound');
    }

    public function itemDelivered(Request $request){
        foreach ($request->items as $key => $itemID) {
            $item = App\Models\Admin\Item::find($itemID);
            $item->status = 1;
            $item->CurrentWarehouse = $item->container->warehouse->WarehouseNo;

            $item->save();

            $this->ItemLog(
                $item, 
                "Item successfully delivered to warehouse " . $item->current_warehouse->Barangay_Street_Address . ", " . $item->current_warehouse->city->province->ProvinceName . ", " . $item->current_warehouse->city->CityName
                );
        }
        

        return redirect('/itemInbound');
    }

    public function inboundAll(Request $request){
        $container = App\Models\Admin\Container::find($request->containerID);
        foreach ($container->Item as $key => $itemFromContainer) {
            $item = App\Models\Admin\Item::find($itemFromContainer->ItemID);
            $item->status = 1;
            $item->CurrentWarehouse = $item->container->warehouse->WarehouseNo;

            $item->save();

            $this->ItemLog(
                $item, 
                "Item successfully delivered to warehouse " . $item->current_warehouse->Barangay_Street_Address . ", " . $item->current_warehouse->city->province->ProvinceName . ", " . $item->current_warehouse->city->CityName
                );
        }
        

        return redirect('/itemInbound');
    }

    public function itemMissing(Request $request){
        foreach ($request->items as $key => $itemID) {
            $item = App\Models\Admin\Item::find($itemID);
            $item->status = -1;
            $item->save();

            $this->ItemLog(
                $item, 
                "Item is missing from the container " . $item->container->ContainerName
                );
        }

        return redirect('/itemInbound');
    } 

    public function itemFound(Request $request){
        $item = App\Models\Admin\Item::find($request->itemID);
        $item->status = 1;
        $item->CurrentWarehouse = $item->container->warehouse->WarehouseNo;

        $item->save();

        $this->ItemLog(
            $item, 
            "Item was found or was redelivered to warehouse " . $item->current_warehouse->Barangay_Street_Address . ", " . $item->current_warehouse->city->province->ProvinceName . ", " . $item->current_warehouse->city->CityName
            );
        
        return $item;
        return 'success';
    }

    public function itemMissingRemove(Request $request){
        $item = App\Models\Admin\Item::find($request->itemID);
        $item->status = -2;

        $item->save();
        
        return 'success';
    }

    public function removeUnexpectedItems(Request $request){
        foreach ($request->items as $key => $itemID) {
            $item = App\Models\Admin\Item::find($itemID);
            $item->delete();
        }

        return redirect('/itemInbound');
    }

    public function missingItemsAction(Request $request){
        if($request->found == "true"){
            foreach ($request->items as $key => $itemID) {
                $item = App\Models\Admin\Item::find($itemID);
                $item->status = 1;
                $item->save();
            }
        }
        else if($request->remove == "true"){
            foreach ($request->items as $key => $itemID) {
                $item = App\Models\Admin\Item::find($itemID);
                $item->status = -2;
                $item->save();
            }
        }

        return redirect('/itemInbound');
    }
}
