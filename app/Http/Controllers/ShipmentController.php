<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Session;

class ShipmentController extends Controller
{
    public function manageShipment(){

       $results = App\ThirdParty::all();
       $provinces = App\Province::orderBy('ProvinceName')->get();

       return view('shipment')->with ('results', $results)->with ('provinces', $provinces);
       //return view('shipment')->with ('provinces', $provinces);
    }

    public function addShipment(){

       $results = App\ThirdParty::all();
       $provinces = App\Province::orderBy('ProvinceName')->get();

       return view('shipmentAdd')->with ('results', $results)->with ('provinces', $provinces);
       //return view('shipment')->with ('provinces', $provinces);
    }

    public function editShipment(Request $request){

       $result = App\ThirdParty::find($request->input('del_ID'));
       $provinces = App\Province::orderBy('ProvinceName')->get();
       $selectedProvinces = array();
       foreach ($result->province_ThirdParty as $key => $pt) {
           array_push($selectedProvinces, $pt->ProvinceID);
       }
       
       return view('shipmentEdit')->with ('result', $result)->with ('provinces', $provinces)->with ('selectedProvinces', $selectedProvinces);
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
            $shipment = new App\ThirdParty;
            $shipment->PartyName = $request->input('add_name');
            $shipment->save();

            foreach ($request->input('add_prov') as $key => $add_prov) {
                $provThird = new App\ProvinceThirdParty;
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
            $shipment = new App\ThirdParty;
            $shipment = App\ThirdParty::find($request->input('edit_ID'));
            $shipment->PartyName = $request->input('add_name');
            $shipment->save();

            $currentRecords = new App\ProvinceThirdParty;
            $currentRecords = App\ProvinceThirdParty::where('PartyID', $request->input('edit_ID'))->get();

            foreach ($currentRecords as $key => $currentRecord) {
                $currentRecord->delete();
            }

            foreach ($request->input('add_prov') as $key => $add_prov) {
                $provThird = new App\ProvinceThirdParty;
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
            $shipment = new App\ThirdParty;
            $shipment = App\ThirdParty::find($request->input('del_ID'));

            foreach ($shipment->province_ThirdParty as $key => $provThird) {
                $provThird->delete();
            }
        
            $shipment->delete();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('shipment');
        }
    }
}
