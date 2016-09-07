<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;

class GraphController extends Controller
{
    public function salesGraph(Request $request){
       /* $item = App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category', 'item_auction',
            'item_auction.auction.AuctionID', 'item_auction.auction.EndDateTime', 'item_auction.ItemID', 'item_auction.Price')
            ->where('status', 3)->whereHas('container', function($query){
                $query->whereNotNull('ActualArrival');
            })->get();

        $items = array(array());
        foreach ($items as $key => $result) {
            if ((is_null($item)) || (is_null($item[$key][]))) {
                $item2 = array($result->item_auction.ItemID, array($result->item_auction.Price));
                $item = array_push($item, $item2);
            } else if($item[$key][]==$result->item_auction.ItemID){
                $price = $item[$key][0];
                $price2 = $price + $result->item_auction.Price;
                $item[$key][0] = $price2;
            }
        }*/

        $items = array(1, 2, 3, 4);

        return view('admin1.Queries.sampleGraph')->with ('items', $items);
    }
}
