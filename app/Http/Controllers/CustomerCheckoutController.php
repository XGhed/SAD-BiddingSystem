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
        $customerDiscount = $this->customerDiscount($request->session()->get('accountID'));

        return view('customer.checkout')->with('customerDiscount', $customerDiscount);
    }

    public function itemsWon(Request $request){
        $items = App\Models\Admin\Item::has('checkoutRequest_item', '<', 1)->
            orWhereHas('checkoutRequest_item', function($query){
                $query->whereHas('checkoutRequest', function($query){
                    $query->where('Status', '>=', 0);
                });
            }, '<', 1)->get();
        $itemsWon = [];

        foreach ($items as $key => $item) {
            if (count($item->winners) > 0){
                //check if not yet checked out
                
                if ($item->winners->last()->bid->AccountID == $request->session()->get('accountID')){
                    //check if event has ended
                    $currentDatetime = Carbon::now('Asia/Manila');
                    $currentDatetime = explode(' ', $currentDatetime);
                    $auctionEndTime = explode(' ', $item->winners->first()->auction->EndDateTime);

                    if ($currentDatetime[0] > $auctionEndTime[0] || ($currentDatetime[0] == $auctionEndTime[0] && $currentDatetime[1] > $auctionEndTime[1])){
                        $item->DateTime = $item->winners->last()->bid->DateTime;
                        $item->Price = $item->winners->last()->bid->Price;
                        $item->Model = $item->itemModel->ItemName;
                        array_push($itemsWon, $item);
                    }

                }
                
                
            }
        }
        
        $itemsWon = collect($itemsWon);

        return $itemsWon;
    }

    public function insert(Request $request){
        $checkoutRequest = new App\Models\Admin\CheckoutRequest;
        $customerDiscount = $this->customerDiscount($request->session()->get('accountID'));

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
        //compute discounted price
        $ItemPrice = $ItemPrice - ($ItemPrice * ($customerDiscount / 100));
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

        return redirect('/pdfFile');
    }

    public function checkoutList(Request $request){
        $checkoutRequests = App\Models\Admin\CheckoutRequest::where('AccountID', $request->session()->get('accountID'))->get();

        return $checkoutRequests;
    }
}
