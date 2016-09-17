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
        //return $_POST;
        if (isset($_POST['date'])) {
            $item = $this->salesGraphDate($request);
            return view('admin1.Queries.salesGraphDate')->with('item', $item);
        } elseif (isset($_POST['region'])){
            $item = $this->salesGraphReg($request);
            //return $item;
            return view('admin1.Queries.salesGraphReg')->with('item', $item);
        } else{
            return $this->salesGraphCat($request);
            //return view('admin1.Queries.salesGraph')->with('item', $item);
        }

        //return redirect('salesGraphCat');
    }

    public function salesGraphCat(Request $request){
        $items = App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category',
            'item_auction', 'checkoutrequest_item', 'checkoutrequest_item.checkoutrequest')
        ->where('status', 3)->whereHas('checkoutrequest_item.checkoutrequest', function($query){
                $query->where('status', 2)->orWhere('status', 3);
        })->get();

        $item = array(array());
        foreach ($items as $key => $result) {
            $i = count($result->checkoutrequest_item);
        //    $year = $result->checkoutrequest_item[0]->checkoutrequest->RequestDate[0].$result->checkoutrequest_item[0]->checkoutrequest->RequestDate[1].$result->checkoutrequest_item[0]->checkoutrequest->RequestDate[2].$result->checkoutrequest_item[0]->checkoutrequest->RequestDate[3];
//            return $result->checkoutrequest_item[1];
            for ($j=0; $j < $i; $j++) {
                $month = $result->checkoutrequest_item[$j]->checkoutrequest->RequestDate[5].$result->checkoutrequest_item[$j]->checkoutrequest->RequestDate[6];
                $cat = $result->itemModel->subCategory->category->CategoryName;
                $month = intval($month);
                $ctr = 0;
                $ctr2 = 3;
                if(empty($item[$ctr])){
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

        //return $item;

        return view('admin1.Queries.salesGraph')->with('item', $item);
    }

    public function salesGraphReg(Request $request){
        $items = App\Models\Admin\Item::with('itemModel', 'checkoutrequest_item', 'checkoutrequest_item.checkoutrequest')
        ->where('status', 3)->whereHas('checkoutrequest_item.checkoutrequest', function($query){
                $query->where('status', 2)->orWhere('status', 3);
        })->get();

        $start = $request->start;
        $end = $request->end;
        $start = Carbon::createFromFormat('Y-m-d', $start);
        $end = Carbon::createFromFormat('Y-m-d', $end);

        $item = array(array());

        foreach ($items as $key => $result) {
            $city = $result->checkoutrequest_item[0]->checkoutrequest->CityID;
            $list = App\Models\Admin\City::with('province', 'province.region')->find($city);
            $region = $list->province->region->RegionName;

            $i = count($result->checkoutrequest_item);
            for ($j=0; $j < $i; $j++) {
                $date = $result->checkoutrequest_item[$j]->RequestDate;
                $date = Carbon::parse($date);
                if($date->between($start, $end)==true){
                    $ctr = 0;
                    $ctr2 = 3;
                    //$itemdate = $result->checkoutrequest_item[$j]->checkoutrequest->RequestDate[5].$result->checkoutrequest_item[$j]->checkoutrequest->RequestDate[6].$result->checkoutrequest_item[$j]->checkoutrequest->RequestDate[8].$result->checkoutrequest_item[$j]->checkoutrequest->RequestDate[9];
                    $cat = $result->itemModel->subCategory->category->CategoryName;
                    if(empty($item[$ctr])){
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
                            $item[$ctr][$ctr2] = $region;
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

            //echo $list->province->region->RegionName;
        }

        return $item;
    }

    public function salesGraphDate(Request $request){
        //$start = Carbon::create(2016, 9, 1, 0, 0, 0);
        //$end = Carbon::create(2016, 10, 30, 0, 0, 0);
        //$start->setDateTime(2016, 9, 1, 0, 0, 0);
        //$end->setDateTime(2016, 9, 30, 0, 0, 0);
        //$start = '2016-09-01';
        //$end = '2016-09-30';
        $start = $request->start;
        $end = $request->end;
        $start = Carbon::createFromFormat('Y-m-d', $start);
        $end = Carbon::createFromFormat('Y-m-d', $end);
        $items = App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category',
            'item_auction', 'checkoutrequest_item')
        ->where('status', 3)
        //->whereBetween($request->input('start'), $request->input('end'))
        ->whereHas('checkoutrequest_item.checkoutrequest', function($query){
                $query->where('status', 2)->orWhere('status', 3);
        })->get();

        $item = array(array());

        foreach ($items as $key => $result) {
            $i = count($result->checkoutrequest_item);
            for ($j=0; $j < $i; $j++) {
                $date = $result->checkoutrequest_item[$j]->RequestDate;
                $date = Carbon::parse($date);
                if($date->between($start, $end)==true){
                    $ctr = 0;
                    $ctr2 = 3;
                    //$itemdate = $result->checkoutrequest_item[$j]->checkoutrequest->RequestDate[5].$result->checkoutrequest_item[$j]->checkoutrequest->RequestDate[6].$result->checkoutrequest_item[$j]->checkoutrequest->RequestDate[8].$result->checkoutrequest_item[$j]->checkoutrequest->RequestDate[9];
                    $cat = $result->itemModel->subCategory->category->CategoryName;
                    if(empty($item[$ctr])){
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

            //$interval = $start->diff($end)->days;
            //echo $interval;
        }
        //return view('admin1.Queries.salesGraphDate')->with('item', $item);

        //echo $request;

        return $item;
    }
}
