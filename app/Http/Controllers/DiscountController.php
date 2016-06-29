<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;

class DiscountController extends Controller
{
    public function manageDiscount(){

       $results = App\Models\Admin\Discount::all();
       $rewards = App\Models\Admin\Reward::all();
       $accountTypes = App\Models\Admin\AccountType::all();

       return view('admin1.discount')->with ('results', $results)->with ('accountTypes', $accountTypes)->with ('rewards', $rewards);
    }

    public function confirmDiscount(Request $request){

        if (isset($_POST['add'])) {
            $this->insertDiscount($request);
            Session::put('message', '1');
            return redirect('discount');
        }
        elseif (isset($_POST['edit'])) {
            $this->updateDiscount($request);
            Session::put('message', '2');
            return redirect('discount');
        }
        elseif (isset($_POST['delete'])) {
            $this->deleteDiscount($request);
            Session::put('message', '3');
            return redirect('discount');
        }
    }

    public function insertDiscount(Request $request){

        try {
        $discount = new App\Models\Admin\Discount;

        $discount->AccountTypeID = trim($request->input('add_Type'));
        $discount->Discount = trim($request->input('add_discount'));
        $discount->RequiredPoints = trim($request->input('add_points'));

            $discount->save();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('discount');
        }
    }

    public function updateDiscount(Request $request){

        try {
        $discount = new App\Models\Admin\Discount;

        $discount = App\Models\Admin\Discount::find($request->input('editID'));

        $discount->AccountTypeID = trim($request->input('edit_Type'));
        $discount->Discount = trim($request->input('edit_discount'));
        $discount->RequiredPoints = trim($request->input('edit_points'));

            $discount->save();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('discount');
        }
    }

    public function deleteDiscount(Request $request){
        try {
        $discount = new App\Models\Admin\Discount;
        $discount = App\Models\Admin\Discount::find($request->input('deleteID'));
        
            $discount->delete();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('discount');
        }
    }

    public function updateReward(Request $request){
        try {
        $reward = new App\Models\Admin\Reward;
        $rewardLast = new App\Models\Admin\Reward;
        $rewardLast = App\Models\Admin\Reward::orderBy('RewardDate', 'desc')->first();
        
        $reward->RewardPercentage = trim($request->input('add_reward'));
        $reward->RewardDate = trim($request->input('add_date'));


        if ($rewardLast == null || $reward->RewardDate > $rewardLast->RewardDate){
            $reward->save();
            Session::put('message', '2');
        }
        else {
            Session::put('message', '-1');
        }

        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('discount');
        }

        return redirect('discount');
    }
}
