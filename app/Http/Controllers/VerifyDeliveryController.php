<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;

class VerifyDeliveryController extends Controller
{
    public function verifyDelivery(Request $request){
        foreach($request->requests as $key => $req){
            $checkoutRequest = App\Models\Admin\CheckoutRequest::find($req);

            $checkoutRequest->Status = 4;

            $checkoutRequest->save();

            return redirect('deliveryStatus');
        }
    }
}
