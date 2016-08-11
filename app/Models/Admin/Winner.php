<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    protected $table = 'winners';
    protected $primaryKey = 'WinnerID';
    public $timestamps = false;

    public function bid()
	{
	    return $this->hasOne('App\Models\Admin\Bid', 'BidID', 'BidID');
	}

	public function item()
	{
	    return $this->hasOne('App\Models\Admin\Item', 'ItemID', 'ItemID');
	}

	public function auction()
	{
	    return $this->hasOne('App\Models\Admin\Auction', 'AuctionID', 'AuctionID');
	}
}
