<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Input;
use Response;
use Carbon\Carbon;

class AngularInput extends Controller
{
    public function disposeItem(Request $request){
        $pullRequest = new App\Models\Admin\PullRequest;

        $pullRequest->ItemID = $request->itemID;
        $pullRequest->RequestDate = Carbon::now('Asia/Manila');

        $pullRequest->save();

        return "success";
    }

    public function cancelDisposeItem(Request $request){
        $pullRequest = App\Models\Admin\PullRequest::where('ItemID', $request->itemID)->first();

        $pullRequest->delete();

        return "success";
    }

    public function confirmDispose(Request $request){
        $item = App\Models\Admin\Item::find($request->itemID);

        if(count($item->pullRequest) > 0){
            $item->status = 2;
            $item->save();

            $pullRequest = App\Models\Admin\PullRequest::where('ItemID', $request->itemID)->first();
            $pullRequest->delete();

            $itemhistory = new App\Models\Admin\ItemHistory;
            $itemhistory->ItemID = $request->itemID;
            $itemhistory->Log = "Item successfully pulled out (disposed)";
            $itemhistory->Date = Carbon::now('Asia/Manila');
            $itemhistory->save();

            return 'success';
        }
    }
}
