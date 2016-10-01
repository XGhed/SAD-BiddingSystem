<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;


class GraphController extends Controller
{
    public function salesGraph(Request $request){
        if (isset($_POST['date'])) {
            $item = $this->salesGraphDate($request);
            return view('admin1.Reports.salesGraphDate')->with('item', $item);
        } elseif (isset($_POST['region'])){
            $item = $this->salesGraphReg($request);
            //return $item;
            return view('admin1.Reports.salesGraphReg')->with('item', $item);
        } else{
            return $this->salesGraphCat($request);
            //return view('admin1.Reports.salesGraph')->with('item', $item);
        }
    }

    public function mostBid(Request $request){
        if (isset($_POST['category'])) {
            $item = $this->mostBidCat($request);
            //return $item;
            //return $item;
            return view('admin1.Reports.mostBidCat')->with('item', $item);
        } else if(isset($_POST['item'])){
            $item = $this->mostBidItemDate($request);
            return view('admin1.Reports.mostBidItem')->with('item', $item);
        } else{
            $item = $this->mostBidItem($request);
            //return $item;
            return view('admin1.Reports.mostBidItem')->with('item', $item);
        }
    }

    public function customer(Request $request){
        if(isset($_POST['area'])){
            $customer = $this->customerGraphArea($request);
            return view('admin1.Reports.customerGraphArea')->with('customer', $customer);
        } else if(isset($_POST['region'])){
            $customer = $this->customerGraphReg($request);
            return view('admin1.Reports.customerGraphReg')->with('customer', $customer);
        } else{
            $customer = $this->customerGraph($request);
            return view('admin1.Reports.customerGraph')->with('customer', $customer);
        }
    }

    public function activeArea(Request $request){
        if(isset($_POST['date'])){
            $data = $this->activeAreaDate($request);
            return view('admin1.Reports.activeAreaDate')->with('data', $data);
        } else if(isset($_POST['region'])){
            $data = $this->activeAreaReg($request);
            return view('admin1.Reports.activeAreaReg')->with('data', $data);
        } else{
            $data = $this->activeAreaDef($request);
            return view('admin1.Reports.activeAreaDef')->with('data', $data);
        }
    }

    public function salesGraphCat(Request $request){
        $items = App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category',
            'item_auction', 'checkoutrequest_item', 'checkoutrequest_item.checkoutrequest')
        ->where('status', 3)->whereHas('checkoutrequest_item.checkoutrequest', function($query){
                $query->where('status', 2)->orWhere('status', 3)->orWhere('status', 4);
        })->get();

        $item = NULL;

        $start = Carbon::create(2016, 1, 1);
        $end = Carbon:: create(2016, 12, 31);

        foreach ($items as $key => $result) {
            $i = count($result->checkoutrequest_item);
            for ($j=0; $j < $i; $j++) {
                $date = $result->checkoutrequest_item[$j]->checkoutrequest->RequestDate;
                $date = Carbon::parse($date);
                if($date->between($start, $end)==true){
                    $month = $result->checkoutrequest_item[$j]->checkoutrequest->RequestDate[5].$result->checkoutrequest_item[$j]->checkoutrequest->RequestDate[6];
                    $month = intval($month);
                    $cat = $result->itemModel->subCategory->category->CategoryName;
                    $ctr = 0;
                    $ctr2 = 3;
                    if(is_null($item[$ctr])){
                        $item[$ctr][0] = $cat;
                        $item[$ctr][1] = $month;
                        $item[$ctr][2] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                    } else if($item[$ctr][0]==$cat){
                        if($item[$ctr][1]==$month){
                            $item[$ctr][2] += intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        } else{
                            $item[$ctr][$ctr2] = $month;
                            $ctr2 ++;
                            $item[$ctr][$ctr2] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        }
                    } else{
                        $ctr++;
                        $item[$ctr][0] = $cat;
                        $item[$ctr][1] = $month;
                        $item[$ctr][2] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        $ctr2 = 3;
                    }
                }
            }
        }

        //return $item;

