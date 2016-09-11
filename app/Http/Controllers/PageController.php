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
use Carbon\Carbon;


class PageController extends Controller
{

    public function tryPage(){
        $checkoutRequests = App\Models\Admin\CheckoutRequest::all();

        foreach ($checkoutRequests as $key => $checkoutRequest) {
          $current = Carbon::now('Asia/Manila');

          $checkoutDate = collect(explode(' ', $checkoutRequest->RequestDate));

          $checkoutDate->date = explode('-', $checkoutDate[0]);
          $checkoutDate->time = explode(':', $checkoutDate[1]);

          $checkoutDate = collect([
            'date' => $checkoutDate->date,
            'time' => $checkoutDate->time
            ]);

          $checkDateTime = Carbon::now();
          $checkDateTime->timezone = 'Asia/Manila';
          $checkDateTime->year($checkoutDate['date'][0])->month($checkoutDate['date'][1])->day($checkoutDate['date'][2])
                  ->hour($checkoutDate['time'][0])->minute($checkoutDate['time'][1])->second($checkoutDate['time'][2])
                  ->toDateTimeString();

          if ($current->diffInDays($checkDateTime, false) <= -7){
            foreach ($checkoutRequest->checkoutRequest_Item as $key => $checkoutRequest_Item) {
              $request_item = App\Models\Admin\CheckoutRequest_Item::find($checkoutRequest_Item->CheckoutRequest_ItemID);
              $request_item->delete();

              $item = App\Models\Admin\Item::find($request_item->ItemID);
              $this->ItemLog(
                  $item,
                  'Checkout request for this item has been forfeited.'
                );
            }
            $checkoutRequest->delete();
          }
        }
    }

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

       return view('customer.userProfile');
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

    public function sampleGraph(Request $request){

      return view('admin1.Queries.sampleGraph');
    }    
}



