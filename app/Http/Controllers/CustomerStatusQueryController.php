<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use App\Models\Admin;
use Illuminate\Support\Collection;

class CustomerStatusQueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Customerstatus(Request $request)
    {

            $member = App\Models\Admin\Membership::all();

           

                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('customer.Customer-status', [
                    'members' => $member
                ]);

                return $dompdf->stream();
                return view('customer.Customer-status')->with('members', $member);
    }

    public function DeliveryPlaces()
    {
        $place = App\Models\Admin\Shipment::where('ShipmentFee', '>', 0)->get();
                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('customer.DeliveryPlacesQuery', [
                    'places' => $place
                ]);

                return $dompdf->stream();
                return view('customer.DeliveryPlacesQuery')->with('places', $place);
    }

    public function SuppliersItems()
    {
        $supplier = App\Models\Admin\Container::all();
                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('customer.SupplierItemQuery',[
                    'suppliers' => $supplier
                ]);

                return $dompdf->stream();
                return view('customer.SupplierItemQuery')->with('suppliers', $supplier);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}
