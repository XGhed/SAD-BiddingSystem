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

        if($request->checkoutType == "Pick up"){
            $checkoutRequest->WarehouseNo = $request->warehouse;
        }
        else if($request->checkoutType == "Deliver"){
            $checkoutRequest->CityID = $request->city;
            $checkoutRequest->Barangay_Street_Address = $request->address;
        }

        $checkoutRequest->save();

        return redirect('/checkout');
    }
}