        return view('admin1.Reports.salesGraph')->with('item', $item);
    }

    public function salesGraphReg(Request $request){
        $items = App\Models\Admin\Item::with('itemModel', 'checkoutrequest_item', 'checkoutrequest_item.checkoutrequest')
        ->where('status', 3)->whereHas('checkoutrequest_item.checkoutrequest', function($query){
                $query->where('status', 2)->orWhere('status', 3)->orWhere('status', 4);
        })->get();

        $start = $request->start;
        $end = $request->end;
        $start = Carbon::createFromFormat('Y-m-d', $start);
        $end = Carbon::createFromFormat('Y-m-d', $end);
        /*$start = Carbon::create(2016, 9, 1);
        $end = Carbon::create(2016, 9, 30);*/
        $start->timezone = 'Asia/Manila';
        $end->timezone = 'Asia/Manila';

        $item = NULL;

        foreach ($items as $key => $result) {
            $city = $result->checkoutrequest_item[0]->checkoutrequest->CityID;
            $list = App\Models\Admin\City::with('province', 'province.region')->find($city);
            $region = $list["province"]["region"]["RegionName"];
            //echo $list["province"]["region"]["RegionName"];

            $i = count($result->checkoutrequest_item);
            for ($j=0; $j < $i; $j++) {
                $date = $result->checkoutrequest_item[$j]->RequestDate;
                $date = Carbon::parse($date);
                if($date->between($start, $end)==true){
                    $ctr = 0;
                    $ctr2 = 3;
                    $cat = $result->itemModel->subCategory->category->CategoryName;
                    if(is_null($item[$ctr])){
                        $date = $date->format('Y-m-d');
                        $item[$ctr][0] = $region;
                        $item[$ctr][1] = $date;
                        $item[$ctr][2] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                    } else if($item[$ctr][0]==$region){
                        if($item[$ctr][1]==$date){
                            $item[$ctr][2] += intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        } else{
                            $date = $date->format('Y-m-d');
                            $item[$ctr][$ctr2] = $date;
                            $ctr2++;
                            $item[$ctr][$ctr2] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        }
                    } else{
                        $ctr++;
                        $date = $date->format('Y-m-d');
                        $item[$ctr][0] = $region;
                        $item[$ctr][1] = $date;
                        $item[$ctr][2] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        $ctr2 = 3;
                    }
                }
            }
        }

        return $item;
    }

    public function salesGraphArea(Request $request){
        $items = App\Models\Admin\Item::with('itemModel', 'checkoutrequest_item', 'checkoutrequest_item.checkoutrequest')
        ->where('status', 3)->whereHas('checkoutrequest_item.checkoutrequest', function($query){
                $query->where('status', 2)->orWhere('status', 3)->orWhere('status', 4);
        })->get();

        $start = $request->start;
        $end = $request->end;
        $start = Carbon::createFromFormat('Y-m-d', $start);
        $end = Carbon::createFromFormat('Y-m-d', $end);
        $start->timezone = 'Asia/Manila';
        $end->timezone = 'Asia/Manila';

        $item = NULL;

        foreach ($items as $key => $result) {
            $city = $result->checkoutrequest_item[0]->checkoutrequest->CityID;
            $list = App\Models\Admin\City::with('province')->find($city);
            $area = $list->province->CityID;

            $i = count($result->checkoutrequest_item);
            for ($j=0; $j < $i; $j++) {
                $date = $result->checkoutrequest_item[$j]->RequestDate;
                $date = Carbon::parse($date);
                if($date->between($start, $end)==true){
                    $ctr = 0;
                    $ctr2 = 3;
                    $cat = $result->itemModel->subCategory->category->CategoryName;
                    if(is_null($item[$ctr])){
                        $date = $date->format('Y-m-d');
                        $item[$ctr][0] = $area;
                        $item[$ctr][1] = $date;
                        $item[$ctr][2] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                    } else if($item[$ctr][0]==$area){
                        if($item[$ctr][1]==$date){
                            $item[$ctr][2] += intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        } else{
                            $date = $date->format('Y-m-d');
                            $item[$ctr][$ctr2] = $date;
                            $ctr2++;
                            $item[$ctr][$ctr2] = $area;
                            $ctr2++;
                            $item[$ctr][$ctr2] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        }
                    } else{
                        $ctr++;
                        $date = $date->format('Y-m-d');
                        $item[$ctr][0] = $area;
                        $item[$ctr][1] = $date;
                        $item[$ctr][2] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        $ctr2 = 3;
                    }
                }
            }
        }

        return $item;
    }

    public function salesGraphDate(Request $request){
        $start = $request->start;
        $end = $request->end;
        $start = Carbon::createFromFormat('Y-m-d', $start);
        $end = Carbon::createFromFormat('Y-m-d', $end);
        $items = App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category',
            'item_auction', 'checkoutrequest_item')
        ->where('status', 3)
        ->whereHas('checkoutrequest_item.checkoutrequest', function($query){
                $query->where('status', 2)->orWhere('status', 3)->orWhere('status', 4);
        })->get();
        $start->timezone = 'Asia/Manila';
        $end->timezone = 'Asia/Manila';

        $item = NULL;

        foreach ($items as $key => $result) {
            $i = count($result->checkoutrequest_item);
            for ($j=0; $j < $i; $j++) {
                $date = $result->checkoutrequest_item[$j]->RequestDate;
                $date = Carbon::parse($date);
                if($date->between($start, $end)==true){
                    $ctr = 0;
                    $ctr2 = 3;
                    $cat = $result->itemModel->subCategory->category->CategoryName;
                    if(is_null($item[$ctr])){
                        $date = $date->format('Y-m-d');
                        $item[$ctr][0] = $cat;
                        $item[$ctr][1] = $date;
                        $item[$ctr][2] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                    } else if($item[$ctr][0]==$cat){
                        if($item[$ctr][1]==$date){
                            $item[$ctr][2] += intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        } else{
                            $date = $date->format('Y-m-d');
                            $item[$ctr][$ctr2] = $date;
                            $ctr2 ++;
                            $item[$ctr][$ctr2] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        }
                    } else{
                        $ctr++;
                        $date = $date->format('Y-m-d');
                        $item[$ctr][0] = $cat;
                        $item[$ctr][1] = $date;
                        $item[$ctr][2] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        $ctr2 = 3;
                    }
                }
            }
        }
        //return view('admin1.Reports.salesGraphDate')->with('item', $item);

        return $item;
    }

    public function mostBidItem(Request $request){
        $bid = App\Models\Admin\Bid::with('Item', 'Item.itemModel')
        ->get();
        $item = NULL;

        foreach ($bid as $key => $result) {
            $i = count($bid);
            $itemName = $result->item->itemModel->ItemName;
            $ctr=0;
            if(!isset($item[$ctr])){
                $item[$ctr][0] = $itemName;
                $item[$ctr][1] = 1;
            } else if($item[$ctr][0]==$itemName){
                $item[$ctr][1]++;
            } else{
                $ctr++;
                $item[$ctr][0] = $itemName;
                $item[$ctr][1] = 1;
            }
        }

        return $item;

        //return view('admin1.Reports.mostBidItem')->with('item', $item);
    }

    public function mostBidItemDate(Request $request){
        $bid = App\Models\Admin\Bid::with('Item', 'Item.itemModel')
        ->get();
        $item = NULL;

        $start = $request->start;
        $end = $request->end;
        $start = Carbon::createFromFormat('Y-m-d', $start);
        $end = Carbon::createFromFormat('Y-m-d', $end);

        foreach ($bid as $key => $result) {
            $i = count($bid);
            $itemName = $result->item->itemModel->ItemName;
            $date = $result->DateTime;
            $date = Carbon::parse($date);
            $ctr=0;
            if($date->between($start, $end)==true){
                if(!isset($item[$ctr])){
                    $item[$ctr][0] = $itemName;
                    $item[$ctr][1] = 1;
                } else if($item[$ctr][0]==$itemName){
                    $item[$ctr][1]++;
                } else{
                    $ctr++;
                    $item[$ctr][0] = $itemName;
                    $item[$ctr][1] = 1;
                }
            }
        }

        return $item;

        //return view('admin1.Reports.mostBidItem')->with('item', $item);
    }

    public function mostBidCat(Request $request){
        $bid = App\Models\Admin\Bid::with('Item', 'Item.itemModel', 'Item.itemModel.subCategory', 'Item.itemModel.subCategory.category')
        ->get();
        $item = NULL;

        $start = $request->start;
        $end = $request->end;
        $start = Carbon::createFromFormat('Y-m-d', $start);
        $end = Carbon::createFromFormat('Y-m-d', $end);
        /*$start = Carbon::create(2016,9,1);
        $end = Carbon::create(2016,10,1);*/

        foreach ($bid as $key => $result) {
            $i = count($bid);
            $cat = $result->item->itemModel->subCategory->category->CategoryName;
            $date = $result->DateTime;
            $date = Carbon::parse($date);
            $ctr=0;
            if($date->between($start, $end)==true){
                if(!isset($item[$ctr])){
                    $item[$ctr][0] = $cat;
                    $item[$ctr][1] = 1;
                } else if($item[$ctr][0]==$cat){
                    $item[$ctr][1]++;
                } else{
                    $ctr++;
                    $item[$ctr][0] = $cat;
                    $item[$ctr][1] = 1;
                }
            }
            //echo $result->item->itemModel->subCategory->category->CategoryName;
        }

        return $item;

        //return view('admin1.Reports.mostBidCat')->with('item', $item);
    }

    public function customerGraph(Request $request){
        $customers = App\Models\Admin\Account::where('status', 1)->orderBy('DateApproved')->get();

        $start = Carbon::create(2016, 1, 1);
        $end = Carbon:: create(2016, 12, 31);
        $start->timezone = 'Asia/Manila';
        $end->timezone = 'Asia/Manila';

        $customer = NULL;

        foreach ($customers as $key => $result) {
            $ctr=0;
            $date = $result->DateApproved;
            $date = Carbon::parse($date);
            if($date->between($start, $end)==true){
                $month = $result->DateApproved[5].$result->DateApproved[6];
                $month = intval($month);
                if(is_null($customer[$ctr])){
                    $customer[$ctr][0] = $month;
                    $customer[$ctr][1] = 1;
                } else if($customer[$ctr][0]==$month){
                    $customer[$ctr][1] += 1;
                }else{
                    $ctr++;
                    $customer[$ctr][0] = $month;
                    $customer[$ctr][1] = 1;
                }
            }
        }

        $ctr = count($customer);
        //$customer[$ctr][0] = $start;
        //$customer[$ctr][1] = $end;

        //$customer["start"] = $start;
        //$customer["end"] = $end;

        return $customer;

        //return view('admin1.Reports.customerGraph')->with('customer', $customer);
    }

    public function customerGraphReg(Request $request){
        $customers = App\Models\Admin\Account::with('membership')
        ->where('status', 1)->orderBy('DateApproved')->get();

        $start = $request->start;
        $end = $request->end;
        $start = Carbon::createFromFormat('Y-m-d', $start);
        $end = Carbon::createFromFormat('Y-m-d', $end);
        $start->timezone = 'Asia/Manila';
        $end->timezone = 'Asia/Manila';

        $customer = NULL;

        foreach ($customers as $key => $result) {
            $i = count($result);
            for ($j=0; $j < $i; $j++) { 
                $city = $result->membership[$j]->CityID;
                $list = App\Models\Admin\City::with('province', 'province.region')->find($city);
                $region = $list->province->region->RegionName;
                $ctr = 0;
                $ctr2 = 3;
                $date = $result->DateApproved;
                $date = Carbon::parse($date);
                if($date->between($start, $end)==true){
                    if(is_null($customer[$ctr])){
                        $customer[$ctr][0] = $region;
                        $customer[$ctr][1] = 1;
                    } else if($customer[$ctr][0]==$region){
                        $customer[$ctr][1] += 1;
                    } else{
                        $ctr++;
                        $customer[$ctr][0] = $region;
                        $customer[$ctr][1] = 1;
                    }
                }
            }
        }

        return $customer;

        //return view('admin1.Reports.customerGraphReg')->with('customer', $customer);
    }

    public function customerGraphArea(Request $request){
        $customers = App\Models\Admin\Account::with('membership')
        ->where('status', 1)->orderBy('DateApproved')->get();

        $start = $request->start;
        $end = $request->end;
        $start = Carbon::createFromFormat('Y-m-d', $start);
        $end = Carbon::createFromFormat('Y-m-d', $end);
        $start->timezone = 'Asia/Manila';
        $end->timezone = 'Asia/Manila';

        $customer = NULL;

        foreach ($customers as $key => $result) {
            $i = count($result);
            for ($j=0; $j < $i; $j++) { 
                $city = $result->membership[$j]->CityID;
                $list = App\Models\Admin\City::with('province')->find($city);
                $area = $list->CityName;
                $ctr = 0;
                $date = $result->DateApproved;
                $date = Carbon::parse($date);
                if($date->between($start, $end)==true){
                    if(is_null($customer[$ctr])){
                        $customer[$ctr][0] = $area;
                        $customer[$ctr][1] = 1;
                    } else if($customer[$ctr][0]==$area){
                        $customer[$ctr][1] += 1;
                    } else{
                        $ctr++;
                        $customer[$ctr][0] = $area;
                        $customer[$ctr][1] = 1;
                    }
                }
            }
        }

        return $customer;

        //return view('admin1.Reports.customerGraphArea')->with('customer', $customer);
    }

    public function activeAreaDate(Request $request){
        $bid = App\Models\Admin\Bid::with('account', 'account.membership', 'account.membership.city')->get();

        //$start = Carbon::create(2016, 1, 1);
        //$end = Carbon:: create(2016, 12, 31);
        $start = $request->start;
        $end = $request->end;
        $start = Carbon::createFromFormat('Y-m-d', $start);
        $end = Carbon::createFromFormat('Y-m-d', $end);
        $start->timezone = 'Asia/Manila';
        $end->timezone = 'Asia/Manila';

        $ctr = 0;
        $returnData = NULL;
        foreach ($bid as $key => $result) {
            if(is_null($returnData)){
                $returnData[$ctr][0] = $result->account->membership[0]->city->CityName;
                $returnData[$ctr][1] = 1;
            } else if($returnData[$ctr][0]==$result->account->membership[0]->city->CityName){
                $returnData[$ctr][1]++;
            } else{
                $ctr++;
                $returnData[$ctr][0] = $result->account->membership[0]->city->CityName;
                $returnData[$ctr][1] = 1;
            }

            if($ctr==10) break;
        }

        return $returnData;
        //return view('admin1.Reports.activeAreaDate')->with('data', $returnData);
    }

    public function activeAreaDef(Request $request){
        $bid = App\Models\Admin\Bid::with('account', 'account.membership', 'account.membership.city')->get();

        $start = Carbon::create(2016, 1, 1);
        $end = Carbon:: create(2016, 12, 31);
        $start->timezone = 'Asia/Manila';
        $end->timezone = 'Asia/Manila';

        $ctr = 0;
        $ctr2 = 3;
        $returnData = NULL;
        foreach ($bid as $key => $result) {
            $month = $result->DateTime[5].$result->DateTime[6];
            $month = intval($month);
            if(is_null($returnData)){
                $returnData[$ctr][0] = $result->account->membership[0]->city->CityName;
                $returnData[$ctr][1] = $month;
                $returnData[$ctr][2] = 1;
            } else if($returnData[$ctr][0]==$result->account->membership[0]->city->CityName){
                if($returnData[$ctr][1]==$month){
                    $returnData[$ctr][2]++;
                } else{
                    $returnData[$ctr][$ctr2] = $month;
                    $returnData[$ctr][$ctr2+1] = 1;
                    $ctr2+=2;
                }
            } else{
                $ctr++;
                $returnData[$ctr][0] = $result->account->membership[0]->city->CityName;
                $returnData[$ctr][1] = $month;
                $returnData[$ctr][2] = 1;
                $ctr2 = 3;
            }

            if($ctr==10) break;
        }

        return $returnData;
        //return view('admin1.Reports.activeAreaDef')->with('data', $returnData);
    }

    public function activeAreaReg(Request $request){
        $bid = App\Models\Admin\Bid::with('account', 'account.membership', 'account.membership.city',
            'account.membership.city.province', 'account.membership.city.province.region')->get();

        //$start = Carbon::create(2016, 1, 1);
        //$end = Carbon:: create(2016, 12, 31);
        $start = $request->start;
        $end = $request->end;
        $start = Carbon::createFromFormat('Y-m-d', $start);
        $end = Carbon::createFromFormat('Y-m-d', $end);
        $start->timezone = 'Asia/Manila';
        $end->timezone = 'Asia/Manila';

        $ctr = 0;
        $returnData = NULL;
        foreach ($bid as $key => $result) {
            if(is_null($returnData)){
                $returnData[$ctr][0] = $result->account->membership[0]->city->province->region->RegionName;
                $returnData[$ctr][1] = 1;
            } else if($returnData[$ctr][0]==$result->account->membership[0]->city->province->region->RegionName){
                $returnData[$ctr][1]++;
            } else{
                $ctr++;
                $returnData[$ctr][0] = $result->account->membership[0]->city->province->region->RegionName;
                $returnData[$ctr][1] = 1;
            }
        }

        return $returnData;

        //return view('admin1.Reports.activeAreaReg')->with('data', $returnData);
    }
}
