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

            $item->save();
        }

        return redirect('itemInbound');
    }
}
