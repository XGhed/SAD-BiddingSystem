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
    public function salesGraphCat(Request $request){
        $items = App\Models\Admin\Item::with('itemModel', 'itemModel.subCategory', 'itemModel.subCategory.category',
            'item_auction', 'checkoutrequest_item', 'checkoutrequest_item.checkoutrequest')
        ->where('status', 3)->whereHas('checkoutrequest_item.checkoutrequest', function($query){
                $query->where('status', 2)->orWhere('status', 3);
        })->get();

    //    $item[8] = array(9, "Gadgets", 500.00);
    //    $item[9] = array(8, "Furniture", 1000.00);

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
                /*if($month==1){
                    if (empty($item[0])) {
                        $price = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        $item[0][0] = $month;
                        $item[0][1] = $cat;
                        $item[0][2] = $price;
                    } else {
                        $k = count($item[0]);
                        $ctr = 0;
                        for($l=1; $l<$k; $l++){
                            if($l%2==1){
                                if($item[0][$l]==$result->itemModel->subCategory->category->CategoryName){
                                    $price = $item[0][$l+1];
                                    $price2 = $price + intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                                    $item[0][$l+1] = $price2;
                                    $ctr = 1;
                                    break;
                                }
                            }
                        }
                        if($ctr==0){
                            $item[0][$l] = $cat;
                            $item[0][$l+1] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        }
                    }
                } else if($month==2){
                    if (empty($item[1])) {
                        $price = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        $item[1][0] = $month;
                        $item[1][1] = $cat;
                        $item[1][2] = $price;
                    } else {
                        $k = count($item[1]);
                        $ctr = 0;
                        for($l=1; $l<$k; $l++){
                            if($l%2==1){
                                if($item[1][$l]==$result->itemModel->subCategory->category->CategoryName){
                                    $price = $item[1][$l+1];
                                    $price2 = $price + intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                                    $item[1][$l+1] = $price2;
                                    $ctr = 1;
                                    break;
                                }
                            }
                        }
                        if($ctr==0){
                            $item[1][$l] = $cat;
                            $item[1][$l+1] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        }
                    }
                } else if($month==3){
                    if (empty($item[2])) {
                        $price = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        $item[2][0] = $month;
                        $item[2][1] = $cat;
                        $item[2][2] = $price;
                    } else {
                        $k = count($item[2]);
                        $ctr = 0;
                        for($l=1; $l<$k; $l++){
                            if($l%2==1){
                                if($item[2][$l]==$result->itemModel->subCategory->category->CategoryName){
                                    $price = $item[2][$l+1];
                                    $price2 = $price + intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                                    $item[2][$l+1] = $price2;
                                    $ctr = 1;
                                }
                            }
                        }
                        if($ctr==0){
                            $item[2][$l] = $cat;
                            $item[2][$l+1] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        }
                    }
                } else if($month==4){
                    if (empty($item[3])) {
                        $price = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        $item[3][0] = $month;
                        $item[3][1] = $cat;
                        $item[3][2] = $price;
                    } else {
                        $k = count($item[3]);
                        $ctr = 0;
                        for($l=1; $l<$k; $l++){
                            if($l%2==1){
                                if($item[3][$l]==$result->itemModel->subCategory->category->CategoryName){
                                    $price = $item[3][$l+1];
                                    $price2 = $price + intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                                    $item[3][$l+1] = $price2;
                                    $ctr = 1;
                                    break;
                                }
                            }
                        }
                        if($ctr==0){
                            $item[3][$l] = $cat;
                            $item[3][$l+1] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        }
                    }
                } else if($month==5){
                    if (empty($item[4])) {
                        $price = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        $item[4][0] = $month;
                        $item[4][1] = $cat;
                        $item[4][2] = $price;
                    } else {
                        $k = count($item[4]);
                        $ctr = 0;
                        for($l=1; $l<$k; $l++){
                            if($l%2==1){
                                if($item[4][$l]==$result->itemModel->subCategory->category->CategoryName){
                                    $price = $item[4][$l+1];
                                    $price2 = $price + intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                                    $item[4][$l+1] = $price2;
                                    $ctr = 1;
                                    break;
                                }
                            }
                        }
                        if($ctr==0){
                            $item[4][$l] = $cat;
                            $item[4][$l+1] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        }
                    }
                } else if($month==6){
                    if (empty($item[5])) {
                        $price = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        $item[5][0] = $month;
                        $item[5][1] = $cat;
                        $item[5][2] = $price;
                    } else {
                        $k = count($item[5]);
                        $ctr = 0;
                        for($l=1; $l<$k; $l++){
                            if($l%2==1){
                                if($item[5][$l]==$result->itemModel->subCategory->category->CategoryName){
                                    $price = $item[5][$l+1];
                                    $price2 = $price + intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                                    $item[5][$l+1] = $price2;
                                    $ctr = 1;
                                    break;
                                }
                            }
                        }
                        if($ctr==0){
                            $item[5][$l] = $cat;
                            $item[5][$l+1] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        }
                    }
                } else if($month==7){
                    if (empty($item[6])) {
                        $price = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        $item[6][0] = $month;
                        $item[6][1] = $cat;
                        $item[6][2] = $price;
                    } else {
                        $k = count($item[6]);
                        $ctr = 0;
                        for($l=1; $l<$k; $l++){
                            if($l%2==1){
                                if($item[6][$l]==$result->itemModel->subCategory->category->CategoryName){
                                    $price = $item[6][$l+1];
                                    $price2 = $price + intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                                    $item[6][$l+1] = $price2;
                                    $ctr = 1;
                                    break;
                                }
                            }
                        }
                        if($ctr==0){
                            $item[6][$l] = $cat;
                            $item[6][$l+1] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        }
                    }
                } else if($month==8){
                    if (empty($item[7])) {
                        $price = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        $item[7][0] = $month;
                        $item[7][1] = $cat;
                        $item[7][2] = $price;
                    } else {
                        $k = count($item[7]);
                        $ctr = 0;
                        for($l=1; $l<$k; $l++){
                            if($l%2==1){
                                if($item[7][$l]==$result->itemModel->subCategory->category->CategoryName){
                                    $price = $item[7][$l+1];
                                    $price2 = $price + intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                                    $item[7][$l+1] = $price2;
                                    $ctr = 1;
                                    break;
                                }
                            }
                        }
                        if($ctr==0){
                            $item[7][$l] = $cat;
                            $item[7][$l+1] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        }
                    }
                } else if($month==9){
                    if (empty($item[8])) {
                        $price = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        $item[8][0] = $month;
                        $item[8][1] = $cat;
                        $item[8][2] = $price;
                    } else {
                        $k = count($item[8]);
                        $ctr = 0;
                        for($l=1; $l<$k; $l++){
                            if($l%2==1){
                                if($item[8][$l]==$result->itemModel->subCategory->category->CategoryName){
                                    $price = $item[8][$l+1];
                                    $price2 = $price + intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                                    $item[8][$l+1] = $price2;
                                    $ctr = 1;
                                    break;
                                }
                            }
                        }
                        if($ctr==0){
                            $item[8][$l] = $cat;
                            $item[8][$l+1] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        }
                    }
                } else if($month==10){
                    if (empty($item[9])) {
                        $price = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        $item[9][0] = $month;
                        $item[9][1] = $cat;
                        $item[9][2] = $price;
                    } else {
                        $k = count($item[9]);
                        $ctr = 0;
                        for($l=1; $l<$k; $l++){
                            if($l%2==1){
                                if($item[9][$l]==$result->itemModel->subCategory->category->CategoryName){
                                    $price = $item[9][$l+1];
                                    $price2 = $price + intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                                    $item[9][$l+1] = $price2;
                                    $ctr = 1;
                                    break;
                                }
                            }
                        }
                        if($ctr==0){
                            $item[9][$l] = $cat;
                            $item[9][$l+1] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        }
                    }
                } else if($month==11){
                    if (empty($item[10])) {
                        $price = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        $item[10][0] = $month;
                        $item[10][1] = $cat;
                        $item[10][2] = $price;
                    } else {
                        $k = count($item[10]);
                        $ctr = 0;
                        for($l=1; $l<$k; $l++){
                            if($l%2==1){
                                if($item[10][$l]==$result->itemModel->subCategory->category->CategoryName){
                                    $price = $item[10][$l+1];
                                    $price2 = $price + intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                                    $item[10][$l+1] = $price2;
                                    $ctr = 1;
                                    break;
                                }
                            }
                        }
                        if($ctr==0){
                            $item[10][$l] = $cat;
                            $item[10][$l+1] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        }
                    }
                } else if($month==12){
                    if (empty($item[11])) {
                        $price = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        $item[11][0] = $month;
                        $item[11][1] = $cat;
                        $item[11][2] = $price;
                    } else {
                        $k = count($item[11]);
                        $ctr = 0;
                        for($l=1; $l<$k; $l++){
                            if($l%2==1){
                                if($item[11][$l]==$result->itemModel->subCategory->category->CategoryName){
                                    $price = $item[11][$l+1];
                                    $price2 = $price + intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                                    $item[11][$l+1] = $price2;
                                    $ctr = 1;
                                    break;
                                }
                            }
                        }
                        if($ctr==0){
                            $item[11][$l] = $cat;
                            $item[11][$l+1] = intval($result->checkoutrequest_item[$j]->checkoutrequest->ItemPrice);
                        }
                    }
                }*/
            }
        }

        //return $item;

        return view('admin1.Queries.sampleGraph')->with('item', $item);
    }

    public function salesGraphReg(Request $request){
        $items = App\Models\Admin\Item::with('itemModel', 'checkoutrequest_item', 'checkoutrequest_item.checkoutrequest')
        ->where('status', 3)->whereHas('checkoutrequest_item.checkoutrequest', function($query){
                $query->where('status', 2)->orWhere('status', 3);
        })->get();

        foreach ($items as $key => $result) {
            $city = $result->checkoutrequest_item[0]->checkoutrequest->CityID;
            $list = App\Models\Admin\City::with('province', 'province.region')->find($city);
            echo $list->province->region->RegionName;
        }

        //return $city;
    }
}
