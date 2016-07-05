<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function login(Request $request){
        $account = App\Models\Admin\Account::where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        if(count($account) > 0){
            session(['accountID' => $account->AccountID]);
            session(['accountType' => 'customer']);

            return redirect('/');
        }
        else{
            //throw error
        }
    }

    public function logout(Request $request){
        if (session('accountID') != ""){
            session(['accountID' => ""]);
            session(['accountType' => ""]);

            return redirect('/');
        }
    }
}
