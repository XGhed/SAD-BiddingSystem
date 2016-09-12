<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function send(Request $request){
    	foreach ($request->receivers as $key => $receiver) {
    		$thread = new App\Models\Admin\Thread;

    		$thread->AccountID = $receiver;
    		$thread->Subject = $request->subject;
    		
    		$thread->save();

    		$message = new App\Models\Admin\Message;

    		$message->ThreadID = $thread->ThreadID;
    		$message->DateAndTime = Carbon::now('Asia/Manila');
    		$message->Sender = 'Admin';
    		$message->Message = $request->content;

    		$message->save();

    		return redirect('messages');
    	}
    }

    public function threadList(){
    	$threads = App\Models\Admin\Thread::with('account', 'account.membership', 'messages')->get();

    	return $threads;
    }
}
