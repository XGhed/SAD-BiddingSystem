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

        return view('admin1.Transaction.itemContainer')->with('container', $container)->with('colors', $colors);
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
        $request->color = $this->colorDatabase($request->color);

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

        $this->ItemLog(
                $item, 
                "Item added to container " . $item->container->ContainerName . ' and expected to be delivered at ' . $item->container->warehouse->Barangay_Street_Address . ", " . $item->container->warehouse->city->province->ProvinceName . ", " . $item->container->warehouse->city->CityName
                );

        return redirect('/itemContainer?containerID=' . $request->containerID);
    }

    public function editItemToContainer(Request $request){
        $request->color = $this->colorDatabase($request->color);

        $item = App\Models\Admin\Item::find($request->itemID);

        if($item->image_path == "" && $item->DefectDescription == ""){
            $item->size = $request->size;
            $item->color = $request->color;
            $item->TransacDate = Carbon::now('Asia/Manila');

            $item->save();
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

            $this->ItemLog(
                $item, 
                "Item successfully delivered to warehouse " . $item->current_warehouse->Barangay_Street_Address . ", " . $item->current_warehouse->city->province->ProvinceName . ", " . $item->current_warehouse->city->CityName
                );

            $this->colorDatabase($request->color);
        }

        return redirect('itemInbound');
    }

    public function containerArrived(Request $request){
        $container = App\Models\Admin\Container::find($request->containerID);

        if(count($container->Item)){
            $container->ActualArrival = Carbon::now('Asia/Manila');
            $container->save();
            return 'success';
        }
        else {
            return 'empty';
        }
    }
}
