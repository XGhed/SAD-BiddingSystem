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
}
