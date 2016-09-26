<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'Threads';
    protected $primaryKey = 'ThreadID';
    public $timestamps = false;

		public function messages()
		{
		    return $this->hasMany('App\Models\Admin\Message', 'ThreadID', 'ThreadID');
		}

		public function account()
		{
		    return $this->hasOne('App\Models\Admin\Account', 'AccountID', 'AccountID');
		}

		public function problemType()
		{
		    return $this->hasOne('App\Models\Admin\ProblemType', 'ProblemTypeID', 'ProblemTypeID');
		}
}
