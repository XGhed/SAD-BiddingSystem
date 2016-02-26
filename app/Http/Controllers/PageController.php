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

       return view('homepage');
    }

    public function registration(Request $request){

       return view('registration');
    }

    public function paymentMethod(Request $request){

       return view('modePayment');
    }

    public function keyword(Request $request){

       return view('keyword');
    }

    public function manageAccounts(Request $request){

       return view('accounts');
    }   

    public function accType(Request $request){

       return view('accountType');
    }  

    public function manageSupplier(Request $request){

       return view('supplier');
    } 

    public function deliveryParty(Request $request){

       return view('deliveryParty');
    }

    public function deliveryCompany(Request $request){

       return view('deliveryCompany');
    }

    public function manageCategory(Request $request){

       return view('category');
    } 

    public function manageSubcategory(Request $request){

       return view('subcategory');
    } 

    public function bidEvent(Request $request){

       return view('bid_event');
    } 

    public function manageItem(Request $request){

       return view('item');
    }

    public function regItems(Request $request){

       return view('regItems');
    } 

    public function addMember(Request $request){

    	$member = new Member();
    	$memberBusiness = new MemberBusiness();

    	$member->firstName = $request->input('firstName');
    	$member->middleName = $request->input('middleName');
    	$member->lastName = $request->input('lastName');
    	$member->address = $request->input('address');

    	$memberBusiness->saveMember($member);
    }

    public function insertMember(){
    	return view('insertMember');
    }
}
