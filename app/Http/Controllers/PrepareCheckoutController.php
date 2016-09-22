<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class PrepareCheckoutController extends Controller
{
    public function deliveryRequests(Request $request){
        $checkoutRequest = App\Models\Admin\CheckoutRequest::with('account', 'checkoutRequest_Item', 'checkoutRequest_Item.item', 'checkoutRequest_Item.item.current_warehouse', 'checkoutRequest_Item.item.current_warehouse.city', 'checkoutRequest_Item.item.current_warehouse.city.province', 'checkoutRequest_Item.item.itemModel', 'city', 'city.province')
            ->where('CheckoutType', 'Deliver')->where('Status', 0)->get();

        return $checkoutRequest;
    }

    public function approveCheckoutRequest(Request $request){
        $checkoutRequest = App\Models\Admin\CheckoutRequest::find($request->checkoutRequestID);

        $movingRequest = new App\Models\Admin\MovingRequest;
        $movingRequest->RequestDate = Carbon::now('Asia/Manila');
        $movingRequest->Remarks = 'Preparing Checkout';
        $movingRequest->save();

        foreach ($checkoutRequest->checkoutRequest_Item as $key => $requestedItem) {
            $item = App\Models\Admin\Item::find($requestedItem->ItemID);

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

        $checkoutRequest->Status = 1;

        $checkoutRequest->save();

        return 'success';
    }

    public function pickupRequests(Request $request){
        $checkoutRequest = App\Models\Admin\CheckoutRequest::with('account', 'checkoutRequest_Item', 'checkoutRequest_Item.item', 'checkoutRequest_Item.item.current_warehouse', 'checkoutRequest_Item.item.current_warehouse.city', 'checkoutRequest_Item.item.current_warehouse.city.province', 'checkoutRequest_Item.item.itemModel', 'pickupLocation.city', 'pickupLocation.city.province')
            ->where('CheckoutType', 'Pick up')->where('Status', 0)->get();

        return $checkoutRequest;
    }
}
