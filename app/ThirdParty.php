<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class ThirdParty extends Model
{
    protected $table = 'delivery_thirdparty';
    protected $primaryKey = 'PartyID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function province_ThirdParty()
	{
	    return $this->hasMany('App\ProvinceThirdParty', 'PartyID');
	}
}
