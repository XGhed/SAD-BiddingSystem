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

    	return view('customer.items')->with('categories', $categories)->with('eventID', $request->eventID);
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
}
