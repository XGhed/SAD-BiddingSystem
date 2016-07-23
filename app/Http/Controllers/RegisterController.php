<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Business\SupplierBusiness;
use App\Dal\SupplierDao;
use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function confirmRegister(Request $request){
        $this->insertAccount($request);
        Session::put('message', '1');
    //    echo "<script>alert('asdasdasd');</script>";
        return redirect('register');
    }

    public function insertRegister(Request $request){
        try{
            $acc = new App\Models\Admin\Account;
            $acc->Username = trim($request->input('username'));
            $acc->Password = trim($request->input('password'));
            $acc->status = 0;
            $acc->save();

            //insert on membership table
            $user = App\Models\Admin\User::orderBy('AccountID', 'desc')->take(1)->get();
            $userID = 0;
            foreach ($user as $key => $u) {
                $userID = $u->AccountID;
            }
            $membership = new App\Models\Admin\Membership;
            $membership->MembershipID = $userID;
            $membership->FirstName = $request->input('firstName');
            $membership->MiddleName = $request->input('middleName');
            $membership->LastName = $request->input('lastName');
            $membership->CityID = $request->input('city');
            $membership->Barangay_Street_Address = $request->input('address');
            $membership->Birthdate = $request->input('birthdate');
            $membership->Gender = $request->input('gender');
            $membership->Occupation = $request->input('occupation');
            $membership->CellphoneNo = $request->input('phoneNumber');
            $membership->Landline = $request->input('telNumber');
            $membership->EmailAdd = $request->input('email');
            $membership->DateOfRegistration = Carbon::now('Asia/Manila');
            $membership->AccountTypeID = $request->input('accounttype');

            //upload files
            if (($request->hasFile('ids')) || ($request->hasFile('dti'))) {
                if($request->hasFile('ids')){
                    $filenameids = rand(1000,100000)."-".$request->file('ids')->getClientOriginalName();
                    $filepathids = "photos/credentials/";
                    $request->file('ids')->move($filepathids, $filenameids);
                    $membership->valid_id = $filepathids.$filenameids;
                }

                if($request->hasFile('dti')){
                    $filenamedti = rand(1000,100000)."-".$request->file('dti')->getClientOriginalName();
                    $filepathdti = "photos/credentials/";
                    $request->file('dti')->move($filepathdti, $filenamedti);
                    $membership->File_DTI = $filepathdti.$filenamedti;
                }
                
            }
            else {
                throw new Exception("Error Processing Request", 1);
            }

            $membership->save();

            return redirect('/');
        }
        catch(Exception $e){
            return redirect('register');
        }
    }
}
