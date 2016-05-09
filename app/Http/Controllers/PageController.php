<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Business\MemberBusiness;
use App\Dal\MemberDao;
use App\Member;
use Illuminate\Http\Request;
use App\Http\Requests;


class PageController extends Controller
{

    public function homepage(Request $request){

       return view('customer.homepage');
    }

    public function bidItems(Request $request){

       return view('admin.bidItems');
    }

    public function shipmentAdd(Request $request){

       return view('shipmentAdd');
    }

    public function shipmentEdit(Request $request){

       return view('shipmentEdit');
    }

    public function warehouse(Request $request){

       return view('warehouse');
    }

    public function shipment(Request $request){

       return view('shipment');
    }

    public function bidEvent(Request $request){

       return view('admin.bidEvent');
    } 

    public function inventory(Request $request){

       return view('admin.inventory');
    }

    //customer

    public function register(Request $request){

       return view('customer.register');
    } 
}
