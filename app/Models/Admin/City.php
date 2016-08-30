<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'City';
    protected $primaryKey = 'CityID';
    public $timestamps = false;

    public function province()
	{
	    return $this->hasOne('App\Models\Admin\Province', 'ProvinceID', 'ProvinceID');
	}
}
