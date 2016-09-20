<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

class CustomerStatusQueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Customerstatus()
    {
                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('customer.Customer-status');

                return $dompdf->stream();
    }

    public function mostBids()
    {
                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('customer.Mostbid');

                return $dompdf->stream();
    }

    public function DeliveryPlaces()
    {
                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('customer.DeliveryPlacesQuery');

                return $dompdf->stream();
    }

    public function SuppliersItems()
    {
                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('customer.SupplierItemQuery');

                return $dompdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}
