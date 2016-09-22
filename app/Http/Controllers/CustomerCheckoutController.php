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
        $account = App\Models\Admin\Account::find($request->session()->get('accountID'));
        $customerDiscount = $this->customerDiscount($request->session()->get('accountID'));

        $joinBid = App\Models\Admin\Joinbid::where('AccountID', $request->session()->get('accountID'))
            ->where('Paid', 0)->get();

        $eventFee = 0;

        foreach ($joinBid as $key => $j) {
            $eventFee += $j->auction->EventFee;
        }

        return view('customer.checkout')->with('account', $account)->with('customerDiscount', $customerDiscount)
            ->with('joinBid', $joinBid)->with('eventFee', $eventFee)->with('serviceFee', $account->membership[0]->accounttype->ServiceFee);
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
        $account = App\Models\Admin\Account::find($request->session()->get('accountID'));

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

            $ItemPrice = $ItemPrice + $lastBid->Price;  //YUNG $lastBid->Price DITO YUNG PRICE PER ITEM, PWEDENG KOPYAHIN MO TONG LOOP NA TO
        }
        //compute discounted price
        $discountedPrice = round($ItemPrice - ($ItemPrice * ($customerDiscount / 100)), 2);
        $ItemPrice = round($discountedPrice + ($discountedPrice * ($account->membership[0]->accounttype->ServiceFee / 100)), 2);

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

        //eventFees
        $joinBid = App\Models\Admin\Joinbid::where('AccountID', $request->session()->get('accountID'))
            ->where('Paid', 0)->get();

        $eventFee = 0;

        //tag event fees as paid
        foreach ($joinBid as $key => $jB) {
            $joinBidPaid = App\Models\Admin\Joinbid::find($jB->JoinbidID);
            $joinBidPaid->Paid = 1;
            $joinBidPaid->save();

            //compute Event fee
            $eventFee += $jB->auction->EventFee;
        }

        $checkoutRequest->EventFee = $eventFee;

        $checkoutRequest->save();

        //checkoutrequest_item
        foreach ($request->items as $key  => $itemRequestedID) {
            $request_item = new App\Models\Admin\CheckoutRequest_Item;

            $request_item->CheckoutRequestID = $checkoutRequest->CheckoutRequestID;
            $request_item->ItemID = $itemRequestedID;
            $request_item->RequestDate = Carbon::now('Asia/Manila');

            $request_item->save();
        }

        //ITO ANG LOOP PARA SA BAWAT ITEM NA NAPANALUNAN NG BIDDER NA ISINAMA NIYA SA KANYANG CHECKOUT REQUEST NA GINAWA
        foreach ($request->items as $key  => $itemRequestedID) {
            $item = App\Models\Admin\Item::find($itemRequestedID);

            //kung ano mang gagawin mo
        }
        return redirect('/checkout');

        /*
        ITO MGA KAILANGAN MO JOANNE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!:)))
        $checkoutRequest->CheckoutRequestID; //ID ng request
        $checkoutRequest->ItemPrice = $ItemPrice; //total Item Price
        $checkoutRequest->CheckoutType // either Deliver or Pick up
        $checkoutRequest->EventFee // bayad sa event joining
        $checkoutRequest->ShippingFee // shiping f33

        */
        //$checkoutType = array(App\Models\Admin\CheckoutRequest_Item::all()->last());

        //GANTO YUNG PAGPASA BHOI
        return $this->index($request, $checkoutRequest);
    }


    public function index(Request $request, $checkoutRequest){        
        //ITO SAMPLE NG PAGGAMIT BHOI
        //example irereturn mo lang ID nya, ganto. YUNG MGA NAKASULAT SA TAAS NA MGA PRICES, GAGANA RIN DITO YON
        //return $checkoutRequest->CheckoutRequestID;

           // var_dump($request->checkoutType);
        //$dompdf = new Dompdf();
        // $customerDiscount = $this->customerDiscount($request->session()->get('accountID'));
        $checkoutType = array(App\Models\Admin\CheckoutRequest_Item::all()->last());

        
       /* $ItemPrice = 0;
        foreach ($request->items as $key  => $itemRequestedID) {
            $lastBid = App\Models\Admin\Bid::where('ItemID', $itemRequestedID)->get()->last();

            $ItemPrice = $ItemPrice + $lastBid->Price;
        }
        //compute discounted price
        $ItemPrice = $ItemPrice - ($ItemPrice * ($customerDiscount / 100));
        $checkoutRequest->ItemPrice = $ItemPrice;*/

        foreach ($checkoutType as $key) {
            
            if($key->CheckoutRequest->CheckoutType == 'Deliver'){

                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('customer.Pdf', [
                    'checkout' => $checkoutType
                ]);
                $check = $checkoutRequest->ItemPrice = $ItemPrice; //total Item Price        

                return $dompdf->stream();
             
                return view('customer.Pdf')->with('checkout', $key); 
            }

            else if($key->CheckoutRequest->CheckoutType == 'Pick up'){
                $dompdf = App::make('dompdf.wrapper');
                
                $dompdf->loadView('customer.pdfPickUp', [
                    'checkout' => $checkoutType
                ]);
                return $dompdf->stream(); 
                
                $check = $checkoutRequest->ItemPrice = $ItemPrice; //total Item Price
                return view('customer.pdfPickUp')->with('checkout', $key)->with('check', $check);  
            }
            
        }
     
    }

    public function checkoutList(Request $request){
        $checkoutRequests = App\Models\Admin\CheckoutRequest::where('AccountID', $request->session()->get('accountID'))->get();

        return $checkoutRequests;
    }
}
