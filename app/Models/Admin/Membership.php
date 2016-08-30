<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = 'Membership';
    protected $primaryKey = 'MembershipID';
    public $timestamps = false;

    public function user()
	{
	    return $this->hasOne('App\Models\Admin\User', 'AccountID', 'AccountID');
	}

	public function accounttype()
	{
	    return $this->hasOne('App\Models\Admin\AccountType', 'AccountTypeID', 'AccountTypeID');
	}

	public function city()
	{
	    return $this->hasOne('App\Models\Admin\City', 'CityID', 'CityID');
	}
}
