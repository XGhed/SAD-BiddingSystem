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
        $colors = App\Models\Admin\Color::all()->sortBy('ColorName');

        return view('admin1.itemContainer')->with('container', $container)->with('colors', $colors);
    }

    public function addItemToContainer(Request $request){
        $filename = null;
        $filepath = null;

        if ($request->hasFile('add_photo')) {
            $filename = rand(1000,100000)."-".$request->file('add_photo')->getClientOriginalName();
            $filepath = "photos/";
            $request->file('add_photo')->move($filepath, $filename);
        }

        for ($j=0; $j<$request->quantity; $j++){
            $this->insert($request, $filepath, $filename);
        }

        return redirect('/itemContainer?containerID=' . $request->containerID);
    }

    public function insert(Request $request, $filepath, $filename){
        $item = new App\Models\Admin\Item;

        $item->ContainerID = $request->containerID;
        $item->DefectDescription = $request->defectDesc;
        $item->status = 0;
        $item->size = $request->size;
        $item->color = $request->color;
        $item->TransacDate = Carbon::now('Asia/Manila');
        $item->ItemModelID = $request->item;
        $item->image_path = $filepath . $filename;

        $item->save();

        $this->colorDatabase($request->color);
    }

    public function colorDatabase($color){
        $findColor = App\Models\Admin\Color::where('ColorName', $color)->get();

        if(count($findColor) > 0){
            return;
        }
        else{
            $insertColor = new App\Models\Admin\Color;
            $insertColor->ColorName = $color;
            $insertColor->save();
            return;
        }
    }
}
