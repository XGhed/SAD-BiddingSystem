<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'Threads';
    protected $primaryKey = 'ThreadID';
    public $timestamps = false;

		public function item()
		{
		    return $this->hasMany('App\Models\Admin\Message', 'ThreadID', 'ThreadID');
		}
}
