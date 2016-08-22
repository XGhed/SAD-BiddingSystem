<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;

class ItemOutboundController extends Controller
{
    public function readyForCheckoutDelivery(Request $request){
        $checkoutRequests = App\Models\Admin\CheckoutRequest::with('account', 'account.membership', 'checkoutRequest_Item', 'checkoutRequest_Item.item', 'checkoutRequest_Item.item.itemModel', 
        'checkoutRequest_Item.item.itemModel.subCategory',
        'checkoutRequest_Item.item.current_warehouse', 'checkoutRequest_Item.item.current_warehouse.city', 'checkoutRequest_Item.item.current_warehouse.city.province', 
        'checkoutRequest_Item.item.requested_warehouse', 'checkoutRequest_Item.item.requested_warehouse.city', 'checkoutRequest_Item.item.requested_warehouse.city.province')
        ->where('Status', 2)
        ->where('CheckoutType', 'Deliver')->get();

        //checking each items in each requests are in same wh
        foreach ($checkoutRequests as $key => $request) {
            foreach ($request->checkoutRequest_Item as $key2 => $request_Item) {
                if($request->checkoutRequest_Item->first()->item->CurrentWarehouse != $request_Item->item->CurrentWarehouse){
                    $checkoutRequests->splice($key, 1);
                    break;
                }
            }
        }

        return $checkoutRequests;
    }

    public function approveDeliveryItems(Request $request){
        $checkoutRequest = App\Models\Admin\CheckoutRequest::find($request->checkoutRequestID);

        //MAKE SURE THAT ALL ITEMS ARE IN THE SAME WH!! 
        $checkoutRequest->Status = 3;
        //items
        foreach ($checkoutRequest->checkoutRequest_Item as $key => $request_Item) {
            $item = App\Models\Admin\Item::find($request_Item->item->ItemID);
            $item->status = 3;
            $item->save();
        }

        $checkoutRequest->save();

        return 'success';

    }
}
