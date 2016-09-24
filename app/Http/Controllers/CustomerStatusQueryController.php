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
            $dash = App\Models\Admin\adminDashboard::get()->last();

            $data = [];
            $data['dashboard'] = $dash;
            $data['members'] = $member;

                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('admin1.Queries.Customer-status', $data);

                return $dompdf->stream();
                //return view('admin1.Queries.Customer-status')->with('members', $member);
    }

    public function DeliveryCompany()
    {
        $place = App\Models\Admin\Shipment::where('CompanyCourier', '=', 1)->get();

        $dash = App\Models\Admin\adminDashboard::get()->last();

            $data = [];
            $data['dashboard'] = $dash;
            $data['places'] = $place;

                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('admin1.Queries.DeliveryCompanyQuery', $data);

                return $dompdf->stream();
                // return view('admin1.Queries.DeliveryCompanyQuery')->with('places', $place);
    }

    public function DeliveryThirdparty()
    {
        $place = App\Models\Admin\Shipment::where('CompanyCourier', '=', 0)->get();

        $dash = App\Models\Admin\adminDashboard::get()->last();
            $data = [];
            $data['dashboard'] = $dash;
            $data['places'] = $place;

                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('admin1.Queries.DeliveryThirdPartyQuery', $data);

                return $dompdf->stream();
                // return view('admin1.Queries.DeliveryThirdPartyQuery')->with('places', $place);
    }

    public function SuppliersItems()
    {
        // $supplier = App\Models\Admin\Item::distinct('Item')->where('status', '2')->get();
        // $missing = App\Models\Admin\Item::where('status', '2');
        $dash = App\Models\Admin\adminDashboard::get()->last();

        $supplier = App\Models\Admin\Supplier::get();
        $item = App\Models\Admin\Item::with('itemModel', 'container', 'container.supplier', 'supplier')->where('status', 1)
        ->orWhere('status', 2)->orWhere('status', -1)->get();
        $returnData = NULL;
        $previtem = NULL;
        $holditem = NULL;
        $ctr = 0;
        $ctr2 = 0;

        foreach ($supplier as $key => $result) {
            $a = count($item);
            for ($i=0; $i < $a; $i++) { 
                if($item[$i]->container->supplier->SupplierID==$result->SupplierID){
                    if(!isset($returnData[$ctr])){
                        $returnData[$ctr]["SupplierName"] = $result->SupplierName;
                        $returnData[$ctr]["Status"] = $result->Status;
                        if($item[$i]->status==1){
                            $returnData[$ctr]["Items"] = $item[$i]->itemModel->ItemName;
                            $returnData[$ctr]["Found"] = 1;
                            $returnData[$ctr]["Missing"] = 0;
                        }
                        if($item[$i]->status==2){
                            $returnData[$ctr]["Items"] = $item[$i]->itemModel->ItemName;
                            $returnData[$ctr]["Found"] = 1;
                            $returnData[$ctr]["Missing"] = 0;
                        }
                        if($item[$i]->status==-1){
                            $returnData[$ctr]["Found"] = 0;
                            $returnData[$ctr]["Missing"] = 1;
                        }
                        $previtem[0][$ctr2] = $item[$i]->itemModel->ItemName;
                        $ctr2++;
                    } else{
                        $j = count($previtem[0]);
                        for($k=0; $k<$j; $k++){
                            if($previtem[0][$k]==$item[$i]->itemModel->ItemName){
                                if($item[$i]->status==1){
                                    $returnData[$ctr]["Found"]++;
                                }
                                if($item[$i]->status==2){
                                    $returnData[$ctr]["Found"]++;
                                }
                                if($item[$i]->status==-1){
                                    $returnData[$ctr]["Missing"]++;
                                }
                                break;
                            }
                            if($k+1==$j){
                                if($item[$i]->status==1){
                                    $returnData[$ctr]["Found"]++;
                                    $previtem[0][$ctr2] = $item[$i]->itemModel->ItemName;
                                    $holditem[0] = $item[$i]->itemModel->ItemName.", ".$returnData[$ctr]["Items"];
                                    $returnData[$ctr]["Items"] = $holditem[0];
                                }
                                if($item[$i]->status==2){
                                    $returnData[$ctr]["Found"]++;
                                    $previtem[0][$ctr2] = $item[$i]->itemModel->ItemName;
                                    $holditem[0] = $item[$i]->itemModel->ItemName.", ".$returnData[$ctr]["Items"];
                                    $returnData[$ctr]["Items"] = $holditem[0];
                                }
                                if($item[$i]->status==-1){
                                    $returnData[$ctr]["Missing"]++;
                                    $previtem[0][$ctr2] = $item[$i]->itemModel->ItemName;
                                    $holditem[0] = $item[$i]->itemModel->ItemName.", ".$returnData[$ctr]["Items"];
                                    $returnData[$ctr]["Items"] = $holditem[0];
                                }
                                $ctr2++;
                            }
                        }
                    }
                }
            }
            $ctr++;
            $ctr2 = 0;
            $previtem[0] = NULL;
        }

        $ctr = 0;
        foreach ($supplier as $key => $result) {
            $i = count($returnData);
            for ($j=0; $j < $i; $j++) { 
                if($returnData[$j]["SupplierName"]==$result->SupplierName){
                    $ctr++;
                    break;
                }
                if($j+1==$i){
                    $returnData[$ctr]["SupplierName"] = $result->SupplierName;
                    $returnData[$ctr]["Status"] = $result->Status;
                    $ctr++;
                }
            }
        }

        // return $returnData;


            $data = [];
            $data['dashboard'] = $dash;
            // $data['suppliers'] = $supplier;
            $data['data'] = $returnData;
            // $data['statusmissing'] = $missing;

                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('admin1.Queries.SupplierItemQuery', $data);

                return $dompdf->stream();
                // return view('admin1.Queries.SupplierItemQuery')->with('suppliers', $supplier);
    }

    public function PendingContainer()
    {
        $pend = App\Models\Admin\Container::where('ActualArrival', '=', NULL)->get();

        $dash = App\Models\Admin\adminDashboard::get()->last();
            $data = [];
            $data['dashboard'] = $dash;
            $data['pending'] = $pend;

                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('admin1.Queries.PendingContainerQuery', $data);

                return $dompdf->stream();
                // return view('admin1.Queries.PendingContainerQuery')->with('pending', $pend);
    }

    public function PendingItem()
    {
        $pending = App\Models\Admin\Item::where('status', '=', 0)->get();

        $dash = App\Models\Admin\adminDashboard::get()->last();
            $data = [];
            $data['dashboard'] = $dash;
            $data['pendingItem'] = $pending;

                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('admin1.Queries.PendingItemQuery', $data);

                return $dompdf->stream();
                // return view('admin1.Queries.PendingItemQuery')->with('pendingItem', $pending);
    }

    public function PendingCheckout()
    {
        $pendingCheck = App\Models\Admin\CheckoutRequest::where('Status', '=', 0)->get();

        $dash = App\Models\Admin\adminDashboard::get()->last();
            $data = [];
            $data['dashboard'] = $dash;
            $data['pendingCheckout'] = $pendingCheck;

                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('admin1.Queries.PendingCheckoutQuery', $data);

                return $dompdf->stream();
                // return view('admin1.Queries.PendingCheckoutQuery')->with('pendingCheckout', $pendingCheck);
    }

    public function PendingAccount()
    {
        $pendingAccount = App\Models\Admin\Account::where('status', '=', 0)->get();

        $dash = App\Models\Admin\adminDashboard::get()->last();
            $data = [];
            $data['dashboard'] = $dash;
            $data['pendingAcc'] = $pendingAccount;

                $dompdf = App::make('dompdf.wrapper');
            
                $dompdf->loadView('admin1.Queries.PendingAccountQuery', $data);

                return $dompdf->stream();
                // return view('admin1.Queries.PendingAccountQuery')->with('pendingAcc', $PendingAccount);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}
