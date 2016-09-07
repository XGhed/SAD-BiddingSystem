<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Item_Auction extends Model
{
    protected $table = 'Item_Auction';
    protected $primaryKey = 'ItemID';
    public $timestamps = false;

    public function item()
	{
	    return $this->hasOne('App\Models\Admin\Item', 'ItemID', 'ItemID');
	}

	public function auction()
	{
	    return $this->hasOne('App\Models\Admin\Auction', 'AuctionID', 'AuctionID');
	}
}
