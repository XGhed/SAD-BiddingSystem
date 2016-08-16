<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;

class MovingController extends Controller
{
    public function itemMoveRequest(Request $request){
        foreach ($request->movingItems as $key => $movingItem) {
            $item = App\Models\Admin\Item::find($movingItem);

            $item->RequestedWarehouse = $request->warehouse;
            $item->save();

            //history
            $history = new App\Models\Admin\ItemHistory;
            $warehouse = App\Models\Admin\Warehouse::find($request->warehouse);

            $history->ItemID = $item->ItemID;
            $history->Log = "Requested to move to warehouse " . $warehouse->Barangay_Street_Address . ', ' . $warehouse->city->CityName . ', ' . $warehouse->city->province->ProvinceName;
            $history->Date = Carbon::now('Asia/Manila');

            $history->save();
        }

        return redirect('movingOfItems');
    }

    public function approveMovingOfItems(Request $request){
        foreach ($request->approvedItems as $key => $approvedItem) {
            $item = App\Models\Admin\Item::find($approvedItem);

            $item->CurrentWarehouse = $item->RequestedWarehouse;
            $item->RequestedWarehouse = null;

            $item->save();

            //history
            $history = new App\Models\Admin\ItemHistory;
            $warehouse = App\Models\Admin\Warehouse::find($item->CurrentWarehouse);

            $history->ItemID = $item->ItemID;
            $history->Log = "Successfully moved to warehouse " . $warehouse->Barangay_Street_Address . ', ' . $warehouse->city->CityName . ', ' . $warehouse->city->province->ProvinceName;
            $history->Date = Carbon::now('Asia/Manila');

            $history->save();
        }

        return redirect('approvalOfMovingItems');
    }
}
