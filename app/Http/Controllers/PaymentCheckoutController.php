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

class PaymentCheckoutController extends Controller
{
    public function unpaidRequests(Request $request){
        $checkoutRequests = App\Models\Admin\CheckoutRequest::with('checkoutRequest_Item', 'checkoutRequest_Item.item',
        'checkoutRequest_Item.item.itemModel', 'checkoutRequest_Item.item.bids', 'proofs', 'account', 'account.membership', 'account.membership.accounttype')
        ->where('Status', 1)->get();

        foreach ($checkoutRequests as $key => $checkoutRequest) {
            $checkoutRequests[$key]->discount = $this->customerDiscount($checkoutRequest->AccountID);
        }

        return $checkoutRequests;
    }

    public function approvePayment(Request $request){
        $checkoutRequest = App\Models\Admin\CheckoutRequest::find($request->checkoutRequestID);

        $checkoutRequest->Status = 2;
        $checkoutRequest->PaymentDate = Carbon::now('Asia/Manila');

        $checkoutRequest->save();

        //add points to customer
        $additionalPoints = 0;
        foreach ($checkoutRequest->checkoutRequest_Item as $key => $checkoutRequest_Item) {
            $additionalPoints += $checkoutRequest_Item->item->item_auction->last()->Points;
        }

        $account = App\Models\Admin\Account::find($checkoutRequest->AccountID);

        $account->Points += $additionalPoints;

        $account->save();

        return 'success';
    }
}
