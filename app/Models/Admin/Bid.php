<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'bid';
    protected $primaryKey = 'BidID';
    public $timestamps = false;

    public function account()
	{
	    return $this->hasOne('App\Models\Admin\Account', 'AccountID', 'AccountID');
	}

	public function item()
	{
	    return $this->hasOne('App\Models\Admin\Item', 'ItemID', 'ItemID');
	}
}
