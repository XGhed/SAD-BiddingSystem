<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Collection;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function verifyCustomer(Request $request)
    {
        if ($request->session()->has('accountID')){
            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function ItemLog($item, $log){
        $history = new App\Models\Admin\ItemHistory;

        $history->ItemID = $item->ItemID;
        $history->Date = Carbon::now('Asia/Manila');
        $history->Log = $log;

        $history->save();
    }
}
