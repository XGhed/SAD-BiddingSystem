<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;

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
        $items = App\Models\Admin\Item_Auction::find($request->eventID);

        return $items;
    }
}
