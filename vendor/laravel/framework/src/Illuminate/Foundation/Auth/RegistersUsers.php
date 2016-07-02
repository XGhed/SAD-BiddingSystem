<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;
use App\Models\Admin;
use App\Models\Admin\User;
use Carbon\Carbon;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::login($this->create($request->all()));

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
        $membership->DateOfRegistration = Carbon::now();
        $membership->AccountTypeID = $request->input('accounttype');

        //upload files
        if (($request->hasFile('ids')) && ($request->hasFile('dti'))) {
            $filenameids = rand(1000,100000)."-".$request->file('ids')->getClientOriginalName();
            $filepathids = "photos/credentials/";
            $request->file('ids')->move($filepathids, $filenameids);
            $membership->valid_id = $filepathids.$filenameids;

            $filenamedti = rand(1000,100000)."-".$request->file('dti')->getClientOriginalName();
            $filepathdti = "photos/credentials/";
            $request->file('dti')->move($filepathdti, $filenamedti);
            $membership->File_DTI = $filepathdti.$filenamedti;
        }
        else {
            //error here
        }

        $membership->save();

        return redirect($this->redirectPath());
    }
}
