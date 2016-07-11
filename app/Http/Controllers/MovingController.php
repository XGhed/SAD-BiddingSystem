<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;

class MovingController extends Controller
{
    public function itemMoveRequest(Request $request){
        foreach ($request->movingItems as $key => $movingItem) {
            $item = App\Models\Admin\Item::find($movingItem);

            $item->RequestedWarehouse = $request->warehouse;
            $item->save();
        }

        return redirect('movingOfItems');
    }
}
