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

class DeliveryItemsController extends Controller
{
    public function readyForDeliveryRequests(Request $request){
        $checkoutRequests = App\Models\Admin\CheckoutRequest::with('checkoutRequest_Item', 'checkoutRequest_Item.item', 'checkoutRequest_Item.item.itemModel', 
            'checkoutRequest_Item.item.current_warehouse', 'checkoutRequest_Item.item.current_warehouse.city', 'checkoutRequest_Item.item.current_warehouse.city.province', 
            'checkoutRequest_Item.item.requested_warehouse', 'checkoutRequest_Item.item.requested_warehouse.city', 'checkoutRequest_Item.item.requested_warehouse.city.province')
        ->where('Status', 2)->where('CheckoutType', 'Deliver')->get();

        return $checkoutRequests;
    }

    public function approveDeliveryItems(Request $request){
        $checkoutRequest = App\Models\Admin\CheckoutRequest::find($request->checkoutRequestID);

        $checkoutRequest->Status = 3;

        $checkoutRequest->save();

        return 'success';

    }
}
