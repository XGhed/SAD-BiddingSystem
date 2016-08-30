<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'Account';
    protected $primaryKey = 'AccountID';
    public $timestamps = false;

    public function membership()
	{
	    return $this->hasMany('App\Models\Admin\Membership', 'MembershipID');
	}
}
