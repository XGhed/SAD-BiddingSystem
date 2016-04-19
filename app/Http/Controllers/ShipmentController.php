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
            $shipment = new App\Shipment;
            $shipment = App\Shipment::find($request->input('edit_ID'));

            $shipment->ShipmentName = trim($request->input('edit_name'));
            $shipment->CityID = trim($request->input('edit_city'));
            $shipment->Barangay_Street_Address = trim($request->input('edit_barangaystreet'));
            $shipment->ShipmentContactNo = trim($request->input('edit_contactNo'));
            $shipment->ShipmentEmail = trim($request->input('edit_email'));

            $shipment->save();
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
