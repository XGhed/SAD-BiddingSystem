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

class CustomerCartController extends Controller
{
    public function view(Request $request){
        $isLoggedIn = $this->verifyCustomer($request);
        
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
        
        return view('customer.cart')->with('itemsWon', $itemsWon)->with('isLoggedIn', $isLoggedIn);
    }
}
