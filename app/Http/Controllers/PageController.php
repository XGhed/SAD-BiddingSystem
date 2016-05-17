<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Business\MemberBusiness;
use App\Dal\MemberDao;
use App\Member;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Admin;


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

    public function checkout(Request $request){

       return view('customer.checkout');
    }

    public function bidEvent(Request $request){

       return view('admin.bidEvent');
    } 

    public function inventory(Request $request){

       return view('admin.inventory');
    }

    public function admin(Request $request){

       return view('admin.admin');
    }

    public function discount(Request $request){

       return view('admin.discount');
    }

    //customer

    public function register(Request $request){

       return view('customer.register');
    } 

    public function custItems(Request $request){

       return view('customer.items');
    }

    public function auction(Request $request){

       return view('customer.auction');
    }

    public function cart(Request $request){

       return view('customer.cart');
    }
}
