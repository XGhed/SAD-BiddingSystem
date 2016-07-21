<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;
use DB;

class BiddingEventController extends Controller
{
    public function eventList(){
        $events = App\Models\Admin\Auction::all();
        
        return $events;
    }

    public function eventDetails(Request $request){
        $event = App\Models\Admin\Auction::find($request->eventID)->first();
        
        return $event;
    }

    public function addBiddingEvent(Request $request){
        $event = new App\Models\Admin\Auction;

        $start = $request->startdate . ' ' . $request->starttime;
        $end = $request->enddate . ' ' . $request->endtime;

        $event->EventName = $request->eventname;
        $event->StartDateTime = $start;
        $event->EndDateTime = $end;
        $event->Description = $request->description;

        $event->save();

        return redirect('/biddingEvent');
    }

    public function viewEventItems(Request $request){
        $eventID = $request->eventID;

        return view('admin1.bidItems')->with('eventID', $eventID);
    }

    public function getEventItems(Request $request){
        $items_auction = App\Models\Admin\Item_Auction::with('item', 'item.itemModel')->where('AuctionID', $request->eventID)->get();

        return $items_auction;
    }

    public function itemsToAddToEvent(Request $request){
        $items = App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category', 'container', 
            'container.Supplier', 'container.warehouse', 'container.warehouse.city', 'container.warehouse.city.province', 'itemHistory', 'item_auction')
            ->where('status', 1)
            ->where('ItemModelID', $request->itemID)
            ->get();

        $returndata = [];

        foreach ($items as $key => $item) {
            if(count($item->item_auction) == 0){
                array_push($returndata, $item);
            }
        }

        return $returndata;
    }

    public function addItemToAuction(Request $request){
        $item_auction = new App\Models\Admin\Item_Auction;

        $item_auction->AuctionID = $request->eventID;
        $item_auction->ItemID = $request->itemID;
        $item_auction->ItemPrice = $request->price;
        $item_auction->Points = $request->points;

        $item_auction->save();

        $returndata = App\Models\Admin\Item_Auction::with('item', 'item.itemModel')->where('AuctionID', $request->eventID)
        ->where('ItemID', $item_auction->ItemID)
        ->first();

        return $returndata;
    }

    public function removeFromEvent(Request $request){
        $item_auction = App\Models\Admin\Item_Auction::find($request->itemID);

        $item_auction->delete();

        return 'success';
    }
}
