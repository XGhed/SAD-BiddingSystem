<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;

class CustomerBiddingEventController extends Controller
{
    public function eventItems(Request $request){
    	$categories = App\Models\Admin\Category::with('subCategory')->get();

        $auction = App\Models\Admin\Auction::find($request->eventID);

        $currentDatetime = Carbon::now('Asia/Manila');
        $auctionEndTime = explode(' ', $auction->EndDateTime);
        $currentDatetime = explode(' ', $currentDatetime);

        /*if ($currentDatetime[0] > $auctionEndTime[0] || ($currentDatetime[0] == $auctionEndTime[0] && $currentDatetime[1] > $auctionEndTime[1])){
            return "Event has ended";
        }*/

        $joinbid = App\Models\Admin\Joinbid::where('AuctionID', $request->eventID)->where('AccountID', $request->session()->get('accountID'))->get();

        if (count($joinbid) > 0){
            $joined = 'true';
        }
        else {
            $joined = 'false';
        }

    	return view('customer.items')->with('categories', $categories)->with('eventID', $request->eventID)->with('joined', $joined);
    }

    public function itemsView(Request $request){
        $categories = App\Models\Admin\Category::with('subCategory')->get();

        $auction = App\Models\Admin\Auction::find($request->eventID);

        $currentDatetime = Carbon::now('Asia/Manila');
        $auctionEndTime = explode(' ', $auction->EndDateTime);
        $currentDatetime = explode(' ', $currentDatetime);

        /*if ($currentDatetime[0] > $auctionEndTime[0] || ($currentDatetime[0] == $auctionEndTime[0] && $currentDatetime[1] > $auctionEndTime[1])){
            return "Event has ended";
        }*/


        return view('customer.eventViewingOnly')->with('categories', $categories)->with('eventID', $request->eventID);
    }

    public function allItemsInEvent(Request $request){
        $items = App\Models\Admin\Item::with('itemModel', 'itemDefect', 'item_auction', 'bids', 'bids.account')->get();
        $itemsOnAuction = [];

        foreach ($items as $key => $item) {
            foreach ($item->item_auction as $key => $itemauction){
                if($itemauction->AuctionID == $request->eventID){
                    array_push($itemsOnAuction, $item);
                }
            }
        }

        return $itemsOnAuction;
    }

    public function itemsOfSubcategory(Request $request){
    	$items = App\Models\Admin\Item::with('itemModel', 'itemDefect', 'item_auction', 'bids', 'bids.account')->get();
    	$itemsOnAuction = [];
    	$returndata = [];

    	foreach ($items as $key => $item) {
    		foreach ($item->item_auction as $key => $itemauction){
    			if($itemauction->AuctionID == $request->eventID){
    				array_push($itemsOnAuction, $item);
    			}
    		}
    	}

    	foreach ($itemsOnAuction as $key => $item) {
    		if($item->itemModel->subCategory->SubCategoryID == $request->subcatID){
    			array_push($returndata, $item);
    		}
    	}

    	return $returndata;
    }

    public function joinEvent(Request $request){
        $joinbid = new App\Models\Admin\Joinbid;

        $joinbid->AccountID = $request->session()->get('accountID');
        $joinbid->AuctionID = $request->eventID;
        $joinbid->DateJoined = Carbon::now('Asia/Manila');

        $joinbid->save();

        return 'success';
    }

    public function hasJoinedThisEvent(Request $request){
        $joinbid = App\Models\Admin\Joinbid::where('AuctionID', $request->eventID)->where('AccountID', $request->session()->get('accountID'))->get();

        if (count($joinbid) > 0){
            return 'true';
        }
        else {
            return 'false';
        }
    }

