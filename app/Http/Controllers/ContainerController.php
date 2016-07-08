<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;

class ContainerController extends Controller
{
    public function viewContainer(Request $request){
        $container = App\Models\Admin\Container::find($request->containerID);

        return view('admin1.itemContainer')->with('container', $container);
    }

    public function addItemToContainer(Request $request){
        $item = new App\Models\Admin\Item;

        $item->ContainerID = $request->containerID;
        $item->DefectDescription = $request->defectDesc;
        $item->status = 0;
        $item->size = $request->size;
        $item->color = $request->color;
        $item->TransacDate = Carbon::now('Asia/Manila');
        $item->ItemModelID = $request->item;

        $filename = null;
        $filepath = null;

        if ($request->hasFile('add_photo')) {
            $filename = rand(1000,100000)."-".$request->file('add_photo')->getClientOriginalName();
            $filepath = "photos/";
            $request->file('add_photo')->move($filepath, $filename);
            $item->image_path = $filepath . $filename;
        }

        $item->save();

        return redirect('/itemContainer?containerID=' . $request->containerID);
    }
}
