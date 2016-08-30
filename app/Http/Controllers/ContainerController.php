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

    /*public function addItemToContainer(Request $request){
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
    }*/

    public function addItemToContainer(Request $request){
        for ($i=0; $i < $request->quantity ; $i++) { 
            $item = new App\Models\Admin\Item;

            $item->ContainerID = $request->containerID;
            $item->status = 0;
            $item->size = $request->size;
            $item->color = $request->color;
            $item->TransacDate = Carbon::now('Asia/Manila');
            $item->ItemModelID = $request->item;

            $item->save();
        }

        $this->colorDatabase($request->color);

        return redirect('/itemContainer?containerID=' . $request->containerID);
    }

    public function editItemToContainer(Request $request){
        $item = App\Models\Admin\Item::find($request->itemID);

        if($item->image_path == "" && $item->DefectDescription == ""){
            $item->size = $request->size;
            $item->color = $request->color;
            $item->TransacDate = Carbon::now('Asia/Manila');

            $item->save();

            $this->colorDatabase($request->color);
        }

        return redirect('/itemContainer?containerID=' . $request->containerID);
    }

    public function addUnexpectedItem(Request $request){
        for ($i=0; $i < $request->quantity; $i++) { 
            $container = App\Models\Admin\Container::find($request->containerID);

            $item = new App\Models\Admin\Item;

            $item->ContainerID = $request->containerID;
            $item->status = 1;
            $item->size = $request->size;
            $item->color = $request->color;
            $item->TransacDate = Carbon::now('Asia/Manila');
            $item->ItemModelID = $request->item;
            $item->CurrentWarehouse = $container->warehouse->WarehouseNo;
            $item->Unexpected = 1;

            $item->save();

            $this->ItemDeliveredLog($item);

            $this->colorDatabase($request->color);
        }

        return redirect('itemInbound');
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

    public function ItemDeliveredLog($item){
        $history = new App\Models\Admin\ItemHistory;

        $history->ItemID = $item->ItemID;
        $history->Date = Carbon::now('Asia/Manila');
        $history->Log = "Item successfully delivered to warehouse " . $item->current_warehouse->Barangay_Street_Address . ", " . $item->current_warehouse->city->province->ProvinceName . ", " . $item->current_warehouse->city->CityName;

        $history->save();
    }

    public function containerArrived(Request $request){
        $container = App\Models\Admin\Container::find($request->containerID);
        $container->ActualArrival = Carbon::now('Asia/Manila');
        $container->save();
        return 'success';
    }
}
