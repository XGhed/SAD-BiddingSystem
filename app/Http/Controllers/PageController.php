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


    //New Mainte

    public function dashboard(Request $request){

       return view('admin1.dashboard');
    } 

    public function supplier1(Request $request){

       return view('admin1.supplier');
    } 

    public function category1(Request $request){

       return view('admin1.category');
    } 

    public function item1(Request $request){

       return view('admin1.item');
    }

    public function accountType1(Request $request){

       return view('admin1.accountType');
    } 

    public function discount1(Request $request){

       return view('admin1.discount');
    }

    public function shipment1(Request $request){

       return view('admin1.shipment');
    }

    public function warehouse1(Request $request){

       return view('admin1.warehouse');
    }

    public function inventory1(Request $request){

       return view('admin1.inventory');
    }

    public function orderedItem(Request $request){

       return view('admin1.orderedItem');
    }

    public function itemInbound(Request $request){

       return view('admin1.itemInbound');
    }


    public function itemContainer(Request $request){

       return view('admin1.itemContainer');
    }

    public function bidEvent1(Request $request){

       return view('admin1.bidEvent');
    }

    public function bidItems1(Request $request){

       return view('admin1.bidItems');
    }

    public function bidList(Request $request){

       return view('customer.bidList');
    }
}
