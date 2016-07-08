<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;

class ContainerController extends Controller
{
    public function addContainer(Request $request){
        $container = new App\Models\Admin\Container;
        
        $container->ContainerName = $request->container;
        $container->Arrival = $request->date . ' ' . $request->time;
        $container->SupplierID = $request->supplier;

        $container->save();

        return redirect('orderedItem');
    }

    public function getContainers(){

        $containers = App\Models\Admin\Container::with('Supplier')->get();

        return $containers;
    }
}
