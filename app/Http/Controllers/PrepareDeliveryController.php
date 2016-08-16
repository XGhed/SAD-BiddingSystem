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

class PrepareDeliveryController extends Controller
{
    public function deliveryRequests(Request $request){
        $checkoutRequest = App\Models\Admin\CheckoutRequest::with('account', 'checkoutRequest_Item', 'checkoutRequest_Item.item', 'checkoutRequest_Item.item.itemModel', 'city', 'city.province')->where('CheckoutType', 'Deliver')->get();

        return $checkoutRequest;
    }

    public function approveDeliveryRequest(Request $request){
        $checkoutRequest = App\Models\Admin\CheckoutRequest::find($request->checkoutRequestID);

        foreach ($checkoutRequest->checkoutRequest_Item as $key => $requestedItem) {
            $item = App\Models\Admin\Item::find($requestedItem->ItemID);

            if($item->CurrentWarehouse != $request->warehouse){
                $item->RequestedWarehouse = $request->warehouse;

                $item->save();
            }
        }

        $checkoutRequest->Status = 1;

        $checkoutRequest->save();

        return 'success';
    }
}