    public function auction(Request $request){
        $item = App\Models\Admin\Item::with('itemModel', 'item_auction')->where('ItemID', $request->itemID)->first();

        $auction = App\Models\Admin\Auction::find($item->item_auction->last()->AuctionID);

        $currentDatetime = Carbon::now('Asia/Manila');
        $auctionEndTime = explode(' ', $auction->EndDateTime);
        $currentDatetime = explode(' ', $currentDatetime);

        if ($currentDatetime[0] > $auctionEndTime[0] || ($currentDatetime[0] == $auctionEndTime[0] && $currentDatetime[1] > $auctionEndTime[1])){
            return redirect('/items?eventID='.$request->eventID);
        }

        return view('customer.auction')->with('item', $item)->with('eventID', $request->eventID)->with('accountID', $request->session()->get('accountID'));
    }

    public function bidItem(Request $request){
        $auction = App\Models\Admin\Auction::find($request->eventID);
        //if bid is lower than highest bid
        $currentBids = App\Models\Admin\Bid::where('ItemID', $request->itemID)->where('AuctionID', $request->eventID)->orderBy('Price', 'desc')->get();

        if (count($currentBids) > 0){
            //cant bid twice in a row
            if($currentBids->first()->AccountID == $request->session()->get('accountID')){
                return "Can't bid consecutively";
            }

            //check if passed min bid
            $highestBid = $currentBids->first()->Price;
            $nextMinimumBid = $highestBid + floor($highestBid * ($auction->NextBidPercent / 100));

            if($nextMinimumBid > $request->price){
                return 'Someone bidded higher';
            }
        }

        //if bid is lower than starting price
        $item_auction = App\Models\Admin\Item_Auction::where('ItemID', $request->itemID)->get()->last();
        if($request->price < $item_auction->ItemPrice){
            return 'Your bid is lower than the starting price';
        }

        //add bid
        $bid = new App\Models\Admin\Bid;

        $bid->AccountID = $request->session()->get('accountID');
        $bid->ItemID = $request->itemID;
        $bid->AuctionID = $request->eventID;
        $bid->Price = $request->price;
        $bid->DateTime = Carbon::now('Asia/Manila');

        $bid->save();

        //make a winner
        $winner = new App\Models\Admin\Winner;
        $winner->ItemID = $request->itemID;
        $winner->AccountID = $request->session()->get('accountID');

        $item = App\Models\Admin\Item::find($request->itemID);
        $winner->AuctionID = $item->item_auction->last()->AuctionID;
        $winner->BidID = $bid->BidID;

        $winner->save();

        return 'success';
    }

    public function getHighestBid(Request $request){
        $bid = App\Models\Admin\Bid::with('item')->where('ItemID', $request->itemID)->where('AuctionID', $request->eventID)->get()->sortByDesc('Price')->first();

        return $bid->Price;
    }

    public function getBidHistory(Request $request){
        $bids = App\Models\Admin\Bid::with('account', 'item')->where('ItemID', $request->itemID)->where('AuctionID', $request->eventID)
        ->orderBy('DateTime', 'desc')->get();

        return $bids;
    }

    public function bidList(Request $request){        
        $bids = App\Models\Admin\Bid::where('AccountID', $request->session()->get('accountID'))->get();

        return view('customer.bidList')->with('bids', $bids);
    }

    public function myBidsTabData(Request $request){
        $returnData = [];

        $myBids = App\Models\Admin\Bid::where('AccountID', $request->session()->get('accountID'))
            ->where('AuctionID', $request->eventID)->get()->groupBy('ItemID');

        foreach ($myBids as $key => $myBid) {
            $biddedItem = App\Models\Admin\Item::with('itemModel')->where('ItemID', $myBid->last()->ItemID)->first();
            $currentHighestBid = App\Models\Admin\Bid::where('ItemID', $myBid->last()->ItemID)->get()->last();

            $data = new \stdClass();
            $data->item = $biddedItem;
            $data->myBid = $myBid->last();
            $data->highestBid = $currentHighestBid;

            array_push($returnData, $data);
        }

        return $returnData;
    }
}
