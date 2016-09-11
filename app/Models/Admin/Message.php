<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'Messages';
    protected $primaryKey = 'MessageID';
    public $timestamps = false;

		public function item()
		{
		    return $this->hasOne('App\Models\Admin\Thread', 'ThreadID', 'ThreadID');
		}
}
