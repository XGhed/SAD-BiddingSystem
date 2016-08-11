<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CheckoutRequest extends Model
{
    protected $table = 'checkoutrequests';
    protected $primaryKey = 'CheckoutRequestID';
    public $timestamps = false;

    public function account()
	{
	    return $this->hasOne('App\Models\Admin\Account', 'AccountID', 'AccountID');
	}

	public function city()
	{
	    return $this->hasOne('App\Models\Admin\City', 'CityID', 'CityID');
	}

	public function checkoutRequest_Item()
	{
	    return $this->hasOne('App\Models\Admin\CheckoutRequestID', 'CheckoutRequestID');
	}
}
