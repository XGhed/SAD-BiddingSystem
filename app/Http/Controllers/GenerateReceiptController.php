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

class GenerateReceiptController extends Controller
{
    public function view(Request $request){
        $dash = App\Models\Admin\AdminDashboard::get()->last();

        $checkoutRequest = App\Models\Admin\CheckoutRequest::find($request->checkoutID);

        $customerDiscount = $this->customerDiscount($request->session()->get('accountID'));

        $account = App\Models\Admin\Account::find($request->session()->get('accountID'));
        $customerServiceFee = $account->membership[0]->accounttype->ServiceFee;

        $itemsCheckedOut = [];
        $ItemPrice = 0;
        foreach ($checkoutRequest->checkoutRequest_Item as $key  => $checkoutRequest_Item) {
            $lastBid = App\Models\Admin\Bid::where('ItemID', $checkoutRequest_Item->ItemID)->get()->last();

            $ItemPrice = $ItemPrice + $lastBid->Price;  //YUNG $lastBid->Price DITO YUNG PRICE PER ITEM, PWEDENG KOPYAHIN MO TONG LOOP NA TO

            $it = App\Models\Admin\Item::find($checkoutRequest_Item->ItemID);

            $itemPush = new \stdClass();
            $itemPush->itemName = $it->itemModel->ItemName;
            $itemPush->price = $lastBid->Price;

            array_push($itemsCheckedOut, $itemPush);
        }
        //compute discounted price
        $discountedPrice = round($ItemPrice - ($ItemPrice * ($customerDiscount / 100)), 2);

        $data = [];
        $data['dashboard'] = $dash;
        $data['checkoutRequest'] = $checkoutRequest;
        $data['customerDiscount'] = $customerDiscount;
        $data['discountedPrice'] = $discountedPrice;
        $data['customerServiceFee'] = $customerServiceFee;
        $data['itemsCheckedOut'] = $itemsCheckedOut;

        $dompdf = App::make('dompdf.wrapper');
                
        $dompdf->loadView('customer.Receipt', $data);

        return $dompdf->stream();
    }
}
