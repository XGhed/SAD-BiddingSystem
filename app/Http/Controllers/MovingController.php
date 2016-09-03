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

            $this->ItemLog(
                $item, 
                "Item requested to move to warehouse " . $item->requested_warehouse->Barangay_Street_Address . ", " . $item->requested_warehouse->city->province->ProvinceName . ", " . $item->requested_warehouse->city->CityName
                );
        }

        return redirect('movingOfItems');
    }

    public function approveMovingOfItems(Request $request){
        foreach ($request->approvedItems as $key => $approvedItem) {
            $item = App\Models\Admin\Item::find($approvedItem);

            $item->CurrentWarehouse = $item->RequestedWarehouse;
            $item->RequestedWarehouse = null;

            $item->save();

            $this->ItemLog(
                $item, 
                "Item successfully moved to warehouse " . $item->current_warehouse->Barangay_Street_Address . ", " . $item->current_warehouse->city->province->ProvinceName . ", " . $item->current_warehouse->city->CityName
                );
        }

        return redirect('approvalOfMovingItems');
    }
}
