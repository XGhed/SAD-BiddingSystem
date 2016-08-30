<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Joinbid extends Model
{
    protected $table = 'Joinbid';
    protected $primaryKey = 'JoinbidID';
    public $timestamps = false;

    public function account()
	{
	    return $this->hasOne('App\Models\Admin\Account', 'AccountID', 'AccountID');
	}

	public function auction()
	{
	    return $this->hasOne('App\Models\Admin\Auction', 'AuctionID', 'AuctionID');
	}
}
