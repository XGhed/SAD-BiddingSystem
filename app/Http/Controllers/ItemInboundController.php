<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;

class ItemInboundController extends Controller
{
    public function itemDelivered(Request $request){
        foreach ($request->delivereditems as $key => $ItemID) {
            $item = App\Models\Admin\Item::find($ItemID);
            $item->status = 1;
            $item->CurrentWarehouse = $item->container->warehouse->WarehouseNo;

            $item->save();

            $this->ItemDeliveredLog($item);
        }

        return redirect('itemInbound');
    }

    public function ItemDeliveredLog($item){
        $history = new App\Models\Admin\ItemHistory;

        $history->ItemID = $item->ItemID;
        $history->Log = "Item successfully delivered to warehouse " . $item->current_warehouse->Barangay_Street_Address;

        $history->save();
    }
}
