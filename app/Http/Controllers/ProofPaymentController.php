<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Input;
use Response;
use Carbon\Carbon;

class ProofPaymentController extends Controller
{
    public function getPendingCheckoutRequests(Request $request){
        $checkoutRequests = App\Models\Admin\CheckoutRequest::with('checkoutRequest_Item', 'checkoutRequest_Item.item',
        'checkoutRequest_Item.item.itemModel', 'checkoutRequest_Item.item.bids', 'account', 'account.membership', 'account.membership.accounttype')
        ->where('AccountID', $request->session()->get('accountID'))
            ->whereIn('Status', [0, 1])->get();

        return $checkoutRequests;
    }

    public function getPendingCheckoutRequestsWithProof(Request $request){
        $checkoutRequests = App\Models\Admin\CheckoutRequest::with('checkoutRequest_Item', 'checkoutRequest_Item.item',
        'checkoutRequest_Item.item.itemModel', 'checkoutRequest_Item.item.bids', 'proofs', 'account', 'account.membership', 'account.membership.accounttype')
        ->whereHas('proofs', function($query){}, '>', 0)
        ->where('AccountID', $request->session()->get('accountID'))
            ->whereIn('Status', [0, 1])->get();

        return $checkoutRequests;
    }

    public function insert(Request $request){
        foreach ($request->images as $key => $image) {
            $proofPayment = new App\Models\Admin\ProofPayment;

            $proofPayment->CheckoutRequestID = $request->checkoutRequest;

            $filename = rand(1000,100000)."-".$image->getClientOriginalName();
            $filepath = "photos/";
            $image->move($filepath, $filename);
            $proofPayment->image_path = $filepath.$filename;

            $proofPayment->save();
        }

        return redirect('proofPayment');
    }

    public function delete(Request $request){
        $proofPayment = App\Models\Admin\ProofPayment::find($request->proofID);

        $proofPayment->delete();

        return 'success';
    }
}
