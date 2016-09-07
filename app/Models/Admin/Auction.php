<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    protected $table = 'Auction';
    protected $primaryKey = 'AuctionID';
    public $timestamps = false;

    public function item_auction()
	{
	    return $this->hasMany('App\Models\Admin\Item_Auction', 'AuctionID', 'AuctionID');
	}
}
