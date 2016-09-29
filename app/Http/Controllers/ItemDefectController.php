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
        //check if existing
        $check = App\Models\Admin\ItemDefect::where('DefectName', $request->input('defect'))->get();
        if(count($check) > 0){
            Session::put('message', '-1');
            return redirect('defects');
        }

        $itemDefect = new App\Models\Admin\ItemDefect;

        $itemDefect->DefectName = $request->defect;
        $itemDefect->save();

        return redirect ('defects');
    }

    public function update(Request $request){
        //check if existing
        $check = App\Models\Admin\ItemDefect::where('DefectName', $request->input('defect'))->get();
        if(count($check) > 0){
            Session::put('message', '-1');
            return redirect('defects');
        }
        
        $itemDefect = App\Models\Admin\ItemDefect::find($request->defectID);

        $itemDefect->DefectName = $request->defect;
        $itemDefect->save();

        return redirect ('defects');
    }

    public function delete(Request $request){
        $itemDefect = App\Models\Admin\ItemDefect::find($request->defectID);

        $itemDefect->delete();

        return redirect ('defects');
    }
}
