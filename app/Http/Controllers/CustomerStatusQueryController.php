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
            
                $dompdf->loadView('admin1.Queries.Customer-status', [
                    'members' => $member
                ]);

                return $dompdf->stream();
                return view('admin1.Queries.Customer-status')->with('members', $member);
    }

    public function DeliveryCompany()
    {
        $place = App\Models\Admin\Shipment::where('CompanyCourier', '=', 1)->get();
                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('admin1.Queries.DeliveryCompanyQuery', [
                    'places' => $place
                ]);

                return $dompdf->stream();
                return view('admin1.Queries.DeliveryCompanyQuery')->with('places', $place);
    }

    public function DeliveryThirdparty()
    {
        $place = App\Models\Admin\Shipment::where('CompanyCourier', '=', 0)->get();
                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('admin1.Queries.DeliveryThirdPartyQuery', [
                    'places' => $place
                ]);

                return $dompdf->stream();
                return view('admin1.Queries.DeliveryThirdPartyQuery')->with('places', $place);
    }

    public function SuppliersItems()
    {
        $supplier = App\Models\Admin\Item::all();
                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('admin1.Queries.SupplierItemQuery',[
                    'suppliers' => $supplier
                ]);

                return $dompdf->stream();
                return view('admin1.Queries.SupplierItemQuery')->with('suppliers', $supplier);
    }

    public function PendingContainer()
    {
        $pend = App\Models\Admin\Container::where('ActualArrival', '=', NULL)->get();
                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('admin1.Queries.PendingContainerQuery',[
                    'pending' => $pend
                ]);

                return $dompdf->stream();
                return view('admin1.Queries.PendingContainerQuery')->with('pending', $pend);
    }

    public function PendingItem()
    {
        $pending = App\Models\Admin\Item::where('status', '=', 0)->get();
                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('admin1.Queries.PendingItemQuery',[
                    'pendingItem' => $pending
                ]);

                return $dompdf->stream();
                return view('admin1.Queries.PendingItemQuery')->with('pendingItem', $pending);
    }

    public function PendingCheckout()
    {
        $pendingCheck = App\Models\Admin\CheckoutRequest::where('Status', '=', 0)->get();
                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('admin1.Queries.PendingCheckoutQuery',[
                    'pendingCheckout' => $pendingCheck
                ]);

                return $dompdf->stream();
                return view('admin1.Queries.PendingCheckoutQuery')->with('pendingCheckout', $pendingCheck);
    }

    public function PendingAccount()
    {
        $pendingAccount = App\Models\Admin\Account::where('status', '=', 0)->get();
                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('admin1.Queries.PendingAccountQuery',[
                    'pendingAcc' => $pendingAccount
                ]);

                return $dompdf->stream();
                return view('admin1.Queries.PendingAccountQuery')->with('pendingAcc', $PendingAccount);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}
