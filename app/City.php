<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    protected $primaryKey = 'CityID';
    public $timestamps = false;

    public function province()
	{
	    return $this->hasOne('App\Province', 'ProvinceID', 'ProvinceID');
	}
}
