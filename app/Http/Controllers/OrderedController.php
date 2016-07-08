<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;

class OrderedController extends Controller
{
    public function addContainer(Request $request){
        $container = new App\Models\Admin\Container;
        
        $container->ContainerName = $request->container;
        $container->Arrival = $request->date . ' ' . $request->time;
        $container->SupplierID = $request->supplier;
        $container->WarehouseNo = $request->warehouse;

        $container->save();

        return redirect('orderedItem');
    }
}
