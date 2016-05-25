<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;

class ShipmentController extends Controller
{
    public function manageShipment(){

       $this->fillTableFirstRun();

       $results = App\Models\Admin\Shipment::all();
       $provinces = App\Models\Admin\Province::orderBy('ProvinceName')->get();
       $comp_Prov = App\Models\Admin\Shipment::where('CompanyCourier', true)->get();

       $companyProvinces = array();

       foreach ($comp_Prov as $key => $c) {
           array_push($companyProvinces, $c->ProvinceID);
       }

       return view('admin.shipment')->with ('results', $results)->with ('provinces', $provinces)->with ('companyProvinces', $companyProvinces);
       //return view('shipment')->with ('provinces', $provinces);
    }
/*
    public function addShipment(){

       $results = App\Models\Admin\ThirdParty::all();
       $provinces = App\Models\Admin\Province::orderBy('ProvinceName')->get();

       return view('admin.shipmentAdd')->with ('results', $results)->with ('provinces', $provinces);
       //return view('shipment')->with ('provinces', $provinces);
    }

    public function editShipment(Request $request){

       $result = App\Models\Admin\ThirdParty::find($request->input('del_ID'));
       $provinces = App\Models\Admin\Province::orderBy('ProvinceName')->get();
       $selectedProvinces = array();
       foreach ($result->province_ThirdParty as $key => $pt) {
           array_push($selectedProvinces, $pt->ProvinceID);
       }
       
       return view('admin.shipmentEdit')->with ('result', $result)->with ('provinces', $provinces)->with ('selectedProvinces', $selectedProvinces);
    }

    public function confirmShipment(Request $request){

        if (isset($_POST['add'])) {
            $this->insertShipment($request);
            Session::put('message', '1');
            return redirect('shipment');
        }
        elseif (isset($_POST['edit'])) {
            $this->updateShipment($request);
            Session::put('message', '2');
            return redirect('shipment');
        }
        elseif (isset($_POST['delete'])) {
            $this->deleteShipment($request);
            Session::put('message', '3');
            return redirect('shipment');
        }
    }    

    public function insertShipment(Request $request){

        try {
            $shipment = new App\Models\Admin\ThirdParty;
            $shipment->PartyName = $request->input('add_name');
            $shipment->save();

            foreach ($request->input('add_prov') as $key => $add_prov) {
                $provThird = new App\Models\Admin\ProvinceThirdParty;
                $provThird->PartyID = $shipment->PartyID;
                $provThird->ProvinceID = $add_prov;

                $provThird->save();
            }

        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('shipment');
        }
    }

    public function updateShipment(Request $request){

        try {
            $shipment = new App\Models\Admin\ThirdParty;
            $shipment = App\Models\Admin\ThirdParty::find($request->input('edit_ID'));
            $shipment->PartyName = $request->input('add_name');
            $shipment->save();

            $currentRecords = new App\Models\Admin\ProvinceThirdParty;
            $currentRecords = App\Models\Admin\ProvinceThirdParty::where('PartyID', $request->input('edit_ID'))->get();

            foreach ($currentRecords as $key => $currentRecord) {
                $currentRecord->delete();
            }

            foreach ($request->input('add_prov') as $key => $add_prov) {
                $provThird = new App\Models\Admin\ProvinceThirdParty;
                $provThird->PartyID = $shipment->PartyID;
                $provThird->ProvinceID = $add_prov;

                $provThird->save();
            }

        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('shipment');
        }
    }

    public function deleteShipment(Request $request){
        try {
            $shipment = new App\Models\Admin\ThirdParty;
            $shipment = App\Models\Admin\ThirdParty::find($request->input('del_ID'));

            $currentRecords = new App\Models\Admin\ProvinceThirdParty;
            $currentRecords = App\Models\Admin\ProvinceThirdParty::where('PartyID', $shipment->PartyID)->get();

            foreach ($currentRecords as $key => $record) {
                $record->delete();
            }
        
            $shipment->delete();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('shipment');
        }
    }
*/
    public function updateShipment(Request $request){ 
        try {
            $this->resetCompanyCourier();

            foreach ($request->input('add_prov') as $key => $add_prov) {
                $shipment = new App\Models\Admin\Shipment;
                $shipment = App\Models\Admin\Shipment::where('ProvinceID', $add_prov)->first();
                
                $shipment->CompanyCourier = true;
                $shipment->save();
            }
            
        } catch (Exception $e) {
            
        }

        return redirect('shipment');
    }

    public function updateShipmentFee(Request $request){ 
        try {
            foreach ($request->input('add_prov') as $key => $add_prov) {
                $shipment = new App\Models\Admin\Shipment;
                $shipment = App\Models\Admin\Shipment::where('ProvinceID', $add_prov)->first();
                
                $shipment->ShipmentFee = trim($request->input('add_price'));
                $shipment->save();
            }
            
        } catch (Exception $e) {
            
        }

        return redirect('shipment');
    }

    function fillTableFirstRun(){
        $provinces = new App\Models\Admin\Province;
        $shipments = new App\Models\Admin\Shipment;

        $shipments = App\Models\Admin\Shipment::all();
        $provinces = App\Models\Admin\Province::all();

        if (count($shipments) == 0){
            foreach ($provinces as $key => $province) {
                $shipment = new App\Models\Admin\Shipment;
                $shipment->ProvinceID = $province->ProvinceID;
                $shipment->save();
            }
        }
    }

    function resetCompanyCourier(){
        $shipments = new App\Models\Admin\Shipment;
        $shipments = App\Models\Admin\Shipment::all();

        foreach ($shipments as $key => $shipment) {
            $shipment->CompanyCourier = false;
            $shipment->save();
        }
    }
}
