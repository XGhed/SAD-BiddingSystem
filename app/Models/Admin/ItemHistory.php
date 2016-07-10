<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class ItemHistory extends Model
{
    protected $table = 'itemhistory';
    protected $primaryKey = 'ItemID';
    public $timestamps = false;

    public function item()
	{
	    return $this->hasOne('App\Models\Admin\Item', 'ItemID', 'ItemID');
	}
}
