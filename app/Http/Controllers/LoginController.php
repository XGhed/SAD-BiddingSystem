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

        if($account->status == 1){
            $request->session()->put('accountID', $account->AccountID);

            return redirect('/');
        }
        else{
            return "Username or password must be wrong.";
        }
    }

    public function logout(Request $request){
        if ($request->session()->has('accountID')){
            $request->session()->forget('accountID');

            return redirect('/');
        }
    }
}
