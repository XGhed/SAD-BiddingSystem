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
        $checkoutRequests = App\Models\Admin\CheckoutRequest::where('AccountID', $request->session()->get('accountID'))
            ->whereIn('Status', [0, 1])->get();

        return $checkoutRequests;
    }
}
