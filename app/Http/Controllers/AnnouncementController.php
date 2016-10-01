<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use App\Models\Admin;
use Session;
use Carbon\Carbon;

class AnnouncementController extends Controller
{
    public function makeAnnouncement(Request $request){
        $announcement = new App\Models\Admin\Announcement;

        if($request->subject != 'null'){
            $announcement->DateAndTime = Carbon::now('Asia/Manila');
            $announcement->Subject = $request->subject;
            $announcement->Content = $request->content;

            $announcement->save();
        }
        else {
            $announcement->DateAndTime = Carbon::now('Asia/Manila');
            $announcement->Subject = "NULL";
            $announcement->Content = "NULL";

            $announcement->save();
        }

        return redirect('/announcements');
    }

    public function latestAnnouncement(Request $request){
        $latestAnnouncement = App\Models\Admin\Announcement::all()->last();
        return $latestAnnouncement;

        if ($latestAnnouncement->Subject == "NULL" && $latestAnnouncement->Content == "NULL"){
            return 'No Announcement';
        }
        else if($latestAnnouncement == null){
            return 'No Announcement';
        }
        else {
            return $latestAnnouncement;
        }
    }
}
