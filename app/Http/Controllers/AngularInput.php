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

        $item = App\Models\Admin\Item::find($request->itemID);
        $this->ItemLog(
                $item, 
                "Item requested for disposal"
                );

        return "success";
    }

    public function cancelDisposeItem(Request $request){
        $pullRequest = App\Models\Admin\PullRequest::where('ItemID', $request->itemID)->first();

        $pullRequest->delete();

        $item = App\Models\Admin\Item::find($request->itemID);
        $this->ItemLog(
                $item, 
                "Item request for disposal cancelled"
                );

        return "success";
    }

    public function confirmDispose(Request $request){
        $item = App\Models\Admin\Item::find($request->itemID);

        if(count($item->pullRequest) > 0){
            $item->status = 3;
            $item->save();

            $this->ItemLog(
                $item, 
                "Item successfully pulled out (disposed)"
                );

            return 'success';
        }
    }

    public function approveAccount(Request $request){
        $account = App\Models\Admin\Account::where('accountID', $request->accountID)->first();

        $account->status = 1;
        $account->save();

        return 'success';
    }

    public function deleteOrderedItem(Request $request){
        $item = App\Models\Admin\Item::find($request->itemID);

        if($item->image_path == "" && $item->DefectDescription == ""){
            $item->delete();
            return 'success';
        }
        else {
            return 'Item already checked!';
        }
    }

    public function moveCheckItem(Request $request){
        $item = App\Models\Admin\Item::find($request->itemID);
        $inventory = new App\Models\Admin\Inventory;

        $inventory->ItemID = $item->ItemID;
        $inventory->WarehouseNo = $item->CurrentWarehouse;
        $inventory->save();

        return 'success';
    }
}
