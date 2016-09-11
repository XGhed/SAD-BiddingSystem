<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'Announcements';
    protected $primaryKey = 'AnnouncementID';
    public $timestamps = false;
}
