<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;

class ItemDefectController extends Controller
{
    public function view(Request $request){
       $defects = App\Models\Admin\ItemDefect::all();

       return view('admin1.Maintenance.itemDefects')->with('defects', $defects);
    } 

    public function insert(Request $request){
        $itemDefect = new App\Models\Admin\ItemDefect;

        $itemDefect->DefectName = $request->defect;
        $itemDefect->save();

        return redirect ('itemDefects');
    }

    public function update(Request $request){
        $itemDefect = App\Models\Admin\ItemDefect::find($request->defectID);

        $itemDefect->DefectName = $request->defect;
        $itemDefect->save();

        return redirect ('itemDefects');
    }

    public function delete(Request $request){
        $itemDefect = App\Models\Admin\ItemDefect::find($request->defectID);

        $itemDefect->delete();

        return redirect ('itemDefects');
    }
}
