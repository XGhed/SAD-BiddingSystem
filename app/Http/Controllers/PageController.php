<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Business\MemberBusiness;
use App\Dal\MemberDao;
use App\Member;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;


class PageController extends Controller
{
    public function homepage(Request $request){

       return view('customer.homepage');
    }


    public function checkout(Request $request){

       return view('customer.checkout');
    }


    public function inventory(Request $request){

       return view('admin1.Transaction.inventory');
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

       return view('admin1.Dashboard.dashboard');
    } 

    public function announcements(Request $request){

       return view('admin1.Utilities.announcements');
    } 

    public function messages(Request $request){

       return view('admin1.Utilities.messages');
    }

    public function problemTypes(Request $request){

       return view('admin1.Maintenance.problemTypes');
    }

    public function inbox(Request $request){

       return view('customer.messages');
    } 

 /*   public function supplier1(Request $request){

       return view('admin1.supplier');
    } */

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

       return view('admin1.Transaction.orderedItem');
    }

    public function itemContainer(Request $request){

       return view('admin1.Transaction.itemContainer');
    }

    public function accountApproval(Request $request){

       return view('admin1.Queries.accountApproval');
    }

    public function itemPullouts(Request $request){

       return view('admin1.Transaction.itemPullouts');
    }

    public function movingItems(Request $request){

       return view('admin1.Transaction.movingOfItems');
    } 

    public function approvalOfMovingItems(Request $request){

       return view('admin1.Transaction.approvalOfMovingItems');
    } 

    public function bidItems1(Request $request){

       return view('admin1.bidItems');
    }

    public function bidList(Request $request){

       return view('customer.bidList');
    }

    public function eventsList(Request $request){
      return view('customer.eventsList');
    }

    public function userProfile(Request $request){

       return view('customer.transactionHistory');
    }

    public function bidHistory(Request $request){

       return view('customer.bidHistory');
    }

    public function deliveryStatus(Request $request){

       return view('customer.deliveryStatus');
    }

    public function listOfBidders(Request $request){

       return view('admin1.Queries.listOfBidders');
    }

    public function itemChecking(Request $request){
       $defects = App\Models\Admin\ItemDefect::all();

       return view('admin1.Transaction.itemChecking')->with('defects', $defects);
    }

    public function itemOutbound(Request $request){

       return view('admin1.Transaction.itemOutbound');
    }

    public function prepareCheckout(Request $request){

       return view('admin1.Transaction.prepareCheckout');
    }

    public function paymentCheckout(Request $request){

       return view('admin1.Transaction.paymentCheckout');
    }

    public function postEventNoBidItems(Request $request){

       return view('admin1.Transaction.postEventNoBidItems');
    }

    public function expectedItemPercent(Request $request){

      return view('admin1.Queries.expectedItemPercent');
    }

    public function reportPage(Request $request){

      return view('customer.reportPage');
    }

    public function proofPayment(Request $request){

      return view('customer.proofOfPayment');
    }

    public function sampleGraph(Request $request){

      return view('admin1.Queries.sampleGraph');
    }    
}



