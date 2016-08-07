<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;

class ItemCheckingController extends Controller
{
    public function itemCheck(Request $request){
        try {
            $item = new App\Models\Admin\Item;
            $item = App\Models\Admin\Item::find($request->input('itemID'));
            $item->DefectDescription = $request->defectDesc;
            $item->status = 2;

            if($request->hasFile('add_photo')){
                $filename = rand(1000,100000)."-".$request->file('add_photo')->getClientOriginalName();
                $filepath = "photos/";
                $request->file('add_photo')->move($filepath, $filename);
                $item->image_path = $filepath.$filename;
            }

            $item->save();

            return redirect('itemChecking');

        } catch (Exception $e) {
            return redirect('itemChecking');
        }
    }
}
