<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Session;

class RegisterContainerController extends Controller
{
    public function manageRegContainer(){

       $suppliers = App\Supplier::all();

       return view('regContainer')->with ('suppliers', $suppliers);
    }
}
