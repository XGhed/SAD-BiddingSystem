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

class CustomerCheckoutController extends Controller
{
    public function view(Request $request){
        $items = App\Models\Admin\Item::all();
        $itemsWon = [];

        foreach ($items as $key => $item) {
            if (count($item->winners) > 0){
                //check if not yet checked out
                if(count($item->checkoutRequest_item) < 1){
                    if ($item->winners->last()->bid->AccountID == $request->session()->get('accountID')){
                        //check if event has ended
                        $currentDatetime = Carbon::now('Asia/Manila');
                        $currentDatetime = explode(' ', $currentDatetime);
                        $auctionEndTime = explode(' ', $item->winners->first()->auction->EndDateTime);

                        if ($currentDatetime[0] > $auctionEndTime[0] || ($currentDatetime[0] == $auctionEndTime[0] && $currentDatetime[1] > $auctionEndTime[1])){
                            array_push($itemsWon, $item);
                        }

                    }
                }
                
            }
        }
        
        $itemsWon = collect($itemsWon);
        
        return view('customer.checkout')->with('itemsWon', $itemsWon);
    }

    public function insert(Request $request){
        $checkoutRequest = new App\Models\Admin\CheckoutRequest;

        $checkoutRequest->CheckoutType = $request->checkoutType;
        $checkoutRequest->AccountID = $request->session()->get('accountID');
        $checkoutRequest->RequestDate = Carbon::now('Asia/Manila');
        $checkoutRequest->FirstName = $request->firstName;
        $checkoutRequest->MiddleName = $request->middleName;
        $checkoutRequest->LastName = $request->lastName;
        $checkoutRequest->CellphoneNo = $request->phoneNumber;
        $checkoutRequest->Landline = $request->telNumber;

        $ItemPrice = 0;
        foreach ($request->items as $key  => $itemRequestedID) {
            $lastBid = App\Models\Admin\Bid::where('ItemID', $itemRequestedID)->get()->last();

            $ItemPrice = $ItemPrice + $lastBid->Price;
        }
        $checkoutRequest->ItemPrice = $ItemPrice;

        if($request->checkoutType == "Pick up"){
            $checkoutRequest->WarehouseNo = $request->warehouse;
            $checkoutRequest->ShippingFee = 0;

            foreach ($request->items as $key  => $itemRequestedID) {
                $item = App\Models\Admin\Item::find($itemRequestedID);

                $item->RequestedWarehouse = $request->warehouse;
                
                $item->save();
            }
        }
        else if($request->checkoutType == "Deliver"){
            $checkoutRequest->CityID = $request->city;
            $checkoutRequest->Barangay_Street_Address = $request->address;

            $city = App\Models\Admin\City::find($request->city);
            $shipment = App\Models\Admin\Shipment::where('ProvinceID', $city->province->ProvinceID)->first();

            $checkoutRequest->ShippingFee = $shipment->ShipmentFee;
        }

        $checkoutRequest->save();

        //checkoutrequest_item
        foreach ($request->items as $key  => $itemRequestedID) {
            $request_item = new App\Models\Admin\CheckoutRequest_Item;

            $request_item->CheckoutRequestID = $checkoutRequest->CheckoutRequestID;
            $request_item->ItemID = $itemRequestedID;
            $request_item->RequestDate = Carbon::now('Asia/Manila');

            $request_item->save();
        }

        return redirect('/checkout');
    }
}
