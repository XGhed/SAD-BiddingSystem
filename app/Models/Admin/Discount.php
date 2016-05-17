<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discount';
    protected $primaryKey = 'DiscountID';
    public $timestamps = false;

    public function accountType()
	{
	    return $this->hasOne('App\Models\Admin\AccountType', 'AccountTypeID', 'AccountTypeID');
	}
}
