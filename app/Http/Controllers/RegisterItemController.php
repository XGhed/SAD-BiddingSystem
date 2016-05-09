<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Session;

class RegisterItemController extends Controller
{
    public function manageRegItem(){

       $items = App\Item::all();

       return view('admin.inventory')->with ('items', $items);
    }
}
