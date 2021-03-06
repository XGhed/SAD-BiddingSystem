<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;

class ProblemTypeController extends Controller
{
    public function view(Request $request){
       $problemTypes = App\Models\Admin\ProblemType::all();

       return view('admin1.Maintenance.problemTypes')->with('problemTypes', $problemTypes);
    } 

    public function insert(Request $request){
        //check if existing
        $check = App\Models\Admin\ProblemType::where('Problem', $request->input('problem'))->get();
        if(count($check) > 0){
            Session::put('message', '-1');
            return redirect('problemTypes');
        }

        $problemType = new App\Models\Admin\ProblemType;

        $problemType->Problem = $request->problem;
        $problemType->Description = $request->description;
        $problemType->save();

        return redirect ('problemTypes');
    }

    public function update(Request $request){
        //check if existing
        $check = App\Models\Admin\ProblemType::where('Problem', $request->input('problem'))->get();
        if(count($check) > 0){
            Session::put('message', '-1');
            return redirect('problemTypes');
        }
        
        $problemType = App\Models\Admin\ProblemType::find($request->problemtypeID);

        $problemType->Problem = $request->problem;
        $problemType->Description = $request->description;
        $problemType->save();

        return redirect ('problemTypes');
    }

    public function delete(Request $request){
        $problemType = App\Models\Admin\ProblemType::find($request->problemtypeID);

        $problemType->delete();

        return redirect ('problemTypes');
    }
}
