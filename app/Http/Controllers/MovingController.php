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
        $movingRequest = new App\Models\Admin\MovingRequest;
        $movingRequest->RequestDate = Carbon::now('Asia/Manila');
        $movingRequest->Remarks = $request->remarks;
        $movingRequest->save();

        foreach ($request->movingItems as $key => $movingItem) {
            $item = App\Models\Admin\Item::find($movingItem);

            if($item->CurrentWarehouse != $request->warehouse){
                $item->RequestedWarehouse = $request->warehouse;
                $item->save();

                $this->ItemLog(
                    $item, 
                    "Item requested to move to warehouse " . $item->requested_warehouse->Barangay_Street_Address . ", " . $item->requested_warehouse->city->province->ProvinceName . ", " . $item->requested_warehouse->city->CityName
                    );

                $item_MovingRequest = new App\Models\Admin\Item_MovingRequest;
                $item_MovingRequest->MovingRequestID = $movingRequest->MovingRequestID;
                $item_MovingRequest->ItemID = $item->ItemID;
                $item_MovingRequest->save();
            }
            
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

        //if it doensn't have any pending requests of items, change status to 1
        $movingRequest = App\Models\Admin\MovingRequest::find($request->requestID);

        //remove received items
        $removed = 0;
        foreach($movingRequest->item_movingRequest as $key2 => $item_request){
            if($item_request->item->RequestedWarehouse == null){
                $movingRequest->item_movingRequest->splice($key2-$removed, 1);
                $removed++;
            }
        }

        if(count($movingRequest->item_movingRequest) < 1){
            $movingRequest = App\Models\Admin\MovingRequest::find($request->requestID);
            $movingRequest->Status = 1;
            $movingRequest->save();
        }
        
        return redirect('approvalOfMovingItems');
    }

    public function approveAllMovingOfItems(Request $request){
        $movingRequest = App\Models\Admin\MovingRequest::find($request->requestID);

        foreach ($movingRequest->item_movingRequest as $key => $item_movingRequest) {
            $item = App\Models\Admin\Item::find($item_movingRequest->item->ItemID);

            $item->CurrentWarehouse = $item->RequestedWarehouse;
            $item->RequestedWarehouse = null;

            $item->save();

            $this->ItemLog(
                $item, 
                "Item successfully moved to warehouse " . $item->current_warehouse->Barangay_Street_Address . ", " . $item->current_warehouse->city->province->ProvinceName . ", " . $item->current_warehouse->city->CityName
                );
        }
        
        $movingRequest->Status = 1;
        $movingRequest->save();
        
        return redirect('approvalOfMovingItems');
    }
}
