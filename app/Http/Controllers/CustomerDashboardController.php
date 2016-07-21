<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;

class CustomerDashboardController extends Controller
{
    public function getOngoingEvent(){
        $events = App\Models\Admin\Auction::all();

        $returndata = [];

        $currentDatetime = Carbon::now('Asia/Manila');
        $currentDatetime = explode(' ', $currentDatetime);

        foreach ($events as $key => $event) {
            $eventStartDatetime = explode(' ', $event->StartDateTime);
            $eventEndDateTime = explode(' ', $event->EndDateTime);
            
            if(($eventStartDatetime[0] == $currentDatetime[0] && $eventStartDatetime[1] <= $currentDatetime[1]) || ($eventStartDatetime[0] < $currentDatetime[0])){//starttime
                if(($eventEndDateTime[0] == $currentDatetime[0] && $eventEndDateTime[1] >= $currentDatetime[1]) || ($eventEndDateTime[0] > $currentDatetime[0])){//endtime
                    array_push($returndata, $event);
                }
            }
        }
        return $returndata;
    }
}
