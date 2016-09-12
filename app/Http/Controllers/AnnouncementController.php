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

        $announcement->DateAndTime = Carbon::now('Asia/Manila');
        $announcement->Subject = $request->subject;
        $announcement->Content = $request->content;

        $announcement->save();

        return redirect('/announcements');
    }

    public function latestAnnouncement(Request $request){
        $latestAnnouncement = App\Models\Admin\Announcement::all()->last();

        if($latestAnnouncement != null){
            return $latestAnnouncement;
        }
        else {
            return 'No Announcement';
        }
    }
}
