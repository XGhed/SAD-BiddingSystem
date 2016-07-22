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

        $joinbid = App\Models\Admin\Joinbid::where('AuctionID', $request->eventID)->where('AccountID', session('accountID'))->get();

        if (count($joinbid) > 0){
            $joined = 'true';
        }
        else {
            $joined = 'false';
        }

    	return view('customer.items')->with('categories', $categories)->with('eventID', $request->eventID)->with('joined', $joined);
    }

    public function itemsOfSubcategory(Request $request){
    	$items = App\Models\Admin\Item::all();
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

        $joinbid->AccountID = session('accountID');
        $joinbid->AuctionID = $request->eventID;
        $joinbid->DateJoined = Carbon::now('Asia/Manila');

        $joinbid->save();

        return 'success';
    }

    public function hasJoinedThisEvent(Request $request){
        $joinbid = App\Models\Admin\Joinbid::where('AuctionID', $request->eventID)->where('AccountID', session('accountID'))->get();

        if (count($joinbid) > 0){
            return 'true';
        }
        else {
            return 'false';
        }
    }

    public function auction(Request $request){
        $item = App\Models\Admin\Item::with('itemModel', 'item_auction')->where('ItemID', $request->itemID)->first();

        return view('customer.auction')->with('item', $item);
    }

    public function bidItem(Request $request){
        $bid = new App\Models\Admin\Bid;

        $bid->AccountID = session('accountID');
        $bid->ItemID = $request->itemID;
        $bid->Price = $request->price;
        $bid->DateTime = Carbon::now('Asia/Manila');

        $bid->save();

        return 'success';
    }

    public function getHighestBid(Request $request){
        $bid = App\Models\Admin\Bid::with('item')->where('ItemID', $request->itemID)->get()->sortByDesc('Price')->first();

        return $bid->Price;
    }

    public function getBidHistory(Request $request){
        $bids = App\Models\Admin\Bid::with('account', 'item')->where('ItemID', $request->itemID)->get();

        return $bids;
    }

    public function bidList(Request $request){
        $bids = App\Models\Admin\Bid::where('AccountID', session('accountID'))->get();

        return view('customer.bidList')->with('bids', $bids);
    }
}
