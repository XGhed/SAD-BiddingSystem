<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Delivery_3rdParty;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;

class Delivery3rdPartyController extends Controller
{
    public function manageDelivery3rdParty(){

       $results = App\Delivery_3rdParty::all();

       return view('deliveryParty')->with ('results', $results);
    }

    public function confirmDelivery3rdParty(Request $request){

		if (isset($_POST['add'])) {
			$this->insertDelivery3rdParty($request);
			$results = App\Delivery_3rdParty::all();
			return view('deliveryParty')->with ('results', $results)->with ('message', '1');
		}
		elseif (isset($_POST['edit'])) {
	        $this->updateDelivery3rdParty($request);
	        $results = App\Delivery_3rdParty::all();
			return view('deliveryParty')->with ('results', $results)->with ('message', '2');
	    }
	    elseif (isset($_POST['delete'])) {
	        $this->deleteDelivery3rdParty($request);
	        $results = App\Delivery_3rdParty::all();
			return view('deliveryParty')->with ('results', $results)->with ('message', '3');
	    }
    }

    public function insertDelivery3rdParty(Request $request){

		$delveryParty = new App\Delivery_3rdParty;

		$deliveryParty->3rdPartyName = $request->input('add_name');

		try {
			$deliveryParty->save();
		} catch (Exception $e) {
			return view('deliveryParty')->with ('results', $results)->with ('message', '-1');
		}
	}

	public function updateDelivery3rdParty(Request $request){

		$deliveryParty = new App\Delivery_3rdParty;
		$deliveryParty = App\Delivery_3rdParty::find($request->input('edit_ID'));

		$deliveryParty->Delivery3rdPartyName = $request->input('edit_name');

		try {
			$deliveryParty->save();
		} catch (Exception $e) {
			return view('deliveryParty')->with ('results', $results)->with ('message', '-1');
		}
	}

	public function deleteDelivery3rdParty(Request $request){
		$deliveryParty = new App\Delivery_3rdParty;
		$deliveryParty = App\Delivery_3rdParty::find($request->input('edit_ID'));
		
		try {
			$deliveryParty->delete();
		} catch (Exception $e) {
			return view('deliveryParty')->with ('results', $results)->with ('message', '-1');
		}
	}
}
