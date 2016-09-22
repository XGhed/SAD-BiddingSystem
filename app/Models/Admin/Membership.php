<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = 'Membership';
    protected $primaryKey = 'MembershipID';
    public $timestamps = false;
	public function accounttype()
	{
	    return $this->hasOne('App\Models\Admin\AccountType', 'AccountTypeID', 'AccountTypeID');
	}

	public function city()
	{
	    return $this->hasOne('App\Models\Admin\City', 'CityID', 'CityID');
	}

	public function account()
	{
	    return $this->hasOne('App\Models\Admin\Account', 'AccountID', 'MembershipID');
	}
}
