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
            $request->session()->put('accountID', $account->AccountID);
            $request->session()->put('accountType', 'customer');

            return redirect('/');
        }
        else{
            return "Username or password must be wrong.";
        }
    }

    public function logout(Request $request){
        if ($request->session()->has('accountID')){
            $request->session()->forget('accountID');
            $request->session()->forget('accountType');

            return redirect('/');
        }
    }

    public function isLoggedIn(Request $request){
        if ($request->session()->has('accountID')){
            return 'true';
        }
        else {
            return 'false';
        }
    }
}
