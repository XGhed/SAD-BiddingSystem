<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;

class CustomerMessageController extends Controller
{
    public function send(Request $request){
    	$thread = new App\Models\Admin\Thread;

  		$thread->AccountID = $request->session()->get('accountID');
  		$thread->ProblemTypeID = $request->problemType;
  		$thread->Subject = $request->subject;
  		
  		$thread->save();

  		$message = new App\Models\Admin\Message;

  		$message->ThreadID = $thread->ThreadID;
  		$message->DateAndTime = Carbon::now('Asia/Manila');
  		$message->Sender = 'Customer';
  		$message->Message = $request->content;

  		$message->save();

  		return redirect('inbox');
    }

    public function threadList(Request $request){
    	$threads = App\Models\Admin\Thread::with('account', 'account.membership', 'messages')
    		->where('AccountID', $request->session()->get('accountID'))
        ->orderBy('ThreadID', 'desc')->get();

    	return $threads;
    }

    public function reply(Request $request){
        $message = new App\Models\Admin\Message;

        $message->ThreadID = $request->threadID;
        $message->DateAndTime = Carbon::now('Asia/Manila');
        $message->Sender = 'Customer';
        $message->Message = $request->message;

        $message->save();

        $thread = App\Models\Admin\Thread::with('account', 'account.membership', 'messages')
        ->where('ThreadID', $request->threadID)->first();

        return $thread;
    }
}
