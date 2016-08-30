<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CheckoutRequest_Item extends Model
{
    protected $table = 'CheckoutRequest_Item';
    protected $primaryKey = 'CheckoutRequest_ItemID';
    public $timestamps = false;

    public function checkoutRequest()
	{
	    return $this->hasOne('App\Models\Admin\CheckoutRequest', 'CheckoutRequestID', 'CheckoutRequestID');
	}

	public function item()
	{
	    return $this->hasOne('App\Models\Admin\Item', 'ItemID', 'ItemID');
	}
}
