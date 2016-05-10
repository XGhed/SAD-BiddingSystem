<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;

class RegisterItemController extends Controller
{
    public function manageRegItem(){

       $items = App\Models\Admin\Item::all();

       return view('admin.inventory')->with ('items', $items);
    }
}
