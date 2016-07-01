<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = 'membership';
    protected $primaryKey = 'MembershipID';
    public $timestamps = false;

    public function user()
	{
	    return $this->hasOne('App\Models\Admin\User', 'AccountID', 'AccountID');
	}
}
