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
        $checkoutRequests = App\Models\Admin\CheckoutRequest::where('Status', 1)->get();

        return $checkoutRequests;
    }

    public function approvePayment(Request $request){
        $checkoutRequest = App\Models\Admin\CheckoutRequest::find($request->checkoutRequestID);

        $checkoutRequest->Status = 2;

        $checkoutRequest->save();

        return 'success';
    }
}
