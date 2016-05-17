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

class RegisterController extends Controller
{
    public function confirmRegister(Request $request){
        $this->insertAccount($request);
        Session::put('message', '1');
    //    echo "<script>alert('asdasdasd');</script>";
        return redirect('register');
    }

    public function insertAccount(Request $request){

        try {
            $mem = new App\Models\Admin\Membership;
            $acc = new App\Models\Admin\Account;

            $mem->FirstName = trim($request->input('firstName'));
            $mem->MiddleName = trim($request->input('middleName'));
            $mem->LastName = trim($request->input('lastName'));
            $mem->CityID = trim($request->input('city'));
            $mem->Barangay_Street_Address = trim($request->input('address'));
            $mem->Birthdate = trim($request->input('birthdate'));
            $mem->Occupation = trim($request->input('occupation'));
            $mem->EmailAdd = trim($request->input('email'));
            $mem->CellphoneNo = trim($request->input('phoneNumber'));
            $mem->Landline = trim($request->input('telNumber'));
            $mem->Gender = trim($request->input('fruit'));

            $acc->Username = trim($request->input('username'));
            $acc->Password = trim($request->input('password'));
            $acc->AccountTypeID = trim($request->input('acctype'));

            if (($request->hasFile('ids')) && ($request->hasFile('dti'))) {
                $filenameids = rand(1000,100000)."-".$request->file('ids')->getClientOriginalName();
                $filepathids = "photos/credentials/";
                $request->file('ids')->move($filepathids, $filenameids);
                $mem->valid_id = $filepathids.$filenameids;

                $filenamedti = rand(1000,100000)."-".$request->file('dti')->getClientOriginalName();
                $filepathdti = "photos/credentials/";
                $request->file('dti')->move($filepathdti, $filenamedti);
                $mem->File_DTI = $filepathdti.$filenamedti;
            }
            else {
                throw new Exception("Error Processing Request", 1);
                
            }

            $mem->save();
            $acc->save();
        } catch (Exception $e) {
            Session::put('message', '-1');
            return redirect('register');
        }
    }
}
