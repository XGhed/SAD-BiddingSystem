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
use Illuminate\Support\Collection;

class BiddingEventController extends Controller
{
    public function view(Request $request){
        $events = App\Models\Admin\Auction::orderBy('StartDateTime', 'desc')->orderBy('EndDateTime', 'desc')->
        paginate(6);

        return view('admin1.Transaction.bidEvent')->with('events', $events);
    }

    public function eventDetails(Request $request){        
        $event = App\Models\Admin\Auction::find($request->eventID);

        //return $event;

        $start = collect(explode(' ', $event->StartDateTime));
        $end = collect(explode(' ', $event->EndDateTime));

        $start->date = explode('-', $start[0]);
        $start->time = explode(':', $start[1]);

        $end->date = explode('-', $end[0]);
        $end->time = explode(':', $end[1]);

        $start = collect([
            'date' => $start->date,
            'time' => $start->time
            ]);

        $end = collect([
            'date' => $end->date,
            'time' => $end->time
            ]);

        $startDateTime = Carbon::now();
        $endDateTime = Carbon::now();
        $startDateTime->timezone = 'Asia/Manila';
        $endDateTime->timezone = 'Asia/Manila';

        $startDateTime->year($start['date'][0])->month($start['date'][1])->day($start['date'][2])
        ->hour($start['time'][0])->minute($start['time'][1])->second($start['time'][2])
        ->toDateTimeString();

        $endDateTime->year($end['date'][0])->month($end['date'][1])->day($end['date'][2])
        ->hour($end['time'][0])->minute($end['time'][1])->second($end['time'][2])
        ->toDateTimeString();

        $event->remainingTime = Carbon::now('Asia/Manila')->diffInSeconds($endDateTime);

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

        return view('admin1.Transaction.bidItems')->with('eventID', $eventID);
    }

    public function getEventItems(Request $request){
        $items_auction = App\Models\Admin\Item_Auction::with('item', 'item.itemModel')->where('AuctionID', $request->eventID)->get();

        return $items_auction;
    }

    public function itemsToAddToEvent(Request $request){
        $items = App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category', 'container', 
            'container.Supplier', 'container.warehouse', 'container.warehouse.city', 'container.warehouse.city.province', 'itemHistory', 'item_auction')
            ->where('status', 2)
            ->where('ItemModelID', $request->itemID)
            ->whereHas('pullRequest', function($query){}, '<', 1)
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

        $item = App\Models\Admin\Item::find($request->itemID);
        $auction = App\Models\Admin\Auction::find($request->eventID);
        $this->ItemLog(
                $item, 
                "Item added to event " . $auction->EventName . ' with price of P' . $item_auction->ItemPrice . ' and ' . $item_auction->Points . ' points'
                );

        return $returndata;
    }

    public function removeFromEvent(Request $request){
        $item_auction = App\Models\Admin\Item_Auction::find($request->itemID);

        $current = Carbon::now('Asia/Manila');

        $eventStarted = collect(explode(' ', $item_auction->auction->StartDateTime));

        $eventStarted->date = explode('-', $eventStarted[0]);
        $eventStarted->time = explode(':', $eventStarted[1]);

        $eventStarted = collect([
          'date' => $eventStarted->date,
          'time' => $eventStarted->time
          ]);

        $startDateTime = Carbon::now();
        $startDateTime->timezone = 'Asia/Manila';
        $startDateTime->year($eventStarted['date'][0])->month($eventStarted['date'][1])->day($eventStarted['date'][2])
                ->hour($eventStarted['time'][0])->minute($eventStarted['time'][1])->second($eventStarted['time'][2])
                ->toDateTimeString();

        if ($current->diffInMinutes($startDateTime->addSeconds(60), false) >= 0){
            return 'event has started';
        }
        else {
            $item_auction->delete();
        }

        $item = App\Models\Admin\Item::find($request->itemID);
        $auction = App\Models\Admin\Auction::find($item_auction->AuctionID);
        $this->ItemLog(
                $item, 
                "Item removed from event " . $auction->EventName
                );

        return 'success';
    }
}
