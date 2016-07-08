<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PullRequest extends Model
{
    protected $table = 'PullRequests';
    protected $primaryKey = 'PullRequestID';
    public $timestamps = false;

    public function Item()
	{
	    return $this->hasOne('App\Models\Admin\Item', 'ItemID', 'ItemID');
	}
}
