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


class PostEventNoBidItemsController extends Controller
{
    public function postEventsList(){
        $auctions = App\Models\Admin\Auction::with('item_auction', 'item_auction.item', 'item_auction.item.itemModel', 'item_auction.item.bids')->get();

        $removed = 0;
        foreach($auctions as $key => $auction){
            $currentDatetime = Carbon::now('Asia/Manila');
            $currentDatetime = explode(' ', $currentDatetime);
            $auctionEndTime = explode(' ', $auction->EndDateTime);

            if ($currentDatetime[0] > $auctionEndTime[0] || ($currentDatetime[0] == $auctionEndTime[0] && $currentDatetime[1] > $auctionEndTime[1])){
                //count items
                $noBidItems = 0;
                foreach($auction->item_auction as $key2 => $item_auction){
                    if(count($item_auction->item->bids) < 1){
                        $noBidItems++;
                    }
                }
                
                $auctions[$key]['noBidItems'] = $noBidItems;
            }
            else {
                $auction->splice($key-$removed, 1);
                $removed++;
            }
        }

        return $auctions;
    }

    public function postEventProcessItems(Request $request){
        if($request->dispose !== null){
            foreach($request->items as $key => $itemID){
                $pullRequest = new App\Models\Admin\PullRequest;

                $pullRequest->ItemID = $itemID;
                $pullRequest->RequestDate = Carbon::now('Asia/Manila');

                $pullRequest->save();

                $item = App\Models\Admin\Item::find($itemID);
                $this->ItemLog(
                        $item, 
                        "Item requested for disposal"
                        );

                $item_auction = App\Models\Admin\Item_Auction::where('ItemID', $itemID);
                $item_auction->delete();
            }
        }
        else if ($request->return !== null){
            foreach($request->items as $key => $itemID){
                $item_auction = App\Models\Admin\Item_Auction::where('ItemID', $itemID);
                $item_auction->delete();
            }
        }

        return redirect('postEventNoBidItems');
    }
}
