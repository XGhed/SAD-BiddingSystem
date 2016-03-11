<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShipmentController extends Controller
{
    public function manageShipment(){

       $results = App\Shipment::all();
       $provinces = App\Province::orderBy('ProvinceName')->get();
       $cities = App\City::all();

       return view('shipment')->with ('results', $results)->with ('provinces', $provinces);
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
            $shipment = new App\Shipment;

            $shipment->ShipmentName = $request->input('add_name');
            $shipment->CityID = $request->input('add_city');
            $shipment->Barangay_Street_Address = $request->input('add_barangay_street');
            $shipment->ShipmentContactNo = $request->input('add_contactNo');
            $shipment->ShipmentEmail = $request->input('add_email');

            $shipment->save();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('shipment');
        }
    }

    public function updateShipment(Request $request){

        try {
            $shipment = new App\Shipment;
            $shipment = App\Shipment::find($request->input('edit_ID'));

            $shipment->ShipmentName = $request->input('edit_name');
            $shipment->CityID = $request->input('edit_city');
            $shipment->Barangay_Street_Address = $request->input('edit_barangaystreet');
            $shipment->ShipmentContactNo = $request->input('edit_contactNo');
            $shipment->ShipmentEmail = $request->input('edit_email');

            $shipment->save();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('shipment');
        }
    }

    public function deleteShipment(Request $request){
        try {
            $shipment = new App\Shipment;
            $shipment = App\Shipment::find($request->input('edit_ID'));
        
            $shipment->delete();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('shipment');
        }
    }
}
