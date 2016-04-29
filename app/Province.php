<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';
    protected $primaryKey = 'ProvinceID';    
    public $timestamps = false;

    public function city()
	{
	    return $this->hasMany('App\City', 'ProvinceID');
	}

	public function region()
	{
	    return $this->hasOne('App\Region', 'RegionID', 'RegionID');
	}
}
