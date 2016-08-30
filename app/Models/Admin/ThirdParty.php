<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class ThirdParty extends Model
{
	use SoftDeletes;

    protected $table = 'Delivery_Thirdparty';
    protected $primaryKey = 'PartyID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function province_ThirdParty()
	{
	    return $this->hasMany('App\Models\Admin\ProvinceThirdParty', 'PartyID');
	}
}
