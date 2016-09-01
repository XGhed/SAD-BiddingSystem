<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;

class HomepageController extends Controller
{
    public function displayHomepage(Request $request){

    	$isLoggedIn = $this->verifyCustomer($request);


    	if($isLoggedIn == 'true'){
    		return redirect('/eventsList');
    	}
    	else {
    		return view('customer.homepageContent');
    	}
    }
}
